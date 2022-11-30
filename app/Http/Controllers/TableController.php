<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class TableController extends Controller
{
    public function index()
    {
        return view('admin.tables', [
            'users' => User::paginate(10),
            'clients' => User::whereRoleIs('user')->paginate(10),
            'photographers' => User::whereRoleIs('photographer')->paginate(10),
            'bookings' => Booking::orderBy('created_at', 'DESC')->paginate(10 ),
            'packages' => Package::paginate(10),
            'galleries' => Gallery::orderBy('created_at', 'DESC')->paginate(10),
        ]);
    }


}
