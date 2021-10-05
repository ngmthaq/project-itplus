<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserInformationRequest extends FormRequest
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
            'address' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Vui lòng nhập họ của bạn',
            'first_name.regex' => 'Vui lòng nhập tên của bạn',
            'last_name.required' => 'Vui lòng nhập tên của bạn',
            'last_name.regex' => 'Vui lòng nhập tên của bạn',
            'is_male.required' => 'Vui lòng chọn giới tính của bạn',
            'is_male.digits_between' => 'Vui lòng chọn giới tính của bạn',
            'dob.required' => 'Vui lòng nhập ngày sinh của bạn',
            'dob.date' => 'Vui lòng nhập ngày sinh của bạn'
        ];
    }
}
