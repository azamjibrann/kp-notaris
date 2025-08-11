import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',      // ← Tailwind di sini
                'resources/css/custom.css',   // ← CSS buatan kamu sendiri
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
