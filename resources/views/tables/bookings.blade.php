<section class="mt-2">
    <div  class="overflow-x-auto relative">
        <table class="w-full table-auto mx-auto text-center border">
            <thead class="text-xs text-white uppercase bg-veryDarkBlue">
                <tr>
                    <th scope="col" class="py-3 px-4">
                        ID
                    </th>
                    <th scope="col" class="py-3 px-4">
                        PACKAGE
                    </th>
                    <th scope="col" class="py-3 px-4">
                        CLIENT
                    </th>
                    <th scope="col" class="py-3 px-4">
                        PHOTOGRAPHER
                    </th>
                    <th scope="col" class="py-3 px-4">
                        DATE
                    </th>
                    <th scope="col" class="py-3 px-4">
                        TIME
                    </th>
                    <th scope="col" class="py-3 px-4">
                        STATUS
                    </th>
                    <th scope="col" class="py-3 px-4">
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody class="text-xs bg-white">
                @foreach ($bookings as $booking)
                <tr class="border-b text-darkGrayishBlue">
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$booking->id}}
                    </td>
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$booking->package->name}}
                    </td>
                    <td class="capitalize text-center py-2 px-4 whitespace-nowrap">
                        {{$booking->user->userProfile->firstname}} {{$booking->user->userProfile->lastname}}
                    </td>
                    <td class="capitalize text-center py-2 px-4 whitespace-nowrap">
                        {{$booking->photographer->userProfile->firstname}} {{$booking->photographer->userProfile->lastname}}
                    </td>
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$booking->event_date}}
                    </td>
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$booking->event_time}}
                    </td>
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$booking->status}}
                    </td>
                    <td x-data="{ open: false}" class="relative flex flex-row justify-around text-center py-2 px-4 whitespace-nowrap">
                        <a href="{{ route('booking.show', $booking->id) }}" class="bg-indigo-500 text-white rounded-md py-1 px-4">View</a>
                        <a href="{{ route('booking.edit', $booking->id) }}" class="bg-green-500 text-white rounded-md py-1 px-4">Edit</a>
                        <a @click="open = true" class="bg-red-500 text-white rounded-md cursor-pointer py-1 px-4">Delete</a>
                        <div x-show="open" class="absolute top-0 left-0 w-full h-full z-40">
                            <form method="POST" action="{{ route('booking.delete', $booking->id) }}" class="mx-auto bg-gray-500 text-gray-900 py-1">
                                @csrf
                                @method('DELETE')
                                <p class="text-xs text-center mb-2">Oops, Confirm to delete?</p>
                                <input type="hidden" id="booking_id" name="booking_id" value="{{$booking->id}}">
                                <div class="flex flex-row gap-2 justify-center">
                                    <a @click="open = false" class="bg-green-500 text-white rounded-md cursor-pointer py-1 px-4">
                                        {{ __('Cancel') }}
                                    </a>
                                    <button class="bg-red-500 text-white rounded-md py-1 px-4">
                                        {{ __('Delete') }}
                                    <button>
                                </div>
                            </form> 
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-xs mt-2">
            {{ $bookings->links() }}
        </div>
    </div>
</section>