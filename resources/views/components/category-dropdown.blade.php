<x-dropdown>
  <x-slot name='trigger'>
    <button class='inline-flex w-full py-2 pl-3 pr-9 text-left text-sm font-semibold lg:w-32'>
      {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

      @include('svg._down-arrow')
    </button>
  </x-slot>

  <x-dropdown-item
    href='/'
    :active="request()->routeIs('home')"
  >
    All
  </x-dropdown-item>

  @foreach ($categories as $category)
    <x-dropdown-item
      href='/?category={{ $category->slug }}'
      :active='request()->is("categories/{$category->slug}")'
    >
      {{ $category->name }}
    </x-dropdown-item>
  @endforeach
</x-dropdown>
