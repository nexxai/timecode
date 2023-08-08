/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.html"
    ],
    theme: {
        extend: {
            screens: {
                'xs': '400px'
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}

