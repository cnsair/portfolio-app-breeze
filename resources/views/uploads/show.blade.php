<style>
    .header-space{
        margin-left: 10em;
    }

    .one-line{
        display: block;
    }

    a.pass:hover{
        color: #f8e694;
    }

    .space{
        padding: 0px 20px 0px 20px;
    }

    .sp-margin{
        margin-bottom: 40px;
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
</style>

<x-app-layout>

    @php
        $active = route('show');
    @endphp

    <x-dashboard-header :active="$active"></x-dashboard-header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">
                    <div class="max-w-xl f-color">
                        <ul>
                            @forelse ($summary_section as $summary)
                                <div style="padding: 2%">
                                    <li>
                                        <b class="f-color">Name:</b>
                                        <h3 name="name">{{ $summary->myname }}</h3>
                                    </li>
                                    <li>
                                        <b class="f-color">Biography:</b>
                                        <h3 name="name">{{ $summary->biography }}</h3>
                                    </li>
                                    <li>
                                        <b class="f-color">Address:</b>
                                        <h3 name="name">{{ $summary->address }}</h3>
                                    </li>
                                    <li>
                                        <b class="f-color">Phone:</b>
                                        <h3 name="name">{{ $summary->phone }}</h3>
                                    </li>
                                    <li>
                                        <b class="f-color">Email:</b>
                                        <h3 name="name">{{ $summary->email }}</h3>
                                    </li>  
                            
                                    <div style="margin-top: 1%">
                                        <a class="green" href="{{ route('edit-summary', ['summary' => $summary->id]) }}">Edit </a>
                                        <a class="green" href="">Delete</a>
                                    </div>
                                </div>
                            @empty
                                <p>Nothing to display</p>
                            @endforelse
                        </ul>
                                
                    </div>
                </div>

                <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">
                    <div class="max-w-xl">
                        @forelse ($education_section as $education)
                            <h2>{{ $education->course }}</h2>
                        @empty
                            <p>Nothing to display</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>