<script>
  import { inertia } from '@inertiajs/inertia-svelte';
  // local imports
  import SocialButtonGroup from '../../util/SocialButtonGroup.svelte';
  import LoginFormExtra from '../../util/LoginFormExtra.svelte';
  import FormDivider from '../../util/FormDivider.svelte';
  import FormHeader from '../../header/FormHeader.svelte';
  import FormAlert from '../../display/FormAlert.svelte';
  import FormInput from '../../input/FormInput.svelte';
  import FormLogo from '../../logo/FormLogo.svelte';
  // states
  let email = '';
  let password = '';
  let errorOpen = false;
  // methods
  const handleSubmit = async () => {
    console.log(email);
    console.log(password);
  };
</script>

<form class="card-body" on:submit|preventDefault="{handleSubmit}">
  <!-- logo -->
  <FormLogo />
  <!-- header -->
  <FormHeader text="Sign in to your account">
    <p class="text-neutral">
      Or
      <a href="/register" class="text-primary" use:inertia>
        click here to create an account
      </a>
    </p>
  </FormHeader>

  <!-- social login -->
  <SocialButtonGroup />

  <!-- divider -->
  <FormDivider text="Or continue with" />

  <!-- email input -->
  <FormInput
    type="text"
    label="email address"
    placeholder="john.doe@mail.com"
    bind:value="{email}" />

  <!-- password input -->
  <FormInput
    type="password"
    label="password"
    placeholder="******"
    bind:value="{password}" />

  <!-- extra options -->
  <LoginFormExtra />

  <!-- error output -->
  <FormAlert bind:open="{errorOpen}" />

  <!-- submit button -->
  <button class="btn btn-primary mt-3 capitalize">Sign in</button>
</form>

<style>
  /* your styles go here */
</style>
