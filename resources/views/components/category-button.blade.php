@props(['category'])

<a
  href="/?category={{ $category->slug }}"
  class="rounded-full border border-red-300 px-3 py-1 text-xs font-semibold uppercase text-red-300"
  style="font-size: 10px"
>
  {{ $category->name }}
</a>
