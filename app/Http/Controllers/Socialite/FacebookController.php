<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacebookController extends Controller
{
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            dd($user);
            $saveUser = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ], [
                'first_name' => $user->getName(),
                'last_name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => $user->getName() . '@' . $user->getId()
            ]);
            Auth::loginUsingId($saveUser->id);
            return redirect('/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
