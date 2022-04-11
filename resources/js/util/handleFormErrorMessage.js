export const handleFormErrorMessage = (errors) => {
  const errorCount = Object.keys(errors).length;
  if (errorCount <= 1) {
    return Object.values(errors)[0];
  } else {
    return `${Object.values(errors)[0]} (and ${errorCount - 1} more ${
      errorCount - 1 > 1 ? 'errors' : 'error'
    })`;
  }
};
