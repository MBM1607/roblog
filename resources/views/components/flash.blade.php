@if (session()->has('success'))
  <div
    x-data='{ show: true }'
    x-init='setTimeout(() => show = false, 4000)'
    x-show='show'
    class='fixed bottom-3 right-3 rounded-xl bg-orange-500 py-2 px-4 text-white'
  >
    <p>
      {{ session('success') }}
    </p>
  </div>
@endif
