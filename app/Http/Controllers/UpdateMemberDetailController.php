<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDetailRequest;
use App\Http\Services\UpdateDetailService;

class UpdateMemberDetailController extends Controller
{
    //
    public function updateMemberDetail()
    {
        $response = (new UpdateDetailService)->updateDetails();

        return $response;
    }
}
