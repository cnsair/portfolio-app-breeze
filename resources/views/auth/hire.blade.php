<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('hire.store') }}">
        @csrf

        <!-- Full Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Full name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" placeholder="e.g., Chisom Samson Nwachukwu" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email (Optional)')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus autocomplete="username" placeholder="e.g., info@chisomsamson.me" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Message-->
        <div class="mt-4">
            <x-input-label for="message" :value="__('Enter Message')" />
            <textarea id="message" style="background-color: rgb(17 24 39); color: #ffffff;"  class="block mt-1 w-full" name="message" :value="old('message')" required autofocus placeholder="500 characters max" autocomplete="message"></textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>


        <!-- Footer -->
        <div class="flex items-center justify-end mt-4">

            <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('homepage') }}">
                {{ __('Home') }}
            </a> 

            <x-primary-button class="ms-3">
                {{ __('Send Message') }}
            </x-primary-button>

            @if (session('status') === 'message-sent')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 4000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Message Sent! I\'ll get back to you shortly.') }}</p>
            @elseif (session('status') === 'message-failed')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 4000)"
                    class="text-sm text-red-600 dark:text-red-300"
                >{{ __('Something went wrong! Please try again.') }}</p>
            @endif
        </div>
    </form>
</x-guest-layout>
