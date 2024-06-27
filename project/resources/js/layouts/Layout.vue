<script setup>
import Header from '../components/Header.vue';
</script>

<template>
  <div class="min-h-full">
    <Header />

    <main class="lg:container mx-auto md:max-lg:mx-10 mt-8">
      <slot />
    </main>
  </div>
</template>