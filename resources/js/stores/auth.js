import { defineStore } from 'pinia';
import axios from 'axios';

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        token: localStorage.getItem('token') || null,
        roles: [],
        permissions: [],
    }),
    getters: {
        isAuthenticated: (state) => !!state.token,
        hasRole: (state) => (role) => state.roles.includes(role),
    },
    actions: {
        async login(credentials) {
            await axios.get('/sanctum/csrf-cookie');
            const response = await axios.post('/api/auth/login', credentials);
            
            this.token = response.data.token;
            this.user = response.data.user;
            this.roles = response.data.user.roles.map(r => r.name);
            this.permissions = response.data.user.permissions.map(p => p.name);
            
            localStorage.setItem('token', this.token);
            axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`;
        },
        async fetchUser() {
            if (!this.token) return null;
            
            try {
                axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`;
                const response = await axios.get('/api/auth/me');
                this.user = response.data;
                this.roles = response.data.roles.map(r => r.name);
                this.permissions = response.data.permissions.map(p => p.name);
            } catch (error) {
                this.logout();
            }
        },
        logout() {
            this.user = null;
            this.token = null;
            this.roles = [];
            this.permissions = [];
            localStorage.removeItem('token');
            delete axios.defaults.headers.common['Authorization'];
        }
    }
});