<script setup>

import Menubar from 'primevue/menubar'

</script>

<template>
  <div class="min-h-full">
    <Menubar>
      <template #start>
        <h1 class="text-4xl">TODO</h1>
      </template>
    </Menubar>

    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <slot />
      </div>
    </main>
  </div>
</template>