<x-app-layout>
    @if (session('message'))
    <p class="bg-green-400 text-veryDarkBlue text-md">{{ session('message') }}</p>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>
    <section id="profile" class="mb-24">
        <div class="container mx-auto my-5 p-5">
            <form method="POST" action="{{ route('createUserProfile') }}" enctype="multipart/form-data">
                @csrf
                <div class="md:flex md:flex-col no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    <div class="w-full md:mx-2">
                        <!-- Profile Card -->
                        <div class="items-center md:space-x-8 bg-white p-3 border-t-4 border-brightRedLight md:flex md:flex-row">
                            <div class="image overflow-hidden md:w-1/3">
                                <img class="h-auto w-full mx-auto"
                                    src="{{ asset('imgs/profile_pic/' . $userProfile->userProfile->image_path) }}"
                                    alt="">
                                <x-input-label for="image" :value="__('Change Image')" />

                                <input id="image" class="block mt-1 w-full" type="file" name="image" value="{{ $userProfile->userProfile->image_path }}" autofocus />
                
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                            <div class="md:space-y-8 md:w-2/3">
                                <h1 class="text-veryDarkBlue font-bold text-xl leading-8 my-1">
                                    {{ $userProfile->userProfile->firstname . ' ' . $userProfile->userProfile->lastname }}
                                </h1>
                                <h3 class="text-darkBlue font-lg text-semibold leading-6"> {{ auth()->user()->hasRole('user')??auth()->user()->hasRole('photographer')? 'User' : 'Photographer' }}</h3>
                                <div class="text-sm text-darkGrayishBlue hover:text-veryDarkBlue leading-6">
                                        <div class="text-gray-400">
                                            <p>
                                                {{ $userProfile->userProfile->aboutself }}
                                            </p>
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="aboutself" :value="__('Edit About Yourself')" />

                                            <x-text-input id="aboutself" class="block mt-1 w-full" type="text" name="aboutself" value="{{ $userProfile->userProfile->aboutself }}" required />
                            
                                            <x-input-error :messages="$errors->get('aboutself')" class="mt-2" />
                                        </div>
                                </div>
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
                                    <div class="grid grid-cols-2 md:-space-x-4 mt-2">
                                        <x-input-label for="firstname" class="px-4 py-2 font-semibold" :value="__('First name')" />

                                        <x-text-input id="firstname" class="block w-full px-4 py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="firstname" value="{{ $userProfile->userProfile->firstname }}" required />
                        
                                        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                                    </div>
                                    <div class="grid grid-cols-2 md:-space-x-4 mt-2">
                                        <x-input-label for="lastname" class="px-4 py-2 font-semibold" :value="__('Last Name')" />

                                        <x-text-input id="lastname" class="block w-full px-4 py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="lastname" value="{{ $userProfile->userProfile->lastname }}" required />
                        
                                        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                                    </div>
                                    <div class="grid grid-cols-2 md:-space-x-4 mt-2">
                                        <x-input-label for="gender" class="px-4 py-2 font-semibold" :value="__('Gender')" />

                                        <select name="gender" id="gender" class="text-sm block mt-1 w-full border-dgrey focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                            <option value="" selected disabled>Select Gender..</option>
                                            <option value="Male" {{ old('gender') == "Male" ? 'selected' : ' '}}>Male</option>
                                            <option value="Female" {{ old('gender') == "Female" ? 'selected' : ' '}}>Female</option>
                                        </select> 
                        
                                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                    </div>
                                    <div class="grid grid-cols-2 md:-space-x-4 mt-2">
                                        <x-input-label for="phone_no" class="px-4 py-2 font-semibold" :value="__('Phone Number')" />

                                        <x-text-input id="phone_no" class="block w-full px-4 py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="phone_no" value="{{ $userProfile->userProfile->phone_no }}" required />
                        
                                        <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
                                    </div>
                                    <div class="grid grid-cols-2 md:-space-x-4 mt-2">
                                        <x-input-label for="address" class="px-4 py-2 font-semibold" :value="__('Address')" />

                                        <x-text-input id="address" class="block w-full px-4 py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="address" value="{{ $userProfile->userProfile->address }}" required />
                        
                                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                    </div>
                                    <div class="grid grid-cols-2 md:-space-x-4 mt-2">
                                        <x-input-label for="email" class="px-4 py-2 font-semibold" :value="__('Email')" />

                                        <x-text-input id="email" class="block w-full px-4 py-2 text-darkGrayishBlue hover:text-darkBlue" type="email" name="email" value="{{ $userProfile->email }}" required disabled />
                        
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="grid grid-cols-2 md:-space-x-4 mt-2">
                                        <x-input-label for="birthday" class="px-4 py-2 font-semibold" :value="__('Birthday')" />

                                        <x-text-input id="birthday" class="block w-full px-4 py-2 text-darkGrayishBlue hover:text-darkBlue" type="date" name="birthday" value="{{ $userProfile->userProfile->birthday }}" placeholder="yyyy-mm-dd" pattern="\d{4}-\d{2}-\d{2}" title="Provide a date in the format yyyy-mm-dd" required />
                        
                                        <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                                    </div>
                                    
                                    <div class="flex flex-row justify-end mt-4 md:mr-4">
                                        <x-primary-button class="px-6">
                                            {{ __('Save') }}
                                        </x-primary-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of about section -->

                        <div class="my-4"></div>
                        <!-- End of profile tab -->
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>