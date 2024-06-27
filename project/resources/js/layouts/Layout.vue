<script setup>
import Header from '../components/Header.vue';
</script>

<template>
  <div class="min-h-full">
    <Header />

    <main class="sm:container mx-auto mt-8">
      <slot />
    </main>
  </div>
</template>