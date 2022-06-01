<div
  x-data='{ show: false }'
  @click.away='show = false'
  class='relative'
>
  {{-- Trigger --}}
  <div @click="show = ! show ">
    {{ $trigger }}
  </div>

  {{-- Links --}}
  <div
    x-show="show"
    class='absolute z-50 mt-2 max-h-52 w-full overflow-auto rounded-xl bg-gray-100 py-2'
    style="display: none;"
  >
    {{ $slot }}
  </div>
</div>
