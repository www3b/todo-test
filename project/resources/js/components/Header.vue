<script setup>
import { ref } from 'vue';
import Button from 'primevue/button';
import MobileModal from '../components/Modal.vue';
import Form from '../components/Form.vue';

let modalIsOpen = ref(false);

function toggleModal() {
  modalIsOpen.value = !modalIsOpen.value;
}
</script>

<template>
  <header class="shadow-md py-4">
    <div class="flex justify-between mx-3 sm:mx-auto sm:container">

      <h1 class="text-4xl">TODO</h1>
      <Button class="md:hidden" @click="toggleModal" label="Create task" />
      <MobileModal :isOpen="modalIsOpen" :onClose="toggleModal">
        <Form :errors="{}" :onSubmit="toggleModal" />
      </MobileModal>
    </div>
  </header>
</template>