<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRoleRequest extends FormRequest
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
            'name' => 'required|max:40'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vul wel een Role in om toe te voegen!',
            'name.max' => 'Je Role mag maximaal 40 tekens bevatten'
        ];
    }
}
