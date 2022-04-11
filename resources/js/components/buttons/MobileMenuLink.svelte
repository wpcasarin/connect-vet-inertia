<script>
  import { inertia, page } from '@inertiajs/inertia-svelte';
  // props
  export let text = 'Link';
  export let to = '/';
  export let method = 'get';
</script>

<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<button
  type="button"
  class={`w-full rounded-md px-3 py-2 text-left text-base font-medium capitalize ${
    $page.url === to
      ? 'bg-gray-900 text-white'
      : 'text-gray-300 hover:bg-gray-700 hover:text-white'
  }`}
  aria-current="page"
  use:inertia={{ href: to, method: method }}>
  {text}
</button>

<style>
  /* your styles go here */
</style>
