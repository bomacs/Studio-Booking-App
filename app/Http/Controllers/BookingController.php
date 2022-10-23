<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Role;
use App\Models\User;
use App\Models\Package;
use App\Models\UserProfile;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create() 
    {
        return view('bookings.create', [
            'packages' => Package::all(),
            'photographers' => User::whereRoleIs('photographer')->get()
        ]);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'package' => 'required',
            'event_address' => ['required', 'string', 'max:1000'],
            'event_date' => ['required', 'date'],
            'event_time' => ['required', 'date_format:H:i'],
            'photographer' => 'required',
            'active_phone_no' => ['required', 'digits:11']        
        ]);

        Booking::create(
            [
                'user_id' => Auth::user()->id,
                'package_id' => $request->package,
                'photographer_id' => $request->photographer,
                'event_address' => $request->event_address,
                'event_date' => $request->event_date,
                'event_time' => $request->event_time,
                'active_phone_no' => $request->active_phone_no,
                'status' => 'Pending'
            ]);

        return redirect()->back()->with('message', 'Booking has been placed, Thank You!!');
    }

    public function showUserBookings() 
    {
        $bookings = Booking::where('user_id', Auth::user()->id)->where('status', 'Pending')->get();
        
        return view('bookings.showUserBookings', [
            'bookings' => $bookings
        ]);
    }

    public function bookPhotographer($id)
    {
        return view('bookings.book_photographer', [
            'packages' => Package::all(),
            'photographer' => User::findOrFail($id)
        ]);
    }

    public function bookPackage($id)
    {
        return view('bookings.book_package', [
            'package' => Package::findOrFail($id),
            'photographers' => User::whereRoleIs('photographer')->get()
        ]);
    }

}
