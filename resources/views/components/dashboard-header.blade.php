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

</style>

<x-slot name="header">
    <div class="display: inline-flex">

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

    </div>
</x-slot>