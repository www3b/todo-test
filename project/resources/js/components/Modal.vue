<script setup>
import { defineProps } from 'vue';

const props = defineProps(['isOpen', 'onClose']);

</script>

<template>
  <div :class="{ 'fixed inset-0 bg-value;bg-opacity-50 justify-center items-center z-50': true, 'hidden': !isOpen }">
    <!-- Modal Content -->
    <div class="bg-white w-full h-full md:w-1/2 md:h-auto shadow-lg overflow-hidden">
      <div class="p-4 flex justify-between items-center">
        <h2 class="text-xl font-semibold">Create new task</h2>
        <button @click="onClose" class="text-gray-700"><i class="pi pi-times-circle" style="font-size: 2rem" /></button>
      </div>
      <div class="p-4">
        <slot />
      </div>
    </div>
  </div>

</template>