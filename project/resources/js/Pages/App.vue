<script setup>
import TodoList from '../components/TodoList.vue';
import TodoItem from '../components/TodoItem.vue';
import Form from '../components/Form.vue';

const props = defineProps(['tasks']);
</script>

<template>
  <div class="flex">
    <div class="w-1/3 mr-20">
      <Form />
    </div>
    <div class="w-2/3">
      <TodoList>
        <TodoItem v-for="task in props.tasks" />
      </TodoList>
    </div>
  </div>
</template>