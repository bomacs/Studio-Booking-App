<x-app-layout>
    <div class="max-w-6xl px-5 mx-auto mb-20 text-center mt-12">
        <!--heading-->
        <h2 class="text-4xl font-bold text-center">
            Select from our different packages
        </h2>
        <div class="container grid grid-cols-1 gap-2 mt-20 mx-auto px-2 md:grid-cols-3">
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
                <a href="user/package/{{$package->id}}/book" class="font-semibold my-4 px-4 py-4 block w-full text-white bg-brightRed hover:bg-brightRedSupLight rounded"> Select </a>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>