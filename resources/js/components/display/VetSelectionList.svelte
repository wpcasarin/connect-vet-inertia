<script>
  import axios from 'axios';
  import { onMount } from 'svelte';
  import { fade } from 'svelte/transition';
  import { page } from '@inertiajs/inertia-svelte';
  import { useForm } from '@inertiajs/inertia-svelte';
  // local imports
  import VetListItem from './VetListItem.svelte';
  // states
  let open = false;
  let currentVet;
  let form = useForm({
    vet_id: null,
  });
  // methods
  const getVets = async () => {
    try {
      const resp = await axios.get('/vets');
      if (resp.status === 200) {
        return resp.data;
      } else {
        throw new Error('Fetch vets error');
      }
    } catch (error) {
      alert(error);
    }
  };
  const getVetById = async (id) => {
    try {
      const resp = await axios.get(`/vets/${id}`);
      if (resp.status === 200) {
        return resp.data;
      } else {
        throw new Error('Fetch vets error');
      }
    } catch (error) {
      alert(error);
    }
  };
  const handleVetChange = async (event) => {
    currentVet = await getVetById(event.detail);
    $form.vet_id = currentVet.id;
    $form.clearErrors();
    $form.put($page.url);
  };
  const handleClick = () => {
    setTimeout(() => {
      open = false;
    }, 200);
  };

  onMount(() => {
    if ($page['props']['vet']) {
      currentVet = $page['props']['vet'];
      $form.vet_id = $page['props']['vet'].id;
    }
  });
</script>

<div>
  <label for="" class="block text-sm font-medium text-gray-700">
    Assigned to
  </label>
  <div class="relative mt-1">
    <button
      on:focus={() => (open = !open)}
      on:blur={handleClick}
      type="button"
      class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
      aria-haspopup="listbox"
      aria-expanded="true"
      aria-labelledby="listbox-label">
      {#if currentVet}
        <span class="flex items-center">
          <img
            src="/assets/vet_avatar.jpg"
            alt=""
            class="h-6 w-6 flex-shrink-0 rounded-full" />
          <span class="ml-3 block truncate">
            {`${currentVet.name} ${currentVet.last_name}`}
          </span>
        </span>
        <span
          class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
          <svg
            class="h-5 w-5 text-gray-400"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true">
            <path
              fill-rule="evenodd"
              d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
              clip-rule="evenodd" />
          </svg>
        </span>
      {:else}
        <span class="font-medium text-gray-500">Select a Vet</span>
      {/if}
    </button>
    {#if open}
      <ul
        transition:fade={{ duration: 100 }}
        class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
        tabindex="-1"
        role="listbox">
        {#await getVets() then vets}
          {#each vets as vet (vet.id)}
            <VetListItem
              on:temIdEvent={handleVetChange}
              name={vet.name}
              last_name={vet.last_name}
              id={vet.id}
              bind:open />
          {/each}
        {/await}
      </ul>
    {/if}
  </div>
</div>

<style>
  /* your styles go here */
</style>
