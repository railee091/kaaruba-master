<?php

namespace App\Http\Services;

use App\Models\Member;
use App\Models\MemberDetails;
use App\Models\MembershipProfile;

class UpdateDetailService
{
    public function updateDetails($memberDetails)
    {

        $details = [
            'address' => ucwords($memberDetails->address),
            'date_of_birth' => $memberDetails->date_of_birth,
            'age' => date_diff($memberDetails->date_of_birth, now()),
            'gender' => $memberDetails->gender,
            'civil_status' => $memberDetails->civil_status,
            'educational_attainment' => $memberDetails->educational_attainment,
            'occupation' => $memberDetails->occupation,
            'dependents' => $memberDetails->dependents,
            'religion' => $memberDetails->religion,
            'annual_income' => $memberDetails->annual_income,
            'member_id' => $memberDetails->member_id
        ];

        MemberDetails::create($details);
    }
}
