<script>
  import FaPlus from 'svelte-icons/fa/FaPlus.svelte';
  // states
  export let text = 'Add new';
</script>

<button
  class="flex justify-center rounded-full bg-accent p-2 transition-all hover:bg-accent-focus focus-visible:bg-accent-focus active:scale-105 sm:rounded-md sm:px-4"
  type="button">
  <span class="flex aspect-square w-5 text-base-100 sm:mr-2 sm:w-4">
    <FaPlus />
  </span>
  <span class="hidden font-bold text-base-100 sm:block">{text}</span>
</button>

<style>
  /* your styles go here */
</style>
