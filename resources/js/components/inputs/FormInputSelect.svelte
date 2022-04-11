<script>
  import { v4 as uuid } from 'uuid';
  //props
  export let label;
  export let value;
  export let error;
  export let options = [];
  // generate id for label
  const id = uuid();
</script>

<div class="form-control flex-grow">
  <label for={id} class="label px-0">
    <span class="label-text font-medium first-letter:capitalize">{label}</span>
  </label>
  <select
    bind:value
    id={id}
    class={`select select-bordered ${error && 'select-error'}`}>
    {#each options as option}
      <!-- content here -->
      <option value={option.value}>{option.text}</option>
    {/each}
  </select>
</div>

<style>
  /* your styles go here */
</style>
