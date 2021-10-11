<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{

    protected $fillable = [
        'type'
    ];

    use HasFactory;

    public function member()
    {
        return $this->hasOne('App/Models/MembershipProfile', 'membership_type');
    }
}
