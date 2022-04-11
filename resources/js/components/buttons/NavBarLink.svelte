<script>
  import { inertia, page } from '@inertiajs/inertia-svelte';
  // props
  export let text = 'Link';
  export let to = '/';
  export let method = 'get';
  export let accent = false;
</script>

<!-- Current: "bg-gray-900 ", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<li class="flex justify-center align-middle">
  {#if accent}
    <button
      class={`rounded-md bg-primary-focus px-3 py-2 text-sm font-medium capitalize text-white hover:bg-indigo-800
    ${
      $page.url === to && 'bg-indigo-100 text-primary-focus hover:bg-indigo-200'
    }`}
      use:inertia={{ href: to, method: method }}>
      {text}
    </button>
  {:else}
    <button
      class={`rounded-md px-3 py-2 text-sm font-medium capitalize hover:bg-gray-700 hover:text-white 
  ${$page.url === to ? 'bg-gray-900 text-white' : 'text-gray-300'}`}
      use:inertia={{ href: to, method: method }}>
      {text}
    </button>
  {/if}
</li>

<style>
  /* your styles go here */
</style>
