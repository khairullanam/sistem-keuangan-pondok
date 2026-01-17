<x-guest-layout>
    <x-auth-session-status class="mb-5 text-sm font-medium text-green-600 dark:text-green-400" :status="session('status')" />

    {{-- Main Login Card: Adjusted padding to be consistent and responsive --}}
    <div class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 sm:p-9 border border-gray-200 dark:border-gray-700">

        <div class="mb-7 text-center">
            {{-- Company Logo: Added mb-5 back for consistent spacing, adjusted overall size for better fit --}}
            <a href="/" class="inline-block mb-5">
                <img class="w-20 h-20 sm:w-24 sm:h-24 mx-auto object-contain" src="/ppma_logo.png" alt="Your Company Logo">
            </a>
            
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-white leading-tight">
                Selamat Datang Kembali
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">
                Silakan masuk ke akun Anda
            </p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email Address')" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1" />
                <x-text-input id="email" class="block mt-1 w-full p-3 border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:focus:ring-blue-600 dark:focus:border-blue-600 transition duration-150 ease-in-out" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 dark:text-red-400" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1" />
                <x-text-input id="password" class="block mt-1 w-full p-3 border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:focus:ring-blue-600 dark:focus:border-blue-600 transition duration-150 ease-in-out"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 dark:text-red-400" />
            </div>

            {{-- Removed redundant mt-4 here, it's handled by space-y-5 --}}
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-blue-600 shadow-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800 cursor-pointer" name="remember">
                    <span class="ms-2 text-sm text-gray-700 dark:text-gray-300">{{ __('Ingat saya') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 transition duration-150 ease-in-out" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi Anda?') }}
                    </a>
                @endif

                <x-primary-button class="ms-0 sm:ms-3 py-3 px-6 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-200 ease-in-out font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:scale-105">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>