<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserInformationRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInformationController extends Controller
{
    /**
     * Show user's information
     *
     * @return view
     */
    public function show()
    {
        return view('web.main.user-information', [
            'site' => 'userInformation',
            'categories' => Category::all()
        ]);
    }

    /**
     * Show edit user's information form
     *
     * @return view
     */
    public function showEditForm()
    {
        return view('web.main.edit-user-information', [
            'site' => 'editUserInformation',
            'categories' => Category::all()
        ]);
    }

    /**
     * Edit user's information handle
     *
     * @param EditUserInformationRequest $request
     *
     * @return void
     */
    public function edit(EditUserInformationRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $oldUser = $user;
        $userUpdated = $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name')
        ]);
        if ($userUpdated) {
            $userInformationUpdated = UserInformation::updateOrInsert(
                ['user_id' => $user->id],
                [
                    'is_male' => $request->input('is_male'),
                    'dob' => $request->input('dob'),
                    'address' => $request->input('address')
                ]
            );
        }
        if (!$userInformationUpdated) {
            $user->update($oldUser);
            return redirect(route('userInformation.showEditForm'))->with('error', 'Thay đổi thông tin thất bại, xin vui lòng thử lại');
        }
        return redirect(route('userInformation.show'))->with('success', 'Cập nhật thông tin thành công');
    }
}
