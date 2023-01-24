<section class="mt-2">
    <div class="overflow-x-auto relative">
        <table class="w-full table-auto mx-auto text-sm text-center border">
            <thead class="w-full text-xs text-white uppercase bg-veryDarkBlue">
                <tr>
                    <th scope="col" class="py-3 px-4">
                        ID
                    </th>
                    <th scope="col" class="py-3 px-4">
                        USER_ID
                    </th>
                    <th scope="col" class="py-3 px-4">
                        TITLE
                    </th>
                    <th scope="col" class="py-3 px-4">
                        DESCRIPTION
                    </th>
                    <th scope="col" class="py-3 px-4">
                        IMAGE PATH
                    </th>
                    <th scope="col" class="py-3 px-4">
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody class="w-full text-xs bg-white">
                @foreach ($images as $image)
                <tr class="border-b text-darkGrayishBlue">
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$image->id}}
                    </td>
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$image->user_id}}
                    </td>
                    <td class="text-center py-2 px-4 whitespace-nowrap">
                        {{$image->title}}
                    </td>
                    <td class="capitalize text-center py-2 px-4 whitespace-nowrap">
                        {{$image->description}}
                    </td>
                    <td class="capitalize text-center py-2 px-4 whitespace-nowrap">
                        {{$image->image_path}}                   
                    </td>
                    <td class="flex flex-row justify-around space-x-1 text-center py-2 px-4">
                        <a href="{{ route('image.show', $image->id) }}" class="bg-indigo-500 text-white rounded-md py-1 px-4">View</a>
                        <form method="POST" action="{{ route('image.destroy', $image->id) }}">
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
        <div class="text-xs mt-2">
            {{ $images->links() }}
        </div>
    </div>
</section>