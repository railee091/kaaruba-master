<?php

namespace App\Http\Services;

use App\Models\Member;
use App\Models\MemberDetails;
use App\Models\MembershipProfile;
use Carbon\Carbon;

class UpdateDetailService
{
    public function updateDetails($memberDetails)
    {
        // dd(Carbon::parse($memberDetails->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y'));
        // $dateEntered = strtotime($memberDetails->date_of_birth);
        // dd($memberDetails->member_id);
        $details = [
            'address' => ucwords($memberDetails->address),
            'date_of_birth' => $memberDetails->date_of_birth,
            'age' => Carbon::parse($memberDetails->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y'),
            'gender' => $memberDetails->gender,
            'civil_status' => $memberDetails->civil_status,
            'educational_attainment' => $memberDetails->educational_attainment,
            'occupation' => $memberDetails->occupation,
            'dependents' => $memberDetails->dependents,
            'religion' => $memberDetails->religion,
            'annual_income' => $memberDetails->annual_income,
            'member_id' => $memberDetails->member_id
        ];
        $profile = [
            'date_accepted' => $memberDetails->date_accepted,
            'resolution_number' => $memberDetails->resolution_number,
            'membership_type' => $memberDetails->type,
            'shares_subscribed' => $memberDetails->shares_subscribed,
            'amount_subscribed' => $memberDetails->amount_subscribed,
            'initial_paid_up' => $memberDetails->initial_paid_up,
            'member_id' => $memberDetails->member_id
        ];
        MemberDetails::create($details);
        MembershipProfile::create($profile);
    }
}
