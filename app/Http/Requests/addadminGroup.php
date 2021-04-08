<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addadminGroup extends FormRequest
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
            'name' => "required|string",

            'mosques_show' => "boolean",
            'mosques_add' => "boolean",
            'mosques_edit' => "boolean",
            'mosques_delete' => "boolean",

            'resources_show' => "boolean",
            'resources_add' => "boolean",
            'resources_edit' => "boolean",
            'resources_delete' => "boolean",
            
            'orders_show' => "boolean",
            'orders_add' => "boolean",
            'orders_edit' => "boolean",
            'orders_delete' => "boolean",
   
   
            'admin_groups_show' => "boolean",
            'admin_groups_add' => "boolean",
            'admin_groups_edit' => "boolean",
            'admin_groups_delete' => "boolean",
 
            
            'users_show' => "boolean",
            'users_add' => "boolean",
            'users_edit' => "boolean",
            'users_delete' => "boolean",
 
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'إسم مجموعة المشرفين مطلوب',
        ];
    }
}
