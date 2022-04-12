<script>
  import Guests from '../layouts/Guests.svelte';
  import PetCard from '../components/display/PetCard.svelte';
</script>

<svelte:head>
  <title>ConnectVet ─ My Pets</title>
</svelte:head>

<Guests>
  <div class="container-fluid mx-5 mt-10 min-h-screen sm:container sm:mx-auto">
    <main class="flex flex-col gap-8 lg:grid lg:grid-cols-2 xl:grid-cols-3">
      <PetCard />
      <PetCard />
      <PetCard />
    </main>
  </div>
</Guests>

<style>
  /* your styles go here */
</style>
