<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDetailRequest;
use App\Http\Services\UpdateDetailService;

class UpdateMemberDetailController extends Controller
{
    //
    public function updateMemberDetail(UpdateDetailRequest $request)
    {
        $response = (new UpdateDetailService)->updateDetails($request->validated());

        return $response;
    }
}
