import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import './bootstrap';
import '../css/app.css'


createInertiaApp({
    title: (title) => `${title} - {APP_NAME}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mount(el);
    },
});
