<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'name' =>'bail|required|max:255',
            'email' =>'bail|required|unique:users|email',
            'password' =>'bail|required|numeric|min:8',
            'password_confirm' =>'bail|required|same:password'
        ];
    }
    public function  messages()
    {
        return [
            'name.required' => 'Name không được để trống',
            'email.required' => 'Email không được để trống',
            'email.unique'=>'Email đã tồn tại',
            'email.email' => 'Phải nhập đúng định dạng email',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password tối thiểu 8 ký tự',
            'password_confirm.same' => 'Mật khẩu không trùng nhau',
        ];
    }
}
