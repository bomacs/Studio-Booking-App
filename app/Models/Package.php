<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes, Prunable;

    // transform json data into array
    protected $casts = [
        'includes' => 'array'
    ];

    //  automatically delete softdelete records
    public function prunable()
    {
            return static::where('created_at', '<=  ', now()->subWeek());
    }

    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
