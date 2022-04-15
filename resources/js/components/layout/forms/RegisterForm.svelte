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

<header class="mb-6">
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
</header>

<Form handleSubmit={handleSubmit}>
  <!-- input group 1 -->
  <InputGroup>
    <!-- name input -->
    <FormInput
      type="text"
      label="name"
      placeholder="John"
      error={$form.errors.name ? true : false}
      bind:value={$form.name} />
    <!-- last name input -->
    <FormInput
      type="text"
      label="last name"
      placeholder="Doe"
      error={$form.errors.last_name ? true : false}
      bind:value={$form.last_name} />
  </InputGroup>
  <!-- input group 2 -->
  <InputGroup>
    <!-- email input -->
    <FormInput
      type="email"
      label="email address"
      placeholder="john.doe@mail.com"
      error={$form.errors.email ? true : false}
      bind:value={$form.email} />

    <!-- unique field -->
    {#if $form.type === 'TUTOR'}
      <FormInput
        type="text"
        label="CPF"
        placeholder="000.000.000-00"
        error={$form.errors.tutor_cpf ? true : false}
        bind:value={$form.tutor_cpf} />
    {:else}
      <FormInput
        type="text"
        label="CRMV"
        placeholder="0000-00"
        error={$form.errors.vet_crmv ? true : false}
        bind:value={$form.vet_crmv} />
    {/if}
  </InputGroup>
  <!-- input group 3 -->
  <InputGroup>
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
    <FormAlert
      open={$form.hasErrors ? true : false}
      text={handleFormErrorMessage($form.errors)} />
  </div>
</Form>

<style>
  /* your styles go here */
</style>
