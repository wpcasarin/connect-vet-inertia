<script>
  import { page } from '@inertiajs/inertia-svelte';
  import { slide } from 'svelte/transition';
  import { quintOut } from 'svelte/easing';
  // local imports
  import MobileMenuLink from '../buttons/MobileMenuLink.svelte';
  import { mobileMenuOpen } from '../../stores';
</script>

<div class="sm:hidden">
  {#if $mobileMenuOpen}
    <div
      transition:slide={{ delay: 100, duration: 400, easing: quintOut }}
      class="space-y-1 px-2 pt-2 pb-3">
      {#if $page['props']['user']}
        <MobileMenuLink to="/" text="home" />
        <MobileMenuLink to="/my-pets" text="pets" />
        <MobileMenuLink to="/about" text="about" />
      {:else}
        <MobileMenuLink to="/login" text="login" />
        <MobileMenuLink to="/register" text="register" />
      {/if}
    </div>
  {/if}
</div>

<style>
  /* your styles go here */
</style>
