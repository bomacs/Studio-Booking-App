<x-app-layout>
    <div class="max-w-6xl px-5 mx-auto mb-20 text-center mt-12">
        <!--heading-->
        <h2 class="text-4xl font-bold text-center">
            Gallery of our Wonderful Images
        </h2>
        <div class="container grid grid-cols-1 gap-4 mx-auto my-20 px-2 md:grid-cols-3">
            @foreach ($galleryImages as $image)
            <div class="max-w-md rounded-sm shadow-md shadow-brightRedLight hover:scale-150 hover:origin-bottom transition duration-300 ease-in-out">
                <img src="{{ asset('imgs/gallery/' . $image->image_path)}}"
                    alt="image">
                <div class="bg-gray-300 p-2">
                    <h2 class="text-sm text-gray-700 pb-1">{{ $image->title }}</h2>
                    <h4 class="text-xs pb-1">Photographer - <a class="text-blue-500 hover:text-blue-700" href="{{ route('profile.show', $image->user_id)}}">{{ $image->user->username }}</a></h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>