<section class="mt-2">
    <div class="overflow-x-auto relative">
        <table class="table-auto mx-auto text-sm text-center border">
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
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        <a href="#" class="bg-indigo-500 text-white rounded-md py-1 px-4">View</a>
                        <a href="#" class="bg-green-500 text-white rounded-md py-1 px-4">Edit</a>
                        <a href="#" class="bg-red-500 text-white rounded-md py-1 px-4">Delete</a>
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