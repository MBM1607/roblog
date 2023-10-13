@props(['post'])

<form
  action='/posts/{{ $post->slug }}/comments'
  method='post'
  class='rounded-xl border border-red-200 p-6'
>
  @csrf

  <header class='flex items-center'>
    <img
      src="https://api.dicebear.com/7.x/bottts/svg?seed={{ auth()->id() }}"
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
      class='text-small focus:outline-none w-full resize-none rounded-xl border border-red-200 p-2 focus:ring'
      placeholder='Quick, think of something to say!'
      max='2500'
      required
></textarea>

    @error('body')
      <span class='text-xs text-red-500'>
        {{ $message }}
      </span>
    @enderror
  </div>

  <div class='mt-6 flex justify-end border-t border-red-200 pt-5'>
    <x-form.button>
      Post
    </x-form.button>
  </div>
</form>
