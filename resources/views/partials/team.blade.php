<div class="container grid grid-cols-1 gap-2 mt-20 mx-auto px-2 md:grid-cols-3">
    @foreach($photographers as $photographer)
    <div class="max-w-md rounded-lg shadow-md shadow-brightRedLight">
        <img
        class="object-cover w-full h-80"
        src="{{ asset('imgs/profile_pic/' . $photographer->userProfile->image_path) }}"
        alt="photographer image"
        />
        <div class="px-6 py-4">
        <h4 class="mb-3 text-xl font-semibold tracking-tight text-brightRed">
            {{ $photographer->userProfile->firstname . ' ' . $photographer->userProfile->lastname }}
        </h4>
        <button
            class="px-4 py-2 text-sm shadow  rounded-md bg-brightRed shadow-brightRedLight text-white hover:bg-brightRedLight hover:text-veryDarkBlue">
            <a href="/profile/{{$photographer->id}}">View More</a>  
        </button>
        </div>
    </div>
    @endforeach
    <div class="text-xs mt-2">
        {{ $photographers->links() }}
    </div>
</div>
