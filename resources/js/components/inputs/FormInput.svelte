<script>
  import { v4 as uuid } from 'uuid';
  // props
  export let type;
  export let label;
  export let value;
  export let error;
  export let placeholder;
  // generate id for label
  const id = uuid();
  // handle dynamic inputs wih two-way binding
  const handleInput = (e) => {
    value = type.match(/^(number|range)$/) ? +e.target.value : e.target.value;
  };
</script>

<div class="form-control flex-grow">
  <label for={id} class="label px-0">
    <span class="label-text font-medium first-letter:capitalize">{label}</span>
  </label>
  <input
    id={id}
    type={type}
    value={value}
    placeholder={placeholder}
    class={`input input-bordered ${error && 'input-error'}`}
    on:input={handleInput} />
</div>

<style>
  /* your styles go here */
</style>
