<script>
  import NavBarDrawerButton from '../button/NavBarDrawerButton.svelte';
  import NavBarLinkButton from '../button/NavBarLinkButton.svelte';
</script>

<header class="w-full bg-base-300">
  <nav class="container navbar mx-auto p-0">
    <NavBarDrawerButton />
    <!-- brand -->
    <div class="mx-2 flex-1 px-2">Navbar Title</div>
    <!-- navigation bar -->
    <div class="hidden flex-none lg:block">
      <ul class="menu menu-horizontal">
        <!-- Navbar menu content here -->
        <NavBarLinkButton to="/login" text="login" />
        <NavBarLinkButton to="/register" text="register" />
      </ul>
    </div>
  </nav>
</header>

<style>
  /* your styles go here */
</style>
