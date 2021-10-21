<?php

namespace App\Http\Services;

use App\Models\Driver;

class RegisterDriverService
{
    public function registerDriver($details)
    {
        $driver = Driver::firstOrCreate(['member_id' => $details], [
            'drivers_license' => '',
            'phil_health' => '',
            'sss' => '',
            'pag_ibig' => '',
            'salary_id' => ''
        ]);
    }
}
