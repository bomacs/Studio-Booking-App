<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div class="w-full mx-auto text-lg text-center font-bold m-4">
            <h2>Package Details</h2>
        </div>
            <!-- Name -->
            <div class="mt-4">
                <x-input-label class="text-md font-semibold" for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full pl-4" type="name" name="name" value="{{ $package->name }}" required />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- Description -->
            <div class="mt-4">
                <x-input-label class="text-md font-semibold" for="description" :value="__('Description')" />
                <div class="pl-4">
                    {{$package->description}}
                </div>
            </div>
            <!-- Includes -->
            <div class="flex flex-col justify-center mt-4 space-y-2">
                <div>
                    <x-input-label class="text-md font-semibold" :value="__('Includes')" />
                </div>
                <div class="flex flex-col text-sm space-y-2">
                    @foreach($package->includes as $include)
                    <label class="form-check-label inline-block text-gray-800 pl-4" for="include1">{{$include}}</label>
                    @endforeach
                </div>
            </div>
            <!-- Price -->
            <div class="mt-4">
                <x-input-label class="text-md font-semibold" for="price" :value="__('Price')" />

                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" min="0" value="{{$package->price}}" required />

                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- Discount -->
            <div class="mt-4">
                <x-input-label class="text-md font-semibold" for="discount" :value="__('Discount')" />

                <x-text-input id="discount" class="block mt-1 w-full" type="number" name="discount" min="0" value="{{$package->discount}}" />

                <x-input-error :messages="$errors->get('discount')" class="mt-2" />
            </div>
    </x-auth-card>
</x-app-layout>

