<script>
  import { inertia, useForm } from '@inertiajs/inertia-svelte';
  // local imports
  import InputGroup from '../../inputs/InputGroup.svelte';
  import FormHeader from '../../headers/FormHeader.svelte';
  import FormAlert from '../../display/FormAlert.svelte';
  import FormSuccess from '../../display/FormSuccess.svelte';
  import FormInput from '../../inputs/FormInput.svelte';
  import FormLogo from '../../logos/FormLogo.svelte';
  import Form from '../../basics/Form.svelte';
  import Button from '../../buttons/Button.svelte';
  import { handleFormErrorMessage } from '../../../util';
  // states
  let requestSuccessfully = false;
  let form = useForm({
    email: '',
  });
  // methods
  const handleSubmit = () => {
    requestSuccessfully = false;
    $form.clearErrors();
    $form.post('/forgot-password', {
      onSuccess: () => (requestSuccessfully = true),
    });
  };
</script>

<Form handleSubmit={handleSubmit}>
  <!-- logo -->
  <FormLogo />
  <!-- header -->
  <FormHeader text="Forgot your password?">
    <p class="text-neutral">
      No problem. Just let us know your email address and we will email you a
      password reset link that will allow you to choose a new one.
    </p>
    <p class="text-neutral">
      <span class="text-gray-500">Or</span>
      <a href="/" class="text-primary" use:inertia>
        click here to go back home
      </a>
    </p>
  </FormHeader>

  <!-- email input -->
  <InputGroup>
    <FormInput
      type="email"
      label="email address"
      placeholder="john.doe@mail.com"
      error={$form.errors.email ? true : false}
      bind:value={$form.email} />
  </InputGroup>
  <div class="mt-4 flex flex-col gap-y-4">
    <!-- submit button -->
    <Button text="Send email" type="submit" disabled={$form.processing} />
    <!-- error output -->
    {#if $form.hasErrors}
      <FormAlert open={true} text={handleFormErrorMessage($form.errors)} />
    {/if}
    <!-- success output -->
    <FormSuccess
      open={requestSuccessfully}
      text={'A password reset link was send to your email address.'} />
  </div>
</Form>

<style>
  /* your styles go here */
</style>
