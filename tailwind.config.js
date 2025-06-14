// tailwind.config.js
const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class", // Mengaktifkan mode gelap berbasis class pada <html>
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Light Theme Colors
                "light-primary": "#2F4F4F", // Deep Forest Green
                "light-secondary": "#8FBC8F", // Muted Sage Green
                "light-accent": "#FAB470", // Warm Clay/Soft Orange (Pop)
                "light-neutral": "#5D6D7E", // Warm Gray (Text)
                "light-base-100": "#FAF7F0", // Off-white/Cream (Background)
                "light-base-200": "#F0EBE3", // Lighter Beige/Gray
                "light-base-300": "#E1D9C9", // Light Beige/Gray (Borders, Cards)
                "light-text-default": "#34495E", // Darker Warm Gray for main text
                "light-text-muted": "#708090", // Lighter Warm Gray for muted text

                // Dark Theme Colors
                "dark-primary": "#A3B86C", // Lighter, desaturated Forest Green
                "dark-secondary": "#5A7D5A", // Darker Muted Sage
                "dark-accent": "#F28B82", // Brighter Terracotta/Clay (Pop)
                "dark-neutral": "#B0B8B0", // Light Gray/Beige (Text)
                "dark-base-100": "#1E2A22", // Very Dark Desaturated Green/Brown (Background)
                "dark-base-200": "#161F1A", // Darker
                "dark-base-300": "#0F1411", // Darkest (Borders, Cards)
                "dark-text-default": "#D0D8D0", // Light Grayish Green for main text
                "dark-text-muted": "#808880", // Darker Grayish Green for muted text
            },
            // Animasi kustom
            keyframes: {
                "fade-in-down": {
                    "0%": { opacity: "0", transform: "translateY(-12px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
                "fade-in-up": {
                    "0%": { opacity: "0", transform: "translateY(12px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
            },
            animation: {
                "fade-in-down": "fadeInDown 0.5s ease-out forwards",
                "fade-in-up": "fadeInUp 0.5s ease-out forwards",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
