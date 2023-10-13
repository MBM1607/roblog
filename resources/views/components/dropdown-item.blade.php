@props(['active' => false])

@php
$classes = 'block bg-red-100 px-3 text-left text-sm leading-6 hover:bg-red-500 hover:text-white focus:bg-red-500 focus:text-white';

if ($active) {
    $classes .= ' bg-red-500 text-white';
}
@endphp

<a {{ $attributes(['class' => $classes]) }}>
  {{ $slot }}
</a>
