<script setup>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import Calendar from 'primevue/calendar';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import Dropdown from 'primevue/dropdown';
import Button from 'primevue/button';
import { Priority } from '../data';

const priorityOptions = Object.values(Priority);

const formData = reactive({
  title: '',
  description: '',
  priority: Priority.LOW,
  deadline: new Date(),
});

function submit() {
  const submitData = { ...formData, priority: formData.priority.toLowerCase() }
  router.post('/task', submitData)
}
</script>

<template>
  <form @submit.prevent="submit">
    <div class="mb-5 min-w-full">
      <InputText class="min-w-full" v-model="formData.title" placeholder="Title" />
    </div>

    <div class="mb-5 min-w-full">
      <Textarea class="min-w-full" v-model="formData.description" rows="10" placeholder="Description" />
    </div>


    <div class="flex justify-between">
      <div class="mr-3">
        <label>Priority</label>
        <Dropdown v-model="formData.priority" :options="priorityOptions" name="priority" class="w-full" />
      </div>

      <div>
        <label>Deadine</label>
        <Calendar v-model="formData.deadline" class="w-full" dateFormat="dd/mm/yy" />
      </div>
    </div>

    <Button type="submit" class="px-3 py-2 bg-gray-800 text-neutral-100 mt-10">Create</button>
  </form>
</template>