<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Video;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
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
                
            if($photographer_bookings && $package_bookings)
            {
                $top_photographer = User::findOrFail($photographer_bookings->first()->photographer_id);
                $top_package = Package::findOrFail($package_bookings->first()->package_id);
            } else
            {
                $top_photographer = 0;
                $top_package = 0;
            }
            
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
                'packages' => Package::limit(3)->get(),
            ]);
        } elseif (Auth::user()->hasRole('photographer')) {
            return view('photographer.dashboard', [
                'Images' => Image::where('user_id', '=', auth()->user()->id)->get(),
                'videos' => Video::where('user_id', '=', auth()->user()->id)->get(),
                // 'packages' => Package::paginate(3),
            ]);
        } elseif (Auth::user()->hasRole('user')) {
            $photographers = collect();
            $packages = collect();
            $bookings = Booking::with(['user','package'])->where('user_id',auth()->user()->id)->get();
            foreach ($bookings as $booking)
            {
                if (!$photographers->contains($booking->photographer))
                {
                    $photographers->push($booking->photographer);
                }

                if  (!$packages->contains($booking->package))
                {
                    $packages->push($booking->package);
                }
            }
            return view('user.dashboard', [
                'photographers' => $photographers,
                'packages' => $packages
            ]);
        } 
    }
}
