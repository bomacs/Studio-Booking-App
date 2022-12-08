<section class="mt-2">
    <div class="overflow-x-auto relative p-2">
        <div class="text-sm m-4 ml-8">
            <a href="{{ route('create.client') }}" class="bg-indigo-500 text-white rounded-md py-1 px-4">Add Client</a>
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
                @foreach ($clients as $client)
                <tr class="border-b text-darkGrayishBlue">
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{$client->id}}
                    </td>
                    <td class="capitalize text-center py-4 px-6 whitespace-nowrap">
                        {{$client->userProfile->firstname}} {{$client->userProfile->lastname}}
                    </td>
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{$client->username}}
                    </td>
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{$client->email}}
                    </td>
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{ $client->hasRole('user')? 'user' : null }}
                    </td>
                    <td class="flex flex-row justify-around text-center py-4 px-6 whitespace-nowrap">
                        <a href="{{ route('user.show', $client->id) }}" class="bg-indigo-500 text-white rounded-md py-1 px-4">View</a>
                        <a href="{{ route('user.edit', $client->id) }}" class="bg-green-500 text-white rounded-md py-1 px-4">Edit</a>
                        <form method="POST" action="{{ route('user.delete', $client->id) }}">
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
        {{ $clients->links() }}
    </div>
</section>