<script>
  // props
  export let handleSubmit;
</script>

<form class="flex h-fit flex-col" on:submit|preventDefault="{handleSubmit}">
  <slot />
</form>

<style>
  /* your styles go here */
</style>
