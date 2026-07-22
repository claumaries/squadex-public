@php
    $formattedPrice = is_numeric($price ?? null)
        ? \Illuminate\Support\Number::format((float) $price, maxPrecision: 2, locale: str_replace('_', '-', app()->getLocale()))
        : ($price ?? '');
@endphp

{{ $formattedPrice }}
