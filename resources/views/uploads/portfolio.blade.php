<x-app-layout>

    @php
        $active = route('portfolio');
    @endphp
    
    <x-dashboard-header :active="$active"></x-dashboard-header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Portfolio') }}
                            </h2>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('portfolio.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                            @csrf


                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"  required autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="web_address" :value="__('Web Address')" />
                                <x-text-input id="web_address" name="web_address" type="text" :value="old('web_address')" class="mt-1 block w-full" autocomplete="web_address" />
                                <x-input-error class="mt-2" :messages="$errors->get('web_address')" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea style="background-color: rgb(17 24 39); color: #ffffff;" id="description" name="description" class="mt-1 block w-full" autofocus autocomplete="description">{{ old('description')}}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <div>
                                <x-input-label for="project" :value="__('Project')" />
                                <select style="background-color: rgb(17 24 39); color: #ffffff;" name="project" required>
                                    <option value="web">Web Application</option>
                                    <option value="graphics">Graphics</option>
                                    <option value="others">Others</option>                                
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('project')" />
                            </div>

                            <div>
                                <x-input-label for="file" :value="__('File')" />
                                <x-text-input id="file" name="file" type="file" class="mt-1 block w-full" required autocomplete="file" />
                                <x-input-error class="mt-2" :messages="$errors->get('file')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Upload') }}</x-primary-button>

                                @if (session('status') === 'portfolio-added')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 4000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Portfolio Uploaded.') }}</p>
                                @elseif (session('status') === 'portfolio-denied')
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
