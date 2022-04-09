<script>
  import { inertia, Link } from '@inertiajs/inertia-svelte';

  // states
  export let text = 'Link';
  export let to = '/';
</script>

<li>
  <Link href="{to}">{text}</Link>
</li>

<style>
  /* your styles go here */
</style>
