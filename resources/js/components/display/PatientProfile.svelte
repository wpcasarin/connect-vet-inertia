<script>
  import TiPipette from 'svelte-icons/ti/TiPipette.svelte';
  // props
  export let dob;
  export let sex;
  export let name;
  export let specie;
  export let vaccines;
</script>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="overflow-hidden bg-white sm:rounded-lg">
  <div class="px-4 py-5 sm:px-6">
    <h3 class="text-lg font-medium leading-6 text-gray-900">
      {`${name}'s profile`}
    </h3>
    <p class="mt-1 max-w-2xl text-sm text-gray-500">Medical details</p>
  </div>
  <div class="border-t border-gray-200">
    <dl>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Pet name</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
          {name}
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Specie</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
          {specie}
        </dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Sex</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
          {sex}
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Date of birth</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
          {dob}
        </dd>
      </div>
      <div
        class="min-h-fit bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Vaccine Records</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
          <article class="flex h-full w-full flex-grow flex-wrap gap-2">
            {#if vaccines.length >= 1}
              {#each vaccines as vaccine}
                <div
                  class="flex cursor-pointer justify-center gap-2 rounded-lg bg-success py-2 px-3 align-middle shadow-sm transition-all hover:scale-105 hover:bg-opacity-60">
                  <span class="h-5 w-5"><TiPipette /></span>{vaccine.name}
                </div>
              {/each}
            {:else}
              No vaccination records found
            {/if}
          </article>
        </dd>
      </div>
    </dl>
  </div>
</div>

<style>
  /* your styles go here */
</style>
