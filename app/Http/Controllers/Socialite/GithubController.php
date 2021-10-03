<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function loginUsingGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackFromGithub()
    {
        try {
            $user = Socialite::driver('github')->user();
            dd($user);
            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if (!$is_user) {
                $saveUser = User::create([
                    'github_id' => $user->getId(),
                    'role_id' => 2,
                    'first_name' => $user->user['given_name'],
                    'last_name' => $user->user['family_name'],
                    'email' => $user->getEmail(),
                    'password' => 'github' . $user->getId(),
                    'email_verified_at' => Carbon::now(),
                    'remember_token' => md5($user->getName() . $user->getEmail() . date('Y-m-d H:i:s'))
                ]);
            } else {
                $saveUser = User::where('email', $user->getEmail())->first();
                $saveUser->github_id = $user->getId();
                $saveUser->save();
            }
            Auth::loginUsingId($saveUser->id);
            return redirect('/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
