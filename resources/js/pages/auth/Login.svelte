<script>
  import Auth from '../../layouts/Auth.svelte';
  import LoginForm from '../../components/forms/LoginForm.svelte';
</script>

<svelte:head>
  <title>ConnectVet ─ Login</title>
</svelte:head>

<Auth>
  <div class="bg-image"></div>
  <section
    class="min-h-screen max-w-3xl bg-base-100 p-2 sm:p-20 md:p-24 lg:p-28">
    <LoginForm />
  </section>
</Auth>

<style>
  .bg-image {
    position: absolute;
    height: 100vh;
    inset: 0;
    z-index: -1;
    background-image: url('assets/login_bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
  }
</style>
