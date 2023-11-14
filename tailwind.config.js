import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    safelist: [
        {
            pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
            variants: ['sm', 'md', 'lg', 'xl', '2xl'],
        },
    ],

    theme: {
        fontFamily: {
            'app': ['Plus Jakarta Sans', 'system-ui', 'sans-serif'],
            'shop': ['Montserrat', 'system-ui', 'sans-serif']
        },
        extend: {
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
                'color-15af2d': '#15AF2D',
                'color-010101': '#010101',
                'color-e6e7e9': '#e6e7e9',
                'color-19181d': '#19181d',
                'color-15AF74': '#15AF74',
                'color-5D5D5D': '#5D5D5D',
                'color-bfd8ed': '#bfd8ed',
                'color-71a3cf': '#71a3cf',
                'color-2271b5': '#2271b5',
                'color-deb79f': '#deb79f',
                'color-e7a072': '#e7a072',
                'color-d76f2d': '#d76f2d',
                'color-b8b2d9': '#b8b2d9',
                'color-9d97b7': '#9d97b7',
                'color-766bad': '#766bad',
                'color-9a9fa7': '#9a9fa7',
                'color-5a6472': '#5a6472',
                'color-323a46': '#323a46',
                'color-bde2b6': '#bde2b6',
                'color-89d079': '#89d079',
                'color-65af54': '#65af54',

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
                spin_slow: 'spin 7s linear infinite',
            },
            backgroundImage: {
                texture: "url('/resources/images/texture.svg')",
                jumbotron: "url('/resources/images/product.svg')",
                about_us_1: "url('/resources/images/about_us_1.png')",
                about_us_2: "url('/resources/images/about_us_2.png')",
                about_us_3: "url('/resources/images/about_us_3.png')",
                about_us_4: "url('/resources/images/about_us_4.png')",
                about_us_5: "url('/resources/images/about_us_5.png')",
                about_us_6: "url('/resources/images/about_us_6.png')",
                about_us_7: "url('/resources/images/about_us_7.png')",
                about_us_8: "url('/resources/images/about_us_8.png')",
                about_us_9: "url('/resources/images/about_us_9.png')",
                about_us_values_1: "url('/resources/images/about_us_values_1.png')",
                about_us_values_2: "url('/resources/images/about_us_values_2.png')",
                about_us_values_3: "url('/resources/images/about_us_values_3.png')",
                about_us_dev_1: "url('/resources/images/about_us_dev_1.png')",
                about_us_dev_2: "url('/resources/images/about_us_dev_2.png')",
                about_us_dev_3: "url('/resources/images/about_us_dev_3.png')",
                about_us_dev_4: "url('/resources/images/about_us_dev_4.png')",
                about_us_dev_5: "url('/resources/images/about_us_dev_5.png')",
                about_us_dev_6: "url('/resources/images/about_us_dev_6.png')",
            }
        },
    },

    plugins: [
        require('tailwindcss-labeled-groups')(['custom-button']),
        require("@xpd/tailwind-3dtransforms"),
        forms
    ],
};
