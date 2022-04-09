<script>
  import { inertia } from '@inertiajs/inertia-svelte';
</script>

<div class="form-control my-5 flex-col justify-between gap-y-4 xs:flex-row">
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

<style>
  /* your styles go here */
</style>
