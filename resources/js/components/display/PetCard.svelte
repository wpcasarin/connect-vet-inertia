<script>
  import IoIosCalendar from 'svelte-icons/io/IoIosCalendar.svelte';
  import GiFemale from 'svelte-icons/gi/GiFemale.svelte';
  import GiMale from 'svelte-icons/gi/GiMale.svelte';
  import { draw } from 'svelte/transition';
  import { sineOut } from 'svelte/easing';
  import { inertia } from '@inertiajs/inertia-svelte';
  // local imports
  import ModalConfirmation from './ModalConfirmation.svelte';
  import PetAvatar from './PetAvatar.svelte';
  import PetCardTag from './PetCardTag.svelte';
  import { petsStore } from '../../stores';
  import { deletePet, getPets } from '../../libs/pets';
  // props
  export let id;
  export let name;
  export let specie;
  export let sex;
  export let dob;
  // states
  let buttonShow = false;
  let modalOpen = false;
  // methods
  const handlePetDelete = async (petId) => {
    try {
      const resp = await deletePet(petId);
      if (resp.status === 200) {
        petsStore.set(await getPets());
      }
    } catch (error) {
      console.log(error);
    }
  };
  const calcAge = (date) => {
    const dob = new Date(date);
    const monthDiff = Date.now() - dob.getTime();
    const ageDate = new Date(monthDiff);
    const year = ageDate.getUTCFullYear();
    return Math.abs(year - 1970);
  };
  // const
  const age = calcAge(dob);
</script>

<ModalConfirmation
  bind:open={modalOpen}
  title="Careful!"
  text={`Are you sure you want to delete all ${name} data?`}
  method={() => handlePetDelete(id)} />

<article
  on:mouseleave={() => (buttonShow = false)}
  on:mouseover={() => (buttonShow = true)}
  on:focus={() => (buttonShow = true)}
  on:blur={() => (buttonShow = false)}
  class="relative flex items-center justify-center rounded-md bg-base-200 p-4 text-neutral transition-all hover:scale-105 focus:scale-105 md:p-8 lg:p-4 2xl:p-6">
  {#if buttonShow}
    <button
      on:click={() => (modalOpen = true)}
      type="button"
      class="btn btn-ghost btn-sm absolute top-3 right-3 aspect-square rounded-md p-0 hover:bg-base-300 hover:text-neutral sm:top-1 sm:right-1">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="aspect-square w-8 pb-1 sm:w-6 sm:p-0"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor">
        <path
          transition:draw={{ duration: 500, delay: 0, easing: sineOut }}
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  {/if}

  <div
    use:inertia={{ href: `/pets/${id}` }}
    class="flex flex-grow cursor-pointer flex-col gap-4 sm:grid sm:grid-cols-12">
    <div class="flex gap-x-4 sm:col-span-7 sm:grid sm:grid-cols-12">
      <div class="col-span-5">
        <PetAvatar
          src={specie === 'CAT'
            ? '/assets/cat_default.jpg'
            : '/assets/dog_default.jpg'} />
      </div>
      <div class="col-span-7 flex flex-grow flex-col justify-center">
        <h2 class="truncate text-3xl font-bold xl:text-2xl">
          {name}
        </h2>
        <p class="text-lg text-gray-400">
          {specie === 'CAT' ? 'Cat' : 'Dog'}
        </p>
      </div>
    </div>

    <div class="col-span-5 grid content-center gap-3 sm:col-span-5">
      <PetCardTag text={age <= 1 ? `${age} year old` : `${age} years old`}>
        <IoIosCalendar />
      </PetCardTag>
      {#if sex === 'F'}
        <PetCardTag text={'Female'}>
          <GiFemale />
        </PetCardTag>
      {:else}
        <PetCardTag text={'Male'}>
          <GiMale />
        </PetCardTag>
      {/if}
    </div>
  </div>
</article>

<style>
  /* your styles go here */
  article {
    background-color: rgba(255, 255, 255, 0.7);
    /* backdrop-filter: blur(25px); */
    min-width: 240px;
    min-height: 170px;
    box-shadow: 3px 3px 14px #cbced1, -3px -3px 14px #fff;
  }
</style>
