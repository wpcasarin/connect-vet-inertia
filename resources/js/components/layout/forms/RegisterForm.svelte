<script>
  import axios from 'axios';
  import { inertia } from '@inertiajs/inertia-svelte';
  import { Inertia } from '@inertiajs/inertia';
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
  import { config } from '../../../config/axios';
  // states
  let formData = {
    name: '',
    last_name: '',
    email: '',
    password: '',
    confirm_password: '',
    tutor_cpf: '',
    vet_crmv: '',
  };
  let inputErrors = {
    name: false,
    last_name: false,
    email: false,
    password: false,
    confirm_password: false,
    tutor_cpf: false,
    vet_crmv: false,
    type: 'TUTOR',
  };
  let errorOpen = false;
  let errorMessage = '';
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
  const handleErrors = (errorData) => {
    errorOpen = errorData ? true : false;
    emailError = 'email' in errorData ? true : false;
    passwordError = 'password' in errorData ? true : false;
  };
  // TODO: use Inertia only
  const handleSubmit = async () => {
    try {
      const resp = await axios.post('/register', formData, config);
      resp.status === 200 && Inertia.reload();
      handleErrors(null);
    } catch (error) {
      errorMessage = error.response.data.message;
      console.log(error.response.data.errors);
      handleErrors(error.response.data.errors);
    }
  };
</script>

<Form handleSubmit="{handleSubmit}">
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
    <FormInput
      type="text"
      label="name"
      placeholder="John"
      bind:value="{formData.name}"
      bind:error="{inputErrors.name}" />
    <!-- last name input -->
    <FormInput
      type="text"
      label="last name"
      placeholder="Doe"
      bind:value="{formData.last_name}"
      bind:error="{inputErrors.last_name}" />
  </InputGroup>
  <!-- input group 2 -->
  <InputGroup>
    <!-- email input -->
    <FormInput
      type="text"
      label="email address"
      placeholder="john.doe@mail.com"
      bind:value="{formData.email}"
      bind:error="{inputErrors.email}" />
    <!-- unique field -->
    {#if formData.type === 'TUTOR'}
      <FormInput
        type="text"
        label="CPF"
        placeholder="000.000.000-00"
        bind:value="{formData.tutor_cpf}"
        bind:error="{inputErrors.tutor_cpf}" />
    {:else}
      <FormInput
        type="text"
        label="CRMV"
        placeholder="0000-00"
        bind:value="{formData.vet_crmv}"
        bind:error="{inputErrors.vet_crmv}" />
    {/if}
  </InputGroup>
  <!-- input group 3 -->
  <InputGroup>
    <!-- password input -->
    <FormInput
      type="password"
      label="password"
      placeholder="******"
      bind:value="{formData.password}"
      bind:error="{inputErrors.password}" />
    <!-- confirm password input -->
    <FormInput
      type="password"
      label="confirm password"
      placeholder="******"
      bind:value="{formData.confirm_password}"
      bind:error="{inputErrors.confirm_password}" />
  </InputGroup>
  <!-- input group 4 -->
  <div class="flex flex-col gap-y-4">
    <InputGroup>
      <FormInputSelect
        label="who Am I?"
        options="{inputOptions}"
        bind:value="{formData.type}" />
    </InputGroup>
    <!-- error output -->
    <FormAlert bind:open="{errorOpen}" bind:text="{errorMessage}" />
    <!-- submit button -->
    <Button text="Sign up" type="submit" />
  </div>
</Form>

<style>
  /* your styles go here */
</style>
