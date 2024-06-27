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
    <div class="mb-8 min-w-full relative">
      <InputText class="min-w-full" v-model="form.title" placeholder="Title" />
      <small class="text-red-800 absolute -bottom-5 left-0" v-if="errors.title" id="title-error">{{ errors.title
        }}</small>
    </div>

    <div class="mb-8 min-w-full relative">
      <Textarea class="min-w-full min-h-full" v-model="form.description" rows="10" placeholder="Description" />
      <small class="text-red-800 absolute -bottom-5 left-0" v-if="errors.description" id="description-error">{{
        errors.description
      }}</small>
    </div>


    <div class="flex justify-between">
      <div class="mr-3">
        <label>Priority</label>
        <Dropdown v-model="form.priority" :options="priorityOptions" name="priority" class="w-full mt-1" />
      </div>

      <div>
        <label>Deadine</label>
        <Calendar v-model="form.deadline" dateFormat="dd.mm.yy" class="w-full mt-1" />
      </div>
    </div>

    <Button label="Create" type="submit" icon="pi pi-save" :loading="form.processing" class="mt-8" />
  </form>
</template>