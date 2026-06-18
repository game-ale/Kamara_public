/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/website/**/*.blade.php',
        './resources/views/components/website/**/*.blade.php',
        './resources/views/layouts/website/**/*.blade.php',
        './resources/views/livewire/website/**/*.blade.php',
        './app/Livewire/Website/**/*.php',
    ],
    theme: {
        extend: {
            colors: {
                navy: {
                    700: '#1B2F52',
                    800: '#0F1F3D',
                    900: '#0A1628',
                },
                gold: {
                    100: '#F5E6C8',
                    400: '#D4A017',
                    500: '#B8860B',
                },
                gray: {
                    50: '#F7F9FC',
                    600: '#595959',
                }
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                heading: ['DM Sans', 'sans-serif'],
                quote: ['Georgia', 'serif'],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
