<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsToMany('App\Models\Member');
    }

    public function salary()
    {
        return $this->hasMany('App\Models\SalaryGrade');
    }
}
