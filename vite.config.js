import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css','resources/css/product.css','resources/css/profile.css','resources/js/profile.js', 'resources/js/app.js','resources/css/admin.css', 'resources/css/auth.css'],
            refresh: true,
        })
    ],
});

