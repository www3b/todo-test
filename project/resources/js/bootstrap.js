import axios from 'axios';
import { createApp, h } from 'vue'
import PrimeVue from 'primevue/config';
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from './layouts/Layout.vue';
import Lara from './presets/Lara';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    const page = pages[`./Pages/${name}.vue`];
    page.default.layout = page.default.layout || Layout;
    return page;
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(PrimeVue, {
        unstyled: true,
        pt: Lara,
      })
      .mount(el);
  },
});

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
