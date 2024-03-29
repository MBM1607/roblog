<x-layout>
  <x-setting heading='Publish new Post'>
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
          class="bg-white rounded-full px-2 py-1"
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
  </x-setting>

</x-layout>
