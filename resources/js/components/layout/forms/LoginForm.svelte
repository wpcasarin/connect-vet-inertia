<script>
  import axios from 'axios';
  import { inertia } from '@inertiajs/inertia-svelte';
  import { Inertia } from '@inertiajs/inertia';
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
  import { config } from '../../../config/axios';
  // states
  let formData = {
    email: '',
    password: '',
  };
  let inputErrors = {
    email: false,
    password: false,
  };
  let errorOpen = false;
  let errorMessage = '';
  // methods
  const handleErrors = (errorData) => {
    errorOpen = errorData ? true : false;
    inputErrors.email = 'email' in errorData ? true : false;
    inputErrors.password = 'password' in errorData ? true : false;
  };
  // TODO: use Inertia only
  const handleSubmit = async () => {
    try {
      const resp = await axios.post('/login', formData, config);
      resp.status === 200 && Inertia.reload();
      handleErrors(null);
    } catch (error) {
      errorMessage = error.response.data.message;
      handleErrors(error.response.data.errors);
    }
  };
</script>

<Form handleSubmit="{handleSubmit}">
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
    <FormInput
      type="text"
      label="email address"
      placeholder="john.doe@mail.com"
      bind:value="{formData.email}"
      bind:error="{inputErrors.email}" />
  </InputGroup>
  <!-- password input -->
  <InputGroup>
    <FormInput
      type="password"
      label="password"
      placeholder="******"
      bind:value="{formData.password}"
      bind:error="{inputErrors.password}" />
  </InputGroup>

  <!-- extra options -->
  <LoginFormExtra />
  <!-- error output -->
  <FormAlert bind:open="{errorOpen}" bind:text="{errorMessage}" />
  <!-- submit button -->
  <Button text="Sign in" type="submit" />
</Form>

<style>
  /* your styles go here */
</style>
