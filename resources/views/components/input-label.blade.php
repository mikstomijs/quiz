@props(['value'])

<label {{ $attributes->merge(['class' => 'label-text block']) }}>
    {{ $value ?? $slot }}
</label>
