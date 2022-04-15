<script>
  export let text = '';
</script>

<div class="form-control gap-2">
  <h1 class="text-3xl font-extrabold text-base-content">
    {text}
  </h1>
  <slot />
</div>

<style>
  /* your styles go here */
</style>
