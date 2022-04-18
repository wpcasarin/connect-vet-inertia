<script>
  import FaPlus from 'svelte-icons/fa/FaPlus.svelte';
  import { fade, slide } from 'svelte/transition';
  import { quintOut } from 'svelte/easing';
  // local imports
  import AddNewVaccineRecordForm from '../layout/forms/AddNewVaccineRecordForm.svelte';
  // props
  export let patientId;
  // states
  let open = false;
</script>

<!-- The button to open modal -->
<button
  on:click={() => (open = true)}
  class="flex justify-center rounded-full bg-accent p-2 transition-all hover:bg-accent-focus focus-visible:bg-accent-focus active:scale-105 sm:rounded-md sm:px-4"
  type="button">
  <span class="flex aspect-square w-5 text-base-100 sm:mr-2 sm:w-4">
    <FaPlus />
  </span>
  <span class="hidden font-bold text-base-100 sm:block">Add new</span>
</button>

<!-- Put this part before </body> tag -->
{#if open}
  <div
    in:fade={{ duration: 300 }}
    out:fade={{ duration: 200 }}
    class="modal modal-open modal-bottom sm:modal-middle">
    <div
      in:slide={{ duration: 300, delay: 200, easing: quintOut }}
      out:fade={{ duration: 200 }}
      class="modal-box">
      <AddNewVaccineRecordForm bind:modalOpen={open} bind:patientId />
    </div>
  </div>
{/if}

<style>
  /* your styles go here */
</style>
