<div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <video class="object-cover w-full h-96" playsinline autoplay muted loop>
          <source class="" src="{{ asset('videos/heros/' . $heros[0]->video_path)}}" type="video/mp4" />
        </video>
        <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.6);">
          <div class="flex justify-center items-center h-full">
            <div class="text-white text-center px-14 px-md-0">
              <h2 class="text-lg font-semibold mb-4 md:text-3xl">{{$heros[0]->heading_1}}</h2>
              <h5 class="text-xs font-semibold mb-6 md:text-lg">{{$heros[0]->heading_2}}</h5>
              <div class="md:space-x-2">
                <a type="button" class="inline-block px-6 py-2 mb-2 md:mb-0 border-2 border-white text-white font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" href="{{route('create.booking')}}" role="button" data-mdb-ripple="true" data-mdb-ripple-color="light">Book Now</a>
                <a type="button" class="inline-block px-6 py-2 border-2 border-white text-white font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" href="#aboutUs" role="button" data-mdb-ripple="true" data-mdb-ripple-color="light">Read more</a>
              </div>
            </div>  
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <video class="object-cover w-full h-96" playsinline autoplay muted loop>
          <source class="" src="{{ asset('videos/heros/' . $heros[1]->video_path) }}" type="video/mp4" />
        </video>
        <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.3)">
          <div class="flex justify-center items-center h-full">
            <div class="text-white text-center px-14 px-md-0">
              <h2 class="text-lg font-semibold mb-4 md:text-3xl">{{ $heros[1]->heading_1 }}</h2>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="swiper-slide">
        <video class="object-cover w-full h-96" playsinline autoplay muted loop>
          <source class="" src="{{ asset('videos/heros' . $heros[2]->video_path) }}" type="video/mp4" />
        </video>
        <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.3)">
          <div class="flex justify-center items-center h-full">
            <div class="text-white text-center px-14 px-md-0">
              <h2 class="text-3xl font-semibold mb-4">{{ $heros[2]->heading_1 }}</h2>
              <a type="button" class="inline-block px-6 py-2 border-2 border-white text-white font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" href="#gallery" role="button"     data-mdb-ripple="true" data-mdb-ripple-color="light">Check more</a>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>