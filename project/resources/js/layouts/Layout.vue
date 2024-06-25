<script setup>
import Header from '../components/Header.vue';
</script>

<template>
  <div class="min-h-full">
    <Header />
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <slot />
      </div>
    </main>
  </div>
</template>