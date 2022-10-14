<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show() {
        if (Auth::user()->hasRole('administrator')) {
            return view('admin.profile');
        } elseif (Auth::user()->hasRole('photographer')) {
            return view('photographer.profile');
        } elseif (Auth::user()->hasRole('user')) {
            return view('user.profile');
        } 
    }
}
