<div class="container grid grid-cols-1 gap-4 mx-auto mt-20 px-2 md:grid-cols-2">
    @foreach ($galleryVideos as $video)
    <div class="w-full rounded-sm shadow-md shadow-brightRedLight">
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
<div class="font-semibold text-indigo-400 text-xs text-end mt-2 px-2.5 hover:text-indigo-900 md:text-sm md:mr-20">
    <a href="{{ route('videoGallery.index')}}">View More..</a>
</div>