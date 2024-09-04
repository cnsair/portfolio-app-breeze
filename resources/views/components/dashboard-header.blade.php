@props(['active'])

<style>

    a.pass:hover{
        color: #f8e694;
    }
    .space{
        padding: 0px 20px 0px 20px;
    }

    .active{
        color: #8af742 !important;
    }
    .box {
        /* inline-size: 150px; */
        overflow-wrap: break-word;
        word-wrap: break-word;
    }

</style>

<x-slot name="header" class="inline-flex flex-auto sm:flex sm:items-center sm:ms-6 box">
    <div>

        <a class="{{ $active === route('summary') ? 'active' : "" }}
            font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pass" 
            href="{{ route('summary') }}" 
        >Summary</a>

        <a class="{{ $active === route('education') ? 'active' : "" }}
            space font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pass" 
            href="{{ route('education') }}" 
        >Education</a>

        <a class="{{ $active === route('experience') ? 'active' : "" }}
            space font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pass" 
            href="{{ route('experience') }}" 
        >Experience</a>

        <a class="{{ $active === route('portfolio') ? 'active' : "" }}
            space font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pass" 
            href="{{ route('portfolio') }}" 
        >Portfolio</a>

        <a class="{{ $active === route('resume') ? 'active' : "" }}
            space font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pass" 
            href="{{ route('resume') }}" 
        >Resume</a>

        <a class="{{ $active === route('show') ? 'active' : "" }}
            space font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pass" 
            href="{{ route('show') }}" 
        >Show Posts</a>

    </div>
</x-slot>