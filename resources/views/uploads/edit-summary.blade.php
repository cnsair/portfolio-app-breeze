<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Edit Summary') }}
                            </h2>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>
    
                        <div style="margin-top: 20px">
                            <form action="{{ route('summary.destroy', ['summary' => $summaries->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <x-danger-button onclick="return confirm('Are you sure you want to delete this record?');" class="ms-3">
                                    {{ __('Delete') }}
                                </x-danger-button>

                                @if (session('status') === 'summary-deleted')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Summary Deleted.') }}</p>
                                @endif
                            </form>
                        </div>

                        <form method="post" action="{{ route('summary.update', ['summary' => $summaries->id]) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="myname" :value="__('My Name')" />
                                <x-text-input id="myname" name="myname" type="text" class="mt-1 block w-full" required autocomplete="myname" :value="old('myname', $summaries->myname)" />
                                <x-input-error class="mt-2" :messages="$errors->get('myname')" />
                            </div>

                            <div>
                                <x-input-label for="position" :value="__('Position')" />
                                <x-text-input id="position" name="position" type="text" class="mt-1 block w-full" required autofocus autocomplete="position" :value="old('position', $summaries->position)" />
                                <x-input-error class="mt-2" :messages="$errors->get('position')" />
                            </div>

                            <div>
                                <x-input-label for="biography" :value="__('Biography')" />
                                <textarea style="background-color: rgb(17 24 39); color: #ffffff;" id="biography" name="biography" type="text" class="mt-1 block w-full" required autofocus autocomplete="biography" :value="" >{{ $summaries->biography }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('biography')" />
                            </div>

                            <div>
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" required autocomplete="address" :value="old('address', $summaries->address)" />
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <div>
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" required autocomplete="phone" :value="old('phone', $summaries->phone)" />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" required autocomplete="email" :value="old('email', $summaries->email)" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Update Summary') }}</x-primary-button>

                                @if (session('status') === 'summary-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Summary Updated.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
