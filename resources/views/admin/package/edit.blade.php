<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div class="w-full mx-auto text-lg text-center font-bold m-4">
            <h2>Edit Package</h2>
        </div>
        <form method="POST" action="{{ route('update.package', $package->id) }}">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="name" name="name" value="{{$package->name}}" required />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            
            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" rows="4" cols="25" value="{{$package->description}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $package->description }}
                </textarea>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <!-- Inludes -->
            <div class="flex flex-col justify-center mt-4 space-y-2">
                <div>
                    <x-input-label  :value="__('Includes')" />
                </div>
                <div class="flex flex-col text-sm space-y-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="include1" name="includes[]" value="Photos will be delivered in DVD" @checked(in_array("Photos will be delivered in DVD", $package->includes))>
                        <label class="form-check-label inline-block text-gray-800" for="include1">Photos will be delivered in DVD</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="include2" name="includes[]" value="Edited Photo" @checked(in_array("Edited Photo", $package->includes))>
                        <label class="form-check-label inline-block text-gray-800" for="include2">Edited Photo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2" type="checkbox" id="include3" name="includes[]" value="Edited Video" @checked(in_array("Edited Video", $package->includes))>
                        <label class="form-check-label inline-block text-gray-800" for="include3">Edited Video</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="include4" name="includes[]" value="Limited time Delivery" @checked(in_array("Limited time Delivery", $package->includes))>
                        <label class="form-check-label inline-block text-gray-800" for="include4">Limited Time Delivery</label>
                    </div>  
                    <div class="form-check form-check-inline">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="include5" name="includes[]" value="One Day Photoshoot" @checked(in_array("One Day Photoshoot", $package->includes))>
                        <label class="form-check-label inline-block text-gray-800" for="include5">One Day Photoshoot</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="include6" name="includes[]" value="Unlimited Photoshoot" @checked(in_array("Unlimited Photoshoot", $package->includes))>
                        <label class="form-check-label inline-block text-gray-800" for="include6">Unlimited Photoshoot</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="include7" name="includes[]" value="Unlimited Video Shoot" @checked(in_array("Unlimited Video Shoot", $package->includes))>
                        <label class="form-check-label inline-block text-gray-800" for="include7">Unlimited Video Shoot</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="include8" name="includes[]" value="4R-Printed Photo" @checked(in_array("4R-Printed Photo", $package->includes))>
                        <label class="form-check-label inline-block text-gray-800" for="include8">4R-Printed Photo</label>
                    </div>      
                </div>
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <!-- Price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />

                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" min="0" value="{{ $package->price }}" required />

                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- Discount -->
            <div class="mt-4">
                <x-input-label for="discount" :value="__('Discount')" />

                <x-text-input id="discount" class="block mt-1 w-full" type="number" name="discount" min="0" value="{{ $package->discount }}" />

                <x-input-error :messages="$errors->get('discount')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>

