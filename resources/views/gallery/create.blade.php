<x-app-layout>
    @if (session('message'))
    <p class="bg-green-400 text-veryDarkBlue text-md">{{ session('message') }}</p>
    @endif
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('create.gallery') }}" enctype="multipart/form-data">
            @csrf

            <!-- Image -->
            <div>
                <x-input-label for="image" :value="__('Image')" />

                <input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus />

                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <!-- Title-->
            <div class="mt-4">
                <x-input-label for="title" :value="__('Title')" />

                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />

                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            
            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" rows="4" cols="25" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
