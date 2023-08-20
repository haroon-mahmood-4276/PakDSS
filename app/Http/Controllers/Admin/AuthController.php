<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView(Request $request)
    {
        abort_if(request()->ajax(), 403);

        return view('admin.auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        abort_if(request()->ajax(), 403);

        $credentials = $request->validated();

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard.index'));
        }

        return redirect()->route('admin.login.view')->withDanger('The provided credentials do not match our records')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login.view');
    }
}
