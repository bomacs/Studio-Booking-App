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
                'galleryImages' => Gallery::paginate(6),
                'photographers' => User::whereRoleIs('photographer')->paginate(3),
                'packages' => Package::paginate(3),
            ]);
        } elseif (Auth::user()->hasRole('photographer')) {
            return view('photographer.dashboard', [
                'galleryImages' => Gallery::paginate(6),
                'photographers' => User::whereRoleIs('photographer')->paginate(3),
                'packages' => Package::paginate(3),
            ]);
        } elseif (Auth::user()->hasRole('user')) {
            return view('user.dashboard', [
                'galleryImages' => Gallery::paginate(6),
                'photographers' => User::whereRoleIs('photographer')->paginate(3),
                'packages' => Package::paginate(3),
            ]);
        } 
    }
}
