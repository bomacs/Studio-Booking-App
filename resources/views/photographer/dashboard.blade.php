<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Photographer Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-6xl mx-auto py-12 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-5 mx-auto mb-20 text-center md:mb-32">
                <!--Heading-->
                <h2 class="text-2xl font-bold text-center">
                    My Images
                </h2>
                <div class="text-left text-xs text-white font-semibold mt-20 px-2">
                    <a class="bg-indigo-500 hover:bg-indigo-700 px-4 py-2 border border-gray-500 border-2" href="{{ route('gallery.create') }}">+ Upload Image</a>
                </div>
                <div class="container grid grid-cols-1 gap-4 mx-auto mt-4 px-2 md:grid-cols-2">
                    @foreach ($Images as $image)
                    <div class="max-w-md rounded-sm shadow-md shadow-brightRedLight hover:scale-150 hover:origin-bottom transition duration-300 ease-in-out">
                        <img src="{{ asset('imgs/gallery/' . $image->image_path)}}"
                            alt="image">
                        <div class="bg-gray-300">
                            <h2 class="text-sm text-gray-700 font-bold">{{ $image->title }}</h2>
                            <h4 class="text-xs text-gray-500">{{ $image->description}}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="px-5 mx-auto mb-20 text-center md:mb-32">
                <!--Heading-->
                <h2 class="text-2xl font-bold text-center">
                    My Videos
                </h2>
                <div class="text-left text-xs text-white font-semibold mt-20 px-2">
                    <a class="bg-indigo-500 hover:bg-indigo-700 px-4 py-2 border border-gray-500 border-2" href="{{ route('video.create') }}">+ Upload Video</a>
                </div>
                <div class="container grid grid-cols-1 gap-4 mx-auto mt-4 px-2 md:grid-cols-2">
                    @foreach ($videos as $video)
                    <div class="max-w-md rounded-sm shadow-md shadow-brightRedLight">
                        <video class="object-cover" controls>
                            <source class="" src="{{ asset('videos/gallery_videos/' . $video->video_path)}}" type="video/mp4" />
                            <source class="" src="{{ asset('videos/gallery_videos/' . $video->video_path)}}" type="video/mov" />
                        </video>
                        <div class="bg-gray-300">
                            <h2 class="text-sm text-gray-700 font-bold">{{ $video->title }}</h2>
                            <h4 class="text-xs text-gray-500">{{ $video->description}}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
