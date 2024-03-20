@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-600 hover:text-gray-900 dark:text-gray-400'
            : 'text-gray-600 hover:text-gray-900 dark:text-gray-400';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
