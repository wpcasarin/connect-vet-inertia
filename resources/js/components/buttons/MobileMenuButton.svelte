<script>
  // local imports
  import { mobileMenuOpen } from '../../stores';
  // methods
  const handleClick = () => {
    mobileMenuOpen.set(!$mobileMenuOpen);
  };
</script>

<button
  type="button"
  class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
  aria-controls="mobile-menu"
  aria-expanded="false"
  on:click={handleClick}>
  <span class="sr-only">Open main menu</span>
  {#if !$mobileMenuOpen}
    <svg
      class="block h-6 w-6"
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
      aria-hidden="true">
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  {:else}
    <svg
      class="block h-6 w-6"
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
      aria-hidden="true">
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M6 18L18 6M6 6l12 12" />
    </svg>
  {/if}
</button>

<style>
  /* your styles go here */
</style>
