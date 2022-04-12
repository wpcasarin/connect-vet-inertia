<script>
  import { inertia } from '@inertiajs/inertia-svelte';
</script>

<section
  class="container mx-auto flex flex-grow flex-col items-center justify-center lg:flex-row">
  <main class="my-auto h-fit max-w-2xl px-2 pb-0 sm:px-4 lg:pb-40">
    <div class="sm:text-center lg:text-left">
      <h1
        class="text-4xl font-extrabold tracking-tight text-neutral sm:text-5xl md:text-6xl">
        <span class="block xl:inline">Data to enrich your</span>
        <span class="block text-primary-focus xl:inline">best friend life</span>
      </h1>
      <p
        class="mt-3 text-base text-gray-500 sm:mx-auto sm:mt-5 sm:max-w-xl sm:text-lg md:mt-5 md:text-xl lg:mx-0">
        Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem
        cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.
      </p>
      <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
        <div class="rounded-md shadow">
          <a
            href="/register"
            class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 md:py-4 md:px-10 md:text-lg"
            use:inertia>
            Get started
          </a>
        </div>
        <div class="mt-3 sm:mt-0 sm:ml-3">
          <a
            href="/about"
            class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-100 px-8 py-3 text-base font-medium text-indigo-700 hover:bg-indigo-200 md:py-4 md:px-10 md:text-lg">
            Learn more
          </a>
        </div>
      </div>
    </div>
  </main>
  <img
    src="assets/hero_illustration.svg"
    alt="Man looking to a cat"
    class="mx-auto max-w-xs sm:max-w-sm md:max-w-lg xl:max-w-3xl" />
</section>

<style>
  /* your styles go here */
</style>
