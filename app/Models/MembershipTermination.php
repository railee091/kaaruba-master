<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipTermination extends Model
{

    protected $fillable = [
        'resolution_number',
        'termination_date',
        'member_id'
    ];

    use HasFactory;
}
