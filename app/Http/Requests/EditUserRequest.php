<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'required|max:40',
            'email' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Voer wel een naam in!',
            'name.max' => 'Je naam mag maximaal 40 tekens hebben!',
            'email' => 'Vul wel een email in!'
        ];
    }
}
