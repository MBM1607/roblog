<x-layout>
  <x-setting heading="Manage Posts">
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
          <div class="overflow-hidden border-b border-red-200 shadow sm:rounded-lg">
            <table class="min-w-full divide-y divide-red-200">
              <tbody class="divide-y divide-red-200 bg-orange-50">
                @foreach ($posts as $post)
                  <tr>
                    <td class="whitespace-nowrap px-6 py-4">
                      <div class="flex items-center">
                        <div class="text-sm font-medium text-red-900">
                          <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                          </a>
                        </div>
                      </div>
                    </td>

                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                      <a
                        href="/admin/posts/{{ $post->id }}/edit"
                        class="text-orange-500 hover:text-orange-600"
                      >Edit</a>
                    </td>

                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                      <form
                        method="POST"
                        action="/admin/posts/{{ $post->id }}"
                      >
                        @csrf
                        @method('DELETE')

                        <button class="text-xs text-red-400">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </x-setting>
</x-layout>
