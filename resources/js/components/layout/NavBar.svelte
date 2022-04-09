<script>
  import NavBarDrawerButton from '../buttons/NavBarDrawerButton.svelte';
  import NavBarLinkButton from '../buttons/NavBarLinkButton.svelte';
</script>

<nav class="navbar w-full bg-base-300">
  <NavBarDrawerButton />
  <div class="mx-2 flex-1 px-2">Navbar Title</div>
  <div class="hidden flex-none lg:block">
    <ul class="menu menu-horizontal">
      <!-- Navbar menu content here -->
      <NavBarLinkButton to="/login" text="login" />
      <NavBarLinkButton to="/register" text="register" />
    </ul>
  </div>
</nav>

<style>
  /* your styles go here */
</style>
