@extends('user.layout.layout')

@section('seo-breadcrumb')
@endsection

@section('page-title', 'Login')

@section('custom-css')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <main class="main">
        <section class="section-box shop-template mt-30">
            <div class="container">
                {{ view('seller.layout.alerts') }}
                <div class="row mb-100">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-4">
                        <form id="formAuthentication" action="{{ route('user.login.post') }}" method="POST">
                            @csrf

                            <h3>Member Login</h3>
                            <p class="font-md color-gray-500 mb-15">Welcome back!</p>
                            <div class="form-register">

                                <div class="form-group">
                                    <label class="mb-5 font-sm color-gray-700">Email / Phone / Username *</label>
                                    <input class="form-control" placeholder="stevenjob@gmail.com" type="email"
                                        id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label class="mb-5 font-sm color-gray-700">Password *</label>
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" autocomplete="off"/>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <label class="form-check">
                                            <input id="remember" name="remember" type="hidden" value="0" />
                                            <input class="form-check-input" type="checkbox" id="remember-me" name="remember"
                                                value="1">
                                            <span class="form-check-label">Remember Me</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6 text-end">
                                        {{-- <div class="form-group"><a class="font-xs color-gray-500" href="#">Forgot your
                                            password?</a></div> --}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="font-md-bold btn btn-buy" type="submit">Login</button>
                                </div>
                                <div class="mt-20">
                                    <span class="font-xs color-gray-500 font-medium">
                                        Have not an account?
                                    </span>
                                    <a class="font-xs color-brand-3 font-medium" href="page-register.html"> Create a new
                                        account.</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-1">
                        <div class="d-flex justify-content-center align-items-center w-100 h-100">
                            <div>
                                <strong>OR</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-login-social pt-65">
                            <h5 class="text-center">Use Social Network Account</h5>
                            <div class="box-button-login mt-25">
                                <a class="btn btn-login font-md-bold color-brand-3 mb-15">
                                    Sign up with
                                    <img src="{{ asset('user-assets') }}/imgs/page/account/google.svg" alt="Ecom">
                                </a>
                                <a class="btn btn-login font-md-bold color-brand-3 mb-15">
                                    Sign up with
                                    <span class="color-blue font-md-bold">Facebook</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box box-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-12">
                        <h3 class="color-white">Subscrible &amp; Get <span class="color-warning">10%</span> Discount
                        </h3>
                        <p class="font-lg color-white">Get E-mail updates about our latest shop and <span
                                class="font-lg-bold">special offers.</span></p>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <div class="box-form-newsletter mt-15">
                            <form class="form-newsletter">
                                <input class="input-newsletter font-xs" value="" placeholder="Your email Address">
                                <button class="btn btn-brand-2">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('page-js')
@endsection

@section('custom-js')
@endsection
