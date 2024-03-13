@props(['active','type'])

@php
$classes = ($active ?? false)
            ?'':''

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
