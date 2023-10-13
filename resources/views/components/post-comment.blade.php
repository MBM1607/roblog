@props(['comment'])

<x-panel class='bg-red-50'>
  <article class='flex space-x-4'>
    <div class='flex-shrink-0'>
      <img
        src="https://api.dicebear.com/7.x/bottts/svg?seed={{ auth()->id() }}"
        alt='Profile Image'
        loading='lazy'
        width='60'
        class='rounded-xl'
      />
    </div>

    <div>
      <header class='mb-4'>
        <h3 class='font-bold'>
          {{ $comment->author->name }}
        </h3>

        <p class='text-xs'>
          Posted
          <time>
            {{ $comment->created_at->format('F j, Y, g:i a') }}
          </time>
        </p>
      </header>

      <p>
        {{ $comment->body }}
      </p>
    </div>
  </article>
</x-panel>
