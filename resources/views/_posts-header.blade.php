<header class="mx-auto mt-20 max-w-xl text-center">
  <h1 class="text-4xl">
    Latest
    <span class="text-blue-500">
      Laravel From Scratch
    </span>
    News
  </h1>

  <h2 class="mt-2 inline-flex">
    By Lary Laracore
    <img
      src="/images/lary-head.svg"
      alt="Head of Lary the mascot"
    >
  </h2>

  <p class="mt-14 text-sm">
    Another year. Another update. We're refreshing the popular Laravel series with new
    content.
    I'm going to keep you guys up to speed with what's going on!
  </p>

  <div class="mt-8 space-y-2 lg:space-y-0 lg:space-x-4">
    <!--  Category -->
    <div class="relative rounded-xl bg-gray-100 lg:inline-flex">
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
            href='/categories/{{ $category->slug }}'
            :active='request()->is("categories/{$category->slug}")'
          >
            {{ $category->name }}
          </x-dropdown-item>
        @endforeach
      </x-dropdown>
    </div>

    <!-- Other Filters -->
    <div class="relative flex items-center rounded-xl bg-gray-100 lg:inline-flex">
      <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
        <option
          value="category"
          disabled
          selected
        >Other Filters
        </option>
        <option value="foo">Foo
        </option>
        <option value="bar">Bar
        </option>
      </select>

      @include('svg._down-arrow')
    </div>

    <!-- Search -->
    <div class="relative flex items-center rounded-xl bg-gray-100 px-3 py-2 lg:inline-flex">
      <form
        method="GET"
        action="#"
      >
        <input
          type="text"
          name="search"
          placeholder="Find something"
          class="bg-transparent text-sm font-semibold placeholder-black"
        >
      </form>
    </div>
  </div>
</header>
