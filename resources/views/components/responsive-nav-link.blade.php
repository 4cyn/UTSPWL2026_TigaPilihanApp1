@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#ff941d] text-start text-base font-medium text-[#ff941d] bg-[#fff3e6] focus:outline-none focus:text-[#cc7700] focus:bg-[#ffe0b3] focus:border-[#ff941d] transition duration-150 ease-in-out'
    : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-200 hover:text-gray-800 hover:bg-[#fff3e6] hover:border-[#ff941d] focus:outline-none focus:text-gray-800 focus:bg-[#fff3e6] focus:border-[#ff941d] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
