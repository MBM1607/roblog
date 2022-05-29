<x-layout>
  {{-- @foreach ($posts as $post)
    <article>
      <h1>
        <a href='/post/{{ $post->slug; }}'>
          {{  $post->title }}
        </a>
      </h1>

      <p>
        By
        <a href='/authors/{{ $post->author->username }}'>
          {{ $post->author->name }}
        </a>
        in
        <a href='/categories/{{ $post->category->slug }}'>
          {{ $post->category->name }}
        </a>
      </p>

      {{ $post->excerpt }}
    </article>
  @endforeach --}}

  @include('_posts-header')

  <main class="mx-auto mt-6 max-w-6xl space-y-6">
    <x-posts-grid :posts="$posts" />
  </main>
</x-layout>
