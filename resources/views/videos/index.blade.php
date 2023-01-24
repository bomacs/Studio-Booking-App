<x-app-layout>
    <div class="max-w-6xl px-5 mx-auto mb-20 text-center mt-12">
        <!--heading-->
        <h2 class="text-4xl font-bold text-center">
            Gallery of our Highlights Videos
        </h2>
        <div class="container grid grid-cols-1 gap-4 mx-auto mt-20 px-2 md:grid-cols-2">
            @foreach ($galleryVideos as $video)
            <div class="w-full rounded-sm shadow-md shadow-brightRedLight">
                <video class="object-cover" controls>
                    <source class="" src="{{ asset('videos/gallery_videos/' . $video->video_path)}}" type="video/mp4" />
                    <source class="" src="{{ asset('videos/gallery_videos/' . $video->video_path)}}" type="video/mov" />
                </video>
                <div class="bg-gray-300 p-2">
                    <h2 class="text-sm text-gray-700 font-bold pb-1">{{ $video->title }}</h2>
                    <h4 class="text-xs 
                    pb-1">Videographer - <a class="text-blue-500 hover:text-blue-700" href="{{ route('profile.show', $video->user_id)}}">{{ $video->user->username }}</a></h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>