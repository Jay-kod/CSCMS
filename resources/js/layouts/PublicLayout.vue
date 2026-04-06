<template>
  <div class="min-h-screen flex flex-col font-sans text-gray-800 bg-neutral">
    <Navbar />

    <main class="flex-grow">
      <router-view></router-view>
    </main>

    <footer class="bg-gray-900 text-gray-300 py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-12">
        <div class="md:col-span-2">
          <h3 class="text-2xl font-serif text-secondary font-bold mb-4">NSUK Computer Science</h3>
          <p class="text-sm font-light max-w-sm mb-6">Empowering the next generation of tech leaders.</p>
        </div>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-8 border-t border-gray-800 text-center text-sm text-gray-500">
        &copy; 2026 NSUK Department of Computer Science.
      </div>
    </footer>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import Navbar from '@/components/public/Navbar.vue';

const mobileMenuOpen = ref(false);
</script>
