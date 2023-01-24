<x-app-layout>
    <div class="max-w-6xl px-5 mx-auto mb-20 text-center mt-12">
        <!--heading-->
        <h2 class="text-4xl font-bold text-center">
            Gallery of our Wonderful Images
        </h2>
        <div class="w-full mx-auto mt-20 rounded-sm shadow-md shadow-brightRedLight md:max-w-2xl">
            <img class="w-full h-80" src="{{ asset('imgs/gallery/' . $image->image_path)}}"
                alt="image">
            <div class="bg-gray-300 p-2">
                <h2 class="text-sm text-gray-700 pb-1">{{ $image->title }}</h2>
                <h4 class="text-xs pb-1">Photographer - <a class="text-blue-500 hover:text-blue-700" href="{{ route('profile.show', $image->user_id)}}">{{ $image->user->username }}</a></h4>
            </div>
        </div>
    </div>
</x-app-layout>

