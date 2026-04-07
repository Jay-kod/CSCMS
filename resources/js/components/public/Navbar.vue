<template>
  <header ref="navRef" class="w-full flex-col z-50 sticky top-0 shadow-sm bg-white">
    <!-- TOP BAR -->
    <div class="bg-[#186432] py-2 px-4 sm:px-6 lg:px-8 text-[13px] text-white w-full hidden sm:block">
      <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center gap-3">
          <span class="font-bold text-yellow-400 tracking-wide">CMP NSUK</span>
          <span class="opacity-50">|</span>
          <span class="text-white/90">Faculty of Natural &amp; Applied Sciences</span>
        </div>
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 3L1 9l4 2.18v6L12 21l7-2.82v-6l2.08-1.13V17h2V8.4l-1.08-.59L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.01-5-2.01v-4.6l5 2.73 5-2.73v4.6z"/>
          </svg>
          <span class="font-bold text-white tracking-wide">2025/2026 Session (First Semester)</span>
        </div>
      </div>
    </div>

    <!-- BRANDING & NAVIGATION BAR -->
    <div class="max-w-7xl mx-auto flex items-center justify-between py-3 px-4 sm:px-6 lg:px-8 w-full bg-white relative h-16 sm:h-20 lg:h-[84px]">
      
      <!-- LOGO + NAME -->
      <RouterLink :to="{ name: 'home' }" class="flex items-center gap-3 sm:gap-4 shrink-0 focus:outline-none rounded-md">
        <img v-if="settingsStore.logo" :src="settingsStore.logo" alt="Logo" class="h-10 w-10 sm:h-12 sm:w-12 lg:h-14 lg:w-14 object-contain" />
        <div v-else class="h-10 w-10 sm:h-12 sm:w-12 lg:h-14 lg:w-14 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 text-[10px] sm:text-xs shadow-inner">
          Logo
        </div>
        <div class="flex flex-col justify-center">
          <span class="text-[#209249] font-extrabold text-[16px] sm:text-[1.2rem] xl:text-[1.35rem] tracking-tight leading-tight">
            Department of Computer Science
          </span>
          <span class="text-[#8c96ac] font-medium text-[11px] sm:text-[0.8rem] xl:text-[0.95rem] leading-tight mt-[1px]">
            Nasarawa State University, Keffi
          </span>
        </div>
      </RouterLink>

      <!-- MENU LOGO (MOBILE & TABLET ONLY) -->
      <button @click="toggleDrawer" aria-label="Toggle Menu" class="lg:hidden flex p-2 text-[#1E7A3E] rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#1E7A3E]">
        <svg v-if="!drawerOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <!-- DESKTOP LINKS -->
      <nav class="hidden lg:flex items-center gap-1 z-50 shrink-0 h-full">
        <!-- Home -->
        <RouterLink :to="{ name: 'home' }" class="text-gray-700 font-semibold text-[13.5px] px-3 py-2 rounded-md transition-colors hover:text-[#1E7A3E] hover:bg-green-100 focus:outline-none" active-class="text-[#1E7A3E] bg-green-100">
          Home
        </RouterLink>

        <!-- About dropdown -->
        <div class="relative group h-full flex items-center" @mouseenter="openDropdown('about')" @mouseleave="closeDropdown">
          <button @click="toggleDropdown('about')" class="text-gray-700 font-semibold flex items-center text-[13.5px] px-3 py-2 rounded-md transition-colors hover:text-[#1E7A3E] hover:bg-green-100 focus:outline-none gap-1" :class="{'text-[#1E7A3E] bg-green-100': activeDropdown === 'about' || isActiveGroup('about')}">
            About
            <svg xmlns="http://www.w3.org/2000/svg" class="h-[14px] w-[14px] transition-transform duration-200" :class="{'rotate-180': activeDropdown === 'about'}" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          
          <div v-show="activeDropdown === 'about'" class="absolute top-[80%] left-0 mt-1 w-56 bg-white rounded-xl border border-gray-100 py-2 shadow-lg focus:outline-none z-50">
            <RouterLink :to="{ name: 'about' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> About the Department
            </RouterLink>
            <RouterLink :to="{ name: 'about.vision' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> Vision &amp; Mission
            </RouterLink>
            <RouterLink :to="{ name: 'about.hod' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> HOD's Message
            </RouterLink>
            <RouterLink :to="{ name: 'about.association' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> Our Association
            </RouterLink>
          </div>
        </div>

        <!-- Academics dropdown -->
        <div class="relative group h-full flex items-center" @mouseenter="openDropdown('academics')" @mouseleave="closeDropdown">
          <button @click="toggleDropdown('academics')" class="text-gray-700 font-semibold flex items-center text-[13.5px] px-3 py-2 rounded-md transition-colors hover:text-[#1E7A3E] hover:bg-green-100 focus:outline-none gap-1" :class="{'text-[#1E7A3E] bg-green-100': activeDropdown === 'academics' || isActiveGroup('academics')}">
            Academics
            <svg xmlns="http://www.w3.org/2000/svg" class="h-[14px] w-[14px] transition-transform duration-200" :class="{'rotate-180': activeDropdown === 'academics'}" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          
          <div v-show="activeDropdown === 'academics'" class="absolute top-[80%] left-0 mt-1 w-60 bg-white rounded-xl border border-gray-100 py-2 shadow-lg focus:outline-none z-50">
            <RouterLink :to="{ name: 'academics.programmes' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> Programmes (BSc, MSc, PhD)
            </RouterLink>
            
            <div class="my-1 border-t border-gray-100"></div>
            <div class="px-4 py-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Sub-departments</div>
            
            <RouterLink :to="{ name: 'academics.subdept', params: { slug: 'cyber-security' } }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> Cyber Security
            </RouterLink>
            <RouterLink :to="{ name: 'academics.subdept', params: { slug: 'data-science' } }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> Data Science
            </RouterLink>
            
            <div class="my-1 border-t border-gray-100"></div>
            
            <RouterLink :to="{ name: 'academics.siwes' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> SIWES Information
            </RouterLink>
            <RouterLink :to="{ name: 'academics.fyp' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> Final Year Projects
            </RouterLink>
          </div>
        </div>

        <!-- People dropdown -->
        <div class="relative group h-full flex items-center" @mouseenter="openDropdown('people')" @mouseleave="closeDropdown">
          <button @click="toggleDropdown('people')" class="text-gray-700 font-semibold flex items-center text-[13.5px] px-3 py-2 rounded-md transition-colors hover:text-[#1E7A3E] hover:bg-green-100 focus:outline-none gap-1" :class="{'text-[#1E7A3E] bg-green-100': activeDropdown === 'people' || isActiveGroup('people')}">
            People
            <svg xmlns="http://www.w3.org/2000/svg" class="h-[14px] w-[14px] transition-transform duration-200" :class="{'rotate-180': activeDropdown === 'people'}" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          
          <div v-show="activeDropdown === 'people'" class="absolute top-[80%] left-0 mt-1 w-48 bg-white rounded-xl border border-gray-100 py-2 shadow-lg focus:outline-none z-50">
            <RouterLink :to="{ name: 'people.staff' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> Staff Directory
            </RouterLink>
          </div>
        </div>

        <!-- News dropdown -->
        <div class="relative group h-full flex items-center" @mouseenter="openDropdown('news')" @mouseleave="closeDropdown">
          <button @click="toggleDropdown('news')" class="text-gray-700 font-semibold flex items-center text-[13.5px] px-3 py-2 rounded-md transition-colors hover:text-[#1E7A3E] hover:bg-green-100 focus:outline-none gap-1" :class="{'text-[#1E7A3E] bg-green-100': activeDropdown === 'news' || isActiveGroup('news')}">
            News
            <svg xmlns="http://www.w3.org/2000/svg" class="h-[14px] w-[14px] transition-transform duration-200" :class="{'rotate-180': activeDropdown === 'news'}" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          
          <div v-show="activeDropdown === 'news'" class="absolute top-[80%] left-0 mt-1 w-56 bg-white rounded-xl border border-gray-100 py-2 shadow-lg focus:outline-none z-50">
            <RouterLink :to="{ name: 'news.index' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> News &amp; Announcements
            </RouterLink>
            <RouterLink :to="{ name: 'events.index' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> Events &amp; Seminars
            </RouterLink>
            <RouterLink :to="{ name: 'calendar' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> Academic Calendar
            </RouterLink>
          </div>
        </div>

        <!-- Contact -->
        <RouterLink :to="{ name: 'contact' }" class="text-gray-700 font-semibold text-[13.5px] px-3 py-2 rounded-md transition-colors hover:text-[#1E7A3E] hover:bg-green-100 focus:outline-none" active-class="text-[#1E7A3E] bg-green-100">
          Contact
        </RouterLink>

      </nav>
    </div>

    <!-- MOBILE DRAWER -->
    <div v-show="drawerOpen" class="lg:hidden absolute top-[100%] left-0 right-0 bg-white border-t border-gray-100 shadow-xl overflow-y-auto max-h-[calc(100vh-70px)] z-50">
      <div class="flex flex-col py-2 relative">
        
        <!-- Mobile Home -->
        <RouterLink :to="{ name: 'home' }" class="px-5 py-3 text-sm font-semibold text-gray-800 border-b border-gray-100 hover:bg-gray-50" active-class="text-[#1E7A3E] bg-green-100">
          Home
        </RouterLink>

        <!-- Mobile About -->
        <div>
          <button @click="toggleMobileMenu('about')" class="w-full flex items-center justify-between px-5 py-3 text-sm font-semibold text-gray-800 border-b border-gray-100 hover:bg-gray-50">
            About
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeMobileMenu === 'about'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div v-show="activeMobileMenu === 'about'" class="bg-gray-50 border-b border-gray-100 py-1">
            <RouterLink :to="{ name: 'about' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> About the Department
            </RouterLink>
            <RouterLink :to="{ name: 'about.vision' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Vision &amp; Mission
            </RouterLink>
            <RouterLink :to="{ name: 'about.hod' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> HOD's Message
            </RouterLink>
            <RouterLink :to="{ name: 'about.association' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Our Association
            </RouterLink>
          </div>
        </div>

        <!-- Mobile Academics -->
        <div>
          <button @click="toggleMobileMenu('academics')" class="w-full flex items-center justify-between px-5 py-3 text-sm font-semibold text-gray-800 border-b border-gray-100 hover:bg-gray-50">
            Academics
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeMobileMenu === 'academics'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div v-show="activeMobileMenu === 'academics'" class="bg-gray-50 border-b border-gray-100 py-1">
            <RouterLink :to="{ name: 'academics.programmes' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Programmes (BSc, MSc, PhD)
            </RouterLink>
            
            <div class="px-8 mt-2 mb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Sub-departments</div>
            <RouterLink :to="{ name: 'academics.subdept', params: { slug: 'cyber-security' } }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Cyber Security
            </RouterLink>
            <RouterLink :to="{ name: 'academics.subdept', params: { slug: 'data-science' } }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Data Science
            </RouterLink>

            <div class="my-1 border-t border-gray-200 mx-5"></div>
            <RouterLink :to="{ name: 'academics.siwes' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> SIWES Information
            </RouterLink>
            <RouterLink :to="{ name: 'academics.fyp' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Final Year Projects
            </RouterLink>
          </div>
        </div>

        <!-- Mobile People -->
        <div>
          <button @click="toggleMobileMenu('people')" class="w-full flex items-center justify-between px-5 py-3 text-sm font-semibold text-gray-800 border-b border-gray-100 hover:bg-gray-50">
            People
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeMobileMenu === 'people'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div v-show="activeMobileMenu === 'people'" class="bg-gray-50 border-b border-gray-100 py-1">
            <RouterLink :to="{ name: 'people.staff' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Staff Directory
            </RouterLink>
          </div>
        </div>

        <!-- Mobile News -->
        <div>
          <button @click="toggleMobileMenu('news')" class="w-full flex items-center justify-between px-5 py-3 text-sm font-semibold text-gray-800 border-b border-gray-100 hover:bg-gray-50">
            News
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeMobileMenu === 'news'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div v-show="activeMobileMenu === 'news'" class="bg-gray-50 border-b border-gray-100 py-1">
            <RouterLink :to="{ name: 'news.index' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> News &amp; Announcements
            </RouterLink>
            <RouterLink :to="{ name: 'events.index' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Events &amp; Seminars
            </RouterLink>
            <RouterLink :to="{ name: 'calendar' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium bg-green-100/50">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Academic Calendar
            </RouterLink>
          </div>
        </div>

        <!-- Mobile Contact -->
        <RouterLink :to="{ name: 'contact' }" class="px-5 py-3 text-sm font-semibold text-gray-800 border-b border-gray-100 hover:bg-gray-50" active-class="text-[#1E7A3E] bg-green-100">
          Contact
        </RouterLink>

      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import { useRoute, RouterLink } from 'vue-router'
import { useSettingsStore } from '@/stores/settings'
import { onClickOutside, onKeyStroke } from '@vueuse/core'

const route = useRoute()
const settingsStore = useSettingsStore()

const navRef = ref(null)

// Desktop Dropdowns
const activeDropdown = ref(null)
const openDropdown = (name) => {
  activeDropdown.value = name
}
const toggleDropdown = (name) => {
  activeDropdown.value = activeDropdown.value === name ? null : name
}
const closeDropdown = () => {
  activeDropdown.value = null
}

// Check if a group of routes is active
const isActiveGroup = (group) => {
  if (!route.name) return false;
  return route.name.toString().startsWith(group)
}

// Mobile Drawer
const drawerOpen = ref(false)
const toggleDrawer = () => {
  drawerOpen.value = !drawerOpen.value
  if (!drawerOpen.value) {
    activeMobileMenu.value = null
  }
}

// Mobile Accordion Menus
const activeMobileMenu = ref(null)
const toggleMobileMenu = (name) => {
  activeMobileMenu.value = activeMobileMenu.value === name ? null : name
}

// Handle outside clicks to close menus
onClickOutside(navRef, () => {
  drawerOpen.value = false
  closeDropdown()
})

// Escape key to close everything
onKeyStroke('Escape', () => {
  drawerOpen.value = false
  closeDropdown()
})

// Close drawers and dropdowns on route change
watch(() => route.path, () => {
  drawerOpen.value = false
  closeDropdown()
})
</script>
