<x-layout>
  <div class='px-6 py-8'>
    <x-panel class='mx-auto max-w-sm'>
      <form
        action='/admin/posts'
        method='post'
        class=''
      >
        @csrf

        <div class='mb-6'>
          <label
            class='mb-2 block text-xs font-bold uppercase text-gray-700'
            for='title'
          >
            Title
          </label>

          <input
            class='w-full border border-gray-400 p-2'
            type='text'
            name='title'
            id='title'
            max='255'
            min='5'
            required
            value="{{ old('title') }}"
          />

          @error('title')
            <p class='mt-1 text-xs text-red-500'>
              {{ $message }}
            </p>
          @enderror
        </div>

        <div class='mb-6'>
          <label
            class='mb-2 block text-xs font-bold uppercase text-gray-700'
            for='slug'
          >
            Slug
          </label>

          <input
            class='w-full border border-gray-400 p-2'
            type='text'
            name='slug'
            id='slug'
            max='255'
            min='5'
            required
            value="{{ old('slug') }}"
          />

          @error('slug')
            <p class='mt-1 text-xs text-red-500'>
              {{ $message }}
            </p>
          @enderror
        </div>

        <div class='mb-6'>
          <label
            class='mb-2 block text-xs font-bold uppercase text-gray-700'
            for='excerpt'
          >
            Excerpt
          </label>

          <textarea
            class='w-full w-full border border-gray-400 p-2'
            name='excerpt'
            id='excerpt'
            max='2500'
            required
>{{ old('excerpt') }}</textarea>

          @error('excerpt')
            <p class='mt-1 text-xs text-red-500'>
              {{ $message }}
            </p>
          @enderror
        </div>

        <div class='mb-6'>
          <label
            class='mb-2 block text-xs font-bold uppercase text-gray-700'
            for='body'
          >
            Body
          </label>

          <textarea
            class='w-full w-full border border-gray-400 p-2'
            name='body'
            id='body'
            max='50000'
            required
>{{ old('body') }}</textarea>

          @error('body')
            <p class='mt-1 text-xs text-red-500'>
              {{ $message }}
            </p>
          @enderror
        </div>

        <div class='mb-6'>
          <label
            class='mb-2 block text-xs font-bold uppercase text-gray-700'
            for='category_id'
          >
            Category
          </label>


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

          @error('category')
            <p class='mt-1 text-xs text-red-500'>
              {{ $message }}
            </p>
          @enderror
        </div>

        <x-submit-button>Publish</x-submit-button>
      </form>
    </x-panel>
  </div>
</x-layout>
