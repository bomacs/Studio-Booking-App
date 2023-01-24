<section class="mt-2">
    <div class="overflow-x-auto relative p-2">
        <table class="w-full table-auto mx-auto text-center border">
            <thead class="text-xs text-white uppercase bg-veryDarkBlue">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        ID
                    </th>
                    <th scope="col" class="py-3 px-6">
                        USER_ID
                    </th>
                    <th scope="col" class="py-3 px-6">
                        COMMENT
                    </th>
                    <th scope="col" class="py-3 px-6">
                        CREATED_AT
                    </th>
                    <th scope="col" class="py-3 px-6">
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody class="text-xs bg-white" >
                @foreach ($comments as $comment)
                <tr class="border-b text-darkGrayishBlue">
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{$comment->id}}
                    </td>
                    <td class="capitalize text-center py-4 px-6 whitespace-nowrap">
                        {{$comment->user_id}}
                    </td>
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{$comment->comment}}
                    </td>
                    <td class="text-center py-4 px-6 whitespace-nowrap">
                        {{$comment->created_at}}
                    </td>
                    <td class="flex flex-row space-x-1 justify-around py-4 px-6 whitespace-nowrap">
                        <a href="{{ route('testimonial.show', $comment->id) }}" class="bg-indigo-500 text-white rounded-md py-1 px-4">View</a>
                        <form method="POST" action="{{ route('testimonial.destroy', $comment->id) }}">
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