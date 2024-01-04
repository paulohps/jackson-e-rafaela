import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/css/site/index.css',
                'resources/assets/js/site/index.js'
            ],
            refresh: true
        }),
    ],
});
