<style>
    .header-space{
        margin-left: 10em;
    }

    /* Dropdown Button */
    .dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 12px;
    font-size: 14px;
    border: none;
    /* border-radius: 10%; */
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
    position: relative;
    display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
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

</style>

<x-app-layout>
    <x-slot name="header">
        <div style="display: inline-flex;">
            <h2 class="one-line font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <div class="dropdown header-space one-line">
                <button class="dropbtn">Add Stuffs</button>
                <div class="dropdown-content">
                    <a href="{{ route('summary') }}">Summary</a>
                    <a href="{{ route('education') }}">Education</a>
                    <a href="{{ route('experience')}}">Experience</a>
                    <a href="{{ route('portfolio') }}">Portfolio</a>
                </div>
            </div>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @forelse ($education as $edu)
                        <h2>{{ $edu->course }}</h2>
                    @empty
                        <p>Nothing to display</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-app-layout>