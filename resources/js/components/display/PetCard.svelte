<script>
  import axios from 'axios';
  import IoIosCalendar from 'svelte-icons/io/IoIosCalendar.svelte';
  import GiFemale from 'svelte-icons/gi/GiFemale.svelte';
  import GiMale from 'svelte-icons/gi/GiMale.svelte';
  import { getContext } from 'svelte';
  import { draw } from 'svelte/transition';
  import { sineOut } from 'svelte/easing';
  // local imports
  import PetAvatar from './PetAvatar.svelte';
  import PetCardTag from './PetCardTag.svelte';
  // props
  export let id;
  export let name;
  export let specie;
  export let sex;
  // get context
  let myPets = getContext('myPets');
  let getPets = getContext('getPets');
  // states
  let buttonShow = false;
  // methods
  const handleDelete = async () => {
    try {
      const resp = await axios.delete(`/pets/${id}`);
      if (resp.statusText === 'OK') {
        myPets = getPets();
      } else {
        throw new Error(`HTTP error! status: ${resp.status}`);
      }
    } catch (error) {
      console.error(error);
    }
  };
</script>

<article
  on:mouseleave={() => (buttonShow = false)}
  on:mouseover={() => (buttonShow = true)}
  on:focus={() => (buttonShow = true)}
  on:blur={() => (buttonShow = false)}
  class="relative flex items-center justify-center rounded-md bg-base-200 p-4 text-neutral transition-all hover:scale-105 focus:scale-105 md:p-8 lg:p-4 2xl:p-6">
  {#if buttonShow}
    <button
      on:click={handleDelete}
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

  <div class="flex flex-grow flex-col gap-4 sm:grid sm:grid-cols-12">
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
        <p class="text-lg text-gray-400">{specie === 'CAT' ? 'Cat' : 'Dog'}</p>
      </div>
    </div>

    <div class="col-span-5 grid content-center gap-3 sm:col-span-5">
      <PetCardTag>
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
    backdrop-filter: blur(25px);
    min-width: 240px;
    min-height: 170px;
    box-shadow: 3px 3px 14px #cbced1, -3px -3px 14px #fff;
  }
</style>
