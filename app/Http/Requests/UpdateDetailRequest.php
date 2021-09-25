<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailRequest extends FormRequest
{

    public function rules()
    {
        $rules = [
            'date_accepted' => ['required'],
            'resolution_number' => ['required'],
            'membership_type' => ['required'],
            'shares_subscribed' => ['required'],
            'amount_subscribed' => ['required'],
            'initial_paid_up' => ['required'],
            'address' => ['required'],
            'date_of_birth' => ['required'],
            'gender' => ['required'],
            'civil_status' => ['required'],
            'educational_attainment' => ['required'],
            'occupation' => ['required'],
            'dependents' => ['required'],
            'religion' => ['required'],
            'annual_income' => ['required'],
            'type' => ['required']
        ];

        return $rules;
    }
}
