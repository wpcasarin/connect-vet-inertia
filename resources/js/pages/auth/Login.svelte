<script>
  import Auth from '../../layouts/Auth.svelte';
  import LoginForm from '../../components/layout/forms/LoginForm.svelte';
  import AuthFormContainer from '../../components/containers/AuthFormContainer.svelte';
</script>

<svelte:head>
  <title>ConnectVet ─ Login</title>
</svelte:head>

<Auth>
  <AuthFormContainer>
    <LoginForm />
  </AuthFormContainer>
</Auth>

<style>
</style>
