<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'اسم المستخدم أو كلمة المرور غير صحيحين',
            'username.string'   => 'اسم المستخدم أو كلمة المرور غير صحيحين',
            'password.required' => 'اسم المستخدم أو كلمة المرور غير صحيحين',
        ];
    }
}
