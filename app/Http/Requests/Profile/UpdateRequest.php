<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'middlename' => 'required|string|max:100',
            'phone' => 'required|string|min:9|max:9',
            'stir' => 'required|string|min:9|max:9',
            'pinfl' => 'required|string|min:14|max:14',
            'passport' => 'required|string|min:9|max:9',
            'passport_expire' => 'required|date|date_format:d.m.Y',
            'passport_address' => 'required|string|max:255',
        ];
    }
}
