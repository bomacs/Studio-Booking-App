<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-6xl mx-auto py-12 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="w-full px-2 mx-auto mb-20 text-center md:mb-32">
                <!--Heading-->
                <h2 class="text-2xl font-bold text-center">
                    My Favorite Packages 
                </h2>
                <div class="container grid grid-cols-1 gap-4 mt-20 mx-auto px-2 md:grid-cols-2">
                    @if ($packages)
                        @foreach ($packages as $package)  
                        <div class="w-full h-full rounded-lg shadow-md shadow-brightRedLight p-8 bg-no-repeat bg-cover" style="background-image: {{ asset('imgs/packages/birthday.jpg') }};">
                            <h4 class="text-2xl font-semibold text-center text-veryDarkBlue py-4"> {{ $package->name }} </h4>
                            <hr>
                            <h5 class="text-2xl text-center font-bold py-4 text-gray-500">Php {{ $package->price }}</h5>
                            <hr>
                            @foreach ($package->includes as $include)
                            <div class="text-xs my-4 flex flex-col items-center space-y-8">
                                <p class="flex items-center w-full my-1"><svg class="mr-2 text-brightRed" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewbox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                    </svg>{{ $include }}
                                </p>
                            </div>
                            @endforeach
                            <a href="/user/package/{{$package->id}}/book" class="font-semibold my-4 px-4 py-4 block w-full text-white bg-brightRed hover:bg-brightRedSupLight rounded"> Select </a>
                        </div>
                        @endforeach
                    @else
                        <h1 class="text-md text-gray-700 font-semibold">No placed booking yet. Consider place your booking now.</h1>
                    @endif
                </div>
            </div>
            <div class="w-full px-2 mx-auto mb-20 text-center md:mb-32">
                <!--Heading-->
                <h2 class="text-2xl font-bold text-center">
                    My Favorite Photographers
                </h2>
                <div class="container grid grid-cols-1 gap-4 mt-20 mx-auto px-2 md:grid-cols-2">
                    @if($photographers)
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
                                <a href="/profile/{{ $photographer->id }}">View More</a>  
                            </button>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h1 class="text-md text-gray-700 font-semibold">No placed booking yet. Consider place your booking now.</h1>
                    @endif
                </div>
            </div>     
        </div>
    </div> 
</x-app-layout>
