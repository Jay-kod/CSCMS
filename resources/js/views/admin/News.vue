<template>
  <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-bold font-serif text-gray-800">News & Updates Management</h2>
      <button class="btn btn-secondary btn-sm text-gray-900 border-none" @click="createNews">+ Compose Article</button>
    </div>

    <!-- Data Table Wrapper -->
    <div class="overflow-x-auto border rounded-xl">
      <vue3-datatable
        :rows="news"
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
const news = ref([
    { id: 101, title: "NSUK 2026 Resumption Updates", author: "IT Admin", date: "April 6, 2026", status: "Published" },
    { id: 102, title: "Departmental Symposium Next Week", author: "IT Admin", date: "April 8, 2026", status: "Draft" }
]);

const cols = ref([
    { field: "id", title: "ID", isUnique: true },
    { field: "title", title: "Article Title" },
    { field: "author", title: "Author" },
    { field: "date", title: "Date Added" },
    { field: "status", title: "Visibility" }
]);

const createNews = () => {
    window.Swal.fire({
        title: "Create News",
        text: "This will open the WYSIWYG editor component in a real scenario.",
        icon: "info",
        confirmButtonColor: "#EAB308" // Gold for Admin Context
    });
};
</script>