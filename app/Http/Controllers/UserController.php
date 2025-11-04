<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Otp; // Your OTP model
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request): View
    {
        $search = $request->input('user-search') ?? '';
        if ($search) {
            $data = User::where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            })->paginate(20);
        } else {
            $data = User::latest()->paginate(20);
        }

        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show($id): View
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user = User::findOrFail($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    // OTP Generation
    public function getOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'number' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors()
            ], 422);
        }

        $otp = rand(100000, 999999);
        $transactionId = Str::random(10);
        $validSeconds = 120;

        $otpRecord = Otp::updateOrCreate(
            ['phone' => $request->number],
            [
                'otp' => $otp,
                'transaction_id' => $transactionId,
                'expires_at' => Carbon::now()->addSeconds($validSeconds)
            ]
        );

        return response()->json([
            'status' => true,
            'message' => 'OTP sent successfully',
            'data' => [
                'otp' => (string)$otp, // For testing only
                'transaction_id' => $transactionId,
                'valid_seconds' => (string)$validSeconds
            ]
        ]);
    }
   public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|string',
            'transaction_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $otpRecord = Otp::where('transaction_id', $request->transaction_id)
            ->where('otp', $request->otp)
            ->first();

        if (!$otpRecord) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid OTP or transaction ID'
            ], 400);
        }

        if (Carbon::now()->greaterThan($otpRecord->expires_at)) {
            return response()->json([
                'status' => false,
                'message' => 'OTP expired'
            ], 400);
        }

        // Create or get user (auto-generate email)
        $user = User::firstOrCreate(
            ['phone' => $otpRecord->phone],
            [
                'name' => 'User_'.$otpRecord->phone,
                'email' => $otpRecord->phone.'@example.com',
                'password' => Hash::make(Str::random(10))
            ]
        );

        // You can generate JWT token here if needed
     $token = JWTAuth::fromUser($user);

        return response()->json([
            'status' => true,
            'message' => 'Verification code sent successfully',
            'data' => [
                'token' => $token,
                'user_name' => $user->name,
                'user_id' => $user->id
            ]
        ]);
    }
}
