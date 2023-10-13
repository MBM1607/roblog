@props(['heading'])

<section class='mx-auto max-w-4xl py-8'>
  <h1 class='border-bottom mb-8 pb-2 text-lg font-bold'>
    {{ $heading }}
  </h1>


  <div class='flex'>
    <aside class='w-48 flex-shrink-0'>
      <h4 class='mb-6 font-semibold'>Links</h4>

      <ul>
        <li>
          <a
            href='/admin/posts'
            class="{{ request()->is('admin/posts') ? 'text-orange-500 underline decoration-2' : '' }}"
          >
            All Posts
          </a>
        </li>
        <li>
          <a
            href='/admin/posts/create'
            class="{{ request()->is('admin/posts/create') ? 'text-orange-500 underline decoration-2' : '' }}"
          >
            New Post
          </a>
        </li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </aside>

    <main class='flex-1'>
      <x-panel>
        {{ $slot }}
      </x-panel>
    </main>
  </div>
</section>
