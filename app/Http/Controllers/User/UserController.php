<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changePasswordForm()
    {
        return view('web.main.change-password', [
            'categories' => Category::all(),
            'site' => 'changePassword'
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect(route('user.changePasswordForm'))->with('incorrect_password', 'Sai mật khẩu');
        }
        $user->password = $request->input('confirm_password');
        $user->save();
        return redirect('/')->with('success', 'Thay đổi mật khẩu thành công');
    }
}
