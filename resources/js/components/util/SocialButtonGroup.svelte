<script>
  import FaGithub from 'svelte-icons/fa/FaGithub.svelte';
  import FaTwitter from 'svelte-icons/fa/FaTwitter.svelte';
  import FaFacebook from 'svelte-icons/fa/FaFacebook.svelte';
  // local imports
  import FormSocialButton from '../buttons/FormSocialButton.svelte';
  // props
  export let text = '';
</script>

<div class="form-control mb-2">
  <p class={`mb-2 text-sm font-medium text-base-content ${text || 'hidden'}`}>
    {text}
  </p>
  <div class="flex justify-between gap-3">
    <!-- facebook -->
    <FormSocialButton to="#">
      <FaFacebook />
    </FormSocialButton>
    <!-- twitter -->
    <FormSocialButton to="#">
      <FaTwitter />
    </FormSocialButton>
    <!-- github -->
    <FormSocialButton to="#">
      <FaGithub />
    </FormSocialButton>
  </div>
</div>

<style>
  /* your styles go here */
</style>
