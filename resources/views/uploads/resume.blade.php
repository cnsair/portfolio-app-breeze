<x-app-layout>

    @php
        $active = route('resume');
    @endphp
    
    <x-dashboard-header :active="$active"></x-dashboard-header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Resume Upload') }}
                            </h2>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('resume.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                            @csrf


                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autocomplete="title" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="file" :value="__('File')" />
                                <x-text-input id="file" name="file" type="file" class="mt-1 block w-full" required autocomplete="file" />
                                <x-input-error class="mt-2" :messages="$errors->get('file')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Upload Resume') }}</x-primary-button>

                                @if (session('status') === 'resume-added')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 4000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Resume Uploaded.') }}</p>
                                @elseif (session('status') === 'resume-denied')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 4000)"
                                        class="text-sm text-red-600 dark:text-red-300"
                                    >{{ __('Something went wrong!') }}</p>
                                @endif

                            </div>
                        </form>
                    </section>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
