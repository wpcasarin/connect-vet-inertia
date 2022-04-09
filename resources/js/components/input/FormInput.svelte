<script>
  // props
  export let type;
  export let label;
  export let value;
  export let placeholder;

  // generate id for label
  const generateId = () => `form-input-${label}`;
  // handle dynamic inputs wih two-way binding
  const handleInput = (e) => {
    value = type.match(/^(number|range)$/) ? +e.target.value : e.target.value;
  };
</script>

<div class="form-control">
  <label for="{generateId()}" class="label px-0">
    <span class="label-text font-medium first-letter:capitalize">{label}</span>
  </label>
  <input
    id="{generateId()}"
    type="{type}"
    value="{value}"
    placeholder="{placeholder}"
    class="input input-bordered"
    on:input="{handleInput}" />
</div>

<style>
  /* your styles go here */
</style>
