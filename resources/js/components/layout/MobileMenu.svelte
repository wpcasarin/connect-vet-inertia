<script>
  import { page } from '@inertiajs/inertia-svelte';
  import { slide } from 'svelte/transition';
  import { quintOut } from 'svelte/easing';
  // local imports
  import MobileMenuLink from '../buttons/MobileMenuLink.svelte';
  // props
  export let open = true;
  // states
  $: user = $page['props']['user'];
</script>

<div class="sm:hidden">
  {#if open}
    <div
      transition:slide={{ delay: 100, duration: 400, easing: quintOut }}
      class="space-y-1 px-2 pt-2 pb-3">
      <MobileMenuLink to="/" text="home" />
      <MobileMenuLink to="/about" text="about" />

      {#if !user}
        <div class="divider before:bg-gray-600 after:bg-gray-600" />
        <MobileMenuLink to="/login" text="login" />
        <MobileMenuLink to="/register" text="register" />
      {/if}
    </div>
  {/if}
</div>

<style>
  /* your styles go here */
</style>
