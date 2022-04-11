<script>
  import NavBar from '../components/layout/NavBar.svelte';
</script>

<!-- Navbar -->
<NavBar />
<!-- Page content here -->
<main class="container-fluid mx-auto px-2 sm:container sm:px-4">
  <slot />
</main>

<style>
  /* your styles go here */
</style>
