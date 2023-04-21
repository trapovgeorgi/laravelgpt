/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors:{
                primary: "rgb(32,33,35)",
                secondary: "rgb(52,53,65)",
                secondary_light: "rgb(64,65,79)",
                text: "rgb(217, 217, 227)"
            }
        },
    },
    plugins: [],
};
