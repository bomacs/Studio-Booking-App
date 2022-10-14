<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    // use HasFactory;

    // transform json data into array
    protected $casts = [
        'includes' => 'array'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
