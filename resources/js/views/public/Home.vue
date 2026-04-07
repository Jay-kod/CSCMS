<template>
  <div class="w-full">
    <!-- 1. Hero: No static color (transparent/image background) -->
    <section class="relative w-full min-h-[600px] flex items-center justify-center overflow-hidden">
      <!-- Background Image -->
      <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1500&auto=format&fit=crop')] bg-cover bg-center"></div>
      <div class="absolute inset-0 bg-black/60"></div>
      
      <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto" data-aos="zoom-in">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">Empowering the Next Generation of Tech Leaders</h1>
        <p class="text-xl md:text-2xl mb-8 font-light">Join the Department of Computer Science at NSUK and shape the future of technology.</p>
        <div class="flex gap-4 justify-center">
          <button class="px-8 py-3 bg-green-700 hover:bg-green-600 rounded-lg font-semibold transition-colors shadow-lg">Apply Now</button>
          <button class="px-8 py-3 border-2 border-white hover:bg-white hover:text-green-800 rounded-lg font-semibold transition-colors">Learn More</button>
        </div>
      </div>
    </section>

    <!-- 2. HOD Welcome: Solid Light Slate (#f8fafc) -->
    <section class="py-20 bg-slate-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-12">
          <div class="w-full md:w-1/3" data-aos="fade-right">
            <div class="aspect-[4/5] rounded-2xl bg-gray-300 overflow-hidden shadow-xl relative group">
              <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=600&auto=format&fit=crop" alt="HOD Portrait" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
              <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                <p class="font-bold text-white text-xl">Prof. Adamu Ibrahim</p>
                <p class="text-green-400 font-semibold">Head of Department</p>
              </div>
            </div>
          </div>
          <div class="w-full md:w-2/3" data-aos="fade-left">
            <span class="inline-block py-1 px-3 rounded-full bg-green-100 text-green-800 font-bold text-xs tracking-wider uppercase mb-4">Welcome Message</span>
            <h3 class="text-3xl md:text-5xl font-bold text-slate-800 mb-6">From the Head of Department</h3>
            <div class="text-lg text-slate-600 space-y-4 mb-8 leading-relaxed">
              <p>"Welcome to the cornerstone of innovation and excellence. Our department is committed to providing world-class education in computing and technological sciences. We nurture our students to become critical thinkers, problem solvers, and pioneers of the digital age."</p>
              <p>"Our curriculum is continuously updated to reflect the rapid advancements in technology, ensuring our graduates are always industry-ready. We invite you to explore our programs, meet our distinguished faculty, and discover the bright future that awaits you here."</p>
            </div>
            <button class="flex items-center gap-2 text-green-700 font-bold hover:text-green-800 transition-colors group">
              Read Full Message 
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- 3. Programmes: Gradient (white 0%, #f8fafc 100%) -->
    <section class="py-20" style="background: linear-gradient(to bottom, white 0%, #f8fafc 100%);">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4" data-aos="fade-up">Our Academic Programmes</h2>
        <p class="text-slate-600 mb-16 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">Discover our diverse range of undergraduate and postgraduate degrees tailored to prepare you for global tech challenges.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- B.Sc -->
          <div class="bg-white p-10 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group" data-aos="fade-up" data-aos-delay="150">
            <div class="w-16 h-16 bg-green-50 text-green-700 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-4">B.Sc Computer Science</h3>
            <p class="text-slate-600 mb-8 leading-relaxed">A comprehensive 4-year degree covering software engineering, algorithms, AI, and comprehensive systems design.</p>
            <RouterLink to="/academics/programmes" class="text-green-700 font-bold hover:text-green-800 flex items-center justify-center gap-2">Explore Curriculum <span>&rarr;</span></RouterLink>
          </div>
          <!-- M.Sc -->
          <div class="bg-white p-10 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group relative -top-4" data-aos="fade-up" data-aos-delay="250">
            <div class="w-16 h-16 bg-blue-50 text-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-4">M.Sc Computing</h3>
            <p class="text-slate-600 mb-8 leading-relaxed">Advanced academic studies focused on modern research, data science, cybersecurity, and enterprise computing platforms.</p>
            <RouterLink to="/academics/programmes" class="text-blue-700 font-bold hover:text-blue-800 flex items-center justify-center gap-2">Explore Curriculum <span>&rarr;</span></RouterLink>
          </div>
          <!-- Ph.D -->
          <div class="bg-white p-10 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group" data-aos="fade-up" data-aos-delay="350">
            <div class="w-16 h-16 bg-orange-50 text-orange-700 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-orange-600 group-hover:text-white transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-4">Ph.D Programmes</h3>
            <p class="text-slate-600 mb-8 leading-relaxed">Contribute to the frontier of computing knowledge with our highly intensive doctorate research tracks.</p>
            <RouterLink to="/academics/programmes" class="text-orange-700 font-bold hover:text-orange-800 flex items-center justify-center gap-2">Explore Curriculum <span>&rarr;</span></RouterLink>
          </div>
        </div>
      </div>
    </section>

    <!-- 4. Staff/Faculty (Solid Light Mintgreen: #f4fcfa) -->
    <section class="py-24" style="background-color: #f4fcfa;">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
          <div data-aos="fade-right">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Our Esteemed Faculty</h2>
            <p class="text-slate-600 text-lg">Learn from experienced educators and active industry researchers.</p>
          </div>
          <button class="px-6 py-3 border-2 border-green-700 text-green-700 hover:bg-green-700 hover:text-white rounded-xl transition-colors font-bold whitespace-nowrap" data-aos="fade-left">View Directory Directory</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Staff Card -->
          <div v-for="i in 4" :key="'staff'+i" class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group" data-aos="fade-up" :data-aos-delay="i*100">
            <div class="h-64 bg-gray-200 overflow-hidden relative">
              <img :src="`https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=400&auto=format&fit=crop&sig=${i}`" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Staff">
              <div class="absolute inset-0 bg-green-900/0 group-hover:bg-green-900/40 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                <button class="bg-white text-green-800 px-4 py-2 rounded-lg font-bold text-sm transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">View Profile</button>
              </div>
            </div>
            <div class="p-6">
              <h4 class="text-xl font-bold text-slate-800 mb-1">Dr. Sarah Ibrahim {{i}}</h4>
              <p class="text-green-700 font-bold text-sm mb-3">Associate Professor</p>
              <p class="text-slate-500 text-sm flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                AI & Machine Learning
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 5. Gallery (Solid Dark Slate: #0f172a) -->
    <section class="py-24" style="background-color: #0f172a;">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
          <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Life at the Department</h2>
          <p class="text-slate-400 max-w-2xl mx-auto text-lg">Explore our state-of-the-art facilities, laboratories, and incredibly vibrant student community.</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[200px]">
          <div class="md:col-span-2 md:row-span-2 rounded-2xl overflow-hidden bg-slate-800 relative group" data-aos="zoom-in" data-aos-delay="100">
            <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Lab">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
              <span class="text-white font-bold text-xl">Advanced Software Labs</span>
            </div>
          </div>
          <div class="rounded-2xl overflow-hidden bg-slate-800 relative group" data-aos="zoom-in" data-aos-delay="200">
            <img src="https://images.unsplash.com/photo-1528901170757-b45b23d57fdf?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Students">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
              <span class="text-white font-bold">Collaborative Hubs</span>
            </div>
          </div>
          <div class="rounded-2xl overflow-hidden bg-slate-800 relative group" data-aos="zoom-in" data-aos-delay="300">
            <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Event">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
              <span class="text-white font-bold">Seminars</span>
            </div>
          </div>
          <div class="rounded-2xl overflow-hidden bg-slate-800 relative group" data-aos="zoom-in" data-aos-delay="400">
            <img src="https://images.unsplash.com/photo-1515524738708-327f6b0037a7?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Projects">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
              <span class="text-white font-bold">Hardware Lab</span>
            </div>
          </div>
          <div class="rounded-2xl overflow-hidden bg-slate-800 relative group" data-aos="zoom-in" data-aos-delay="500">
            <img src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Seminar">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
              <span class="text-white font-bold">Tech Symposiums</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 6. Systems (Gradient: #f8fafc to white) -->
    <section class="py-24" style="background: linear-gradient(to bottom, #f8fafc 0%, #ffffff 100%);">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-slate-800 mb-6" data-aos="fade-up">Our Core Portals</h2>
        <p class="text-slate-600 mb-12 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">Access essential academic and administrative tools designed for our completely digital ecosystem.</p>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-10" data-aos="fade-up" data-aos-delay="200">
          <a href="#" class="px-8 py-10 bg-white border border-slate-200 shadow-sm rounded-2xl text-center font-bold text-slate-800 hover:text-green-700 hover:border-green-500 hover:shadow-xl transition-all flex flex-col items-center gap-4 group">
            <div class="w-16 h-16 bg-slate-50 text-slate-600 rounded-full flex items-center justify-center group-hover:bg-green-50 group-hover:text-green-600 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" /></svg>
            </div>
            Student Portal
          </a>
          <a href="#" class="px-8 py-10 bg-white border border-slate-200 shadow-sm rounded-2xl text-center font-bold text-slate-800 hover:text-green-700 hover:border-green-500 hover:shadow-xl transition-all flex flex-col items-center gap-4 group">
            <div class="w-16 h-16 bg-slate-50 text-slate-600 rounded-full flex items-center justify-center group-hover:bg-green-50 group-hover:text-green-600 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354A4 4 0 1115.354 12H8.646A4 4 0 1112 4.354z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 20h14v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2z" /></svg>
            </div>
            Staff Dashboard
          </a>
          <a href="#" class="px-8 py-10 bg-white border border-slate-200 shadow-sm rounded-2xl text-center font-bold text-slate-800 hover:text-green-700 hover:border-green-500 hover:shadow-xl transition-all flex flex-col items-center gap-4 group">
            <div class="w-16 h-16 bg-slate-50 text-slate-600 rounded-full flex items-center justify-center group-hover:bg-green-50 group-hover:text-green-600 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            </div>
            E-Library
          </a>
          <a href="#" class="px-8 py-10 bg-white border border-slate-200 shadow-sm rounded-2xl text-center font-bold text-slate-800 hover:text-green-700 hover:border-green-500 hover:shadow-xl transition-all flex flex-col items-center gap-4 group">
            <div class="w-16 h-16 bg-slate-50 text-slate-600 rounded-full flex items-center justify-center group-hover:bg-green-50 group-hover:text-green-600 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
            </div>
            Results Checker
          </a>
        </div>
      </div>
    </section>

    <!-- 7. NACOS (Gradient 165deg: #0f172a 0%, #1e293b 60%, #0f4c2e 100%) -->
    <section class="py-24 relative overflow-hidden" style="background: linear-gradient(165deg, #0f172a 0%, #1e293b 70%, #0f4c2e 100%);">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
          
          <!-- Left Side: Content -->
          <div class="space-y-8" data-aos="fade-right">
            <div>
              <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-[#112d22] border border-[#1e4835] text-[#4ade80] font-bold text-xs tracking-wider uppercase mb-6">
                <!-- Users Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354A4 4 0 1115.354 12H8.646A4 4 0 1112 4.354z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 20h14v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2z" /></svg>
                Student Association
              </span>
              <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">NACOS</h2>
              <p class="text-[17px] text-slate-300 leading-relaxed max-w-lg mb-8">
                The National Association of Computing Students (NUK Chapter) — empowering students through leadership, innovation and community.
              </p>
            </div>

            <!-- About Card -->
            <div class="bg-[#1b2434] border border-[#2a384e] rounded-2xl p-6">
              <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </div>
                <div>
                  <h3 class="text-white font-bold text-lg">About NACOS</h3>
                  <p class="text-slate-400 text-sm">NUK Chapter</p>
                </div>
              </div>
              <p class="text-slate-300 text-sm leading-relaxed">
                NACOS is the umbrella body for all computing students. We foster academic excellence, professional development, and social bonds among members through events, workshops, competitions, and community service.
              </p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-4">
              <div class="bg-[#1b2434] border border-[#2a384e] rounded-2xl p-4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-[#4ade80] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                <div class="text-2xl font-bold text-white mb-1">5</div>
                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Past Leaders</div>
              </div>
              <div class="bg-[#1b2434] border border-[#2a384e] rounded-2xl p-4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-[#4ade80] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                <div class="text-2xl font-bold text-white mb-1">50+</div>
                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Events Hosted</div>
              </div>
              <div class="bg-[#1b2434] border border-[#2a384e] rounded-2xl p-4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-[#4ade80] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 14l9-5-9-5-9 5 9 5z" /><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" /></svg>
                <div class="text-2xl font-bold text-white mb-1">500+</div>
                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Active Members</div>
              </div>
            </div>
          </div>

          <!-- Right Side: Profiles & CTA -->
          <div class="space-y-6" data-aos="fade-left">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
              <!-- Card 1 (Habibat) -->
              <div class="bg-[#121c27] rounded-2xl overflow-hidden border border-[#1e2a3a] flex flex-col text-center shadow-lg relative group h-[290px]">
                <div class="w-full h-44 relative">
                  <img src="https://images.unsplash.com/photo-1531123897727-8f129e1bf98c?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover">
                  <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#121c27] to-transparent"></div>
                </div>
                <div class="px-2 pb-5 mt-[-1.5rem] relative z-10 flex flex-col items-center justify-end h-full">
                  <h4 class="text-white font-extrabold text-sm mb-3">Miss. Habibat</h4>
                  <div class="inline-block px-3 py-1 border border-[#1b3b2c] rounded-full mb-3">
                    <span class="text-[#4ade80] text-[10px] font-bold">2025 &ndash; Present</span>
                  </div>
                  <p class="text-[9px] font-bold tracking-widest text-[#3b82f6] uppercase">&bull; Current President &bull;</p>
                </div>
              </div>

              <!-- Card 2 (Kefas Bukus) -->
              <div class="bg-[#121c27] rounded-2xl overflow-hidden border border-[#1e2a3a] flex flex-col text-center shadow-lg relative group h-[290px]">
                <div class="w-full h-44 relative">
                  <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover grayscale">
                  <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#121c27] to-transparent"></div>
                </div>
                <div class="px-2 pb-5 mt-[-1.5rem] relative z-10 flex flex-col items-center justify-end h-full">
                  <h4 class="text-white font-extrabold text-sm mb-3">Mr. K. Kefas Bukus</h4>
                  <div class="inline-block px-3 py-1 border border-[#1b3b2c] rounded-full mb-3">
                    <span class="text-[#4ade80] text-[10px] font-bold">2024 &ndash; 2025</span>
                  </div>
                  <p class="text-[9px] font-bold tracking-widest text-[#eab308] uppercase">&bull; Just Graduated &bull;</p>
                </div>
              </div>

              <!-- Card 3 (Mulka III) -->
              <div class="bg-[#121c27] rounded-2xl overflow-hidden border border-[#1e2a3a] flex flex-col text-center shadow-lg relative group h-[290px]">
                <div class="w-full h-44 relative">
                  <img src="https://images.unsplash.com/photo-1530268729831-4b0b9e170218?q=80&w=400&auto=format&fit=crop" class="w-full h-full object-cover">
                  <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#121c27] to-transparent"></div>
                </div>
                <div class="px-2 pb-5 mt-[-1.5rem] relative z-10 flex flex-col items-center justify-end h-full">
                  <h4 class="text-white font-extrabold text-sm mb-3">Mr. Mulka III</h4>
                  <div class="inline-block px-3 py-1 border border-[#1b3b2c] rounded-full mb-3">
                    <span class="text-[#4ade80] text-[10px] font-bold">2023 &ndash; 2024</span>
                  </div>
                  <p class="text-[9px] font-bold tracking-widest text-slate-500 uppercase">&bull; Past &bull;</p>
                </div>
              </div>
            </div>

            <!-- CTA Banner -->
            <div class="bg-[#174835] rounded-xl border border-[#246246] p-6 flex flex-row items-center justify-between group cursor-pointer hover:bg-[#1b553e] transition-colors shadow-xl">
              <div>
                <h4 class="text-white font-bold text-lg mb-1">Explore NACOS History</h4>
                <p class="text-[#89bca5] text-sm group-hover:text-white transition-colors">See all past leaders, their tenure and achievements</p>
              </div>
              <div class="w-10 h-10 rounded-full bg-[#208759] flex flex-col items-center justify-center shrink-0 border border-[#2eb579]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- 8. News & Events (Solid White: white) -->
    <section class="py-24 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6" data-aos="fade-up">
          <div>
            <h2 class="text-3xl md:text-5xl font-bold text-slate-800 mb-4">Latest News & Events</h2>
            <p class="text-slate-600 text-lg">Stay completely updated with happenings around the department.</p>
          </div>
          <button class="text-green-700 font-bold hover:text-green-800 text-lg flex items-center gap-2 group">View All News <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span></button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <article v-for="i in 3" :key="'news'+i" class="bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-shadow duration-300 group" data-aos="fade-up" :data-aos-delay="i*100">
            <div class="overflow-hidden h-56">
                <img :src="`https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=600&auto=format&fit=crop&sig=${i}`" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="News Image">
            </div>
            <div class="p-8">
              <span class="text-xs font-black text-green-700 uppercase tracking-widest mb-3 block">Hackathon {{ 2026 + i }}</span>
              <h3 class="text-2xl font-bold text-slate-800 mb-4 group-hover:text-green-700 transition-colors">NSUK CS Students Win National Tech Challenge</h3>
              <p class="text-slate-600 mb-6 line-clamp-3">Our final year students emerged victorious at the annual coding competition held in Abuja this weekend, showcasing exceptional skills in algorithmic problem solving and system design paradigms...</p>
              <a href="#" class="text-green-700 font-bold hover:underline flex items-center gap-1">Read Article &rarr;</a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- 9. Timetable (No explicit background, inherits) -->
    <section class="py-24 border-t border-slate-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center bg-slate-50 rounded-3xl p-12 md:p-20" data-aos="zoom-in">
        <h2 class="text-3xl md:text-5xl font-bold text-slate-800 mb-6">Academic Timetables</h2>
        <p class="text-slate-600 text-lg mb-10 max-w-2xl mx-auto">Access the latest verified lecture and examination timetables for all levels securely.</p>
        <div class="inline-flex flex-col sm:flex-row gap-4 justify-center w-full">
          <button class="px-8 py-4 bg-slate-800 text-white rounded-xl font-bold hover:bg-slate-700 transition-colors shadow-lg">Download 100L-400L Lectures</button>
          <button class="px-8 py-4 bg-white text-slate-800 rounded-xl font-bold border-2 border-slate-200 hover:border-slate-300 transition-colors">View Exam Draft</button>
        </div>
      </div>
    </section>

    <!-- 10. Partners/Affiliations (Gradient 135deg, #f8fafc to #e0e7ff) -->
    <section class="py-20" style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <p class="text-sm font-bold text-slate-500 uppercase tracking-widest mb-10">In Partnership With Industry Leaders</p>
        <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-50 grayscale hover:grayscale-0 transition-all duration-700">
          <div class="h-8 md:h-12 w-32 bg-slate-300 rounded animate-pulse"></div> <!-- Placeholder partners -->
          <div class="h-8 md:h-12 w-32 bg-slate-300 rounded animate-pulse"></div>
          <div class="h-8 md:h-12 w-32 bg-slate-300 rounded animate-pulse"></div>
          <div class="h-8 md:h-12 w-32 bg-slate-300 rounded animate-pulse"></div>
        </div>
      </div>
    </section>

    <!-- 11. Call to Action (Gradient 105deg: #14532d 0%, #15803d 100%) -->
    <section class="py-32 relative overflow-hidden" style="background: linear-gradient(105deg, #14532d 0%, #15803d 100%);">
      <div class="absolute -right-32 -bottom-32 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
      <div class="absolute -left-32 -top-32 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="zoom-in">
        <h2 class="text-4xl md:text-6xl font-extrabold text-white mb-8">Ready to Shape the Future?</h2>
        <p class="text-green-100 text-xl md:text-2xl max-w-3xl mx-auto mb-12 font-light">Take the massive next step in your academic and professional technological journey right here with us.</p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
          <button class="px-10 py-5 bg-white text-green-800 rounded-xl font-extrabold text-lg hover:bg-slate-50 transition-colors shadow-2xl hover:scale-105 transform">Start Your Application</button>
          <button class="px-10 py-5 border-2 border-green-400 text-white rounded-xl font-extrabold text-lg hover:bg-green-400/20 transition-colors">Contact Admissions</button>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { useSeo } from '../../composables/useSeo';

useSeo('Home', 'Welcome to the Nasarawa State University Keffi (NSUK) Department of Computer Science. Dedicated to excellence in teaching, research, and service.');
</script>
