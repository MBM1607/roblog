@props(['name'])

<x-form.field>
  <x-form.label name='{{ $name }}' />

  <input
    class='w-full rounded border border-red-200 p-2'
    name='{{ $name }}'
    id='{{ $name }}'
    required
    max='255'
    {{ $attributes(['value' => old($name), 'max' => '255']) }}
  />

  <x-form.error name='{{ $name }}' />
</x-form.field>
