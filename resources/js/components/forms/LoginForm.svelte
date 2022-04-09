<script>
  import FaPaw from 'svelte-icons/fa/FaPaw.svelte';
  import FaGithub from 'svelte-icons/fa/FaGithub.svelte';
  import FaTwitter from 'svelte-icons/fa/FaTwitter.svelte';
  import FaFacebook from 'svelte-icons/fa/FaFacebook.svelte';
  import { inertia } from '@inertiajs/inertia-svelte';

  import FormInput from '../inputs/FormInput.svelte';
  import FormSocialButton from '../buttons/FormSocialButton.svelte';

  // states
  let email = '';
  let password = '';

  // methods
  const handleSubmit = async () => {
    console.log(email);
    console.log(password);
  };
</script>

<form class="card-body" on:submit|preventDefault="{handleSubmit}">
  <!-- logo -->
  <div class="logo mb-2 h-12 w-12 text-primary">
    <FaPaw />
  </div>

  <!-- header -->
  <div class="form-control mb-6 gap-2">
    <h1 class="text-3xl font-extrabold text-base-content">
      Sign in to your account
    </h1>
    <p class="text-neutral">
      Or
      <a href="/register" class="text-primary" use:inertia>
        click here to create an account
      </a>
    </p>
  </div>

  <!-- social login -->
  <div class="form-control mb-2">
    <p class="mb-2 text-sm font-medium text-base-content">Sign in with</p>
    <div class="flex justify-between gap-3">
      <!-- facebook -->
      <FormSocialButton to="/login">
        <FaFacebook />
      </FormSocialButton>
      <!-- twitter -->
      <FormSocialButton to="/login">
        <FaTwitter />
      </FormSocialButton>
      <!-- github -->
      <FormSocialButton to="/login">
        <FaGithub />
      </FormSocialButton>
    </div>
  </div>

  <div class="divider text-sm font-normal text-base-content text-opacity-70">
    Or continue with
  </div>

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
  <div class="form-control my-5 flex-col justify-between gap-3 sm:flex-row">
    <!-- remember me -->
    <div class="flex items-center">
      <input
        id="remember-me"
        name="remember-me"
        type="checkbox"
        class="h-4 w-4 rounded text-primary focus:text-primary-focus" />
      <label for="remember-me" class="ml-2 block text-sm text-base-content">
        Remember me
      </label>
    </div>
    <!-- forgot password -->
    <div class="text-sm">
      <a
        href="/login"
        class="font-medium text-primary hover:text-primary-focus"
        use:inertia>
        Forgot your password?
      </a>
    </div>
  </div>

  <!-- submit button -->
  <button class="btn btn-primary capitalize">Sign in</button>
</form>

<style>
  /* your styles go here */
</style>
