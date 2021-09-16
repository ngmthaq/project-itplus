<?php

namespace App\Http\Requests;

use App\Rules\RequiresAtLeast8CharactersAndContainAtLeast1LetterAnd1Number;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required', new RequiresAtLeast8CharactersAndContainAtLeast1LetterAnd1Number()]
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.email' => 'Vui lòng nhập đúng định dạng email và email có độ dài tên tối thiểu 6 ký tự',
            'password.required' => 'Vui lòng nhập mật khẩu'
        ];
    }
}
