import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import PluginVue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        PluginVue(),
    ],
    server: {
        host: true,
        port: 5173,
        origin: 'http://localhost:5173',
    }
});
