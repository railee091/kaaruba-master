<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Services\RegistrationService;

class RegistrationController extends Controller
{
    //

    public function registerMember(RegistrationRequest $request)
    {
        $response = (new RegistrationService)->registerMember($request->validated());
        return redirect()->back();
    }
}
