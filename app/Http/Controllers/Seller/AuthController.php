<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Login\LoginRequest;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function registerView(Request $request)
    {
        abort_if(request()->ajax(), 403);

        return view('seller.auth.register');
    }

    public function registerPost(Request $request)
    {
        abort_if(request()->ajax(), 403);

        $inputs = $request->input();

        $seller = Seller::create([
            'email' => $inputs['email'],
            'password' => Hash::make('1122334455'),
            'phone_primary' => $inputs['phone_code'] . $inputs['phone_number'],
            'status' => 'pending_approval',
            'reason' => null,
            'setup' => false,
        ]);

        Auth::guard('seller')->login($seller);

        event(new Registered($seller));

        return redirect()->route('verification.notice');
    }

    public function loginView(Request $request)
    {
        abort_if(request()->ajax(), 403);

        return view('seller.auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        abort_if(request()->ajax(), 403);

        $credentials = $request->validated();

        if (Auth::guard('seller')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('seller.dashboard.index'));
        }

        return redirect()->route('seller.login.view')->withDanger('The provided credentials do not match our records')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('seller.login.view');
    }
}
