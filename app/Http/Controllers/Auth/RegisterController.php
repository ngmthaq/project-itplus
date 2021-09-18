<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function show()
    {
        return view('web.main.register', [
            'categories' => Category::all(),
            'site' => 'register'
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $request->flashExcept(['password', 'confirm_password']);
        $user = User::create([
            'role_id' => 2,
            'first_name' => trim($request->input('first_name')),
            'last_name' => trim($request->input('last_name')),
            'email' => trim($request->input('email')),
            'password' => trim($request->input('password')),
            'remember_token' => md5(trim($request->input('first_name')) . trim($request->input('last_name')) . trim($request->input('email')) . date('Y-m-d H:i:s'))
        ]);
        if ($user) {
            $userInformation = $user->userInformation()->create([
                'dob' => trim($request->input('dob')),
                'is_male' => trim($request->input('is_male')),
                'address' => trim($request->input('address'))
            ]);
        }
        if ($userInformation) {
            Mail::to($user->email)->send(new VerifyEmail($user));
            return redirect('/')->with('error', 'Chúng tôi đã gửi liên kết xác thực vào email của bạn, vui lòng kiểm tra hòm thư của bạn để xác thực tài khoản');
        } else {
            $user->delete();
        }
        return redirect(route('register.show'))->with('error', 'Đăng ký tài khoản thất bại, xin vui lòng thử lại sau ít phút');
    }

    public function verify(User $user)
    {
        $passwordReset = DB::table('password_resets')->updateOrInsert(
            [
                'email' => $user->email
            ],
            [
                'token' => $user->remember_token,
                'created_at' => Carbon::now()
            ]
        );
        $user->email_verified_at = Carbon::now();
        $user->remember_token = md5($user->first_name . $user->last_name . $user->email . date('Y-m-d H:i:s'));
        $user->save();
        Auth::login($user);
        return redirect('/')->with('success', 'Xác thực tài khoản thành công');
    }
}
