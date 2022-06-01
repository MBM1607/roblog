<!doctype html>

<title>Laravel From Scratch Blog</title>
<link
  href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
  rel="stylesheet"
>
<link
  rel="preconnect"
  href="https://fonts.gstatic.com"
>
<link
  href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap"
  rel="stylesheet"
>
<script
src="//unpkg.com/alpinejs"
defer
></script>

<style>
  html {
    scroll-behavior: smooth;
  }

</style>

<body style="font-family: Open Sans, sans-serif">
  <section class="px-6 py-8">
    <nav class="md:flex md:items-center md:justify-between">
      <div>
        <a href="/">
          <img
            src="/images/logo.svg"
            alt="Laracasts Logo"
            width="165"
            height="16"
          >
        </a>
      </div>

      <div class='mt-8 flex items-center md:mt-0'>
        @guest
          <a
            href="/register"
            class="text-xs font-bold uppercase"
          >
            Register
          </a>

          <a
            href="/login"
            class="ml-6 text-xs font-bold uppercase"
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

            <x-dropdown-item
              href='/admin/dashboard'
              :active="request()->is('admin/dashboard')"
            >
              Dashboard
            </x-dropdown-item>
            <x-dropdown-item
              href='/admin/posts/create'
              :active="request()->is('admin/posts/create')"
            >
              New Post
            </x-dropdown-item>
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
          class="ml-3 rounded-full bg-blue-500 py-3 px-5 text-xs font-semibold uppercase text-white"
        >
          Subscribe for Updates
        </a>
      </div>
    </nav>

    {{ $slot }}

    <footer
      id='newsletter'
      class="mt-16 rounded-xl border border-black border-opacity-5 bg-gray-100 py-16 px-10 text-center"
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
        <div class="relative mx-auto inline-block rounded-full lg:bg-gray-200">

          <form
            method="POST"
            action="/newsletter"
            class="text-sm lg:flex"
          >
            @csrf

            <div class="flex items-center lg:py-3 lg:px-5">
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
                  class="py-2 pl-4 focus-within:outline-none lg:bg-transparent lg:py-0"
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
              class="mt-4 rounded-full bg-blue-500 py-3 px-8 text-xs font-semibold uppercase text-white transition-colors duration-300 hover:bg-blue-600 lg:mt-0 lg:ml-3"
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
