import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/adminstyle/styleordeindex.css',
                'resources/css/adminstyle/styleordershow.css',
                'resources/css/adminstyle/styleproductcreate.css',
                'resources/css/adminstyle/styleproductdash.css',
                'resources/css/adminstyle/styleproductedit.css',
                'resources/css/adminstyle/styleproductindex.css',
                'resources/css/cart.css',
                'resources/css/checkout.css',
                'resources/css/index.css',
                'resources/css/show.css',
                'resources/css/history.css',
                'resources/css/show1.css',
            ],
            refresh: true,
        }),
    ],
});