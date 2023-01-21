/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./index.html",
        "./src/**/*.{js,ts,jsx,tsx,vue}",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            sans: ['Rubik'],
        },

        extend: {
            scale: {
                '175': '1.75',
            },
            colors: {
                'bit-blue': '#062266',
            },

        },
    },
    plugins: [],
}
