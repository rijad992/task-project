<script setup lang="ts">
import FiltersContainer from './components/FiltersContainer.vue';
import ListContainer from './components/ListContainer.vue';
</script>

<template>
  <div class="app-container">
    <ListContainer entity="apartment" ></ListContainer>
    <FiltersContainer entity="apartment"></FiltersContainer>
  </div>
</template>

<style scoped>
.app-container {
  display: flex;
  flex: 1;
  padding: 2rem;
  background-color: #fafafa;
}
</style>
