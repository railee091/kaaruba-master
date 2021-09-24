<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDetails extends Model
{

    protected $fillable = [
        'address',
        'date_of_birth',
        'age',
        'gender',
        'civil_status',
        'educational_attainment',
        'occupation',
        'dependents',
        'religion',
        'annual_income',
        'member_id'
    ];

    use HasFactory;

    public function member()
    {
        return $this->belongsTo('App\Http\Models\Member');
    }
}
