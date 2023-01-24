<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'video_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
