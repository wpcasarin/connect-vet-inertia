<script>
  import Drawer from '../components/layout/Drawer.svelte';
  import NavBar from '../components/layout/NavBar.svelte';
</script>

<div class="drawer">
  <input id="main-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col">
    <!-- Navbar -->
    <NavBar />
    <!-- Page content here -->
    <slot />
  </div>
  <!-- Drawer-->
  <Drawer />
</div>

<style>
  /* your styles go here */
</style>
