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

    /**
     * Login using Github button
     *
     * @return void
     */
    public function loginUsingGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Login using Github handle
     *
     * @return void
     */
    public function callbackFromGithub()
    {
        try {
            $user = Socialite::driver('github')->user();
            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if (!$is_user) {
                $name = explode(' ', $user->getName());
                $first_name = array_shift($name);
                $last_name = implode(' ', array_values($name));
                $saveUser = User::create([
                    'github_id' => $user->getId(),
                    'role_id' => 2,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
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
