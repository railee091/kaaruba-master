<?php

namespace App\Http\Services;

use App\Models\MemberDetails;
use App\Models\MembershipProfile;
use Carbon\Carbon;

class UpdateDetailService
{
    public function updateDetails($memberDetails, $id)
    {
        // dd($id);
        MemberDetails::updateOrCreate(['member_id' => $id], [
            'address' => ucwords($memberDetails['address']),
            'date_of_birth' => $memberDetails['date_of_birth'],
            'age' => Carbon::parse($memberDetails['date_of_birth'])->diff(\Carbon\Carbon::now())->format('%y'),
            'gender' => ucwords($memberDetails['gender']),
            'civil_status' => ucwords($memberDetails['civil_status']),
            'educational_attainment' => ucwords($memberDetails['educational_attainment']),
            'occupation' => ucwords($memberDetails['occupation']),
            'dependents' => $memberDetails['dependents'],
            'religion' => ucwords($memberDetails['religion']),
            'annual_income' => $memberDetails['annual_income'],
            'member_id' => $id
        ]);
        MembershipProfile::updateOrCreate(['member_id' => $id], [
            'date_accepted' => $memberDetails['date_accepted'],
            'resolution_number' => $memberDetails['resolution_number'],
            'membership_type' => $memberDetails['type'],
            'shares_subscribed' => $memberDetails['shares_subscribed'],
            'amount_subscribed' => $memberDetails['amount_subscribed'],
            'initial_paid_up' => $memberDetails['initial_paid_up'],
            'member_id' => $id
        ]);
    }
}
