<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Photographer Dashboard') }}
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
            </div>
        </div>
    </div>
</x-app-layout>
