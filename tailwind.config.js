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
                brown: {
                    600: "#8B4513", // SaddleBrown
                    700: "#5D2C0C", // Darker brown
                },
            },
        },
    },
    plugins: [],
};
 
 
