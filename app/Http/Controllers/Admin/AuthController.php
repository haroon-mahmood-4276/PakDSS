<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView(Request $request)
    {
        abort_if(request()->ajax(), 403);

        return view('admin.auth.login');
    }

    public function loginPost(Request $request)
    {
        abort_if(request()->ajax(), 403);

        // $waiter = Waiter::where('fSW_Code', $request->waiter)->first();
        // if ($waiter && $waiter->fSW_PWord == $request->password) {
        //     Auth::login($waiter);
        //     $request->session()->regenerate();
        //     return redirect()->intended(route('dashboard.index'));
        // }

        return redirect()->route('admin.login.view')->withDanger('Either email or password is wrong!');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.view');
    }
}
