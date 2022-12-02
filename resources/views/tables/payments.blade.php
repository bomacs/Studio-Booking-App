<section class="mt-2">
    <div class="overflow-x-auto relative">
        <table class="table-auto mx-auto text-sm text-center border">
            <thead class="text-xs text-white uppercase bg-veryDarkBlue">
                <tr>
                    <th scope="col" class="py-3 px-4">
                        ID
                    </th>
                    <th scope="col" class="py-3 px-4">
                        BOOKING_ID
                    </th>
                    <th scope="col" class="py-3 px-4">
                        PAYMENT TYPE
                    </th>
                    <th scope="col" class="py-3 px-4">
                        DOWNPAYMENT
                    </th>
                    <th scope="col" class="py-3 px-4">
                        REFERENCE NO.
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
                @foreach ($payments as $payment)
                <tr class="border-b text-darkGrayishBlue">
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$payment->id}}
                    </td>
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$payment->booking_id}}
                    </td>
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$payment->payment_type}}
                    </td>
                    <td class="capitalize text-center py-2 px-4 whitespace-nowrap">
                        {{$payment->downpayment}}
                    </td>
                    <td class="capitalize text-center py-2 px-4 whitespace-nowrap">
                        {{$payment->ref_num}}                   
                    </td>
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$payment->payment_status}}
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
            {{ $payments->links() }}
        </div>
    </div>
</section>