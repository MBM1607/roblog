@props(['category'])

<a
  href="/?category={{ $category->slug }}"
  class="rounded-full border border-red-600 px-3 py-1 text-xs font-bold uppercase text-red-600"
  style="font-size: 10px"
>
  {{ $category->name }}
</a>
