<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipProfile extends Model
{

    protected $fillable = [
        'date_accepted',
        'resolution_number',
        'membership_type',
        'shares_subscribed',
        'amount_subscribed',
        'initial_paid_up',
        'member_id'
    ];

    use HasFactory;

    public function member()
    {
        return $this->belongsTo('members');
    }
}
