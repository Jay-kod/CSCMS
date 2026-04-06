<template>
  <!-- Main navbar wrapper -->
  <nav ref="navRef" class="sticky top-0 z-50 bg-[#1E7A3E] shadow-sm flex flex-col justify-center transition-all duration-200 md:h-[56px] h-[52px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex items-center justify-between">

      <!-- LOGO + NAME -->
      <RouterLink :to="{ name: 'home' }" class="flex items-center gap-3 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#1E7A3E] rounded-md">
        <img v-if="settingsStore.logo" :src="settingsStore.logo" alt="Logo" class="h-8 w-8 object-contain" />
        <div v-else class="h-8 w-8 bg-white/20 rounded-full flex items-center justify-center text-white text-xs">
          Logo
        </div>
        <span class="text-white font-medium text-sm hidden sm:block whitespace-nowrap">
          {{ settingsStore.site_name || 'Dept. of Computer Science' }}
        </span>
      </RouterLink>

      <!-- DESKTOP LINKS (hidden on mobile) -->
      <div class="hidden md:flex items-center gap-1 relative">
        
        <!-- Home -->
        <RouterLink :to="{ name: 'home' }" class="text-white text-sm px-3 py-2 rounded-md transition-colors hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white" active-class="bg-white/20">
          Home
        </RouterLink>

        <!-- About dropdown -->
        <div class="relative group" @mouseenter="openDropdown('about')" @mouseleave="closeDropdown">
          <button @click="toggleDropdown('about')" class="text-white text-sm px-3 py-2 rounded-md transition-colors hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white flex items-center gap-1" :class="{'bg-white/20': activeDropdown === 'about' || isActiveGroup('about')}">
            About
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeDropdown === 'about'}" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          
          <div v-show="activeDropdown === 'about'" class="absolute top-full left-0 mt-1 w-56 bg-white rounded-xl border border-gray-100 py-2 shadow-lg focus:outline-none z-50">
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
        <div class="relative group" @mouseenter="openDropdown('academics')" @mouseleave="closeDropdown">
          <button @click="toggleDropdown('academics')" class="text-white text-sm px-3 py-2 rounded-md transition-colors hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white flex items-center gap-1" :class="{'bg-white/20': activeDropdown === 'academics' || isActiveGroup('academics')}">
            Academics
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeDropdown === 'academics'}" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          
          <div v-show="activeDropdown === 'academics'" class="absolute top-full left-0 mt-1 w-56 bg-white rounded-xl border border-gray-100 py-2 shadow-lg focus:outline-none z-50">
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
        <div class="relative group" @mouseenter="openDropdown('people')" @mouseleave="closeDropdown">
          <button @click="toggleDropdown('people')" class="text-white text-sm px-3 py-2 rounded-md transition-colors hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white flex items-center gap-1" :class="{'bg-white/20': activeDropdown === 'people' || isActiveGroup('people')}">
            People
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeDropdown === 'people'}" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          
          <div v-show="activeDropdown === 'people'" class="absolute top-full left-0 mt-1 w-48 bg-white rounded-xl border border-gray-100 py-2 shadow-lg focus:outline-none z-50">
            <RouterLink :to="{ name: 'people.staff' }" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg mx-1" active-class="bg-gray-50 text-[#1E7A3E] font-medium">
              <span class="w-1.5 h-1.5 rounded-full bg-[#1E7A3E] flex-shrink-0"></span> Staff Directory
            </RouterLink>
          </div>
        </div>

        <!-- News dropdown -->
        <div class="relative group" @mouseenter="openDropdown('news')" @mouseleave="closeDropdown">
          <button @click="toggleDropdown('news')" class="text-white text-sm px-3 py-2 rounded-md transition-colors hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white flex items-center gap-1" :class="{'bg-white/20': activeDropdown === 'news' || isActiveGroup('news')}">
            News
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeDropdown === 'news'}" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          
          <div v-show="activeDropdown === 'news'" class="absolute top-full left-0 mt-1 w-56 bg-white rounded-xl border border-gray-100 py-2 shadow-lg focus:outline-none z-50">
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
        <RouterLink :to="{ name: 'contact' }" class="text-white text-sm px-3 py-2 rounded-md transition-colors hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white" active-class="bg-white/20">
          Contact
        </RouterLink>
      </div>

      <!-- STUDENT PORTAL BUTTON (desktop) -->

      <!-- HAMBURGER (mobile only) -->
      <button @click="toggleDrawer" aria-label="Toggle Menu" class="md:hidden p-2 text-white rounded-md hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white">
        <svg v-if="!drawerOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

    </div>

    <!-- MOBILE DRAWER -->
    <div v-show="drawerOpen" class="md:hidden absolute top-full left-0 right-0 bg-white border-t border-gray-100 shadow-xl max-h-[calc(100vh-52px)] overflow-y-auto">
      <div class="flex flex-col py-2">
        
        <!-- Mobile Home -->
        <RouterLink :to="{ name: 'home' }" class="px-5 py-3 text-sm font-medium text-gray-800 border-b border-gray-100 hover:bg-gray-50" active-class="text-[#1E7A3E] bg-gray-50">
          Home
        </RouterLink>

        <!-- Mobile About -->
        <div>
          <button @click="toggleMobileMenu('about')" class="w-full flex items-center justify-between px-5 py-3 text-sm font-medium text-gray-800 border-b border-gray-100 hover:bg-gray-50">
            About
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeMobileMenu === 'about'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div v-show="activeMobileMenu === 'about'" class="bg-gray-50 border-b border-gray-100 py-1">
            <RouterLink :to="{ name: 'about' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> About the Department
            </RouterLink>
            <RouterLink :to="{ name: 'about.vision' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Vision &amp; Mission
            </RouterLink>
            <RouterLink :to="{ name: 'about.hod' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> HOD's Message
            </RouterLink>
            <RouterLink :to="{ name: 'about.association' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Our Association
            </RouterLink>
          </div>
        </div>

        <!-- Mobile Academics -->
        <div>
          <button @click="toggleMobileMenu('academics')" class="w-full flex items-center justify-between px-5 py-3 text-sm font-medium text-gray-800 border-b border-gray-100 hover:bg-gray-50">
            Academics
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeMobileMenu === 'academics'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div v-show="activeMobileMenu === 'academics'" class="bg-gray-50 border-b border-gray-100 py-1">
            <RouterLink :to="{ name: 'academics.programmes' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Programmes (BSc, MSc, PhD)
            </RouterLink>
            
            <div class="px-8 mt-2 mb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Sub-departments</div>
            <RouterLink :to="{ name: 'academics.subdept', params: { slug: 'cyber-security' } }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Cyber Security
            </RouterLink>
            <RouterLink :to="{ name: 'academics.subdept', params: { slug: 'data-science' } }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Data Science
            </RouterLink>

            <div class="my-1 border-t border-gray-200 mx-5"></div>
            <RouterLink :to="{ name: 'academics.siwes' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> SIWES Information
            </RouterLink>
            <RouterLink :to="{ name: 'academics.fyp' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Final Year Projects
            </RouterLink>
          </div>
        </div>

        <!-- Mobile People -->
        <div>
          <button @click="toggleMobileMenu('people')" class="w-full flex items-center justify-between px-5 py-3 text-sm font-medium text-gray-800 border-b border-gray-100 hover:bg-gray-50">
            People
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeMobileMenu === 'people'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div v-show="activeMobileMenu === 'people'" class="bg-gray-50 border-b border-gray-100 py-1">
            <RouterLink :to="{ name: 'people.staff' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Staff Directory
            </RouterLink>
          </div>
        </div>

        <!-- Mobile News -->
        <div>
          <button @click="toggleMobileMenu('news')" class="w-full flex items-center justify-between px-5 py-3 text-sm font-medium text-gray-800 border-b border-gray-100 hover:bg-gray-50">
            News
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" :class="{'rotate-180': activeMobileMenu === 'news'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div v-show="activeMobileMenu === 'news'" class="bg-gray-50 border-b border-gray-100 py-1">
            <RouterLink :to="{ name: 'news.index' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> News &amp; Announcements
            </RouterLink>
            <RouterLink :to="{ name: 'events.index' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Events &amp; Seminars
            </RouterLink>
            <RouterLink :to="{ name: 'calendar' }" class="flex items-center gap-2 px-8 py-2.5 text-sm text-gray-600 hover:text-[#1E7A3E]" active-class="text-[#1E7A3E] font-medium">
              <span class="w-1 h-1 rounded-full bg-gray-400"></span> Academic Calendar
            </RouterLink>
          </div>
        </div>

        <!-- Mobile Contact -->
        <RouterLink :to="{ name: 'contact' }" class="px-5 py-3 text-sm font-medium text-gray-800 border-b border-gray-100 hover:bg-gray-50" active-class="text-[#1E7A3E] bg-gray-50">
          Contact
        </RouterLink>

        <!-- Mobile Student Portal Button -->
        <div class="p-4 mt-2">
          <a href="https://portal.nsuk.edu.ng" target="_blank" rel="noopener noreferrer"
             class="flex w-full justify-center items-center gap-2 bg-[#1E7A3E] text-white text-sm font-medium px-4 py-3 rounded-lg hover:bg-[#165a2d] transition-colors focus:outline-none focus:ring-2 focus:ring-[#1E7A3E] focus:ring-offset-2">
            Student Portal
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import { useRoute, RouterLink } from 'vue-router'
// Assuming Pinia settings store uses this path
import { useSettingsStore } from '@/stores/settings'
import { onClickOutside, onKeyStroke } from '@vueuse/core'

const route = useRoute()
const settingsStore = useSettingsStore()

const navRef = ref(null)

// Desktop Dropdowns
const activeDropdown = ref(null)
const openDropdown = (name) => {
  // Opening on hover for desktop (if desired to mix with clicks)
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
