<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Form') }}
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
                                            <x-input-label for="payment_id" class="px-2 py-2 font-semibold" :value="__('Payment ID')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="payment_id" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="payment_id" value="{{$payment->id}}"  disabled />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="w-full flex flex-col justify-between mt-2 md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="booking_id" class="px-2 py-2 font-semibold" :value="__('Booking ID')" />
                                        </div>
                                        <div class="w-full">
                                            <a href="{{ route('booking.show', $payment->booking->id) }}">
                                            <x-text-input id="booking_id" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue cursor-pointer" type="text" name="booking_id" value="{{$payment->booking->id}}" disabled />
                                            </a>
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
                                        <x-text-input id="event_time" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="event_time" value="{{$payment->payment_type}}"  disabled/>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col jusify-between md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="active_phone_no" class="px-2 py-2 font-semibold" :value="__('Downpayment')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="active_phone_no" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="active_phone_no" value="{{ $payment->downpayment }}" disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col jusify-between md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="active_phone_no" class="px-2 py-2 font-semibold" :value="__('Reference Number')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="active_phone_no" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="active_phone_no" value="{{ $payment->ref_num }}" disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col jusify-between md:flex-row">
                                        <div class="w-full">
                                            <x-input-label for="active_phone_no" class="px-2 py-2 font-semibold" :value="__('Payment Status')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="active_phone_no" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="active_phone_no" value="{{ $payment->payment_status }}" disabled/>
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
