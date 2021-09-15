<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required', 'regex:/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựýỳỵỷỹ\s\W|_]+$/'],
            'last_name' => ['required', 'regex:/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựýỳỵỷỹ\s\W|_]+$/'],
            'is_male' => ['required', 'digits_between:0,1'],
            'dob' => ['required', 'date'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
            'confirm_password' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', 'same:password'],
            'address' => ['required'],
            'agree' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Vui lòng nhập họ của bạn',
            'first_name.regex' => 'Vui lòng nhập họ của bạn',
            'last_name.required' => 'Vui lòng nhập tên của bạn',
            'last_name.regex' => 'Vui lòng nhập tên của bạn',
            'is_male.required' => 'Vui lòng chọn giới tính của bạn',
            'is_male.digits_between' => 'Vui lòng chọn giới tính của bạn',
            'dob.required' => 'Vui lòng nhập ngày sinh của bạn',
            'dob.date' => 'Vui lòng nhập ngày sinh của bạn',
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.email' => 'Vui lòng nhập email của bạn',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số',
            'password.regex' => 'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số',
            'confirm_password.required' => 'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số',
            'confirm_password.regex' => 'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số',
            'confirm_password.same' => 'Hai mật khẩu bạn nhập không trùng khớp',
            'address.required' => 'Vui lòng nhập được địa chỉ của bạn',
            'agree.required' => 'Vui lòng đồng ý với chính sách và điều khoản của chúng tôi'
        ];
    }
}
