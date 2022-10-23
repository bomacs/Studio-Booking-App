<x-app-layout>
    @if (session('message'))
    <p class="bg-green-400 text-veryDarkBlue text-md">{{ session('message') }}</p>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Form') }}
        </h2>
    </x-slot>
    <section id="profile" class="mb-24">
        <div class="container mx-auto my-5 p-5">
            <form method="POST" action="{{ route('create.booking') }}">
                @csrf
                <div class="md:flex md:flex-col no-wrap">
                    <div class="w-full mx-auto">
                        <!-- About Section -->
                        <div class="bg-brightRedSupLight p-5 shadow-sm rounded-md">
                            <div class="flex items-center justify-center p-4 font-semibold text-gray-900 leading-8">
                                <x-application-logo></x-application-logo>
                            </div>
                            <div class="flex flex-col justify-between md:flex-row md:space-x-4">
                                <div class="flex flex-col space-y-6 text-sm text-veryDarkBlue w-full md:w-1/2">
                                    <div>
                                        <div class="w-full flex flex-col justify-between mt-2 md:flex-row">
                                            <div class="w-full">
                                                <x-input-label for="package" class="px-2 py-2 font-semibold" :value="__('Package')" />
                                            </div>
                                            <div class="w-full">
                                                <select name="package" id="package" value="{{old('package')}}" class ="text-sm block mt-1 w-full border-dgrey focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                                                    <option value="" selected disabled>Select package..</option>
                                                    @foreach($packages as $package)
                                                    <option value="{{ $package->id}}">{{ $package->name . '-' . $package->price}}</option>
                                                    @endforeach
                                                </select>   
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('package')" class="mt-2 ml-4" />
                                    </div>
                                    <div>
                                        <div class="flex flex-col justify-between mt-2 md:flex-row">
                                            <div class="w-full">
                                                <x-input-label for="event_address" class="px-2 py-2 font-semibold" :value="__('Event Address')" />
                                            </div>
                                            <div class="w-full">
                                                <x-text-input id="event_address" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="event_address" :value="old('event_address')" required/>
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('event_address')" class="mt-2 ml-4" />
                                    </div>
                                    <div>
                                        <div class="flex flex-col justify-between mt-2 md:flex-row">
                                            <div class="w-full">
                                                <x-input-label for="event_date" class="px-2 py-2 font-semibold" :value="__('Date of Event')" />
                                            </div>
                                            <div class="w-full">
                                                <x-text-input id="event_date" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="date" name="event_date" :value="old('event_date')"  required />
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('event_date  ')" class="mt-2 ml-4" />
                                    </div>
                                </div>
                                <div class="flex flex-col space-y-6 text-sm text-veryDarkBlue w-full md:w-1/2">
                                    <div>
                                        <div class="flex flex-col justify-between mt-2 md:flex-row">
                                            <div class="w-full">
                                                <x-input-label for="photographer" class="px-2 py-2 font-semibold" :value="__('Photographer')" />
                                            </div>
                                            <div class="w-full">
                                                <select name="photographer" id="photographer" value="{{old('photographer')}}" class ="text-sm block mt-1 w-full border-dgrey focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                                                    <option value=" " selected disabled>Select Photographer..</option>
                                                    @foreach($photographers as $photographer)
                                                    <option value="{{ $photographer->id}}">{{ $photographer->userProfile->firstname . ' ' . $photographer->userProfile->lastname}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('photographer')" class="mt-2 ml-4" />
                                    </div>
                                    <div>
                                        <div class="flex flex-col jusify-between md:flex-row">
                                            <div class="w-full">
                                                <x-input-label for="active_phone_no" class="px-2 py-2 font-semibold" :value="__('Active Phone Number')" />
                                            </div>
                                            <div class="w-full">
                                                <x-text-input id="active_phone_no" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="active_phone_no" :value="old('active_phone_no')" required />
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('active_phone_no')" class="mt-2 ml-4" />
                                    </div>
                                    <div>
                                        <div>
                                            <div class="flex flex-col justify-between mt-2 md:flex-row">
                                                <div class="w-full">
                                                    <x-input-label for="event_time" class="px-2 py-2 font-semibold" :value="__('Time of Event')" />
                                                </div>
                                                <div class="w-full">
                                                    <x-text-input id="event_time" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="time" name="event_time" :value="old('event_time')"  required />
                                                </div>
                                            </div>
                                            <x-input-error :messages="$errors->get('event_time')" class="mt-2 ml-4" />
                                        </div>
                                    </div>
                                    <div class="flex flex-row justify-end mt-4 md:mr-4">
                                        <x-primary-button class="px-6">
                                            {{ __('Place Booking') }}
                                        </x-primary-button>
                                    </div>
                             
                                </div>
                            </div>
                        </div>
                        <!-- End of about section -->
                        <div class="my-4"></div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
