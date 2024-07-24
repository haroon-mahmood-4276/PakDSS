<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Login\LoginRequest;
use App\Models\User;
use App\Models\UserSocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function loginView(Request $request)
    {
        abort_if($request->ajax(), 403);

        return view('user.auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        abort_if($request->ajax(), 403);
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

    public function socialiateRedirect($social_account)
    {
        return Socialite::driver($social_account)->redirect();
    }

    public function socialiateCallback($social_account)
    {
        $socialAccount = Socialite::driver($social_account)->user();

        $user = User::whereEmail($socialAccount->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialAccount->name,
                'email' => $socialAccount->email,
                'password' => Hash::make('thisaccountislinked'),
                'remember_token' => null,
                'email_verified_at' => now()->timestamp,
            ]);
        }
        $user->avatar = $socialAccount->avatar;
        $user->save();


        $linkedSocialAccount = UserSocialAccount::whereAccountId('' . $socialAccount->id)->first();
        if (!$linkedSocialAccount) {
            UserSocialAccount::create([
                'account_id' => $socialAccount->id,
                'user_id' => $user->id,
                'name' => $social_account,
                'token' => $socialAccount->token,
                'refreshToken' => $socialAccount->refreshToken,
                'expiresIn' => $socialAccount->expiresIn,
                'approved_scopes' => $socialAccount->approvedScopes,
            ]);
        }

        Auth::login($user);
        return redirect()->intended(route('user.home.index'));
    }
}
