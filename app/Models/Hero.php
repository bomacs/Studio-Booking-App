<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    // use HasFactory;

    protected $fillable = [
        'title',
        'heading_1',
        'heading_2',
        'video_path'
    ];
}
