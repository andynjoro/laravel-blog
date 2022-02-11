@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 pt-1 border-b-2 border-red-600 text-sm font-medium leading-5 text-white focus:outline-none focus:border-red-600 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-3 pt-1 bg-slate-400 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-white hover:border-red-600 hover:bg-slate-600 focus:outline-none focus:text-white focus:border-red-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
