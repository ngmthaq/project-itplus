<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCasualPostRequest extends FormRequest
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
            'category_id' => 'required',
            'cover_url' => ['required', 'regex:/^((http:\/\/)|(https:\/\/))(.+)\.((png)|(jpeg)|(jpg)|(jfif))$/'],
            'title_vi' => 'required',
            'subtitle_vi' => 'required',
            'content_vi' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cover_url.regex' => 'Vui lòng nhập đúng định dạng đường dẫn ảnh'
        ];
    }
}
