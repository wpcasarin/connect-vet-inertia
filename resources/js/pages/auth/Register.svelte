<script>
  import Auth from '../../layouts/Auth.svelte';
  import RegisterForm from '../../components/layout/forms/RegisterForm.svelte';
  import AuthFormContainer from '../../components/containers/AuthFormContainer.svelte';
</script>

<svelte:head>
  <title>ConnectVet ─ Register</title>
</svelte:head>

<Auth>
  <AuthFormContainer>
    <RegisterForm />
  </AuthFormContainer>
</Auth>

<style>
  /* your styles go here */
</style>
