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
            { path: 'about', name: 'about', component: About },
            { path: 'about/vision-mission', name: 'about.vision', component: About },
            { path: 'about/hod-message', name: 'about.hod', component: About },
            { path: 'about/association', name: 'about.association', component: About },
            { path: 'academics', name: 'academics', component: Academics },
            { path: 'academics/programmes', name: 'academics.programmes', component: Academics },
            { path: 'academics/:slug', name: 'academics.subdept', component: Academics },
            { path: 'academics/siwes', name: 'academics.siwes', component: Academics },
            { path: 'academics/fyp', name: 'academics.fyp', component: Academics },
            { path: 'people/staff', name: 'people.staff', component: Home }, // placeholder
            { path: 'contact', name: 'contact', component: Contact },
            { path: 'news', name: 'news.index', component: Home }, // placeholder
            { path: 'events', name: 'events.index', component: Home }, // placeholder
            { path: 'calendar', name: 'calendar', component: Home }, // placeholder
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
    const token = localStorage.getItem('token');
    
    // 1. Prevent authorized users from seeing the login screen again
    if (to.name === 'admin.login' || to.name === 'super-admin.login') {
        if (token) {
            // Ideally we check their role inside authStore here, but for now we push back
            return next('/');
        }
    }

    // 2. Prevent Public Guests from hitting /admin/* endpoints (Redirect them to their specific login)
    if (to.path.startsWith('/admin') && !to.path.startsWith('/admin/login') && !token) {
        return next({ name: 'admin.login' });
    }
    
    // 3. Prevent Public Guests from hitting /super-admin/* endpoints (Redirect them to their specific login)
    if (to.path.startsWith('/super-admin') && !to.path.startsWith('/super-admin/login') && !token) {
        return next({ name: 'super-admin.login' });
    }

    next();
});

export default router;
