
<x-guest-layout>

    <form method="POST" action="{{ route('register') }}">
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="text-gray-400">
                    <a href="{{ route('change.locale', ['locale' => 'en']) }}"
                       style="{{ app()->getLocale() === 'en' ? 'color: #BDBDBD;' : 'color: #808080;' }}">
                        English
                    </a>
                    |
                    <a href="{{ route('change.locale', ['locale' => 'ru']) }}"
                       style="{{ app()->getLocale() === 'ru' ? 'color: #BDBDBD;' : 'color: #808080;' }}">
                        Русский
                    </a>
                    |
                    <a href="{{ route('change.locale', ['locale' => 'lv']) }}"
                       style="{{ app()->getLocale() === 'lv' ? 'color: #BDBDBD;' : 'color: #808080;' }}">
                        Latviešu
                    </a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

        <div>
            <h1 style="color: white;">
                {{ __('regPage.reg_text') }}
            </h1>
        </div>
        </div>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('messages.name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('messages.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('messages.just_password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('messages.confirm_password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
