<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        if (Auth::user()->hasRole('administrator')) {
            return view('admin.dashboard');
        } elseif (Auth::user()->hasRole('photographer')) {
            return view('photographer.dashboard');
        } elseif (Auth::user()->hasRole('user')) {
            return view('user.dashboard');
        } 
    }
}
