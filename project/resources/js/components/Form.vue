<script setup>
import { ref } from 'vue';
const title = ref('');
const description = ref('');
</script>

<template>
  <label for="title" class="block mb-10">
    <span>Task title</span>
    <input id="title"
      class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
      type="text" v-model="title" />
  </label>

  <label for="description" class="block">
    <span>Task description</span>
    <textarea id="description" rows="10"
      class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
      type="text" v-model="description"></textarea>
  </label>

  <button class="px-3 py-2 bg-gray-800 text-neutral-100 mt-10">Create</button>
</template>