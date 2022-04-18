<script>
  import { createEventDispatcher } from 'svelte';
  // props
  export let id;
  export let name = 'Pet name';
  export let specie = 'Dog';
  export let tutor = 'Tutor';
  // methods
  const dispatch = createEventDispatcher();
  const handleClick = () => {
    dispatch('currentPetId', id);
  };
</script>

<tr class="hover">
  <td>
    <div class="flex items-center space-x-3">
      <div class="avatar hidden lg:block">
        <div class="mask mask-squircle h-12 w-12">
          <img
            src={`/assets/${specie === 'DOG' ? 'dog' : 'cat'}_default.jpg`}
            alt="Avatar Tailwind CSS Component" />
        </div>
      </div>
      <div>
        <div class="font-bold">{name}</div>
        <div class="text-sm lowercase opacity-50 first-letter:capitalize">
          {specie}
        </div>
      </div>
    </div>
  </td>
  <td>
    <div>{tutor}</div>
  </td>
  <td>
    <button on:click={handleClick} class="btn btn-accent btn-xs md:btn-sm"
      >Select</button>
  </td>
</tr>

<style>
  /* your styles go here */
</style>
