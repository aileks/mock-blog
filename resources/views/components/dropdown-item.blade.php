@props(['active' => false])

@php
    $classes = 'block text-left text-sm px-3 leading-6 hover:bg-red-300 focus:bg-red-300 hover:text-white focus:text-white';

    if ($active) $classes .= ' bg-red-300 text-white';
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
