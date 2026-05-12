@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#00e5ff] text-start text-base font-medium text-[#00e5ff] bg-[#1a1a2e] focus:outline-none focus:text-[#ffffff] focus:bg-[#1a1a2e] focus:border-[#00e5ff] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-[#8892a4] hover:text-[#00e5ff] hover:bg-[#1a1a2e] hover:border-[#00e5ff] focus:outline-none focus:text-[#00e5ff] focus:bg-[#1a1a2e] focus:border-[#00e5ff] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
