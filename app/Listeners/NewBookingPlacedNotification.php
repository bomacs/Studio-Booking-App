<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\NewBookingPlaced;
use App\Notifications\NewBookingReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NewBookingPlacedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewBookingPlaced  $event
     * @return void
     */
    public function handle(NewBookingPlaced $event)
    {
        $booking = $event->booking;
        $admin = User::whereRoleIs('administrator')->get();
        $photographer = $event->booking->photographer;
                                                              
        Notification::send($admin, new NewBookingReceived($booking));
    }
}
 