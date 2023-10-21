@extends('user.layout.layout')

@section('seo-breadcrumb')
@endsection

@section('page-title', 'Login')

@section('custom-css')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <div style="margin-top: 55px">
        <section class="bg-white">
            <div class="container-xxl mt-4">
                <div class="row">
                    <div class="col-12">
                        <h3 class="m-0 text-primary">Welcome</h3>
                        <small>Please loggin via email and social account associated with your account.</small>
                    </div>
                </div>
            </div>
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row mb-4">
                    <div class="col-5">
                        <form id="formAuthentication" class="mb-3" action="{{ route('user.login') }}" method="POST">

                            @csrf

                            {{ view('admin.layout.alerts') }}

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
                                        aria-describedby="password" autocomplete="off" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input id="remember" name="remember" type="hidden" value="0" />
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember"
                                        value="1">
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
                    <div class="col-2">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <p class="m-0 fs-xlarge text-primary fw-bolder">OR</p>
                        </div>
                    </div>
                    <div class="col-5">
                        <h5 class="text-center">Use Social Network Account</h5>
                        <div class="d-flex flex-row justify-content-center gap-3">
                            <a href="{{ route('user.socialiate.redirect', ['social_account' => 'google']) }}"
                                class="btn btn-google-plus waves-effect waves-light"><i
                                    class="fa-brands fa-google me-2"></i> Sign up with Google</a>

                            <a href="javascript:void(0);"
                                class="btn btn-facebook waves-effect waves-light"><i class="fa-brands fa-facebook me-2"></i>
                                Sign up with Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('page-js')
@endsection

@section('custom-js')
@endsection
