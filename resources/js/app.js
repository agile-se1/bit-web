import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/inertia-vue3'
import {resolvePageComponent} from "laravel-vite-plugin/inertia-helpers";
import '../css/app.css';
import FontAwesomeIcon from './icons.ts';

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({el, app, props, plugin}) {
        return createApp({render: () => h(app, props)})
            .component('font-awesome-icon', FontAwesomeIcon)
            .use(plugin)
            .mount(el);
    },

});
