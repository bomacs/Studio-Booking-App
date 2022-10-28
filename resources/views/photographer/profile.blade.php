<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Photographer Profile') }}
        </h2>
    </x-slot>
    <section id="profile" class="mb-24">
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex md:flex-col no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:mx-2">
                    <!-- Profile Card -->
                    <div class="items-center md:space-x-8 bg-white p-3 border-t-4 border-brightRedLight md:flex md:flex-row">
                        <div class="image overflow-hidden md:w-1/3">
                            <img class="h-auto w-full mx-auto"
                                src="{{ asset('imgs/profile_pic/' . $userProfile->userProfile->image_path) }}"
                                alt="Profile Image">
                        </div>
                        <div class="md:space-y-8 md:w-2/3">
                            <h1 class="text-veryDarkBlue font-bold text-xl leading-8 my-1">
                                {{ $userProfile->userProfile->firstname . ' ' . $userProfile->userProfile->lastname}}
                            </h1>
                            <h3 class="text-darkBlue font-lg text-semibold leading-6">
                                {{ auth()->user()->hasRole('user')??auth()->user()->hasRole('photographer')? 'User' : 'Photographer' }}
                            </h3>
                            <p class="text-sm text-darkGrayishBlue hover:text-veryDarkBlue leading-6">
                                {{ $userProfile->userProfile->aboutself }}
                            </p>
                            <ul class="bg-gray-100 text-darkBlue hover:text-veryDarkBlue hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>Status</span>
                                    <span class="ml-auto"><span
                                            class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                                </li>
                                <li class="flex items-center py-3">
                                    <span>Member since</span>
                                    <span class="ml-auto ">{{ $userProfile->created_at->format('d M Y') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Right Side -->
                <div class="w-full mx-auto h-64">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-brightRedSupLight p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-veryDarkBlue">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2 md:-space-x-4">
                                    <div class="px-4 py-2 font-semibold">
                                        First Name
                                    </div>
                                    <div class="px-4 py-2 text-darkGrayishBlue hover:text-darkBlue">
                                        {{ $userProfile->userProfile->firstname}}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 md:-space-x-4">
                                    <div class="px-4 py-2 font-semibold">
                                        Last Name
                                    </div>
                                    <div class="px-4 py-2 text-darkGrayishBlue hover:text-darkBlue">
                                        {{ $userProfile->userProfile->lastname}}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 md:-space-x-4">
                                    <div class="px-4 py-2 font-semibold">
                                        Gender
                                    </div>
                                    <div class="px-4 py-2 text-darkGrayishBlue hover:text-darkBlue">
                                        {{ $userProfile->userProfile->gender }}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 md:-space-x-4">
                                    <div class="px-4 py-2 font-semibold">
                                        Contact No.
                                    </div>
                                    <div class="px-4 py-2 text-darkGrayishBlue hover:text-darkBlue">{{$userProfile->userProfile->phone_no}}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 md:-space-x-4">
                                    <div class="px-4 py-2 font-semibold">
                                        Address
                                    </div>
                                    <div class="px-4 py-2 text-darkGrayishBlue hover:text-darkBlue">
                                        {{ $userProfile->userProfile->address }}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 md:-space-x-4">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class=" text-darkGrayishBlue hover:text-indigo-500" href="mailto:{{ $userProfile->email }}">{{ $userProfile->email}}</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 md:-space-x-4">
                                    <div class="px-4 py-2 font-semibold">Birthday</div>
                                    <div class="px-4 py-2 text-darkGrayishBlue hover:text-darkBlue">{{$userProfile->userProfile->birthday}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of about section -->
                    <div class="my-4"></div>

                    <!-- Experience and education -->
                    <div class="bg-brightRedSupLight p-3 shadow-sm rounded-sm">

                        <div class="grid grid-cols-2">
                            <div class="ml-4">
                                <div class="flex items-center space-x-2 font-semibold text-veryDarkBlue leading-8 mb-3">
                                    <span class="tracking-wide">Experience</span>
                                </div>
                                <div class="px-4">
                                    <p class="text-sm text-darkGrayishBlue">
                                        {{ $userProfile->userProfile->experience}}
                                    </p>
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span class="tracking-wide">Expertise</span>
                                </div>
                                <div class="px-4">
                                    <p class="text-sm text-darkGrayishBlue">
                                        {{ $userProfile->userProfile->expertise }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End of Experience and expertise grid -->

                    <div class="my-4"></div>
                    
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </section>
</x-app-layout>