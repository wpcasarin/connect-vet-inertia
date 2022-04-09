<script>
  import FaGithub from 'svelte-icons/fa/FaGithub.svelte';
  import FaTwitter from 'svelte-icons/fa/FaTwitter.svelte';
  import FaFacebook from 'svelte-icons/fa/FaFacebook.svelte';

  import FormSocialButton from '../button/FormSocialButton.svelte';
</script>

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

<style>
  /* your styles go here */
</style>
