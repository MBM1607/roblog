<x-layout>
  <section class="px-6 py-8">
    <main class="mx-auto mt-10 max-w-6xl space-y-6 lg:mt-20">
      <article class="mx-auto max-w-4xl gap-x-10 lg:grid lg:grid-cols-12">
        <div class="col-span-4 mb-10 lg:pt-14 lg:text-center">
          <img
            src="/images/illustration-1.png"
            alt=""
            class="rounded-xl"
          >

          <p class="mt-4 block text-xs text-gray-400">
            Published
            <time>
              {{ $post->created_at->diffForHumans() }}
            </time>
          </p>

          <div class="mt-4 flex items-center text-sm lg:justify-center">
            <img
              src="/images/lary-avatar.svg"
              alt="Lary avatar"
            >
            <div class="ml-3 text-left">
              <h5 class="font-bold">
                <a href='/?author={{ $post->author->username }}'>
                  {{ $post->author->name }}
                </a>
              </h5>
            </div>
          </div>
        </div>

        <div class="col-span-8">
          <div class="mb-6 hidden justify-between lg:flex">
            <a
              href="/"
              class="relative inline-flex items-center text-lg transition-colors duration-300 hover:text-blue-500"
            >
              <svg
                width="22"
                height="22"
                viewBox="0 0 22 22"
                class="mr-2"
              >
                <g
                  fill="none"
                  fill-rule="evenodd"
                >
                  <path
                    stroke="#000"
                    stroke-opacity=".012"
                    stroke-width=".5"
                    d="M21 1v20.16H.84V1z"
                  >
                  </path>
                  <path
                    class="fill-current"
                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"
                  >
                  </path>
                </g>
              </svg>

              Back to Posts
            </a>

            <div class="space-x-2">
              <x-category-button :category="$post->category" />
            </div>
          </div>

          <h1 class="mb-10 text-3xl font-bold lg:text-4xl">
            {{ $post->title }}
          </h1>

          <div class="space-y-4 leading-loose lg:text-lg">
            {!! $post->body !!}
          </div>
        </div>

        <section class='col-span-8 col-start-5 mt-10 space-y-6'>

          <form
            action='#'
            method='post'
            class='rounded-xl border border-gray-200 p-6'
          >
            @csrf

            <header class='flex items-center'>
              <img
                src='https://i.pravatar.cc/100?u={{ auth()->id() }}'
                alt='Profile Image'
                loading='lazy'
                width='40'
                height='40'
                class='rounded-full'
              />

              <h2 class='ml-4'>Want to participate</h2>
            </header>

            <div class='mt-6'>
              <textarea
                name='body'
                cols='30'
                rows='5'
                class='text-small focs:outline-none w-full resize-none rounded-xl border border-gray-200 p-2 focus:ring'
                placeholder='Quick, think of something to say!'
></textarea>
            </div>

            <div class='mt-6 flex justify-end border-t border-gray-200 pt-5'>
              <button
                class='rounded-2xl bg-blue-500 py-2 px-10 text-xs font-semibold uppercase text-white hover:bg-blue-600'
                type='submit'
              >
                POST
              </button>
            </div>
          </form>


          @foreach ($post->comments as $comment)
            <x-post-comment :comment='$comment' />
          @endforeach
        </section>
      </article>
    </main>

    <footer
      class="mt-16 rounded-xl border border-black border-opacity-5 bg-gray-100 py-16 px-10 text-center"
    >
      <img
        src="/images/lary-newsletter-icon.svg"
        alt=""
        class="mx-auto -mb-6"
        style="width: 145px;"
      >
      <h5 class="text-3xl">Stay in touch with the latest posts</h5>
      <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>

      <div class="mt-10">
        <div class="relative mx-auto inline-block rounded-full lg:bg-gray-200">
          <form
            method="POST"
            action="#"
            class="text-sm lg:flex"
          >
            <div class="flex items-center lg:py-3 lg:px-5">
              <label
                for="email"
                class="hidden lg:inline-block"
              >
                <img
                  src="/images/mailbox-icon.svg"
                  alt="mailbox letter"
                >
              </label>

              <input
                id="email"
                type="text"
                placeholder="Your email address"
                class="pl-4 focus-within:outline-none lg:bg-transparent"
              >
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
</x-layout>
