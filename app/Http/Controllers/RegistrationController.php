<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Services\RegistrationService;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //

    public function registerMember(Request $request)
    {
        $response = (new RegistrationService)->registerMember($request->values);
        return response()->json($response);
    }
}
