<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import { Priority } from '../data';
import Button from 'primevue/button';

const props = defineProps(['item']);
const isLoading = ref(false);

const priorityColors = {
  [Priority.LOW]: '#00a100',
  [Priority.MEDIUM]: '#ffd152',
  [Priority.HIGH]: '#b81402',
}

function doneTask() {
  router.put(`/task/${props.item.id}/done`);
}

function deleteTask() {
  isLoading.value = true;
  router.delete(`/task/${props.item.id}`, {
    onSuccess: () => isLoading.value = false
  });
}

</script>

<template>
  <li class="flex justify-between gap-x-6 px-8 pl-3 py-5 hover:bg-gray-100 cursor-pointer">
    <div class="flex min-w-0 gap-x-4">
      <input class="min-w-5 max-md:w-8" type="checkbox" @click="doneTask" :checked="item.done" />
      <div class="min-w-0 flex-auto">
        <p :class="{ 'text-sm font-semibold leading-6 text-gray-900': true, 'line-through !text-gray-400': item.done }">
          {{ item.title }}
        </p>
        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ item.description }}</p>
      </div>
    </div>
    <div class="shrink-0 flex flex-col items-end">
      <p class="text-sm leading-6 text-gray-900">
        Priority: <span :style="{ color: priorityColors[item.priority] }">{{ item.priority }}</span>
      </p>
      <p class="mt-1 text-xs leading-5 text-gray-500">
        Deadline: {{ new Date(item.deadline).toLocaleDateString("ru-RU") }}
      </p>
      <p>
        <Button @click="deleteTask" icon="pi pi-trash" label="Delete" size="small" severity="danger"
          :loading="isLoading" />
      </p>
    </div>
  </li>
</template>