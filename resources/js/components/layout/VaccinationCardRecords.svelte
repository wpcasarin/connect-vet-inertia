<script>
  import { page } from '@inertiajs/inertia-svelte';
  import FormHeader from '../headers/FormHeader.svelte';
  import VaccineRecord from '../display/VaccineRecord.svelte';
</script>

<header class="flex flex-grow items-center gap-4">
  <FormHeader text={`${$page['props']['pet'].name}'s vaccination records`} />
</header>
<p class="mb-5 text-gray-500">
  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, consequatur.
</p>

{#if $page['props']['vaccines'] && $page['props']['vaccines'][0]}
  <section class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
    {#each $page['props']['vaccines'] as vaccine (vaccine.id)}
      <VaccineRecord
        vaccine={vaccine.name}
        nextDose={vaccine.next_dose}
        currentDose={vaccine.created_at}
        vetId={vaccine.vet_id} />
    {/each}
  </section>
{:else}
  <section class="flex flex-col gap-6 justify-center items-center sm:mt-20">
    <h3 class="text-primary font-bold sm:text-3xl xs:text-2xl text-xl">
      No records found
    </h3>
    <img
      class="max-w-sm"
      src="/assets/no_records_illustration.svg"
      alt="No records"
      width="100%"
      height="auto" />
  </section>
{/if}

<style>
  /* your styles go here */
</style>
