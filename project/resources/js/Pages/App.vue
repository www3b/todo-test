<script setup>
import { computed } from 'vue';
import TodoList from '../components/TodoList.vue';
import TodoItem from '../components/TodoItem.vue';
import Form from '../components/Form.vue';
import { Priority } from '../data';

import 'primeicons/primeicons.css';

const props = defineProps(['tasks', 'errors']);

const sortedItems = computed(() => {
  const priorityOrder = {
    [Priority.HIGH]: 1,
    [Priority.MEDIUM]: 2,
    [Priority.LOW]: 3
  };
  function compare(item1, item2) {
    return priorityOrder[item1.priority] - priorityOrder[item2.priority];
  }

  return props.tasks.sort(compare);
})
</script>

<template>
  <div class="md:flex">
    <div class="hidden md:block w-1/3 mx-5">
      <Form :errors="errors" />
    </div>
    <div class="md:w-2/3 md:border-l-2 overflow-scroll max-h-[100vh] md:max-h-[80vh] divide-y divide-gray-100">
      <TodoList>
        <TodoItem v-for="task in sortedItems" :item="task" />
      </TodoList>
    </div>
  </div>
</template>