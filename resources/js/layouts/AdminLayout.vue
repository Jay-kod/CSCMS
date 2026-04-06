<template>
  <div class="h-screen flex bg-neutral overflow-hidden">
    <!-- Admin Sidebar (Secondary Color Theme) -->
    <aside class="w-64 bg-secondary text-gray-900 flex flex-col">
      <div class="h-16 flex items-center justify-center font-bold text-lg font-serif tracking-widest border-b border-yellow-600 bg-yellow-500">
        DEPARTMENT ADMIN
      </div>
      <nav class="flex-1 px-4 py-8 space-y-4 font-sans text-sm font-medium">
        <router-link :to="{ name: 'admin.dashboard' }" class="block px-4 py-3 rounded hover:bg-yellow-500 transition">Dashboard</router-link>
        <router-link :to="{ name: 'admin.news' }" class="block px-4 py-3 rounded hover:bg-yellow-500 transition">News & Updates</router-link>
        
        <!-- Push to bottom -->
        <div class="pt-8">
            <router-link to="/admin/login" class="block px-4 py-3 rounded bg-red-100 text-red-700 hover:bg-red-600 hover:text-white transition">Sign Out</router-link>
        </div>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
      <!-- Topbar -->
      <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 z-10">
        <h2 class="font-serif text-xl text-primary font-semibold truncate">Dept Admin Portal</h2>
        <div class="flex space-x-4 items-center">
          <button class="btn btn-ghost btn-circle btn-sm">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
          </button>
          <div class="avatar placeholder">
            <div class="bg-secondary text-gray-800 rounded-full w-9">
              <span class="text-sm font-bold">DA</span>
            </div>
          </div>
        </div>
      </header>

      <!-- Router View Slot -->
      <div class="flex-1 overflow-auto p-8">
        <router-view></router-view>
      </div>
    </main>
  </div>
</template>

<script setup>
</script>