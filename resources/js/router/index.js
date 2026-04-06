import { createRouter, createWebHistory } from 'vue-router';

// Public Layout & Views
import PublicLayout from '../layouts/PublicLayout.vue';
import Home from '../views/public/Home.vue';
import NewsArticle from '../views/public/NewsArticle.vue';
import About from '../views/public/About.vue';
import Academics from '../views/public/Academics.vue';
import Contact from '../views/public/Contact.vue';

// Auth Views
import Login from '../views/auth/Login.vue';

// Super Admin Layout & Views
import SuperAdminLayout from '../layouts/SuperAdminLayout.vue';
import Dashboard from '../views/superadmin/Dashboard.vue';
import Users from '../views/superadmin/Users.vue';
import Settings from '../views/superadmin/Settings.vue';

// Admin Layout & Views
import AdminLayout from '../layouts/AdminLayout.vue';
import AdminDashboard from '../views/admin/Dashboard.vue';
import AdminNews from '../views/admin/News.vue';

const routes = [
    {
        path: '/',
        component: PublicLayout,
        children: [
            { path: '', name: 'home', component: Home },
            { path: 'about', name: 'public.about', component: About },
            { path: 'academics', name: 'public.academics', component: Academics },
            { path: 'contact', name: 'public.contact', component: Contact },
            { path: 'news/:slug', name: 'public.news.show', component: NewsArticle }
        ]
    },
    { path: '/login', name: 'login', component: Login },
    {
        path: '/super-admin',
        component: SuperAdminLayout,
        meta: { role: 'super_admin' },
        children: [
            { path: '', name: 'super-admin.dashboard', component: Dashboard },
            { path: 'users', name: 'super-admin.users', component: Users },
            { path: 'settings', name: 'super-admin.settings', component: Settings }
        ]
    },
    {
        path: '/admin',
        component: AdminLayout,
        meta: { role: 'dept_admin' },
        children: [
            { path: '', name: 'admin.dashboard', component: AdminDashboard },
            { path: 'news', name: 'admin.news', component: AdminNews }
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
