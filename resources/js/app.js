import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import router from './router';
import App from './App.vue';

// Plugins
import AOS from 'aos';
import 'aos/dist/aos.css';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

// Init Pinia
const pinia = createPinia();

const app = createApp(App);

import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;

window.Swal = Swal.mixin({
    confirmButtonColor: '#166534',
    cancelButtonColor: '#F87272',
    customClass: {
        popup: 'rounded-xl shadow-xl'
    }
});

app.mixin({
    mounted() {
        AOS.init({
            duration: 800,
            once: true,
        });
    }
});

app.use(pinia);
app.use(router);
app.mount('#app');

