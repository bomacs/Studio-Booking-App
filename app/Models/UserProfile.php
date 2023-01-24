<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'gender',
        'phone_no',
        'address',
        'birthday',
        'aboutself',
        'experience',
        'expertise',
        'image_path'
    ];

    public function user() 
    {
        return $this->hasOne(User::class);
    }
}
