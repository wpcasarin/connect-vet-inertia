<script>
  import Auth from '../../layouts/Auth.svelte';
  import ResetPasswordForm from '../../components/layout/forms/ResetPasswordForm.svelte';
  import AuthFormContainer from '../../components/containers/AuthFormContainer.svelte';
</script>

<svelte:head>
  <title>ConnectVet ─ Reset Password</title>
</svelte:head>

<Auth>
  <AuthFormContainer>
    <ResetPasswordForm />
  </AuthFormContainer>
</Auth>

<style>
  /* your styles go here */
</style>
