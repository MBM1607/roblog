@props(['name'])

<x-form.field>
  <x-form.label name='{{ $name }}' />

  <input
    class='w-full rounded border border-gray-200 p-2'
    name='{{ $name }}'
    id='{{ $name }}'
    required
    max='255'
    value="{{ old($name) }}"
    {{ $attributes }}
  />

  <x-form.error name='{{ $name }}' />
</x-form.field>
