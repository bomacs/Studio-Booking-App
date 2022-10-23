<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gallery;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        if (Auth::user()->hasRole('administrator')) {
            return view('admin.dashboard', [
                'galleryImages' => Gallery::all(),
                'photographers' => User::whereRoleIs('photographer')->get(),
                'packages' => Package::all(),
            ]);
        } elseif (Auth::user()->hasRole('photographer')) {
            return view('photographer.dashboard', [
                'galleryImages' => Gallery::all(),
                'photographers' => User::whereRoleIs('photographer')->get(),
                'packages' => Package::all(),
            ]);
        } elseif (Auth::user()->hasRole('user')) {
            return view('user.dashboard', [
                'galleryImages' => Gallery::all(),
                'photographers' => User::whereRoleIs('photographer')->get(),
                'packages' => Package::all(),
            ]);
        } 
    }
}
