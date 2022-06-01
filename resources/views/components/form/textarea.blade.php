@props(['name'])

<x-form.field>
  <x-form.label name='{{ $name }}' />

  <textarea
    class='w-full w-full border border-gray-400 p-2'
    name='{{ $name }}'
    id='{{ $name }}'
    max='2500'
    required
>{{ old($name) }}</textarea>

  <x-form.error name='{{ $name }}' />
</x-form.field>
