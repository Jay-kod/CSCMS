<template>
  <div>
    <!-- GSAP Preloader -->
    <div ref="preloader" class="fixed inset-0 z-[100] flex items-center justify-center bg-neutral">
      <div class="text-center">
        <h1 class="text-5xl font-bold text-primary font-serif mb-6 tracking-widest">NSUK CS</h1>
        <div class="loading loading-spinner text-secondary loading-lg"></div>
        <p class="mt-4 text-sm text-gray-500 font-sans tracking-wide uppercase">Initializing System...</p>
      </div>
    </div>
    
    <!-- Main App Router View -->
    <router-view></router-view>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import gsap from "gsap";

const preloader = ref(null);

onMounted(() => {
  // GSAP animation for the preloader screen fade out
  gsap.to(preloader.value, {
    opacity: 0,
    duration: 1,
    delay: 0.8,
    ease: "power2.inOut",
    onComplete: () => {
      if(preloader.value) {
        preloader.value.style.display = "none";
      }
    }
  });
});
</script>
