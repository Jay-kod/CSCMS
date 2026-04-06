<template>
  <div>
    <swiper :slides-per-view="1" :loop="true" :autoplay="{ delay: 5000 }" :pagination="{ clickable: true }" :modules="modules" class="h-[600px] w-full bg-gray-200">
      <swiper-slide v-for="i in 3" :key="i" class="relative">
        <div class="absolute inset-0 bg-primary/80 mix-blend-multiply z-10"></div>
        <img :src="`https://picsum.photos/1920/1080?random=${i}`" class="w-full h-full object-cover absolute inset-0 mix-blend-overlay" />
        <div class="relative z-20 h-full flex flex-col items-center justify-center text-center text-white px-4">
          <div data-aos="zoom-in" class="max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6 text-secondary">
              Welcome to NSUK CS
            </h1>
            <p class="text-lg md:text-2xl font-light mb-10 max-w-2xl mx-auto">
              We empower students with cutting-edge academic excellence.
            </p>
            <div class="space-x-4">
              <button class="btn btn-secondary btn-lg px-8 border-none text-primary font-bold shadow-lg">Our Programs</button>
            </div>
          </div>
        </div>
      </swiper-slide>
    </swiper>

    <section class="bg-neutral py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
          <h2 class="text-4xl font-serif font-bold text-primary mb-4 relative inline-block">
            Latest Department News
          </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div v-for="n in 3" :key="n" data-aos="fade-up" :data-aos-delay="n * 150" class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300">
            <div class="relative h-56 overflow-hidden">
                <img :src="`https://picsum.photos/600/400?random=${n + 10}`" class="w-full h-full object-cover" />
            </div>
            <div class="p-8">
              <div class="text-xs text-gray-500 font-bold mb-3 uppercase tracking-wider">April 6, 2026</div>
              <h3 class="text-xl font-serif font-bold text-gray-800 mb-4 group-hover:text-primary transition-colors">Tech Symposium</h3>
              <p class="text-gray-600 font-light mb-6 line-clamp-3">Join us for the annual technology symposium featuring guest speakers.</p>
              <router-link :to="{ name: 'public.news.show', params: { slug: 'tech-symposium' } }" class="btn btn-outline btn-sm btn-primary">Read More &rarr;</router-link>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import { useSeo } from '../../composables/useSeo';

const modules = [Autoplay, Pagination, Navigation];
useSeo('Home', 'Welcome to the Nasarawa State University Keffi (NSUK) Department of Computer Science. Dedicated to excellence in teaching, research, and service.');
</script>
