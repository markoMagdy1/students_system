<script setup>
import AppHeader from './components/AppHeader.vue'

</script>

<template>
  <div>
    <AppHeader />
    <div class="container my-5">
        <router-view />
    </div>
  </div>
</template>

<style scoped>

</style>
