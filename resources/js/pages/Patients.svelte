<script>
  import axios from 'axios';
  import GiWhiteCat from 'svelte-icons/gi/GiWhiteCat.svelte';
  import { onMount } from 'svelte';
  import { Circle } from 'svelte-loading-spinners';
  import { fly } from 'svelte/transition';
  // local imports
  import CenterAbsolute from '../components/util/CenterAbsolute.svelte';
  import Guests from '../layouts/Guests.svelte';
  import PatientsTable from '../components/display/PatientsTable.svelte';
  import { petsStore } from '../stores';
  import { getPets } from '../libs/pets';
  import PatientsTableRow from '../components/display/PatientsTableRow.svelte';
  import PatientProfile from '../components/display/PatientProfile.svelte';
  // states
  let delay = 0;
  $: currentPatient = null;
  $: patientVaccines = null;
  // methods
  const updateDelay = () => (delay += 100);
  const getPatient = async (petId) => {
    try {
      const resp = await axios.get(`/pets/${petId}`);
      return resp.data;
    } catch (error) {}
  };
  const handleEvent = async (e) => {
    const data = await getPatient(e.detail);
    currentPatient = data.pet;
    patientVaccines = data.vaccines;
  };
  // lifecycle
  onMount(async () => {
    petsStore.set(await getPets());
  });
</script>

<svelte:head>
  <title>ConnectVet ─ My Patients</title>
</svelte:head>

<Guests>
  <header
    class="container-fluid mx-0 mt-10 flex justify-between gap-4 px-4 sm:container sm:mx-auto sm:flex-row">
    <h1 class="flex items-center text-xl font-bold xs:text-2xl sm:text-3xl">
      <span class="mr-2 aspect-square w-8 text-primary sm:w-10">
        <GiWhiteCat />
      </span>
      Patients
    </h1>
  </header>
  <div class="container-fluid divider px-2 sm:container sm:mx-auto sm:px-4" />
  <main
    class="container-fluid flex flex-grow flex-col px-2 sm:container sm:mx-auto sm:px-4">
    {#if $petsStore}
      {#if $petsStore.length >= 1}
        <section
          class="mb-5 flex flex-col-reverse gap-y-5 md:grid md:grid-cols-12 md:gap-x-5">
          <article class="col-span-6 lg:col-span-5">
            <PatientsTable>
              {#each $petsStore as pet (pet.id)}
                <PatientsTableRow
                  on:currentPetId={handleEvent}
                  id={pet.id}
                  name={pet.name}
                  specie={pet.specie} />
              {/each}
            </PatientsTable>
          </article>
          <article class="col-span-6 md:border-l-2 lg:col-span-7">
            {#if currentPatient}
              <PatientProfile
                id={currentPatient.id}
                specie={currentPatient.specie}
                name={currentPatient.name}
                sex={currentPatient.sex}
                dob={currentPatient.date_of_birth}
                vaccines={patientVaccines} />
            {:else}{/if}
          </article>
        </section>
      {:else}
        <CenterAbsolute>
          <h1
            class="text-center font-bold sm:text-4xl text-2xl mb-6 text-primary">
            Ops.. you not have any patients yet.
          </h1>
          <img
            class="max-w-md"
            src="/assets/no_data_illustration.svg"
            alt="No patients found"
            width="100%"
            height="auto" />
        </CenterAbsolute>
      {/if}
    {:else}
      <CenterAbsolute>
        <Circle size="200" color="#1F2937" unit="px" duration="1s" />
      </CenterAbsolute>
    {/if}
  </main>
</Guests>

<style>
  /* your styles go here */
</style>
