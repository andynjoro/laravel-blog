@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-red-600 text-base font-medium text-white'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white hover:border-red-600 hover:bg-slate-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
