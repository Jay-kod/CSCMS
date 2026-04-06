<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100" data-aos="fade-up">
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-primary font-serif tracking-tight">NSUK CS Portal</h2>
        <p class="mt-3 text-sm text-gray-500 font-sans">
          Sign in to access your <span class="font-bold text-green-700">{{ type || 'administrative' }}</span> dashboard
        </p>
      </div>
      
      <form class="mt-8 space-y-6" @submit.prevent="handleLogin">
        <div class="space-y-4">
          <div class="form-control">
            <label class="label">
              <span class="label-text font-bold text-gray-700">Email Address</span>
            </label>
            <input 
              type="email" 
              v-model="form.email" 
              required 
              class="input input-bordered w-full focus:border-primary focus:ring-primary" 
              placeholder="admin@nsuk.edu.ng"
            />
          </div>
          
          <div class="form-control">
            <label class="label">
              <span class="label-text font-bold text-gray-700">Password</span>
            </label>
            <input 
              type="password" 
              v-model="form.password" 
              required 
              class="input input-bordered w-full focus:border-primary focus:ring-primary" 
              placeholder="��������"
            />
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember-me" name="remember-me" type="checkbox" class="checkbox checkbox-primary checkbox-sm border-gray-300" />
            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
              Remember me
            </label>
          </div>

          <div class="text-sm">
            <a href="#" class="font-medium text-primary hover:text-green-700 transition">
              Forgot your password?
            </a>
          </div>
        </div>

        <div>
          <button 
            type="submit" 
            class="btn btn-primary w-full shadow-lg text-white font-bold" 
            :disabled="loading"
          >
            <span v-if="loading" class="loading loading-spinner loading-sm"></span>
            {{ loading ? 'Signing in...' : 'Sign In' }}
          </button>
        </div>
      </form>
      
      <div class="mt-6 text-center">
        <router-link to="/" class="text-sm font-medium text-gray-500 hover:text-primary transition flex justify-center items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Public Website
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
// import { useAuthStore } from "../../stores/auth";

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
