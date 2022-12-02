<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Form') }}
        </h2>
    </x-slot>
    <section id="profile" class="mb-24">
        <div class="container mx-auto my-5 p-5">
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
                                            <x-text-input id="event_time" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="event_time" value="{{$booking->package->name}} - Php.{{$booking->package->price}}"  disabled />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col justify-between mt-2 md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="event_address" class="px-2 py-2 font-semibold" :value="__('Event Address')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="event_address" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="event_address" value="{{$booking->event_address}}" disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col justify-between mt-2 md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="event_date" class="px-2 py-2 font-semibold" :value="__('Date of Event')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="event_date" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="event_date" value="{{$booking->event_date}}"  disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col justify-between mt-2 md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="photographer" class="px-2 py-2 font-semibold" :value="__('Photographer')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="event_date" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="event_date" value="{{$booking->photographer->userProfile->firstname . ' ' .$booking->photographer->userProfile->lastname }}"  disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col jusify-between md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="active_phone_no" class="px-2 py-2 font-semibold" :value="__('Active Phone Number')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="active_phone_no" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="active_phone_no" value="{{ $booking->active_phone_no }}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div class="flex flex-col justify-between mt-2 md:flex-row">
                                            <div class="w-full">
                                                <x-input-label for="event_time" class="px-2 py-2 font-semibold" :value="__('Time of Event')" />
                                            </div>
                                            <div class="w-full">
                                                <x-text-input id="event_time" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="event_time" value="{{$booking->event_time}}"  disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col space-y-6 text-sm text-veryDarkBlue w-full md:w-1/2">
                                <div class="flex flex-col justify-between mt-2 md:flex-row">
                                    <div class="w-full">
                                        <x-input-label for="photographer" class="px-2 py-2 font-semibold" :value="__('Payment Method')" />
                                    </div>
                                    <div class="w-full">
                                        <x-text-input id="event_time" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="event_time" value="{{$booking->payment->payment_type}}"  disabled/>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col jusify-between md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="active_phone_no" class="px-2 py-2 font-semibold" :value="__('Downpayment')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="active_phone_no" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="active_phone_no" value="{{ $booking->payment->downpayment }}" disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col jusify-between md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="active_phone_no" class="px-2 py-2 font-semibold" :value="__('Reference Number')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="active_phone_no" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="active_phone_no" value="{{ $booking->payment->ref_num }}" disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col jusify-between md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="active_phone_no" class="px-2 py-2 font-semibold" :value="__('Payment Status')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="active_phone_no" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="active_phone_no" value="{{ $booking->payment->payment_status }}" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4"></div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
