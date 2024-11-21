<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Edit Experience') }}
                            </h2>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('experience.update', ['experience' => $experience->id]) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="role" :value="__('Role')" />
                                <x-text-input id="role" name="role" type="text" class="mt-1 block w-full" required autocomplete="role" :value="old('status', $experience->role)" />
                                <x-input-error class="mt-2" :messages="$errors->get('role')" />
                            </div>

                            <div>
                                <x-input-label for="date" :value="__('Date Started - Date Left (Present)')" />
                                <x-text-input id="date" name="date" type="text" class="mt-1 block w-full" required autocomplete="date" :value="old('status', $experience->date)" />
                                <x-input-error class="mt-2" :messages="$errors->get('date')" />
                            </div>

                            <div>
                                <x-input-label for="location" :value="__('Company | Location')" />
                                <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" required autocomplete="location" :value="old('status', $experience->location)" />
                                <x-input-error class="mt-2" :messages="$errors->get('location')" />
                            </div>

                            <div>
                                <x-input-label for="activity" :value="__('Activity')" />
                                <textarea style="background-color: rgb(17 24 39); color: #ffffff;" id="activity" name="activity" class="mt-1 block w-full" required autofocus autocomplete="activity" >{{ $experience->activity }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('activity')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Edit Experience') }}</x-primary-button>

                                @if (session('status') === 'experience-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Experience Updated!') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
