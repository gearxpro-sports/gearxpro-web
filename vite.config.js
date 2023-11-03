import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/shop.css',
                'resources/css/auth.css',
                'resources/css/owl.carousel.css',
                'resources/js/app.js',
                'resources/js/auth.js',
                'resources/js/owl.carousel.min.js'
            ],
            refresh: true,
        }),
    ],
});
