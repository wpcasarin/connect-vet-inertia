<script>
  import { inertia, useForm, page } from '@inertiajs/inertia-svelte';
  // local imports
  import FormHeader from '../../headers/FormHeader.svelte';
  import FormAlert from '../../display/FormAlert.svelte';
  import FormInput from '../../inputs/FormInput.svelte';
  import FormLogo from '../../logos/FormLogo.svelte';
  import Form from '../../basics/Form.svelte';
  import Button from '../../buttons/Button.svelte';
  import { handleFormErrorMessage } from '../../../util';
  // states
  let form = useForm({
    email: $page['props']['request'].email,
    password: '',
    password_confirmation: '',
    token: $page.url.split('/')[2].split('?')[0],
  });
  // methods
  const handleSubmit = () => {
    $form.clearErrors();
    $form.post('/reset-password');
  };
</script>

<Form handleSubmit={handleSubmit}>
  <!-- logo -->
  <FormLogo />
  <!-- header -->
  <FormHeader text="Reset your password" />

  <!-- email input -->
  <FormInput
    readonly={true}
    type="email"
    label="email address"
    placeholder="john.doe@mail.com"
    error={$form.errors.email ? true : false}
    bind:value={$form.email} />
  <!-- password input -->
  <FormInput
    type="password"
    label="password"
    placeholder="******"
    error={$form.errors.password ? true : false}
    bind:value={$form.password} />
  <!-- confirm password input -->
  <FormInput
    type="password"
    label="confirm password"
    placeholder="******"
    bind:value={$form.password_confirmation} />

  <div class="mt-4 flex flex-col gap-y-4">
    <!-- submit button -->
    <Button text="Send email" type="submit" disabled={$form.processing} />
    <!-- error output -->
    {#if $form.hasErrors}
      <FormAlert open={true} text={handleFormErrorMessage($form.errors)} />
    {/if}
  </div>
</Form>

<style>
  /* your styles go here */
</style>
