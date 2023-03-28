<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Login\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView(Request $request)
    {
        abort_if(request()->ajax(), 403);

        return view('user.auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        abort_if(request()->ajax(), 403);

        $credentials = $request->validated();

        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('user.dashboard.index'));
        }

        return redirect()->route('user.login.view')->withDanger('The provided credentials do not match our records')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.login.view');
    }
}
