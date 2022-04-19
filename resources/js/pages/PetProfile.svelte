<script>
  import FaRegAddressCard from 'svelte-icons/fa/FaRegAddressCard.svelte';
  import TiPipette from 'svelte-icons/ti/TiPipette.svelte';
  import FaUser from 'svelte-icons/fa/FaUser.svelte';
  import { fade } from 'svelte/transition';
  // local imports
  import PetProfileSideButton from '../components/buttons/PetProfileSideButton.svelte';
  import Guests from '../layouts/Guests.svelte';
  import PageContentContainer from '../components/containers/PageContentContainer.svelte';
  import PetProfileContent from '../components/layout/PetProfileContent.svelte';
  import VaccinationCardRecords from '../components/layout/VaccinationCardRecords.svelte';
  import VetProfile from '../components/layout/VetProfile.svelte';
  import { page } from '@inertiajs/inertia-svelte';
  // states
  let pages = {
    profile: true,
    vaccination: false,
    vetInfo: false,
  };
</script>

<svelte:head>
  <title>ConnectVet ─ {$page['props']['pet'].name}'s Profile</title>
</svelte:head>

<Guests>
  <PageContentContainer>
    <aside class="flex flex-col border-r-2 md:max-w-xs md:flex-grow">
      <section
        class="mt-10 flex w-full flex-col items-center gap-x-6 gap-y-3 pr-2 md:flex-row md:p-0">
        <div class="avatar">
          <div class="mask mask-squircle aspect-square h-12 md:h-20">
            <img
              src={`/assets/${
                $page['props']['pet'].specie === 'DOG' ? 'dog' : 'cat'
              }_default.jpg`}
              alt="Pet"
              width="100%"
              height="auto" />
          </div>
        </div>
        <h2 class="hidden truncate text-3xl font-bold text-neutral md:block">
          {$page['props']['pet'].name}
        </h2>
      </section>

      <div class="divider" />
      <nav class="flex w-full flex-grow flex-col">
        <ul class="flex w-full flex-col gap-2">
          <li
            on:click={() => {
              pages.vaccination = false;
              pages.vetInfo = false;
            }}>
            <PetProfileSideButton text="Profile" bind:active={pages.profile}>
              <FaUser />
            </PetProfileSideButton>
          </li>

          <li
            on:click={() => {
              pages.profile = false;
              pages.vetInfo = false;
            }}>
            <PetProfileSideButton
              text="Vaccination Card"
              bind:active={pages.vaccination}>
              <TiPipette />
            </PetProfileSideButton>
          </li>

          <li
            on:click={() => {
              pages.profile = false;
              pages.vaccination = false;
            }}>
            <PetProfileSideButton text="Vet Info" bind:active={pages.vetInfo}>
              <FaRegAddressCard />
            </PetProfileSideButton>
          </li>
        </ul>
      </nav>
    </aside>
    <main class="flex-grow bg-base-100 px-4 py-10">
      {#if pages.profile}
        <section in:fade={{ duration: 300, delay: 200 }}>
          <PetProfileContent />
        </section>
      {:else if pages.vaccination}
        <section in:fade={{ duration: 300, delay: 200 }}>
          <VaccinationCardRecords />
        </section>
      {:else}
        <section in:fade={{ duration: 300, delay: 200 }}>
          <VetProfile />
        </section>
      {/if}
    </main>
  </PageContentContainer>
</Guests>

<style>
  @media (min-width: 768px) {
    aside {
      min-width: 280px;
      max-width: 280px;
    }
  }
</style>
