<script>
  import IoIosArrowForward from 'svelte-icons/io/IoIosArrowForward.svelte';
  // props
  export let text = 'Button';
  export let active = false;
</script>

{#if active}
  <div class="flex w-full items-center">
    <div
      class="mx-auto flex h-12 cursor-pointer items-center rounded-2xl pl-2 text-primary transition-all hover:bg-gray-200 focus:bg-gray-200 active:scale-95 md:mr-8 md:w-full">
      <span class="mr-2 aspect-square h-8 md:mr-4 md:h-6">
        <slot><IoIosArrowForward /></slot>
      </span>
      <span class="hidden flex-grow text-xl font-medium md:block">
        {text}
      </span>
    </div>
    <span class="h-10 w-2 rounded-l-xl bg-primary" />
  </div>
{:else}
  <div class="flex w-full items-center" on:click={() => (active = true)}>
    <div
      class="mx-auto flex h-12 cursor-pointer items-center rounded-2xl pl-2 text-gray-700 transition-all hover:bg-gray-200 focus:bg-gray-200 active:scale-95 md:mr-8 md:w-full">
      <span class="mr-2 aspect-square h-8 md:mr-4 md:h-6">
        <slot><IoIosArrowForward /></slot>
      </span>
      <span class="hidden flex-grow text-xl font-medium md:block">
        {text}
      </span>
    </div>
  </div>
{/if}

<style>
  /* your styles go here */
</style>
