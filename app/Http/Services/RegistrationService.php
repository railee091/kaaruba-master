<?php

namespace App\Http\Services;

use App\Models\Member;

class RegistrationService
{
    public function registerMember($memberData)
    {
        $data = [
            'member_number' => $memberData->member_number,
            'first_name' => $memberData->first_name,
            'middle_name' => $memberData->middle_name,
            'last_name' => $memberData->last_name,
            'tax_identification_number' => $memberData->tax_identification_number
        ];

        Member::create($data);

        return $memberData;
    }
}
