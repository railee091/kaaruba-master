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
        return $this->hasOne('membership_profile');
    }

    public function type()
    {
        return $this->hasOne('membership_type');
    }

    public function details()
    {
        return $this->hasOne('App\Models\MemberDetails', 'member_id');
    }
}
