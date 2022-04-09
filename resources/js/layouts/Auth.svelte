<script>
  // your script goes here
</script>

<main class="container-fluid mx-auto">
  <div class="bg-image hidden lg:block"></div>
  <slot />
</main>

<style>
  .bg-image {
    position: absolute;
    min-height: 100vh;
    inset: 0;
    z-index: -1;
    background-image: url('assets/login_bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
  /* your styles go here */
</style>
