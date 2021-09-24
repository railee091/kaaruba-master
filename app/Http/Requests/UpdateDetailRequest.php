<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailRequest extends FormRequest
{

    public function rules()
    {
        $rules = [
            'member_number' => ['required'],
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'tax_identification_number' => ['required'],
        ];

        return $rules;
    }
}
