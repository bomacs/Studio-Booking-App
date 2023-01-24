<div x-data="{ isOpen: false, isOpen1: false, isOpen2: false, isOpen3: false, isOpen4: false, isOpen5: false}" class="container relative overflow-hidden text-gray-700 mx-auto p-2 mt-20 ">
    <div class="flex flex-wrap -m-1 md:-m-2">
        <div class="flex flex-wrap w-1/2">
            <div class="w-full p-1 md:w-1/2 md:p-2">
                <img @click="isOpen=true" alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[0]->image_path) }}">
            </div>
            <div x-show="isOpen" class="absolute top-0 left-0 w-full h-full">
                <img  @click="isOpen=false" alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[0]->image_path) }}">
            </div>
            <div class="w-full p-1 md:w-1/2 md:p-2">
                <img @click="isOpen1=true"  alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[1]->image_path) }}">
            </div>
            <div x-show="isOpen1" class="absolute top-0 left-0 w-full h-full">
                <img  @click="isOpen1=false" alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[1]->image_path) }}">
            </div>
            <div class="w-full p-1 md:p-2">
                <img  @click="isOpen2=true"  alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[2]->image_path) }}">
            </div>
            <div x-show="isOpen2" class="absolute top-0 left-0 w-full h-full">
                <img  @click="isOpen2=false" alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[2]->image_path) }}">
            </div>
        </div>
        <div class="flex flex-wrap w-1/2">
            <div class="w-full p-1 md:p-2">
                <img @click="isOpen3=true" alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[3]->image_path) }}">
            </div>
            <div x-show="isOpen3" class="absolute top-0 left-0 w-full h-full">
                <img @click="isOpen3=false" alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[3]->image_path) }}">
            </div>
            <div class="w-full p-1 md:w-1/2 md:p-2">
                <img @click="isOpen4=true" alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[4]->image_path) }}">
            </div>
            <div x-show="isOpen4" class="absolute top-0 left-0 w-full h-full">
                <img @click="isOpen4=false" alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[4]->image_path) }}">
            </div>
            <div class="w-full p-1 md:w-1/2 md:p-2">
                <img @click="isOpen5=true" alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[5]->image_path) }}">
            </div>
            <div x-show="isOpen5" class="absolute top-0 left-0 w-full h-full">
                <img @click="isOpen5=false" alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                src="{{ asset('imgs/gallery/' . $galleryImages[5]->image_path) }}">
            </div>
        </div>
    </div>
    <div class="font-semibold text-indigo-400 text-xs text-end mt-2 px-2.5 hover:text-indigo-900 md:text-sm">
        <a href="{{ route('gallery.index') }}">View More..</a>
    </div>
</div>
