<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addAdmin extends FormRequest
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
            //
            'name'      => 'required|min:4|max:255',
            'username'  => 'required|min:4|max:255',
            'password'  => 'required|min:4|max:255',
            'role'      => 'required',
        ];
    }
    public function messages()
    {
        return [
            'max'               => 'أقصي حد لحقل :attribute :max حرف فقط',
            'min'               => 'أقل حد لحقل :attribute :min حرف ',
            'name.required'     => 'إسم المسجد مطلوب',
            'username.required' => 'إسم المستخدم مطلوب',
            'password.required' => 'كلمة المرور مطلوبة',
            'role.required'     => 'نوع الحساب مطلوب',

        ];
    }
    public function attributes()
    {
        return [
            'name'          => "اسم المسجد",
            'username'      => "إسم المستخدم",
            'password'      => "كلمة المرور",
            'role'          => "نوع الحساب",
        ];
    }

}
