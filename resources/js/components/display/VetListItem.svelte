<script>
  import { createEventDispatcher } from 'svelte';
  export let name;
  export let last_name;
  export let id;
  export let open;

  const dispatch = createEventDispatcher();
  const handleClick = () => {
    dispatch('temIdEvent', id);
    open = false;
  };
</script>

<li
  on:click={handleClick}
  class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900 hover:bg-indigo-600 hover:text-white"
  role="option">
  <div class="flex items-center">
    <img
      src="/assets/vet_avatar.jpg"
      alt=""
      class="h-6 w-6 flex-shrink-0 rounded-full" />
    <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
    <span class="ml-3 block truncate font-normal">
      {`${name} ${last_name}`}
    </span>
  </div>
</li>

<style>
  /* your styles go here */
</style>
