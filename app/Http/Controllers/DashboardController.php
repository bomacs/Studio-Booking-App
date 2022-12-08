<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class DashboardController extends Controller
{
    public function index() {
        if (Auth::user()->hasRole('administrator')) {
            $photographer_bookings = DB::table('bookings')
                ->select('photographer_id', DB::raw('count(*) as total'))
                ->groupBy('photographer_id')
                ->orderBy('total', 'desc')
                ->limit(1)
                ->get();
            $package_bookings = DB::table('bookings')
                ->select('package_id', DB::raw('count(*) as total'))
                ->groupBy('package_id')
                ->orderBy('total', 'desc')
                ->limit(1)
                ->get();
            $top_photographer = User::findOrFail($photographer_bookings->first()->photographer_id);
            $top_package = Package::findOrFail($package_bookings->first()->package_id);
            
            return view('admin.dashboard', [
                'galleryImages' => Gallery::paginate(6),
                'photographers' => User::whereRoleIs('photographer')->paginate(3),
                'clients' => User::whereRoleIs('user')->get(),
                'new_bookings'=> Booking::whereMonth('created_at', date('m'))->get(),
                'ongoing_bookings' => Booking::where('status', 'Confirmed')->get(),
                'pending_bookings' => Booking::where('status', 'Pending')->get(),
                'cancelled_bookings' => Booking::where('status', 'Cancelled')->get(),
                'top_photographer' => $top_photographer,
                'top_package' => $top_package,
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
