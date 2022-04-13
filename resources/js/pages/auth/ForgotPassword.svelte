<script>
  import Auth from '../../layouts/Auth.svelte';
  import ForgotPasswordForm from '../../components/layout/forms/ForgotPasswordForm.svelte';
  import AuthFormContainer from '../../components/containers/AuthFormContainer.svelte';
</script>

<svelte:head>
  <title>ConnectVet ─ Forgot Password</title>
</svelte:head>

<Auth>
  <AuthFormContainer>
    <ForgotPasswordForm />
  </AuthFormContainer>
</Auth>

<style>
  /* your styles go here */
</style>
