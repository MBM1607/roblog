<x-layout>
  <section class='mx-auto max-w-sm py-8'>
    <h1 class='mb-4 text-lg font-bold'>
      Publish New Post
    </h1>

    <x-panel>
      <form
        action='/admin/posts'
        method='post'
        class=''
        enctype='multipart/form-data'
      >
        @csrf

        <x-form.input name='title' />
        <x-form.input name='slug' />

        <x-form.input
          name='thumbnail'
          type='file'
        />

        <x-form.textarea name='excerpt' />
        <x-form.textarea name='body' />

        <div class='mb-6'>
          <x-form.label name='category' />

          <select
            name='category_id'
            id='category_id'
          >
            @foreach (\App\Models\Category::all() as $category)
              <option
                value='{{ $category->id }}'
                {{ old('category_id') == $category->id ? 'selected' : '' }}
              >
                {{ ucwords($category->name) }}
              </option>
            @endforeach
          </select>

          <x-form.error name='category' />
        </div>

        <x-form.button>Publish</x-form.button>
      </form>
    </x-panel>
  </section>
</x-layout>
