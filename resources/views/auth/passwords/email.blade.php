@extends('layouts.app', ['activePage' => 'login', 'title' => 'Admin Login - CarGuru - Admin Portal'])
@section('content')
    <div class="account-content">
        <div class="login-wrapper login-new">
            <div class="row w-100">
                <div class="col-lg-5 mx-auto">
                    <div class="login-content user-login">
                        <div class="login-logo">
                            <img src="{{URL::asset('build/img/car-guru-logo.webp')}}" alt="img">
                            <a href="{{url('index')}}" class="login-logo logo-white">
                                <img src="{{URL::asset('build/img/logo-white.svg')}}" alt="Img">
                            </a>
                        </div>
                                                @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="login-userheading">
                                        <h3 class="text-center">Admin CarGuru</h3>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email <span class="text-danger"> *</span></label>
                                        <div class="input-group">
                                            <input id="email" type="email"
                                                class="form-control border-end-0 @error('email') is-invalid @enderror"
                                                name="email" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="input-group-text border-start-0">
                                                <i class="ti ti-mail"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-login">
                                        <button type="submit" class="btn btn-primary w-100">{{ __('Send Password Reset Link') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                        <p>Copyright &copy; 2025 Macromend Technologies</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection