<?php

namespace App\Http\Services;

use App\Models\MembershipTermination;

class RemoveMemberService
{
    public function removeMember($id)
    {
        $info = [
            'resolution_number' => '123123123',
            'termination_date' => '2020-09-01',
            'member_id' => $id
        ];
        MembershipTermination::create($info);
    }
}
