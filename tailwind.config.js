import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'color-ff9d60': '#FF9D60',
                'color-ffa76c': '#FFA76C',
                'color-46beac': '#46BEAC',
                'color-0c9d87': '#0C9D87',
                'color-b9eddd': '#B9EDDD',
                'color-38a39f': '#38A39F',
                'color-45bcb7': '#45BCB7',
                'color-fffbf5': '#FFFBF5',
                'color-20c391': '#20C391',
                'color-4357ef': '#4357EF',
                'color-e9f5f8': '#E9F5F8',
                'color-ffe2b4': '#FFE2B4',
                'color-f5af3f': '#F5AF3F',
                'color-ff86b0': '#FF86B0',
                'color-ef4983': '#EF4983',
                'color-2cb2d1': '#2CB2D1',
                'color-4dd3aa': '#4DD3AA',
                'color-eff0f0': '#EFF0F0',
                'color-f7f8fa': '#F7F8FA',
                'color-81a7db': '#81A7DB',
                'color-fdce82': '#FDCE82',
                'color-f55b3f': '#F55B3F',
                'color-e54f33': '#E54F33',
                'color-18181a': '#18181A',
                'color-323a46': '#323A46',
                'color-6c757d': '#6C757D',
                'color-b6b9bb': '#B6B9BB',
                'color-dee2e6': '#DEE2E6',
                'color-f3f7f9': '#F3F7F9',
                'color-f2f0eb': '#F2F0EB',
                'color-707070': '#707070',
                'color-edebe5': '#EDEBE5',
                'color-e0e0df': '#E0E0DF',
                'color-ff7f6e': '#FF7F6E',
                'color-8be599': '#8BE599',
                'color-f4432c': '#F4432C',
                'color-f5e3d7': '#F5E3D7',
            },
            fontSize: {
                'xxs': '0.625rem'
            },
            boxShadow: {
                'shadow-1': '0px 3px 6px #0000000f',
                'shadow-2': '3px 6px 11px #00000014',
                'shadow-3': '0px 0px 11px -7px #000000',
                'shadow-4': '1px 3px 5px 0px #9d9c9a'
            },
            keyframes: {
                line: {
                    '0%': { width: '0%' },
                    '100%': { width: '100%'},
                },
                opacity: {
                    '100%': { opacity: '1'},
                    '0%': { opacity: '0'},
                },
            },
            animation: {
                line: 'line 300ms',
                line_slow: 'line 600ms',
                opacity: 'opacity 1000ms',
            },
            backgroundImage: {
                texture: "url('/resources/images/texture.svg')",
                jumbotron: "url('/resources/images/product.svg')",
            }
        },
    },

    plugins: [
        require('tailwindcss-labeled-groups')(['custom-button']),
        forms
    ],
};
