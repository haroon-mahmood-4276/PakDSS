@extends('seller.auth.layout')

@section('content')
    <div class="container">
        <div class="row align-items-center vh-100">
            <div class="col-6 mx-auto">
                <div class="card mx-auto card-login">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Sign in</h4>

                        <form id="formAuthentication" class="mb-3" action="{{ route('seller.login.post') }}" method="POST">

                            @csrf

                            {{ view('seller.layout.alerts') }}
                            <div class="mb-3">
                                <input class="form-control" placeholder="Email" type="text" id="email"
                                    name="email">
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
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember"
                                        value="1">
                                    <span class="form-check-label"> Remember Me</span>
                                </label>
                            </div>
                            <div class="mb-4">
                                <button class="btn btn-primary w-100" type="submit"> Login</button>
                            </div>
                        </form>
                        <p class="text-center mb-4">Do not have account?
                            <a href="{{ route('seller.register.view') }}">Sign up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
