<style>
    a.pass:hover{
        color: #f8e694;
    }

    .space{
        padding: 0px 20px 0px 20px;
    }

    b.f-color{
        /* color: green !important; */
        color:#f8e694;
        /* color: #8af742 !important; */
    }
    .green{
        color: greenyellow;
    }
    a.green:hover{
        color: #8af742;
    }

    .oneline{
        display: inline-flex !important;
    }

    .padn{
        padding: 1%;
    }

</style>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- p-6 sm:p-8 -->
                      
                <div class="oneline padn text-gray-900 dark:text-gray-100">
                    <div class="max-w-xl f-color">
                        <ul> <h2>Testimonies</h2>
                            @forelse ($testimony_section as $testimony)
                                <div style="padding: 2%">
                                    <li>
                                        <b class="f-color">Name:</b>
                                        <h3>{{ $testimony->name }}</h3>
                                    </li>
                                    <li>
                                        <b class="f-color">Company, Position:</b>
                                        <h3>{{ $testimony->comp_position }}</h3>
                                    </li>
                                    <li>
                                        <b class="f-color">Email:</b>
                                        <h3>{{ $testimony->email ?? "Email not included" }}</h3>
                                    </li>
                                    <li>
                                        <b class="f-color">Message:</b>
                                        <h3>{{ $testimony->message }}</h3>
                                    </li>
                            
                                    <div class="mt-4">

                                        <div class="oneline">
   
                                            <form method="POST" action="{{ route('testimony.approved', ['testimony' => $testimony->id]) }}" >
                                                @csrf
                                                @method('PUT')

                                                <x-primary-button type="submit" class="btn">
                                                    {{ $testimony->approved ? 'Approved' : 'Not Approved' }}
                                                </x-primary-button>

                                                @if (session('status') === 'done')
                                                    <p
                                                        x-data="{ show: true }"
                                                        x-show="show"
                                                        x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-sm text-gray-600 dark:text-gray-400"
                                                    >{{ __('Toggled!') }}</p>
                                                @endif
                                            </form>
                                        </div>
    
                                        <div class="oneline">
                                            <form action="{{ route('testimony.destroy', ['testimony' => $testimony->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <x-danger-button onclick="return confirm('Are you sure you want to delete this record?');" class="ms-3">
                                                    {{ __('Delete') }}
                                                </x-danger-button>

                                                @if (session('status') === 'testimony-deleted')
                                                    <p
                                                        x-data="{ show: true }"
                                                        x-show="show"
                                                        x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-sm text-gray-600 dark:text-gray-400"
                                                    >{{ __('Testimony Deleted.') }}</p>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>Nothing to display</p>
                            @endforelse
                        </ul>
                    </div>
                </div><!-- Oneline padn -->



                <div class="oneline padn text-gray-900 dark:text-gray-100">
                    <div class="max-w-xl f-color">
                        <ul> <h2>Hire & Feedbacks</h2>
                            @forelse ($hire_section as $hire)
                                <div style="padding: 2%">
                                    <li>
                                        <b class="f-color">Name:</b>
                                        <h3>{{ $hire->name }}</h3>
                                    </li>
                                    <li>
                                        <b class="f-color">Email:</b>
                                        <h3>{{ $hire->email ?? "Email not included" }}</h3>
                                    </li>
                                    <li>
                                        <b class="f-color">Message:</b>
                                        <h3>{{ $hire->message }}</h3>
                                    </li>
                            
                                    <div class="mt-4">
    
                                        <div class="oneline">
                                            <form action="{{ route('hire.destroy', ['hire' => $hire->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <x-danger-button onclick="return confirm('Are you sure you want to delete this record?');" class="ms-3">
                                                    {{ __('Delete') }}
                                                </x-danger-button>

                                                @if (session('status') === 'hire-deleted')
                                                    <p
                                                        x-data="{ show: true }"
                                                        x-show="show"
                                                        x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-sm text-gray-600 dark:text-gray-400"
                                                    >{{ __('Hire Deleted.') }}</p>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>Nothing to display</p>
                            @endforelse
                        </ul>
                    </div>
                </div><!-- Oneline padn -->





            </div>
        </div>
    </div>





</x-app-layout>
