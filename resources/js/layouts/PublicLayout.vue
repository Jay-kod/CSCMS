<template>
  <div class="min-h-screen flex flex-col font-sans text-gray-800 bg-neutral">
    <nav class="bg-primary text-white shadow-lg sticky top-0 z-40">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
          <div class="flex items-center space-x-3">
            <span class="font-serif font-bold text-xl lg:text-2xl tracking-wider text-secondary">NSUK CS</span>
          </div>
          
          <div class="hidden md:flex space-x-8 font-medium items-center">
            <router-link to="/" class="hover:text-secondary text-white">Home</router-link>
            <router-link to="#" class="hover:text-secondary text-white">About</router-link>
            <router-link to="#" class="hover:text-secondary text-white">Academics</router-link>
            <router-link to="#" class="hover:text-secondary text-white">News & Events</router-link>
            <router-link to="/login" class="bg-secondary text-primary px-6 py-2 rounded-full font-bold hover:bg-yellow-400">Portal / Login</router-link>
          </div>
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
</script>
