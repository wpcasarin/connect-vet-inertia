<script>
  import FormInput from '../inputs/FormInput.svelte';

  // states
  let email = '';
  let password = '';

  // methods
  const handleSubmit = async () => {
    console.log(email);
    console.log(password);
  };
</script>

<form class="card-body bg-base-100" on:submit|preventDefault="{handleSubmit}">
  <!-- email -->
  <FormInput
    type="text"
    label="email address"
    placeholder="john.doe@mail.com"
    bind:value="{email}" />

  <!-- password -->
  <FormInput
    type="password"
    label="password"
    placeholder="******"
    bind:value="{password}" />

  <!-- forgot password -->
  <label for="forgot-pwd" class="label">
    <a
      id="forgot-pwd"
      href="/"
      class="link link-hover label-text-alt text-sm underline">
      Forgot password?
    </a>
  </label>

  <!-- submit button -->
  <button class="btn btn-primary">Login</button>
</form>

<style>
  /* your styles go here */
</style>
