<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Http\Services\RegistrationService;

class RegistrationController extends Controller
{
    //

    public function registerMember(RegistrationRequest $request)
    {
        (new RegistrationService)->registerMember($request);
        return $request;
    }
}
