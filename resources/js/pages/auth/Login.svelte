<script>
  import Guests from '../../layouts/Guests.svelte';
  import LoginForm from '../../components/forms/LoginForm.svelte';
</script>

<svelte:head>
  <title>ConnectVet ─ Login</title>
</svelte:head>

<Guests>
  <section class="card max-w-2xl">
    <LoginForm />
  </section>
</Guests>

<style>
  /* your styles go here */
</style>
