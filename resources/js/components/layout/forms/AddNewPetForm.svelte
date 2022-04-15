<script>
  import { useForm } from '@inertiajs/inertia-svelte';
  // local imports
  import Form from '../../basics/Form.svelte';
  import FormLogo from '../../logos/FormLogo.svelte';
  import FormAlert from '../../display/FormAlert.svelte';
  import FormInput from '../../inputs/FormInput.svelte';
  import FormHeader from '../../headers/FormHeader.svelte';
  import FormInputSelect from '../../inputs/FormInputSelect.svelte';

  import { handleFormErrorMessage } from '../../../util';
  // props
  export let modalOpen = false;
  // states
  let form = useForm({
    name: null,
    specie: 'DOG',
    sex: 'M',
    date_of_birth: null,
  });
  // const
  const sexOptions = [
    {
      value: 'M',
      text: 'Male',
    },
    {
      value: 'F',
      text: 'Female',
    },
  ];
  const specieOptions = [
    {
      value: 'DOG',
      text: 'Dog',
    },
    {
      value: 'CAT',
      text: 'Cat',
    },
  ];
  // methods
  const handleSubmit = () => {
    $form.clearErrors();
    $form.post('/pets');
  };
  const handleCancel = () => (modalOpen = false);
</script>

<header class="flex flex-grow items-center gap-4">
  <FormLogo />
  <FormHeader text="Add a new pet" />
</header>
<p class="text-gray-500">
  Fill up this form with your pet info and start tracking all his medical
  records
</p>

<div class="divider" />

<Form handleSubmit={handleSubmit}>
  <!-- name input -->
  <FormInput
    type="text"
    label="name"
    placeholder="Caramelo"
    error={$form.errors.name ? true : false}
    bind:value={$form.name} />
  <!-- specie input -->
  <FormInputSelect
    label="Specie"
    options={specieOptions}
    bind:value={$form.specie} />
  <!-- sex input -->
  <FormInputSelect label="Sex" options={sexOptions} bind:value={$form.sex} />
  <!-- date of birth input -->
  <FormInput
    type="date"
    label="date of birth"
    error={$form.errors.name ? true : false}
    bind:value={$form.date_of_birth} />
  <!-- errors output -->
  <div class="mt-4 mb-2">
    <FormAlert
      open={$form.hasErrors ? true : false}
      text={handleFormErrorMessage($form.errors)} />
  </div>
  <!-- form buttons -->
  <div class="py-4 sm:flex sm:flex-row-reverse">
    <button
      on:click={handleSubmit}
      type="button"
      class="inline-flex w-full justify-center rounded-md border border-transparent bg-primary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-primary-focus focus:outline-none focus:ring-2 focus:ring-primary-focus focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm"
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
