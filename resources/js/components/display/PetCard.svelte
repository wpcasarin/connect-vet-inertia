<script>
  // local imports
  import PetAvatar from './PetAvatar.svelte';
  import PetCardTag from './PetCardTag.svelte';
</script>

<article
  class="flex items-center justify-center rounded-md bg-neutral p-8 text-base-100 shadow-md sm:p-10 lg:p-4 2xl:p-6">
  <div class="flex flex-grow flex-col gap-4 sm:grid sm:grid-cols-12">
    <div class="col-span-3 grid justify-items-center">
      <PetAvatar />
    </div>
    <div class="col-span-5 grid content-center sm:col-span-4">
      <h2 class="mb-3 truncate text-3xl font-bold xl:text-2xl 2xl:text-3xl">
        Mocinha
      </h2>
      <p class="text-lg text-gray-400">Specie</p>
    </div>
    <div class="col-span-4 grid content-center gap-3 sm:col-span-5">
      <PetCardTag />
      <PetCardTag />
    </div>
  </div>
</article>

<style>
  /* your styles go here */
  article {
    min-width: 240px;
    min-height: 160px;
  }
</style>
