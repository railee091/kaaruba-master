<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{

    public function rules()
    {
        return [
            'member_number' => ['required'],
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'tax_identification_number' => ['required'],
        ];
    }
}
