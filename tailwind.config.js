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
                asparagus: {
                    50: "#F6FAF3",
                    100: "#E9F4E4",
                    200: "#D5E7CB",
                    300: "#B2D3A2",
                    400: "#88B771",
                    500: "#689C4E",
                    600: "#517E3B",
                    700: "#426431",
                    800: "#37502B",
                    900: "#2E4225",
                    950: "#152310",
                },
                armadillo: {
                    50: "#F6F5F5",
                    100: "#ECEBE8",
                    200: "#D7D5D1",
                    300: "#B6AEAA",
                    400: "#908680",
                    500: "#756B65",
                    600: "#645D56",
                    700: "#544F4A",
                    800: "#4B4743",
                    900: "#403D39",
                    950: "#282624",
                },
            },
            fontFamily: {
                sans: "Noto Sans, Arial, sans-serif",
                title: "Merienda, Arial, sans-serif",
            },
            width: {
                drawer: "40rem",
            },
        },
        plugins: [],
    },
};
