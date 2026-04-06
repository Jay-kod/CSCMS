<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-bold font-serif text-csdept-blue mb-8">Academics & Programs</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div v-for="program in programs" :key="program.id" class="bg-white rounded-lg shadow hover:shadow-xl transition-shadow p-6 border-t-4 border-csdept-gold">
        <h3 class="text-2xl font-semibold text-csdept-blue mb-3">{{ program.title }}</h3>
        <p class="text-gray-600 mb-4">{{ program.description }}</p>
        <button class="text-csdept-gold font-bold hover:underline">Learn More ?</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const programs = ref([
  { id: 1, title: 'B.S. in Computer Science', description: 'Comprehensive foundation in computing, algorithms, and software design.' },
  { id: 2, title: 'M.S. in Computer Science', description: 'Advanced coursework and research opportunities in specialized areas.' },
  { id: 3, title: 'Ph.D. in Computer Science', description: 'Rigorous research program leading to doctoral dissertation.' }
]);
</script>
