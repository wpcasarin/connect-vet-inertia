<script>
  import { inertia, page } from '@inertiajs/inertia-svelte';
  // props
  export let text = 'Link';
  export let to = '/';
  export let method = 'get';
</script>

<!-- Active: "bg-gray-200", Not Active: "" -->
<button
  type="button"
  class={`w-full  px-4 py-2 text-left text-sm font-medium text-gray-700 hover:bg-gray-100 ${
    $page.url === to && 'bg-gray-200'
  }`}
  role="menuitem"
  tabindex="-1"
  id="user-menu-item-2"
  use:inertia={{ href: to, method: method }}>
  {text}
</button>

<style>
  /* your styles go here */
</style>
