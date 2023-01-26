import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// ajout de hello.css pour recompile
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/hello.css',
            ],
            refresh: true,
        }),
    ],
});
