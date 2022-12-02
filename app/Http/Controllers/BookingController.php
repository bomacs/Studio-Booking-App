<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Events\NewBookingPlaced;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewBookingReceived;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\Mailer\Exception\TransportException;

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
        // dd($request->all());
        $request->validate([
            'package' => 'required',
            'event_address' => ['required', 'string', 'max:1000'],
            'event_date' => ['required', 'date'],
            'event_time' => ['required', 'date_format:H:i'],
            'photographer' => 'required',
            'active_phone_no' => ['required', 'digits:11'], 
            'payment' => ['required'],
        ]);

        if ($request->payment == 'gcash')
        {
           $request->validate(['ref_num' => ['required', 'unique:payments']]);
        };      

        $booking = Booking::create(
            [ 
                'user_id' => Auth::user()->id,
                'package_id' => $request->package,
                'photographer_id' => $request->photographer,
                'event_address' => $request->event_address,
                'event_date' => $request->event_date,
                'event_time' => $request->event_time,
                'active_phone_no' => $request->active_phone_no,   
                'status' => 'Pending',
            ]);
   
        $booking->payment()->updateOrCreate([
            'booking_id' => $booking->id,
            'payment_type' => $request->payment,
            'ref_num' => $request->ref_num,
        ]);
        
        $admin = User::whereRoleIs('administrator')->get();
        $photographer = $booking->photographer;

        // Notification::send($photographer, new NewBookingReceived($booking));
        // Notification::send($admin, new NewBookingReceived($booking));
        // try {
        //     Notification::send($photographer, new NewBookingReceived($booking));
        //     Notification::send($admin, new NewBookingReceived($booking));
        // }catch (TransportException $e) {
        //     return back()->withErrors($e->getMessage())->withInput();
        // }
        
        
        // NewBookingPlaced::dispatch($booking);

        return redirect()->back()->with('message', 'Booking has been placed, Thank You!!');

        
    }

    public function showUserBookings() 
    {
        $bookings = Booking::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        
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

    public function showBooking($id)
    { 
        $booking = Booking::findOrFail($id);   

        return view('admin.bookings.showbooking', [
            'booking' =>  $booking,
         ]) ;
    }

}
    