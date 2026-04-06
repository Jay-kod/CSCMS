<template>
  <div class="min-h-screen flex flex-col md:flex-row bg-gray-50">
    
    <!-- Left Side: Welcome Graphic/Message (Hidden on very small screens, visible on md and up) -->
    <div class="md:w-1/2 bg-primary text-white flex flex-col justify-center px-8 py-16 md:px-16 space-y-6 relative overflow-hidden" data-aos="fade-right">
      <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] mix-blend-overlay"></div>
      
      <div class="relative z-10">
        <h1 class="text-4xl md:text-5xl font-extrabold font-serif mb-4 leading-tight">
          Nasarawa State University, Keffi
        </h1>
        <h2 class="text-2xl md:text-3xl font-bold text-secondary mb-6 tracking-wide">
          Department of Computer Science
        </h2>
        
        <div class="w-20 h-1 bg-secondary rounded-full mb-6"></div>
        
        <p class="text-lg md:text-xl font-light text-blue-100 max-w-lg leading-relaxed">
          Welcome to the {{ type || 'administrative' }} gateway. 
          Please sign in to securely manage departmental data, students, courses, and announcements.
        </p>
      </div>

      <div class="relative z-10 mt-auto pt-16">
        <router-link to="/" class="inline-flex items-center text-blue-200 hover:text-white font-medium transition-colors group">
          <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
          Return to Public Portal
        </router-link>
      </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="md:w-1/2 w-full flex items-center justify-center p-8 sm:p-12 relative" data-aos="fade-left">
      <div class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-2xl shadow-2xl border border-gray-100">
        <div class="text-center">
          <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 mb-4">
            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
          </div>
          <h2 class="text-3xl font-extrabold text-primary font-serif tracking-tight">Access Portal</h2>
          <p class="mt-2 text-sm text-gray-500 font-sans">
            Authorizing as: <span class="font-bold px-2 py-1 bg-green-100 text-green-800 rounded-md">{{ type || 'Administrator' }}</span>
          </p>
        </div>
        
        <form class="mt-8 space-y-6" @submit.prevent="handleLogin">
          <div class="space-y-5">
            <div class="form-control">
              <label class="label">
                <span class="label-text font-bold text-gray-700">Email Address</span>
              </label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                </div>
                <input 
                  type="email" 
                  v-model="form.email" 
                  required 
                  class="input input-bordered w-full pl-10 focus:border-primary focus:ring-primary shadow-sm" 
                  placeholder="admin@nsuk.edu.ng"
                />
              </div>
            </div>
            
            <div class="form-control">
              <label class="label">
                <span class="label-text font-bold text-gray-700">Password</span>
              </label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <input 
                  type="password" 
                  v-model="form.password" 
                  required 
                  class="input input-bordered w-full pl-10 focus:border-primary focus:ring-primary shadow-sm" 
                  placeholder="��������"
                />
              </div>
            </div>
          </div>

          <div class="flex items-center justify-between pt-2">
            <div class="flex items-center">
              <input id="remember-me" name="remember-me" type="checkbox" class="checkbox checkbox-primary checkbox-sm border-gray-300" />
              <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                Keep me logged in
              </label>
            </div>

            <div class="text-sm">
              <a href="#" class="font-bold text-primary hover:text-green-700 transition">
                Forgot password?
              </a>
            </div>
          </div>

          <div class="pt-4">
            <button 
              type="submit" 
              class="btn btn-primary w-full shadow-lg text-white font-bold text-lg h-12" 
              :disabled="loading"
            >
              <span v-if="loading" class="loading loading-spinner loading-md"></span>
              {{ loading ? 'Authenticating...' : 'Secure Sign In' }}
            </button>
          </div>

          <!-- Demo Credentials Helper -->
          <div class="mt-6 border-t border-gray-100 pt-6">
            <p class="text-sm text-gray-500 text-center mb-4">For testing purposes:</p>
            <div class="flex justify-center">
              <button 
                type="button" 
                @click="fillDemoCredentials" 
                class="btn btn-outline btn-sm btn-secondary hover:text-white"
              >
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                Auto-Fill {{ type }} Demo
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
// import { useAuthStore } from "../../stores/auth";

const props = defineProps({
    type: {
        type: String,
        default: 'Administrative'
    }
});

const router = useRouter();
// const authStore = useAuthStore();

const form = ref({
    email: "",
    password: ""
});

const loading = ref(false);

const handleLogin = async () => {
    loading.value = true;
    
    // Simulate real API timing
    setTimeout(async () => {
        try {
            // Uncomment to use real logic:
            // await authStore.login(form.value);
            
            // Dummy logic for demonstration
            if (form.value.email === "admin@nsuk.edu.ng") {
                window.Swal.fire({
                    icon: 'success',
                    title: 'Welcome Back',
                    showConfirmButton: false,
                    timer: 1500
                });
                // Route simulation
                router.push("/super-admin");
            } else if (form.value.email === "dept@nsuk.edu.ng") {
                router.push("/admin");
            } else {
                router.push("/super-admin");
            }
        } catch (error) {
            window.Swal.fire({
                icon: 'error',
                title: 'Authentication Failed',
                text: 'Invalid email or password. Please try again.'
            });
        } finally {
            loading.value = false;
        }
    }, 1200);
};
</script>
