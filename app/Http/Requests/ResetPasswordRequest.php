<?php

namespace App\Http\Requests;

use App\Rules\RequiresAtLeast8CharactersAndContainAtLeast1LetterAnd1Number;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'new_password' => ['required', new RequiresAtLeast8CharactersAndContainAtLeast1LetterAnd1Number()],
            'confirm_password' => ['required', new RequiresAtLeast8CharactersAndContainAtLeast1LetterAnd1Number(), 'same:new_password'],
        ];
    }

    public function messages()
    {
        return [
            'new_password.required' => 'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số',
            'confirm_password.required' => 'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số',
            'confirm_password.same' => 'Mật khẩu bạn nhập không trùng khớp',
        ];
    }
}
