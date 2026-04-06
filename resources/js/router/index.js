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
    { path: '/admin/login', name: 'admin.login', component: Login, props: { type: 'Department Admin' } },
    { path: '/super-admin/login', name: 'super-admin.login', component: Login, props: { type: 'Super Admin' } },
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

router.beforeEach((to, from, next) => {
    // Assuming authStore logic will be hooked in here
    // For now we setup the systematic guard structure to avoid collisions
    
    // Prevent logged-in users from hitting login pages again
    const isAuthenticated = localStorage.getItem('token');
    
    if (to.name === 'admin.login' || to.name === 'super-admin.login') {
        if (isAuthenticated) {
            // They are already logged in, push them to their respective dashboard
            // depending on what their role actually is
            // For now, default fallback:
            return next('/');
        }
    }

    // Require Auth for Admin / Super Admin routes
    if (to.path.startsWith('/admin') && to.name !== 'admin.login') {
        if (!isAuthenticated) return next({ name: 'admin.login' });
    }
    
    if (to.path.startsWith('/super-admin') && to.name !== 'super-admin.login') {
        if (!isAuthenticated) return next({ name: 'super-admin.login' });
    }

    next();
});

export default router;
