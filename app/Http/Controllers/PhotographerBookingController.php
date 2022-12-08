<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotographerBookingController extends Controller
{
    public function index()
    {
        return view('bookings.indexPhotographerBookings',
        [
            'bookings' => Booking::where('photographer_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10)
        ]
            );
    }

    public function update(Request $request)
    {
        $request->validate([
           'bookingId' => 'required',
        ]);

        $booking = Booking::findOrFail($request->bookingId);

        $booking->status = 'Confirmed';

        $booking->save();

        return redirect()->back()->with('message', 'Booking Confirmed!!');

    }

    public function cancel(Request $request)
    {
        $request->validate([
           'bookingId' => 'required',
        ]);

        $booking = Booking::findOrFail($request->bookingId);

        $booking->status = 'Cancelled';

        $booking->save();

        return redirect()->back()->with('cancel', 'Owws, Booking was cancelled!!');

    }

}
