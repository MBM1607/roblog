<x-layout>
  @include('posts._header')

  <main class="mx-auto mt-6 max-w-6xl space-y-6">
    <x-posts-grid :posts="$posts" />

    {{ $posts->links() }}
  </main>
</x-layout>
