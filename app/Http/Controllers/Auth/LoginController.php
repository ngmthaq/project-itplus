<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Category;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        $site = 'login';
        return view('web.main.login', compact('categories', 'site'));
    }

    public function login(LoginRequest $request)
    {
        $request->flashOnly('email');
        $email = $request->input('email');
        $password = $request->input('password');
        $rememberMe = $request->input('remember-me') == 'true' ? true : false;
        if (Auth::attempt(['email' => $email, 'password' => $password], $rememberMe)) {
            $request->session()->regenerate();
            if (!Auth::user()->email_verified_at) {
                Auth::logout();
                return redirect(route("login.show"))->with('email_not_verified', 'Vui lòng xác thực email');
            }
            return redirect('/')->with('login_successfully', 'Đăng nhập thành công');
        }
        return redirect(route('login.show'))->with('login_error', 'Đăng nhập thất bại, kiểm tra lại tài khoản hoặc mật khẩu');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
