@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'input-glow w-full']) }}>
