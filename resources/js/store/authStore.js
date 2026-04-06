import { defineStore } from 'pinia';
import axios from 'axios';

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        token: localStorage.getItem('token') || null,
        roles: [],
    }),
    
    getters: {
        isAuthenticated: (state) => !!state.token,
        isSuperAdmin: (state) => state.roles.includes('super_admin'),
        isAdmin: (state) => state.roles.includes('admin'),
    },
    
    actions: {
        async fetchUser() {
            try {
                const response = await axios.get('/api/v1/auth/me');
                this.user = response.data.data;
                this.roles = response.data.data.roles;
            } catch (error) {
                this.logout();
            }
        },
        
        async login(credentials) {
            const response = await axios.post('/api/v1/auth/login', credentials);
            this.token = response.data.auth.token;
            localStorage.setItem('token', this.token);
            await this.fetchUser();
            
            // Setup default auth header
            axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`;
        },
        
        async logout() {
            try {
                if (this.token) await axios.post('/api/v1/auth/logout');
            } catch (error) {
                // Ignore failure on backend, just clear locally
            }
            this.user = null;
            this.token = null;
            this.roles = [];
            localStorage.removeItem('token');
            delete axios.defaults.headers.common['Authorization'];
        },
    },
});