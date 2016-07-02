<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AnaCreateRequest extends Request
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
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|digits:11|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => '必须填写用户名',
          'name.unique' => '用户名已被占用',
          'email.required' => '必须填写邮箱',
          'email.email' => '邮箱格式不正确',
          'email.unique' => '邮箱已被占用',
          'phone.required' => '必须填写电话号码',
          'phone.digits' => '请填写11位电话号码',
          'phone.unique' => '此电话号码已被占用',
            'password.required' => '必须填写密码',
            'password.min' => '密码不能低于6位',
            'password.confirmed' => '两次输入密码不相同',
        ];
    }
}
