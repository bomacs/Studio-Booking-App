<section class="mt-2">
    <div class="overflow-x-auto relative p-2">
        <div class="text-sm m-4 ml-8">
            <a href="{{ route('create.photographer') }}" class="bg-indigo-500 text-white rounded-md py-1 px-4">Add Photographer</a>
        </div>
        <table class="w-full table-auto mx-auto text-center border">
            <thead class="text-xs text-white uppercase bg-veryDarkBlue">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        ID
                    </th>
                    <th scope="col" class="py-3 px-6">
                        NAME
                    </th>
                    <th scope="col" class="py-3 px-6">
                        USERNAME
                    </th>
                    <th scope="col" class="py-3 px-6">
                        EMAIL
                    </th>
                    <th scope="col" class="py-3 px-6">
                        ROLE
                    </th>
                    <th scope="col" class="py-3 px-6">
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody class="text-xs bg-white" >
                @foreach ($photographers as $photographer)
                <tr class="border-b text-darkGrayishBlue">
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{$photographer->id}}
                    </td>
                    <td class="capitalize text-center py-4 px-6 whitespace-nowrap">
                        {{$photographer->userProfile->firstname}} {{$photographer->userProfile->lastname}}
                    </td>
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{$photographer->username}}
                    </td>
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{$photographer->email}}
                    </td>
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{ $photographer->hasRole('photographer')? 'photographer' : null }}
                    </td>
                    <td class="flex flex-row justify-around py-4 px-6 whitespace-nowrap">
                        <a href="{{ route('user.show', $photographer->id) }}" class="bg-indigo-500 text-white rounded-md py-1 px-4">View</a>
                        <a href="{{ route('user.edit', $photographer->id) }}" class="bg-green-500 text-white rounded-md py-1 px-4">Edit</a>
                        <form method="POST" action="{{ route('user.delete', $photographer->id) }}">
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
        {{ $photographers->links() }}
    </div>
</section>