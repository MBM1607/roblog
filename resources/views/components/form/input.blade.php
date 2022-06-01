@props(['name', 'type' => 'text'])

<x-form.field>
  <x-form.label name='{{ $name }}' />

  <input
    class='w-full border border-gray-400 p-2'
    type='{{ $type }}'
    name='{{ $name }}'
    id='{{ $name }}'
    max='255'
    min='5'
    required
    value="{{ old($name) }}"
  />

  <x-form.error name='{{ $name }}' />
</x-form.field>
