<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Payment') }}
        </h2>
    </x-slot>
    <section id="profile" class="mb-24">
        <div class="container mx-auto my-5 p-5">
            <form method="POST" action="{{route('payment.update', $payment->id)}}">
                @csrf
                @method('PUT')
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
                                            <x-input-label for="payment_type" class="px-2 py-2 font-semibold" :value="__('Payment Method')" />
                                        </div>
                                        <div class="w-full">
                                            <x-text-input id="payment_type" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="payment_type" value="{{$payment->payment_type}}"  required/>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex flex-col jusify-between md:flex-row">
                                            <div class="w-full">
                                                <x-input-label for="downpayment" class="px-2 py-2 font-semibold" :value="__('Downpayment')" />
                                            </div>
                                            <div class="w-full">
                                                <x-text-input id="downpayment" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="downpayment" value="{{ $payment->downpayment }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex flex-col jusify-between md:flex-row">
                                            <div class="w-full">
                                                <x-input-label for="ref_num" class="px-2 py-2 font-semibold" :value="__('Reference Number')" />
                                            </div>
                                            <div class="w-full">
                                                <x-text-input id="ref_num" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="ref_num" value="{{ $payment->ref_num }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex flex-col jusify-between md:flex-row">
                                            <div class="w-full">
                                                <x-input-label for="payment_status" class="px-2 py-2 font-semibold" :value="__('Payment Status')" />
                                            </div>
                                            <div class="w-full">
                                                <x-text-input id="payment_status" class="block w-full py-2 text-darkGrayishBlue hover:text-darkBlue" type="text" name="payment_status" value="{{ $payment->payment_status }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row justify-end mt-4 md:mr-4">
                                <x-primary-button class="px-6">
                                    {{ __('SAVE') }}
                                </x-primary-button>
                            </div>
                        </div>
                        <div class="my-4"></div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
