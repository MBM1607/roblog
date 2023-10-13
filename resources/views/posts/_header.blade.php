<header class="mx-auto mt-20 max-w-xl text-center">
  <h1 class="text-4xl">
    Latest
    <span class="text-orange-500 underline decoration-2">
      Roblog
    </span>
    News
  </h1>

  <div class='mt-4 space-y-2 lg:space-y-0 lg:space-x-4'>
    <!--  Category -->
    <div class="relative rounded-xl bg-red-200 lg:inline-flex">
      <x-category-dropdown />
    </div>
    <!-- Search -->
    <div class="relative flex items-center rounded-xl bg-red-200 px-3 py-2 lg:inline-flex">
      <form
        method="GET"
        action="#"
      >
        @if (request('category'))
          <input
            type='hidden'
            name='category'
            value='{{ request('category') }}'
          >
        @endif

        <input
          type="text"
          name="search"
          placeholder="Find something"
          class="bg-transparent text-sm font-semibold placeholder-black"
          value="{{ request('search') }}"
        >
      </form>
    </div>
  </div>
</header>
