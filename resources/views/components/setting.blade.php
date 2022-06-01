@props(['heading'])

<section class='mx-auto max-w-4xl py-8'>
  <h1 class='border-bottom mb-8 pb-2 text-lg font-bold'>
    {{ $heading }}
  </h1>


  <div class='flex'>
    <aside class='w-48'>
      <h4 class='mb-6 font-semibold'>Links</h4>

      <ul>
        <li>
          <a
            href='/admin/dashboard'
            class="{{ request()->is('/admin/dashboard') ? 'text-blue-500' : '' }}"
          >
            Dashboard
          </a>
        </li>
        <li>
          <a
            href='/admin/posts/create'
            class="{{ request()->is('/admin/posts/create') ? 'text-blue-500' : '' }}"
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
