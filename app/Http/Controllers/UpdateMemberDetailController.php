<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDetailRequest;
use App\Http\Services\UpdateDetailService;
use Illuminate\Http\Request;


class UpdateMemberDetailController extends Controller
{
    //
    public function updateMemberDetail(Request $request)
    {
        $data = array($request);
        $response = (new UpdateDetailService)->updateDetails($request);

        return redirect()->back();
    }
}
