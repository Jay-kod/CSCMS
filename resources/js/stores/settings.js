import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useSettingsStore = defineStore('settings', () => {
    const logo = ref(null)
    const site_name = ref('Dept. of Computer Science')

    const fetchSettings = async () => {
        try {
            const response = await window.axios.get('/api/settings')
            if (response.data) {
                logo.value = response.data.logo || null
                site_name.value = response.data.site_name || 'Dept. of Computer Science'
            }
        } catch (error) {
            console.error('Failed to fetch settings:', error)
        }
    }

    return {
        logo,
        site_name,
        fetchSettings
    }
})