<x-app-layout>
    <div class="max-w-6xl px-5 mx-auto mb-20 text-center mt-12">
        <!--heading-->
        <h2 class="text-4xl font-bold text-center">
            What People Say About Us
        </h2>
            <!--testimonial 1-->
        <div class="w-full flex flex-col items-center mt-20 p-6 space-y-6 rounded-lg bg-gray-200">
            <img src="{{ asset('imgs/profile_pic/' . $comment->user->userprofile->image_path) }}" class="w-16 -mt-14" alt="profile picture">
            <h5 class="texgt-lg font-bold">{{ $comment->user->username }}</h5>
            <p class="text-sm text-darkGrayishBlue">
                {{ $comment->comment }}
            </p>
        </div>
    </div>
</x-app-layout>