<template>
    <div class="modal">
      <div class="modal-content">
        <h2>{{ e.title }}</h2>
        <!-- <p>{{ item.description }}</p> -->
        <!-- Other item details -->
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      event: Object, // The item object passed from the parent component
    },
  };
  </script>
  
  <style scoped>
  /* Add your modal styling here */
  </style>
  