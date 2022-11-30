<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-lgrey leading-tight">
            {{ __('Your Received Bookings') }}
        </h2>
    </x-slot>
    <section class="mt-5">
        <div class="container overflow-x-auto relative rounded-md">
            <table class="table-auto mx-auto text-sm text-center text-veryDarkBlue">
                <thead class="text-xs bg-gray-200  uppercase">
                    <tr>
                        <th scope="col" class="whitespace-nowrap p-3">
                            BOOKING NO.
                        </th>
                        <th scope="col" class="whitespace-nowrap p-3">
                            PACKAGE TYPE
                        </th>
                        <th scope="col" class="whitespace-nowrap p-3">
                            EVENT ADDRESS
                        </th>
                        <th scope="col" class="whitespace-nowrap p-3">
                            CLIENT
                        </th>
                        <th scope="col" class="whitespace-nowrap p-3">
                            EVENT DATE
                        </th>
                        <th scope="col" class="whitespace-nowrap p-3">
                            EVENT TIME
                        </th>
                        <th scope="col" class="whitespace-nowrap p-3">
                            STATUS
                        </th>
                        <th>

                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr class="bg-veryPaleRed border-b text-veryDarkBlue">
                        <td class="text-xs text-center p-3">
                            {{$booking->id}}
                        </td>
                        <td class="text-xs text-center p-3">
                            {{$booking->package->name}}
                        </td>
                        <td class="text-xs text-center p-3">
                            {{$booking->event_address}}
                        </td>
                        <td class="text-xs text-center p-3">
                            {{$booking->user->userProfile->firstname . ' ' . $booking->user->userProfile->lastname}}
                        </td>
                        <td class="text-xs text-center p-3">
                            {{$booking->event_date}}
                        </td>
                        <td class="text-xs text-center p-3">
                            {{$booking->event_time}}
                        </td>
                        <td class="text-xs text-center p-3">
                            {{$booking->status}}
                        </td>
                        <td class="text-xs text-center p-3">
                            @if ($booking->status === 'Pending')
                                <form method="POST" action="{{ route('photographer.bookings') }}">
                                    @csrf
                                    <input type="hidden" id="bookingId" name="bookingId" value="{{$booking->id}}">
                                    <x-primary-button class="font-normal bg-teal-500 p-1">
                                        {{ __('Confirm') }}
                                    </x-primary-button>
                                </form>  
                            @endif
                        </td>
                        <td class="tet-xs text-center p-3">
                            <a href="#" class="bg-brightRed text-white rounded-md p-2">Cancel</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="pt-6 p-4 mx-auto">
                Booking Links
            </div>      --}}
        </div>
    </section>
</x-app-layout> 