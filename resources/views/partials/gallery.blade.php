<div class="max-w-6xl px-5 mx-auto mb-20 text-center md:mb-32">
    <!--Heading-->
    <h2 class="text-4xl font-bold text-center">
        Explore the beauty of our works 
    </h2>
    <div class="container grid grid-cols-2 gap-2 mx-auto mt-20 px-2 md:grid-cols-3">
    @foreach ($galleryImages as $image)
        <div class="w-full rounded-sm shadow-md shadow-brightRedLight">
            <img src="{{ asset('imgs/gallery/' . $image->image_path)}}"
                alt="image">
        </div>
    @endforeach
    </div>
</div>