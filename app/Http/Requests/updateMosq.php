<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateMosq extends FormRequest
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
            'name'      => 'min:4|max:255',
            'username'  => 'min:4|max:255',
            'password'  => 'max:255',
            'area'      => 'min:4|max:255',
            'emam'      => 'string|min:4|max:255',
            'moazen'    => 'string|min:4|max:255'
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
            'area.required'     => 'المنطقة مطلوبة',
            'emam.required'     => 'إسم الإمام مطلوب',
            'moazen.required'   => 'إسم المؤذن مطلوب'
        ];
    }
}
