<script>
  import { inertia, useForm } from '@inertiajs/inertia-svelte';
  // local imports
  import SocialButtonGroup from '../../util/SocialButtonGroup.svelte';
  import LoginFormExtra from '../../util/LoginFormExtra.svelte';
  import FormDivider from '../../util/FormDivider.svelte';
  import InputGroup from '../../inputs/InputGroup.svelte';
  import FormHeader from '../../headers/FormHeader.svelte';
  import FormAlert from '../../display/FormAlert.svelte';
  import FormInput from '../../inputs/FormInput.svelte';
  import FormLogo from '../../logos/FormLogo.svelte';
  import Form from '../../basics/Form.svelte';
  import Button from '../../buttons/Button.svelte';
  import { handleFormErrorMessage } from '../../../util';
  // states
  let form = useForm({
    email: '',
    password: '',
    remember: false,
  });
  // methods
  const handleSubmit = () => {
    $form.clearErrors();
    $form.post('/login');
  };
</script>

<Form handleSubmit={handleSubmit}>
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
  <SocialButtonGroup text="Sign in with" />
  <!-- divider -->
  <FormDivider text="Or continue with" />
  <!-- email input -->
  <InputGroup>
    {#if $form.errors.email}
      <FormInput
        type="text"
        label="email address"
        placeholder="john.doe@mail.com"
        error={true}
        bind:value={$form.email} />
    {:else}
      <FormInput
        type="text"
        label="email address"
        placeholder="john.doe@mail.com"
        bind:value={$form.email} />
    {/if}
  </InputGroup>
  <!-- password input -->
  <InputGroup>
    {#if $form.errors.password}
      <FormInput
        type="password"
        label="password"
        placeholder="******"
        error={true}
        bind:value={$form.password} />
    {:else}
      <FormInput
        type="password"
        label="password"
        placeholder="******"
        bind:value={$form.password} />
    {/if}
  </InputGroup>

  <!-- extra options -->
  <LoginFormExtra bind:checked={$form.remember} />

  <div class="flex flex-col gap-y-4">
    <!-- submit button -->
    <Button text="Sign in" type="submit" disabled={$form.processing} />
    <!-- error output -->
    {#if $form.hasErrors}
      <FormAlert open={true} text={handleFormErrorMessage($form.errors)} />
    {/if}
  </div>
</Form>

<style>
  /* your styles go here */
</style>
