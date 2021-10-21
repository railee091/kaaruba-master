<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    protected $fillable = [
        'member_number',
        'first_name',
        'middle_name',
        'last_name',
        'tax_identification_number'
    ];

    use HasFactory;

    public function profile()
    {
        return $this->hasOne('App\Models\MembershipProfile');
    }

    public function type()
    {
        return $this->hasOne('App\Models\MembershipType', 'id');
    }

    public function details()
    {
        return $this->hasOne('App\Models\MemberDetails', 'member_id');
    }

    public function terminates()
    {
        return $this->hasOne('App\Models\MembershipTermination', 'member_id');
    }

    public function drivers()
    {
        return $this->hasMany('App\Models\Driver');
    }
}
