<script setup>
import { defineProps } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Calendar from 'primevue/calendar';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import Dropdown from 'primevue/dropdown';
import Button from 'primevue/button';
import { Priority } from '../data';

const props = defineProps(['errors']);

const priorityOptions = Object.values(Priority);

const form = useForm({
  title: '',
  description: '',
  priority: Priority.LOW,
  deadline: new Date(),
});

function submit() {
  form.transform((data) => ({
    ...data,
    priority: data.priority.toLowerCase(),
  })).post('/task', {
    onSuccess: () => {
      form.reset();
    }
  });
}
</script>

<template>
  <form @submit.prevent="submit">
    <div class="mb-5 min-w-full">
      <InputText class="min-w-full" v-model="form.title" placeholder="Title" />
      <small class="text-red-800" v-if="errors.title" id="title-error">{{ errors.title }}</small>
    </div>

    <div class="mb-5 min-w-full">
      <Textarea class="min-w-full" v-model="form.description" rows="10" placeholder="Description" />
      <small class="text-red-800" v-if="errors.description" id="description-error">{{ errors.description }}</small>
    </div>


    <div class="flex justify-between">
      <div class="mr-3">
        <label>Priority</label>
        <Dropdown v-model="form.priority" :options="priorityOptions" name="priority" class="w-full" />
      </div>

      <div>
        <label>Deadine</label>
        <Calendar v-model="form.deadline" class="w-full" dateFormat="dd/mm/yy" />
      </div>
    </div>

    <Button type="submit" class="px-3 py-2 bg-gray-800 text-neutral-100 mt-10">Create</button>
  </form>
</template>