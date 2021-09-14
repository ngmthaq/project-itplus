<?php

namespace App\Http\Requests;

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
            'password' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.email' => 'Vui lòng nhập email của bạn',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.regex' => 'Mật khẩu phải có ít nhất 8 số, có tối thiểu 1 chữ và 1 số'
        ];
    }
}
