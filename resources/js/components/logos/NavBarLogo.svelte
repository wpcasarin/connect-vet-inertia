<script>
  import FaPaw from 'svelte-icons/fa/FaPaw.svelte';
  import { inertia, page } from '@inertiajs/inertia-svelte';
</script>

<div
  class={`flex flex-shrink-0  items-center  ${
    $page.url !== '/' && 'cursor-pointer transition-all hover:scale-105'
  }`}
  use:inertia={{ href: '/' }}>
  <div class="block aspect-square h-9 text-primary lg:hidden">
    <FaPaw />
  </div>
  <div
    class="hidden h-8 w-auto justify-center align-middle text-primary lg:flex">
    <FaPaw />
    <span class="ml-3 text-2xl font-bold text-white">ConnectVet</span>
  </div>
</div>

<style>
  /* your styles go here */
</style>
