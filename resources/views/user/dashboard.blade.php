<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   
    <div class="max-w-6xl mx-auto py-12 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="px-5 mx-auto mb-20 text-center md:mb-32">
                    <!--Heading-->
                    <h2 class="text-2xl font-bold text-center">
                        Gallery Images
                    </h2>
                    @include('partials.gallery')
                </div>
                <div class="w-full px-2 mx-auto mb-20 text-center md:mb-32">
                    <!--Heading-->
                    <h2 class="text-2xl font-bold text-center">
                        Packages 
                    </h2>
                    <div class="container flex space-x-2 mt-20">
                        @foreach ($packages as $package)  
                        <div class="lg:w-1/3 md:w-1/2 w-full">
                            <div class="rounded-lg shadow-md shadow-brightRedLight p-4">
                                <h4 class="text-2xl font-semibold text-center text-veryDarkBlue py-4"> {{ $package->name }} </h4>
                                <hr>
                                <h5 class="text-2xl text-center font-bold py-4 text-gray-500">Php {{ $package->price }}</h5>
                                <hr>
                                @foreach ($package->includes as $includes)
                                <div class="text-xs my-4 flex flex-col items-center space-y-8">
                                    <p class="flex items-center w-full my-1"><svg class="mr-2 text-brightRed" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewbox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                        </svg>{{ $includes }}
                                    </p>
                                </div>
                                @endforeach
                                <a href="package/{{$package->id}}/book" class="font-semibold my-4 px-4 py-4 block w-full text-white bg-brightRed hover:bg-brightRedSupLight rounded"> Select </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full px-2 mx-auto mb-20 text-center md:mb-32">
                    <!--Heading-->
                    <h2 class="text-2xl font-bold text-center">
                        Photographers
                    </h2>
                    @include('partials.team')
                </div>     
            </div>
        </div>
    </div> 
</x-app-layout>
