@extends('seller.auth.layout')

@section('content')
    <div class="container">
        <div class="row align-items-center vh-100">
            <div class="col-6 mx-auto">
                <div class="card mx-auto card-login">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Create an Seller Account</h4>
                        <form id="formAuthentication" class="mb-3" action="{{ route('seller.register.post') }}" method="POST">

                            @csrf

                            {{ view('seller.layout.alerts') }}

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" placeholder="Your email" type="text" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <div class="row gx-2">
                                    <div class="col-4">
                                        <input class="form-control" value="+92" type="text" maxlength="3" minlength="2" id="phone_code" name="phone_code" readonly>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control" placeholder="Phone" type="number" id="phone_number" name="phone_number">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Create password</label>
                                <input class="form-control" placeholder="Password" type="password">
                            </div> --}}
                            <div class="mb-3">
                                <p class="small text-center text-muted"></p>By signing up, you confirm that you&rsquo;ve
                                read and accepted our User Notice and Privacy Policy.
                            </div>
                            <div class="mb-4">
                                <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                            </div>
                            <p class="text-center mb-2">Already have an account?
                                <a href="{{ route('seller.login.view') }}">Sign in now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
