<?php

namespace App\Http\Services;

use App\Models\Member;

class RegistrationService
{
    public function registerMember($memberData)
    {

        $result = Member::firstOrCreate(['member_number' => $memberData['member_number']], [
            'member_number' => $memberData['member_number'],
            'first_name' => ucwords($memberData['first_name']),
            'middle_name' => ucwords($memberData['middle_name']),
            'last_name' => ucwords($memberData['last_name']),
            'tax_identification_number' => $memberData['tax_identification_number']
        ]);

        return $result;
    }
}
