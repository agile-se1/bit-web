import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/inertia-vue3'
import {resolvePageComponent} from "laravel-vite-plugin/inertia-helpers";
import '../css/app.css';
import FontAwesomeIcon from './icons.ts';
import {createVfm} from "vue-final-modal";
import 'vue-final-modal/style.css';

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob("./pages/**/*.vue")
        ),
    setup({el, app, props, plugin}) {
        return createApp({render: () => h(app, props)})
            .component('font-awesome-icon', FontAwesomeIcon)
            .use(plugin)
            .use(createVfm())
            .mount(el);
    },

});
