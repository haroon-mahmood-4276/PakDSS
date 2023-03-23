<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\Login\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView(Request $request)
    {
        abort_if(request()->ajax(), 403);

        return view('vendor.auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        abort_if(request()->ajax(), 403);

        $credentials = $request->validated();

        if (Auth::guard('vendor')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('vendor.dashboard.index'));
        }

        return redirect()->route('vendor.login.view')->withDanger('The provided credentials do not match our records')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('vendor.login.view');
    }
}
