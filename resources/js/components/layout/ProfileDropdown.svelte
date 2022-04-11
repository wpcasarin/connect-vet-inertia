<script>
  import { fade } from 'svelte/transition';
  // local imports
  import ProfileDropdownLink from '../buttons/ProfileDropdownLink.svelte';
  // states
  let open = false;
</script>

<div class="relative ml-3">
  <div>
    <button
      type="button"
      class="flex rounded-full bg-neutral text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
      aria-expanded="false"
      aria-haspopup="true"
      on:focus={() => (open = true)}
      on:blur={() => (open = false)}>
      <span class="sr-only">Open user menu</span>
      <img
        class="h-8 w-8 rounded-full"
        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
        alt="" />
    </button>
  </div>
  {#if open}
    <div
      transition:fade={{ delay: 150, duration: 100 }}
      class="absolute right-0 mt-2 w-48 origin-top-right cursor-pointer rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
      role="menu"
      aria-orientation="vertical"
      aria-labelledby="user-menu-button"
      tabindex="-1">
      <ProfileDropdownLink text="Your Profile" to="/profile" />
      <ProfileDropdownLink text="Sign out" to="/logout" method="post" />
    </div>
  {/if}
</div>

<style>
  /* your styles go here */
</style>
