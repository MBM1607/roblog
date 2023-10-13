<!doctype html>

<title>Roblog</title>
<meta
  name='viewport'
  content='width=device-width, initial-scale=1.0, minimum-scale=1.0'
/>
<meta
  name='theme-color'
  content='#FF8400'
/>
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600;700&display=swap" rel="stylesheet">
<script
src="//unpkg.com/alpinejs"
defer
></script>

<style>
  html {
    scroll-behavior: smooth;
  }

</style>

<body style="font-family: 'Roboto Slab', serif;" class="bg-orange-100">
  <section class="px-6 py-8">
    <nav class="md:flex md:items-center md:justify-between">
      <div>
        <a href="/">
          <img
            src="/images/logo.svg"
            alt="Roblog Logo"
            width="165"
          >
        </a>
      </div>

      <div class='mt-8 flex items-center md:mt-0'>
        @guest
          <a
            href="/register"
            class="ml-3 rounded-full border border-orange-500 py-3 px-5 text-xs font-bold uppercase text-orange-500"
          >
            Register
          </a>

          <a
            href="/login"
            class="ml-3 rounded-full border border-orange-500 py-3 px-5 text-xs font-bold uppercase text-orange-500"
          >
            Log In
          </a>
        @else
          <x-dropdown>
            <x-slot name='trigger'>
              <button class="text-xs font-bold uppercase">
                Welcome, {{ auth()->user()->name }}
              </button>
            </x-slot>

            @admin
              <x-dropdown-item
                href='/admin/posts'
                :active="request()->is('admin/posts')"
              >
                All Posts
              </x-dropdown-item>
              <x-dropdown-item
                href='/admin/posts/create'
                :active="request()->is('admin/posts/create')"
              >
                New Post
              </x-dropdown-item>
            @endadmin

            <x-dropdown-item
              href='#'
              x-data='{}'
              @click.prevent="document.querySelector('#logout-form').submit();"
            >
              Logout
            </x-dropdown-item>
          </x-dropdown>

          <form
            id='logout-form'
            action='/logout'
            method='post'
            class='hidden'
          >
            @csrf
          </form>
        @endguest


        <a
          href="#newsletter"
          class="ml-3 rounded-full bg-orange-500 py-3 px-5 text-xs font-semibold uppercase text-white"
        >
          Subscribe for Updates
        </a>
      </div>
    </nav>

    {{ $slot }}

    <footer
      id='newsletter'
      class="mt-16 rounded-xl border border-black border-opacity-5 bg-red-100 py-16 px-10 text-center"
    >
      <img
        src="/images/lary-newsletter-icon.svg"
        alt=""
        class="mx-auto -mb-6"
        width='145'
        loading='lazy'
      >
      <h5 class="text-3xl">
        Stay in touch with the latest posts
      </h5>
      <p class="mt-3 text-sm">
        Promise to keep the inbox clean. No bugs.
      </p>

      <div class="mt-10">
        <div class="relative mx-auto inline-block rounded-full lg:bg-red-100">

          <form
            method="POST"
            action="/newsletter"
            class="text-sm lg:flex"
          >
            @csrf

            <div class="flex items-center lg:py-3 lg:px-5 border border-orange-500 rounded-full">
              <label
                for="email"
                class="hidden lg:inline-block"
              >
                <img
                  src="/images/mailbox-icon.svg"
                  alt="mailbox letter"
                  loading='lazy'
                >
              </label>

              <div>
                <input
                  id="email"
                  name="email"
                  type="email"
                  placeholder="Your email address"
                  class="py-2 pl-4 focus-within:outline-none bg-red-100 rounded-full lg:bg-transparent lg:py-0 text-orange-600 placeholder-slate-500 font-semibold"
                />

                @error('email')
                  <span class='text-xs text-red-500'>
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <button
              type="submit"
              class="mt-4 rounded-full bg-orange-500 py-3 px-8 text-xs font-semibold uppercase text-white transition-colors duration-300 hover:bg-orange-600 lg:mt-0 lg:ml-3"
            >
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </footer>
  </section>

  <x-flash />
</body>
