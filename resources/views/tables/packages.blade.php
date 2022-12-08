<section class="mt-2">
    <div class="overflow-x-auto relative p-2">
        <div class="text-sm m-4 ml-8">
            <a href="{{ route('create.package') }}" class="bg-indigo-500 text-white rounded-md py-1 px-4">Add Package</a>
        </div>
        <table class="w-full table-auto mx-auto text-center border">
            <thead class="text-xs text-white uppercase bg-veryDarkBlue">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        NAME
                    </th>
                    <th scope="col" class="py-3 px-6">
                        DESCRIPTION
                    </th>
                    <th scope="col" class="py-3 px-6">
                        PRICE
                    </th>
                    <th scope="col" class="py-3 px-6">
                        DISCOUNT
                    </th>
                    <th scope="col" class="py-3 px-6">
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody class="text-xs bg-white" >
                @foreach ($packages as $package)
                <tr class="border-b text-darkGrayishBlue">
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{$package->name}}
                    </td>
                    <td class="capitalize text-center py-4 px-6 whitespace-nowrap">
                        {{ $package->description }}
                    </td>
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{ $package->price }}
                    </td>
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{ $package->discount }}
                    </td>
                    <td class="flex flex-row justify-around text-center py-4 px-6 whitespace-nowrap">
                        <a href="{{route('show.package', $package->id)}}" class="bg-indigo-500 text-white rounded-md py-1 px-4">View</a>
                        <a href="{{route('edit.package', $package->id)}}" class="bg-green-500 text-white rounded-md py-1 px-4">Edit</a>
                        <form method="POST" action="{{ route('delete.package', $package->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white rounded-md py-1 px-4">
                                {{ __('Delete') }}
                            <button>
                        </form>  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-xs mt-2">
        {{ $packages->links() }}
    </div>
</section>