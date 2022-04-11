<script>
  import NavBar from '../components/layout/NavBar.svelte';
</script>

<div class="flex h-screen flex-grow flex-col">
  <!-- Navbar -->
  <NavBar />
  <!-- Page content here -->
  <slot />
</div>

<style>
  /* your styles go here */
</style>
