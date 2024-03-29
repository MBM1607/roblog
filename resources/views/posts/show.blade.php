<x-layout>
  <section class="px-6 py-8">
    <main class="mx-auto mt-10 max-w-6xl space-y-6 lg:mt-20">
      <article class="mx-auto max-w-4xl gap-x-10 lg:grid lg:grid-cols-12">
        <div class="col-span-4 mb-10 lg:pt-14 lg:text-center">
          <img
            {{-- src="{{ asset('storage/' . $post->thumbnail) }}" --}}
            src="https://picsum.photos/seed/{{ $post->id }}/512/400"
            alt="Blog Post illustration"
            class="rounded-xl"
            loading="lazy"
          >

          <p class="mt-4 block text-xs text-red-400">
            Published
            <time>
              {{ $post->created_at->diffForHumans() }}
            </time>
          </p>

          <div class="mt-4 flex items-center text-sm lg:justify-center">
            <img
              src="https://api.dicebear.com/7.x/bottts/svg?seed={{ $post->author->id }}"
              alt="Profile Image"
              loading="lazy"
              width="56"
            />
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
              class="relative inline-flex items-center text-lg transition-colors duration-300 hover:text-orange-600 border-orange-600 border rounded-full text-orange-600 px-2 hover:bg-orange-600 hover:text-white"
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

          @auth
            <x-post-comment-form :post='$post' />
          @else
            <p class='font-semibold'>
              <a
                class='hover:underline'
                href='/register'
              >
                Register
              </a>
              or
              <a
                href='/login'
                class='hover:underline'
              >
                Log In
              </a>
              to leave a comment!
            </p>
          @endauth

          @foreach ($post->comments as $comment)
            <x-post-comment :comment='$comment' />
          @endforeach
        </section>
      </article>
    </main>
  </section>
</x-layout>
