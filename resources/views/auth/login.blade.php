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
                        <form class="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="login-userheading">
                                        <h3 class="text-center">Admin CarGuru-Reset Password</h3>
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
                                    <div class="mb-3">
                                        <label class="form-label">Password <span class="text-danger"> *</span></label>
                                        <div class="pass-group">
                                            <input id="password" type="password"
                                                class="form-control pass-input form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="ti toggle-password ti-eye-off text-gray-9"></span>
                                        </div>
                                    </div>
                                    <div class="form-login authentication-check">
                                        <div class="row">
                                            <div class="col-12 d-flex align-items-center justify-content-between">
                                                <div class="custom-control custom-checkbox">
                                                    <label class="checkboxs ps-4 mb-0 pb-0 line-height-1 fs-16 text-gray-6">
                                                        <input type="checkbox" class="form-control">
                                                        <span class="checkmarks"></span>Remember me
                                                    </label>
                                                </div>
                                                <div class="text-end">
                                                    @if (Route::has('password.request'))
                                                        <a class="text-orange fs-16 fw-medium"
                                                            href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-login">
                                        <button type="submit" class="btn btn-primary w-100 " >Sumbit</button>
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