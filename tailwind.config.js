/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'cinzel': ['Cinzel', 'serif'],
                'montserrat': ['Montserrat', 'sans-serif']
            },
        },
    },
    plugins: [],
}
