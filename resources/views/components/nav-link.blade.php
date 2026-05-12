@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#00e5ff] text-sm font-medium leading-5 text-[#00e5ff] focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#8892a4] hover:text-[#00e5ff] hover:border-[#00e5ff] focus:outline-none focus:text-[#00e5ff] focus:border-[#00e5ff] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
