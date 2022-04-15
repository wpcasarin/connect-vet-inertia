<script>
  import { onMount } from 'svelte';
  // local imports
  import NavBar from '../components/layout/NavBar.svelte';
  import Footer from '../components/layout/Footer.svelte';
  import { mobileMenuOpen } from '../stores';
  // methods
  onMount(() => mobileMenuOpen.set(false));
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
