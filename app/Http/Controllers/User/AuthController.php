<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Login\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

        $remember = boolval($credentials['remember']);
        unset($credentials['remember']);

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('user.home.index'));
        }

        return redirect()->route('user.login')->withDanger('The provided credentials do not match our records')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }

    public function socialiateRedirect(Request $request, $social_account)
    {
        return Socialite::driver($social_account)->redirect();
    }

    public function socialiateCallback(Request $request, $social_account)
    {
        $user = Socialite::driver($social_account)->user();

        // OAuth 2.0 providers...
        $token = $user->token;
        $refreshToken = $user->refreshToken;
        $expiresIn = $user->expiresIn;

        // OAuth 1.0 providers...
        $token = $user->token;
        $tokenSecret = $user->tokenSecret;

        // All providers...
        dd(
            $user,
            $user->getId(),
            $user->getId(),
            $user->getNickname(),
            $user->getName(),
            $user->getEmail(),
            $user->getAvatar()
        );





        // $socialAccount = Socialite::driver($social_account)->user();

        // $user = User::updateOrCreate([
        //     'github_id' => $socialAccount->id,
        // ], [
        //     'name' => $socialAccount->name,
        //     'email' => $socialAccount->email,
        //     'github_token' => $socialAccount->token,
        //     'github_refresh_token' => $socialAccount->refreshToken,
        // ]);

        // Auth::login($user);

        // return redirect()->route('user.home.index');
    }
}
