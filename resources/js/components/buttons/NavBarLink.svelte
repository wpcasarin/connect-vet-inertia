<script>
  import { inertia, page } from '@inertiajs/inertia-svelte';
  // props
  export let text = 'Link';
  export let to = '/';
  export let method = 'get';
</script>

<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<li class="flex justify-center align-middle">
  {#if $page.url === to}
    <button
      class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium capitalize text-white hover:bg-gray-700 hover:text-white"
      use:inertia={{ href: to, method: method }}>
      {text}
    </button>
  {:else}
    <button
      class="capitalize rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
      use:inertia={{ href: to, method: method }}>
      {text}
    </button>
  {/if}
</li>

<style>
  /* your styles go here */
</style>
