<div
  x-data='{ show: false }'
  @click.away='show = false'
>
  {{-- Trigger --}}
  <div @click="show = ! show ">
    {{ $trigger }}
  </div>

  {{-- Links --}}
  <div
    x-show="show"
    class='absolute mt-2 w-full rounded-xl bg-gray-100 py-2'
    style="display: none;"
  >
    {{ $slot }}
  </div>
</div>
