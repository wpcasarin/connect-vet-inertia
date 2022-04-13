<script>
  // props
  export let text = '';
  export let open = true;
</script>

<div class={`alert alert-success shadow-lg ${open || 'hidden'}`}>
  <div>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="h-6 w-6 flex-shrink-0 stroke-current"
      fill="none"
      viewBox="0 0 24 24"
      ><path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
    <span>{text}</span>
  </div>
</div>

<style>
  /* your styles go here */
</style>
