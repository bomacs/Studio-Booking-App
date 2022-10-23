<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-lgrey leading-tight">
            {{ __('Booking List') }}
        </h2>
    </x-slot>
    {{-- <div class="max-w-lg mx-auto mt-10">
        <a href="#">
            <h1 class="text-2xl font-bold text-black text-center">Student List</h1>
        </a>
    </div> --}}
    <section class="mt-5">
        <div class="overflow-x-auto relative">
            <table class="table-auto mx-auto text-sm text-center text-gray-500">
                <thead class="text-xs text-lgrey uppercase bg-dgrey">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            BOOKING ID
                        </th>
                        <th scope="col" class="py-3 px-6">
                            EVENT TYPE
                        </th>
                        <th scope="col" class="py-3 px-6">
                            CLIENT ID
                        </th>
                        <th scope="col" class="py-3 px-6">
                            CLIENT'S CONTACT
                        </th>
                        <th scope="col" class="py-3 px-6">
                            CLIENT'S ADDRESS
                        </th>
                        <th scope="col" class="py-3 px-6">
                            EVENT PLACE
                        </th>
                        <th scope="col" class="py-3 px-6">
                            PHOTOGRAPHER ID
                        </th>
                        <th scope="col" class="py-3 px-6">
                            EVENT DATE
                        </th>
                        <th scope="col" class="py-3 px-6">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr class="bg-gray-400 border-b text-dgrey">
                        <td class="text-center py-4 px-6">
                            {{$booking->id}}
                        </td>
                        <td class="text-center py-4 px-6">
                            {{$booking->event_type}}
                        </td>
                        <td class="text-center py-4 px-6">
                            {{$booking->user_id}}
                        </td>
                        <td class="text-center py-4 px-6">
                            {{$booking->contact_no}}
                        </td>
                        <td class="text-center py-4 px-6">
                            {{$booking->address}}
                        </td>
                        <td class="text-center py-4 px-6">
                            {{$booking->event_place}}
                        </td>
                        <td class="text-center py-4 px-6">
                            {{$booking->photographer_id}}
                        </td>
                        <td class="text-center py-4 px-6">
                            {{$booking->event_date}}
                        </td>
                        <td class="text-center py-4 px-6">
                            {{$booking->event_time}}
                        </td>
                        <td class="text-center py-4 px-6">
                            <a href="#" class="bg-dgrey text-white rounded-md py-1 px-4">View</a>
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