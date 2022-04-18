<script>
  import { useForm } from '@inertiajs/inertia-svelte';
  // local imports
  import Form from '../../basics/Form.svelte';
  import FormLogo from '../../logos/FormLogo.svelte';
  import FormAlert from '../../display/FormAlert.svelte';
  import FormInput from '../../inputs/FormInput.svelte';
  import FormHeader from '../../headers/FormHeader.svelte';

  import { handleFormErrorMessage } from '../../../util';
  // props
  export let modalOpen = false;
  export let patientId;
  // states
  let form = useForm({
    pet_id: patientId,
    name: null,
    next_dose: null,
  });
  // methods
  const handleSubmit = () => {
    $form.clearErrors();
    $form.post('/records');
  };
  const handleCancel = () => (modalOpen = false);
</script>

<header class="flex flex-grow items-center gap-4">
  <FormLogo />
  <FormHeader text="Add new record" />
</header>
<p class="text-gray-500">Lorem ipsum dolor sit amet.</p>

<div class="divider" />

<Form handleSubmit={handleSubmit}>
  <!-- name input -->
  <FormInput
    type="text"
    label="name"
    placeholder="Vaccine name"
    error={$form.errors.name ? true : false}
    bind:value={$form.name} />
  <!-- date of next dose -->
  <FormInput
    type="date"
    label="next dose"
    error={$form.errors.name ? true : false}
    bind:value={$form.next_dose} />
  <!-- errors output -->
  <div class="mt-4 mb-2">
    <FormAlert
      open={$form.hasErrors ? true : false}
      text={handleFormErrorMessage($form.errors)} />
  </div>
  <!-- form buttons -->
  <div class="py-4 sm:flex sm:flex-row-reverse">
    <button
      disabled={$form.processing}
      on:click={handleSubmit}
      type="button"
      class="inline-flex w-full justify-center rounded-md border border-transparent bg-primary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-primary-focus focus:outline-none focus:ring-2 focus:ring-primary-focus focus:ring-offset-2 disabled:bg-slate-500 disabled:text-slate-300 sm:ml-3 sm:w-auto sm:text-sm"
      >Confirm</button>
    <button
      on:click={handleCancel}
      type="button"
      class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
      >Cancel</button>
  </div>
</Form>

<style>
  /* your styles go here */
</style>
