import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                gimysite: {
                    50: '#F0FDF4',
                    100: '#DCFCE7',
                    200: '#BBF7D0',
                    300: '#86EFAC',
                    400: '#4ADE80',
                    500: '#22C55E',
                    600: '#16A34A',
                    700: '#15803D',
                    800: '#166534',
                    900: '#14532D',
                    950: '#0C3D22',
                },
                /*
                gimysite: {
                    50: '#eef2ff',
                    100: '#e0e7ff',
                    200: '#c7d2fe',
                    300: '#a5b4fc',
                    400: '#818cf8',
                    500: '#6366f1',
                    600: '#4f46e5',
                    700: '#4338ca',
                    800: '#3730a3',
                    900: '#312e81',
                    950: '#1e1b4b',
                },
                */
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        function ({ addBase, addUtilities, theme }) {
            addBase({
                '*': {
                    'scrollbar-width': 'none',
                    '-ms-overflow-style': 'none',
                    '&::-webkit-scrollbar': {
                        display: 'none',
                    },
                },
                '::selection': {
                    backgroundColor: theme('colors.gimysite.500'),
                    color: theme('colors.white'),
                },
                '.dark ::selection': {
                    backgroundColor: theme('colors.gimysite.300'),
                    color: theme('colors.gray.900'),
                },
            });

            const gimysiteColors = theme('colors.gimysite');
            const scrollbarUtilities = {};

            for (const shade in gimysiteColors) {
                scrollbarUtilities[`.scrollbar-gimysite-${shade}`] = {
                    'scrollbar-width': 'thin',
                    '-ms-overflow-style': 'auto',
                    '&::-webkit-scrollbar': {
                        display: 'block',
                        width: '8px',
                        height: '8px',
                    },
                    '&::-webkit-scrollbar-track': {
                        backgroundColor: theme('colors.gray.200'),
                        borderRadius: '10px',
                    },
                    '&::-webkit-scrollbar-thumb': {
                        backgroundColor: gimysiteColors[shade],
                        borderRadius: '10px',
                        border: '2px solid transparent',
                        backgroundClip: 'content-box',
                    },
                    '@media (prefers-color-scheme: dark)': {
                        '&::-webkit-scrollbar-track': {
                            backgroundColor: theme('colors.gray.700'),
                        },
                    },
                };
            }
            addUtilities(scrollbarUtilities, ['responsive']);
        },
    ],
};