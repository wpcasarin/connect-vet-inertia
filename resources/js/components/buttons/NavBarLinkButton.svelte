<script>
  import { inertia } from '@inertiajs/inertia-svelte';
  // props
  export let text = 'Link';
  export let to = '/';
</script>

<li>
  <a href="{to}" use:inertia>
    {text}
  </a>
</li>

<style>
  /* your styles go here */
</style>
