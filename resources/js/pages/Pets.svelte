<script>
  import GiWhiteCat from 'svelte-icons/gi/GiWhiteCat.svelte';
  import { Circle } from 'svelte-loading-spinners';
  import { fly } from 'svelte/transition';
  // local imports
  import CenterAbsolute from '../components/util/CenterAbsolute.svelte';
  import Guests from '../layouts/Guests.svelte';
  import PetsContainer from '../components/containers/PetsContainer.svelte';
  import PetCard from '../components/display/PetCard.svelte';
  import AddPetButton from '../components/buttons/AddPetButton.svelte';
  import { petsStore } from '../stores';
  import { getPets } from '../libs/pets';
  import { onMount } from 'svelte';
  // states
  let delay = 0;
  // methods
  const updateDelay = () => (delay += 100);
  // lifecycle
  onMount(async () => {
    petsStore.set(await getPets());
  });
</script>

<svelte:head>
  <title>ConnectVet ─ My Pets</title>
</svelte:head>

<Guests>
  <header
    class="container-fluid mx-0 mt-10 flex justify-between gap-4 px-4 sm:container sm:mx-auto sm:flex-row">
    <h1 class="flex items-center text-xl font-bold xs:text-2xl sm:text-3xl">
      <span class="mr-2 aspect-square w-8 text-primary sm:w-10">
        <GiWhiteCat />
      </span>
      All my buddies
    </h1>
    <AddPetButton />
  </header>
  <div class="container-fluid divider px-2 sm:container sm:mx-auto sm:px-4" />
  <main
    class="container-fluid mx-5 flex flex-grow flex-col px-2 sm:container sm:mx-auto sm:px-4">
    <PetsContainer>
      {#if $petsStore}
        {#if $petsStore.length >= 1}
          {#each $petsStore as pet (pet.id)}
            <div
              in:fly={{ x: -1000, duration: 1500, delay: updateDelay() }}
              out:fly|local={{ duration: 500, x: -500 }}>
              <PetCard
                id={pet.id}
                name={pet.name}
                specie={pet.specie}
                sex={pet.sex} />
            </div>
          {/each}
        {:else}
          <CenterAbsolute>
            <h1
              class="text-center font-bold sm:text-4xl text-2xl mb-6 text-primary">
              Ops.. you not have any pets yet.
            </h1>
            <img
              class="max-w-md"
              src="/assets/no_data_illustration.svg"
              alt="No pets found"
              width="100%"
              height="about" />
          </CenterAbsolute>
        {/if}
      {:else}
        <CenterAbsolute>
          <Circle size="200" color="#1F2937" unit="px" duration="1s" />
        </CenterAbsolute>
      {/if}
    </PetsContainer>
  </main>
</Guests>

<style>
  /* your styles go here */
</style>
