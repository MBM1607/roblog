@props(['post'])

<article
  class="rounded-xl border border-black border-opacity-5 transition-colors duration-300 hover:bg-red-100"
>
  <div class="py-6 px-5 lg:flex">
    <div class="flex-1 lg:mr-8">
      <img
        {{-- src="{{ asset('storage/' . $post->thumbnail) }}" --}}
        src="https://picsum.photos/seed/{{ $post->id }}/512/400"
        alt="Blog Post illustration"
        class="rounded-xl"
      >
    </div>

    <div class="flex flex-1 flex-col justify-between">
      <header class="mt-8 lg:mt-0">
        <div class="space-x-2">
          <x-category-button :category="$post->category" />
        </div>

        <div class="mt-4">
          <h1 class="text-3xl">
            <a href='/posts/{{ $post->slug }}'>
              {{ $post->title }}
            </a>
          </h1>

          <span class="mt-2 block text-xs text-red-400">
            Published
            <time>
              {{ $post->created_at->diffForHumans() }}
            </time>
          </span>
        </div>
      </header>

      <div class='mt-2 space-y-4 text-sm'>
        {!! $post->excerpt !!}
      </div>

      <footer class="mt-8 flex items-center justify-between">
        <div class="flex items-center text-sm">
          <img
              src="https://api.dicebear.com/7.x/bottts/svg?seed={{ $post->author->id }}"
              alt="avatar"
              loading="lazy"
              width="56"
            />
          <div class="ml-3">
            <h5 class="font-bold">
              <a href='/?author={{ $post->author->username }}'>
                {{ $post->author->name }}
              </a>
            </h5>
          </div>
        </div>

        <div class="hidden lg:block">
          <a
            href="/posts/{{ $post->slug }}"
            class="rounded-full bg-red-300 py-2 px-2 lg:px-8 text-xs font-semibold transition-colors duration-300 hover:bg-red-500"
          >Read More</a>
        </div>
      </footer>
    </div>
    </d>
</article>
