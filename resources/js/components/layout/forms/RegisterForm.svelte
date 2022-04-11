<script>
  import { inertia, useForm } from '@inertiajs/inertia-svelte';
  // local imports
  import SocialButtonGroup from '../../util/SocialButtonGroup.svelte';
  import FormInputSelect from '../../inputs/FormInputSelect.svelte';
  import FormDivider from '../../util/FormDivider.svelte';
  import FormHeader from '../../headers/FormHeader.svelte';
  import InputGroup from '../../inputs/InputGroup.svelte';
  import FormAlert from '../../display/FormAlert.svelte';
  import FormInput from '../../inputs/FormInput.svelte';
  import FormLogo from '../../logos/FormLogo.svelte';
  import Form from '../../basics/Form.svelte';
  import Button from '../../buttons/Button.svelte';
  import { handleFormErrorMessage } from '../../../util';
  // states
  let form = useForm({
    name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    tutor_cpf: '',
    vet_crmv: '',
    type: 'TUTOR',
    remember: false,
  });
  // const
  const inputOptions = [
    {
      value: 'TUTOR',
      text: 'Pet Tutor',
    },
    {
      value: 'VET',
      text: 'Veterinarian',
    },
  ];
  // methods
  const handleSubmit = () => {
    $form.clearErrors();
    $form.post('/register');
  };
</script>

<Form handleSubmit={handleSubmit}>
  <!-- logo -->
  <FormLogo />
  <!-- header -->
  <FormHeader text="Sign up right now">
    <p class="text-neutral">
      Or
      <a href="/login" class="text-primary" use:inertia>
        click here to sign in
      </a>
    </p>
  </FormHeader>
  <!-- social login -->
  <SocialButtonGroup text="Sign up with" />
  <!-- divider -->
  <FormDivider text="Or continue with" />

  <!-- input group 1 -->
  <InputGroup>
    <!-- name input -->
    {#if $form.errors.name}
      <FormInput
        type="text"
        label="name"
        placeholder="John"
        error={true}
        bind:value={$form.name} />
    {:else}
      <FormInput
        type="text"
        label="name"
        placeholder="John"
        bind:value={$form.name} />
    {/if}
    <!-- last name input -->
    {#if $form.errors.last_name}
      <FormInput
        type="text"
        label="last name"
        placeholder="Doe"
        error={true}
        bind:value={$form.last_name} />
    {:else}
      <FormInput
        type="text"
        label="last name"
        placeholder="Doe"
        bind:value={$form.last_name} />
    {/if}
  </InputGroup>
  <!-- input group 2 -->
  <InputGroup>
    <!-- email input -->
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

    <!-- unique field -->
    {#if $form.type === 'TUTOR'}
      {#if $form.errors.tutor_cpf}
        <FormInput
          type="text"
          label="CPF"
          placeholder="000.000.000-00"
          error={true}
          bind:value={$form.tutor_cpf} />
      {:else}
        <FormInput
          type="text"
          label="CPF"
          placeholder="000.000.000-00"
          bind:value={$form.tutor_cpf} />
      {/if}
    {:else if $form.errors.vet_crmv}
      <FormInput
        type="text"
        label="CRMV"
        placeholder="0000-00"
        error={true}
        bind:value={$form.vet_crmv} />
    {:else}
      <FormInput
        type="text"
        label="CRMV"
        placeholder="0000-00"
        bind:value={$form.vet_crmv} />
    {/if}
  </InputGroup>
  <!-- input group 3 -->
  <InputGroup>
    <!-- password input -->
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
    <!-- confirm password input -->
    <FormInput
      type="password"
      label="confirm password"
      placeholder="******"
      bind:value={$form.password_confirmation} />
  </InputGroup>
  <div class="flex flex-col gap-y-4">
    <!-- input group 4 -->
    <InputGroup>
      <FormInputSelect
        label="who Am I?"
        options={inputOptions}
        bind:value={$form.type} />
    </InputGroup>
    <!-- submit button -->
    <Button text="Sign up" type="submit" disabled={$form.processing} />
    <!-- error output -->
    {#if $form.hasErrors}
      <FormAlert open={true} text={handleFormErrorMessage($form.errors)} />
    {/if}
  </div>
</Form>

<style>
  /* your styles go here */
</style>
