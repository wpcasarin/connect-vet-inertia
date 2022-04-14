<script>
  import FaLinux from 'svelte-icons/fa/FaLinux.svelte';
  // props
  export let text = 'Some text';
</script>

<div
  class="flex items-center justify-start rounded-md bg-indigo-200 p-2 text-indigo-900 shadow-md hover:bg-indigo-300 md:p-4 lg:p-2">
  <span class="aspect-square w-6 md:w-8 lg:w-6">
    <slot><FaLinux /></slot>
  </span>
  <p
    class="text-md flex-grow truncate pl-2 font-medium lowercase first-letter:capitalize md:text-lg lg:text-sm">
    {text}
  </p>
</div>

<style>
  /* your styles go here */
</style>
