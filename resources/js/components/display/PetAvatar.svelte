<script>
  export let name = 'Dog';
  export let src;
</script>

<div class="avatar">
  <div class="mask mask-squircle aspect-square h-fit max-h-20 sm:max-h-36">
    <img src={src} alt={name} />
  </div>
</div>

<style>
  /* your styles go here */
</style>
