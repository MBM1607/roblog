@props(['name'])

<label
  class='mb-2 block text-xs font-bold uppercase text-red-700'
  for='{{ $name }}'
>
  {{ ucwords($name) }}
</label>
