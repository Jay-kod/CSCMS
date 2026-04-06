<template>
  <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-bold font-serif text-gray-800">User Management</h2>
      <button class="btn btn-primary btn-sm" @click="openCreateModal">+ Create User</button>
    </div>

    <!-- Data Table Wrapper -->
    <div class="overflow-x-auto">
      <vue3-datatable
        :rows="users"
        :columns="cols"
        :loading="loading"
        :sortable="true"
        :searchable="true"
      ></vue3-datatable>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import Vue3Datatable from "@bhplugin/vue3-datatable";
import "@bhplugin/vue3-datatable/dist/style.css";

const loading = ref(false);
const users = ref([
    { id: 1, name: "Super Admin", email: "admin@nsuk.edu.ng", role: "super_admin", status: "Active" }
]);

const cols = ref([
    { field: "id", title: "ID", isUnique: true },
    { field: "name", title: "Full Name" },
    { field: "email", title: "Email Address" },
    { field: "role", title: "System Role" },
    { field: "status", title: "Account Status" }
]);

const openCreateModal = () => {
    window.Swal.fire({
        title: "Create User",
        text: "This feature will open a component modal to create a user.",
        icon: "info"
    });
};
</script>
