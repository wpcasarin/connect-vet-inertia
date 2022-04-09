<script>
  import Auth from '../../layouts/Auth.svelte';
  import LoginForm from '../../components/layout/form/LoginForm.svelte';
</script>

<svelte:head>
  <title>ConnectVet ─ Login</title>
</svelte:head>

<Auth>
  <section
    class="mx-auto flex min-h-screen max-w-3xl bg-base-100 pt-28 lg:mx-0 lg:max-w-2xl lg:p-28 xl:max-w-3xl">
    <LoginForm />
  </section>
</Auth>

<style>
</style>
