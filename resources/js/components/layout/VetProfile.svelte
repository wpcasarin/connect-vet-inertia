<script>
  import { page } from '@inertiajs/inertia-svelte';
  // local imports
  import FormHeader from '../headers/FormHeader.svelte';
  import VetProfileInfo from '../display/VetProfileInfo.svelte';
  import VetSelectionList from '../display/VetSelectionList.svelte';
</script>

<header class="flex flex-grow items-center gap-4">
  <FormHeader text={`${$page['props']['pet'].name}'s vet info`} />
</header>
<p class="mb-5 text-gray-500">
  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, consequatur.
</p>
<div class="flex flex-col gap-4">
  <VetSelectionList />
  {#if $page['props']['vet']}
    <VetProfileInfo
      name={$page['props']['vet'].name}
      lastName={$page['props']['vet'].last_name}
      email={$page['props']['vet'].email} />
  {:else}
    <div class="max-w-xs mx-auto mt-10">
      <img
        src="/assets/no_data_illustration.svg"
        alt=""
        width="100%"
        height="auto" />
    </div>
  {/if}
</div>

<style>
  /* your styles go here */
</style>
