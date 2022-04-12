<script>
  import NavBar from '../components/layout/NavBar.svelte';
  import Footer from '../components/layout/Footer.svelte';
</script>

<div class="flex min-h-screen flex-grow flex-col">
  <!-- Navbar -->
  <NavBar />
  <!-- Page content here -->
  <slot />
  <!-- Footer -->
  <Footer />
</div>

<style>
  /* your styles go here */
</style>
