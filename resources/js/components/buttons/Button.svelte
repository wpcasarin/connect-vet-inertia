<script>
  // props
  export let text = 'button';
  export let type = 'button';
  export let disabled = false;
</script>

<button class="btn btn-primary capitalize" type="{type}" disabled="{disabled}">
  {text}
</button>

<style>
  /* your styles go here */
</style>
