<script>
  import { inertia } from '@inertiajs/inertia-svelte';
  // props
  export let to = '/';
</script>

<a
  href={to}
  class="btn btn-outline btn-sm h-10 flex-grow border-base-content border-opacity-20 py-2 text-neutral-focus text-opacity-80"
  use:inertia>
  <slot />
</a>

<style>
  /* your styles go here */
</style>
