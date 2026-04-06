<template>
  <div class="min-h-screen flex flex-col font-sans text-gray-800 bg-neutral">
    <nav class="bg-primary text-white shadow-lg sticky top-0 z-40">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
          <div class="flex items-center space-x-3">
            <span class="font-serif font-bold text-xl lg:text-2xl tracking-wider text-secondary">NSUK CS</span>
          </div>
          
          <div class="hidden md:flex space-x-8 font-medium items-center">
            <router-link to="/" class="hover:text-secondary text-white transition-colors">Home</router-link>
            <router-link :to="{ name: 'public.about' }" class="hover:text-secondary text-white transition-colors">About</router-link>
            <router-link :to="{ name: 'public.academics' }" class="hover:text-secondary text-white transition-colors">Academics</router-link>
            <router-link :to="{ name: 'public.contact' }" class="hover:text-secondary text-white transition-colors">Contact</router-link>
            <router-link to="/login" class="bg-secondary text-primary px-6 py-2 rounded-full font-bold hover:bg-yellow-400 transition-colors">Portal / Login</router-link>
          </div>
          
          <!-- Mobile Menu Button -->
          <div class="md:hidden flex items-center">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white hover:text-secondary focus:outline-none">
              <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path v-if="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
      
      <!-- Mobile Navigation Panel -->
      <div v-if="mobileMenuOpen" class="md:hidden bg-primary border-t border-blue-900 pb-4 pt-2 px-4 shadow-inner">
        <div class="flex flex-col space-y-4 font-medium mt-2">
          <router-link to="/" @click="mobileMenuOpen = false" class="text-white hover:text-secondary py-2 border-b border-blue-800">Home</router-link>
          <router-link :to="{ name: 'public.about' }" @click="mobileMenuOpen = false" class="text-white hover:text-secondary py-2 border-b border-blue-800">About</router-link>
          <router-link :to="{ name: 'public.academics' }" @click="mobileMenuOpen = false" class="text-white hover:text-secondary py-2 border-b border-blue-800">Academics</router-link>
          <router-link :to="{ name: 'public.contact' }" @click="mobileMenuOpen = false" class="text-white hover:text-secondary py-2 border-b border-blue-800">Contact</router-link>
          <router-link to="/login" @click="mobileMenuOpen = false" class="bg-secondary text-primary text-center px-6 py-3 mt-2 rounded-md font-bold shadow-md inline-block">Portal / Login</router-link>
        </div>
      </div>
    </nav>

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
const mobileMenuOpen = ref(false);
</script>
