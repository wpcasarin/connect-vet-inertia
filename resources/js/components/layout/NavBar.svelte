<script>
  //local imports
  import NavBarLink from '../buttons/NavBarLink.svelte';
  import NavBarLogo from '../logos/NavBarLogo.svelte';
  import MobileMenu from './MobileMenu.svelte';
  import ProfileDropdown from './ProfileDropdown.svelte';
  import MobileMenuButton from '../buttons/MobileMenuButton.svelte';
  import { page } from '@inertiajs/inertia-svelte';
  // states
  $: user = $page['props']['user'];
</script>

<header class="bg-neutral">
  <nav class="container-fluid mx-auto px-2 sm:container sm:px-4">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <MobileMenuButton />
      </div>
      <div
        class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <NavBarLogo />
        <div class="hidden sm:ml-6 sm:block">
          <!-- nav links left -->
          {#if user}
            <ul class="flex space-x-4">
              <NavBarLink to="/" text="home" />
              {#if user.type === 'TUTOR'}
                <NavBarLink to="/my-pets" text="pets" />
              {:else}
                <NavBarLink to="/my-pets" text="patients" />
              {/if}
              <NavBarLink to="/about" text="about" />
            </ul>
          {/if}
        </div>
      </div>
      <div
        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <!-- nav links right -->
        {#if !user}
          <ul class="hidden space-x-4 sm:flex">
            <NavBarLink to="/login" text="login" />
            <NavBarLink to="/register" text="register" accent={true} />
          </ul>
        {/if}

        <!-- Profile dropdown -->
        {#if user}
          <ProfileDropdown />
        {/if}
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <MobileMenu />
  </nav>
</header>

<style>
  header {
    min-width: 240px;
  }
</style>
