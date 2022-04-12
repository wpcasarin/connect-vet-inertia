<script>
  import FaLinux from 'svelte-icons/fa/FaLinux.svelte';
  // props
  export let text = 'Some text';
</script>

<div
  class="inline-flex rounded-md bg-indigo-200 p-4 text-neutral shadow-md hover:bg-indigo-300 lg:p-2">
  <span class="aspect-square w-5">
    <slot><FaLinux /></slot>
  </span>
  <p
    class="truncate pl-2 text-lg font-medium lowercase first-letter:capitalize lg:text-sm">
    {text}
  </p>
</div>

<style>
  /* your styles go here */
</style>
