@extends('vendor.auth.layout')

@section('content')
    {{-- <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
        <div class="w-px-400 mx-auto">
            <div class="app-brand mb-4">
                <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                fill="#7367F0" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                fill="#7367F0" />
                        </svg>
                    </span>
                </a>
            </div>

            <h3 class="mb-1 fw-bold">Welcome to {{ env('APP_NAME') }}! 👋</h3>
            <p class="mb-4">Please sign-in to your account and start the adventure</p>
            <form id="formAuthentication" class="mb-3" action="{{ route('vendor.login.post') }}" method="POST">

                @csrf

                {{ view('vendor.layout.alerts') }}

                <div class="mb-3">
                    <label for="email" class="form-label">Email or Username</label>
                    <input type="text" class="form-control" id="email" name="email"
                        placeholder="Enter your email or username" autofocus>
                </div>

                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                    </div>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input id="remember" name="remember" type="hidden" value="0" />
                        <input class="form-check-input" type="checkbox" id="remember-me" name="remember" value="1">
                        <label class="form-check-label" for="remember-me">
                            Remember Me
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">
                    Sign in
                </button>
            </form>
        </div>
    </div> --}}
    <div class="container">
        <div class="row align-items-center vh-100">
            <div class="col-6 mx-auto">
                <div class="card mx-auto card-login">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Sign in</h4>

                        <form id="formAuthentication" class="mb-3" action="{{ route('vendor.login.post') }}" method="POST">

                            @csrf

                            {{ view('vendor.layout.alerts') }}
                            <div class="mb-3">
                                <input class="form-control" placeholder="Email" type="text" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            </div>
                            <div class="mb-3">
                                <a class="float-end font-sm text-muted" href="#">Forgot password?</a>
                                <label class="form-check">
                                    <input id="remember" name="remember" type="hidden" value="0" />
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember" value="1">
                                    <span class="form-check-label"> Remember Me</span>
                                </label>
                            </div>
                            <div class="mb-4">
                                <button class="btn btn-primary w-100" type="submit"> Login</button>
                            </div>
                        </form>
                        <p class="text-center small text-muted mb-15">or sign up with</p>
                        <div class="d-grid gap-3 mb-4"><a class="btn w-100 btn-light font-sm" href="#">
                                <svg class="icon-svg" aria-hidden="true" width="20" height="20"
                                    viewbox="0 0 20 20">
                                    <path
                                        d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 002.38-5.88c0-.57-.05-.66-.15-1.18z"
                                        fill="#4285F4"></path>
                                    <path
                                        d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 01-7.18-2.54H1.83v2.07A8 8 0 008.98 17z"
                                        fill="#34A853"></path>
                                    <path d="M4.5 10.52a4.8 4.8 0 010-3.04V5.41H1.83a8 8 0 000 7.18l2.67-2.07z"
                                        fill="#FBBC05"></path>
                                    <path
                                        d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 001.83 5.4L4.5 7.49a4.77 4.77 0 014.48-3.3z"
                                        fill="#EA4335"></path>
                                </svg> Sign in using Google</a><a class="btn w-100 btn-light font-sm" href="#">
                                <svg class="icon-svg" aria-hidden="true" width="20" height="20"
                                    viewbox="0 0 20 20">
                                    <path
                                        d="M3 1a2 2 0 00-2 2v12c0 1.1.9 2 2 2h12a2 2 0 002-2V3a2 2 0 00-2-2H3zm6.55 16v-6.2H7.46V8.4h2.09V6.61c0-2.07 1.26-3.2 3.1-3.2.88 0 1.64.07 1.87.1v2.16h-1.29c-1 0-1.19.48-1.19 1.18V8.4h2.39l-.31 2.42h-2.08V17h-2.5z"
                                        fill="#4167B2"></path>
                                </svg> Sign in using Facebook</a></div>
                        <p class="text-center mb-4">Do not have account?<a href="page-account-register.html"> Sign up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
