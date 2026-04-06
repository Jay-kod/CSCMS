<template>
  <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold font-serif text-gray-800 mb-6">Global Site Settings</h2>
    
    <form @submit.prevent="saveSettings" class="space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-6 border-b border-gray-100">
        <div class="form-control">
          <label class="label"><span class="label-text font-bold text-gray-600">Site Name</span></label>
          <input type="text" v-model="settings.site_name" class="input input-bordered w-full" />
        </div>
        
        <div class="form-control">
          <label class="label"><span class="label-text font-bold text-gray-600">Contact Email</span></label>
          <input type="email" v-model="settings.contact_email" class="input input-bordered w-full" />
        </div>

        <div class="form-control">
          <label class="label"><span class="label-text font-bold text-gray-600">Contact Phone</span></label>
          <input type="text" v-model="settings.contact_phone" class="input input-bordered w-full" />
        </div>

        <div class="form-control">
          <label class="label"><span class="label-text font-bold text-gray-600">Address</span></label>
          <input type="text" v-model="settings.address" class="input input-bordered w-full" />
        </div>
      </div>

      <div class="flex justify-end pt-4">
        <button type="submit" class="btn btn-primary px-10 text-white font-bold">
          Save Settings
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";

const settings = ref({
    site_name: "NSUK Computer Science",
    contact_email: "cs@nsuk.edu.ng",
    contact_phone: "+234 800 000 0000",
    address: "Keffi, Nasarawa State, Nigeria"
});

const saveSettings = () => {
    window.Swal.fire({
        title: "Success",
        text: "Global Site Settings saved successfully!",
        icon: "success"
    });
};
</script>
