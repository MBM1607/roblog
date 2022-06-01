<x-layout>
  <section class='px-6 py-8'>
    <main class='mx-auto mt-10 max-w-lg'>
      <x-panel>

        <h1 class='text-center text-xl font-bold'>Register!</h1>
        <form
          action='/register'
          method='post'
          class='mt-10'
        >
          @csrf

          <x-form.input name='name' />
          <x-form.input
            name='username'
            min='3'
          />
          <x-form.input
            name='email'
            type='email'
            min='3'
          />
          <x-form.input
            name='password'
            type='password'
            min='7'
          />

          <x-form.button>Submit</x-form.button>
        </form>
      </x-panel>
    </main>
  </section>
</x-layout>
