<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        try {
            $socialUser = Socialite::driver($provider)->user();
            if (User::where('email', $socialUser->getEmail())->exists()) {
                return redirect('/login')->withErrors(['email' => 'Email already used']);
            } else if(User::where('email', $socialUser->getEmail(), 'provider_token')->exists()){
                return redirect('/dashboard');
            }
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialUser->id
            ])->first();
            if (!$user) {
                $user = User::create(
                    [
                        'name' => $socialUser->name,
                        'username' => str_replace(' ', '', $socialUser->name) . substr($socialUser->id, 0, 3),
                        'email' => $socialUser->email,
                        'provider' => $provider,
                        'provider_id' => $socialUser->id,
                        'provider_token' => $socialUser->token,
                        'email_verified_at' => now(),
                    ]
                );
                Auth::login($user);
                return redirect('/dashboard');
            } else{
                return redirect('/dashboard');
            }
        } catch (\Exception $e) {
            //throw $th;
            return redirect('/login');
        }
    }
}
