<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nette\SmartObject;

class Booking extends Model
{
    use Notifiable, SoftDeletes, Prunable; 
    
    protected $fillable = [
        'user_id',
        'package_id',
        'event_address',
        'event_date',
        'event_time',
        'photographer_id',
        'active_phone_no',
        'status',
    ];

    public function prunable()
    {
            return static::where('created_at', '<=  ', now()->subWeek());
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function photographer()
    {
        return $this->belongsTo(User::class, 'photographer_id', 'id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'booking_id', 'id');
    }
}
