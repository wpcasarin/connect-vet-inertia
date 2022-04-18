<script>
  // your script goes here
</script>

<section class="w-full overflow-x-hidden">
  <table class="table w-full">
    <!-- head -->
    <thead>
      <tr>
        <th class="bg-gray-50">Pet</th>
        <th class="bg-gray-50">Tutor</th>
        <th class="bg-gray-50">Select</th>
      </tr>
    </thead>
    <tbody class="overflow-y-auto">
      <slot><!-- optional fallback --></slot>
    </tbody>
  </table>
</section>

<style>
  /* your styles go here */
  @media (min-width: 768px) {
    section {
      max-height: calc(100vh - 320px);
    }
  }
</style>
