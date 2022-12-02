<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [
        'booking_id',
        'downpayment',
        'payment_type',
        'ref_num',
        'payment_status'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
