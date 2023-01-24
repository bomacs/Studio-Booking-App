<x-app-layout>
    <div class="max-w-6xl px-5 mx-auto mb-20 text-center mt-12">
        <!--heading-->
        <h2 class="text-4xl font-bold text-center">
            What People Say About Us
        </h2>
        <div class="container mx-auto flex flex-col mt-24 space-y-8 md:flex-row md:space-y-0 md:space-x-6">
            <!--testimonial 1-->
            @foreach ($comments as $comment)
            <div class="flex flex-col items-center p-6 space-y-6 rounded-lg bg-gray-200 md:w-1/3">
                <img src="{{ asset('imgs/profile_pic/' . $comment->user->userprofile->image_path) }}" class="w-16 -mt-14" alt="profile picture">
                <h5 class="texgt-lg font-bold">{{ $comment->user->username }}</h5>
                <p class="text-sm text-darkGrayishBlue">
                    {{ $comment->comment }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>