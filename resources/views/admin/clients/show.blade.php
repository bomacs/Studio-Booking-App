<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div>
            <!-- Name -->
            <div>
                <x-input-label for="username" :value="__('User Name')" />
                <a href="{{route('profile.show', $user->id)}}">
                <x-text-input id="username" class="cursor-pointer block mt-1 w-full" type="text" name="username" value="{{$user->username}}" disabled />
                </a>
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" disabled />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                value="{{ $user->password }}" disabled />
            </div>
            <!-- Role -->
            <div class="mt-4">
                <x-input-label for="role" class="px-2 py-2 font-semibold" :value="__('Role')" />
            </div>
            <div class="mt-4">
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="text"
                                name="role" value="{{ $user->roles->first()->name }}" disabled />
            </div>
        </div>
    </x-auth-card>
</x-app-layout>
