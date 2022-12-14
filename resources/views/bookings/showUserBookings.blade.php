<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-lgrey leading-tight">
            {{ __('Your Placed Booking') }}
        </h2>
    </x-slot>
    <section class="mt-5">
        <div class="container overflow-x-auto relative rounded-md">
            <table class="table-auto mx-auto text-sm text-center text-veryDarkBlue">
                <thead class="text-xs bg-gray-200  uppercase bg-dgrey">
                    <tr>
                        <th scope="col" class="whitespace-nowrap p-4">
                            BOOKING NO.
                        </th>
                        <th scope="col" class="whitespace-nowrap p-4">
                            PACKAGE TYPE
                        </th>
                        <th scope="col" class="whitespace-nowrap p-4">
                            EVENT ADDRESS
                        </th>
                        <th scope="col" class="whitespace-nowrap p-4">
                            PHOTOGRAPHER
                        </th>
                        <th scope="col" class="whitespace-nowrap p-4">
                            EVENT DATE
                        </th>
                        <th scope="col" class="whitespace-nowrap p-4">
                            EVENT TIME
                        </th>
                        <th scope="col" class="whitespace-nowrap p-4">
                            STATUS
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr class="bg-veryPaleRed border-b text-dgrey">
                        <td class="text-xs text-center p-4">
                            {{$booking->id}}
                        </td>
                        <td class="text-xs text-center p-4">
                            {{$booking->package->name}}
                        </td>
                        <td class="text-xs text-center p-4">
                            {{$booking->event_address}}
                        </td>
                        <td class="text-xs text-center p-4">
                            {{$booking->photographer->userProfile->firstname . ' ' . $booking->photographer->userProfile->lastname}}
                        </td>
                        <td class="text-xs text-center p-4">
                            {{$booking->event_date}}
                        </td>
                        <td class="text-xs text-center p-4">
                            {{$booking->event_time}}
                        </td>
                        <td class="text-xs text-center p-4">
                            {{$booking->status}}
                        </td>
                        <td class="tet-xs text-center p-3">
                            @if ($booking->status === 'Pending'| $booking->status === 'Confirmed')
                            <form method="POST" action="{{ route('my_bookings') }}">
                                @csrf
                                <input type="hidden" id="bookingId" name="bookingId" value="{{$booking->id}}">
                                <x-primary-button class="font-normal bg-brightRed p-1">
                                    {{ __('Cancel') }}
                                </x-primary-button>
                            </form>  
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pt-6 p-4 mx-auto">
                {{ $bookings->links() }}
            </div>     
        </div>
    </section>
</x-app-layout> 