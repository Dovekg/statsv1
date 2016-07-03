<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TeamStoreRequest extends Request
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
            'name' => 'required|max:255|unique:teams'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '必须填写组名',
            'name.unique' => '组名已被占用'
          ];
    }
}
