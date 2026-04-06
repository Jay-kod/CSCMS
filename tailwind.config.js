/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: '#166534', // Deep Green
                secondary: '#EAB308', // Accent Gold
                neutral: '#F3F4F6', // Off White/Gray
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                serif: ['Merriweather', 'serif'],
            },
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [
            {
                csdept: {
                    "primary": "#166534",
                    "secondary": "#EAB308",
                    "accent": "#22C55E",
                    "neutral": "#1F2937",
                    "base-100": "#ffffff",
                    "info": "#3ABFF8",
                    "success": "#36D399",
                    "warning": "#FBBD23",
                    "error": "#F87272",
                },
            },
        ],
    },
}
