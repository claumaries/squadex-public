@props([
    'size' => 74,
    'label' => config('app.token_name').' token logo',
    'src' => asset('v2/assets/token-logo.png'),
])

<img
    {{ $attributes->merge(['class' => 'token-logo-img']) }}
    src="{{ $src }}"
    width="{{ $size }}"
    height="{{ $size }}"
    alt="{{ $label }}"
    loading="lazy"
    decoding="async"
>
