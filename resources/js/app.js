import './bootstrap';
import '../css/app.css';
import axios from 'axios';

axios.defaults.baseURL = '/';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faHome, faPlus } from '@fortawesome/free-solid-svg-icons';
import 'vue3-toastify/dist/index.css';
library.add(faHome, faPlus);

const appName =
  window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) =>
    resolvePageComponent(
      `./Pages/${name}.vue`,
      import.meta.glob('./Pages/**/*.{vue,js}')
    ),
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });

    app.use(plugin).use(ZiggyVue, Ziggy);

    // Registra FontAwesome globalmente
    app.component('font-awesome-icon', FontAwesomeIcon);

    app.mount(el);
    return app;
  },
  progress: {
    color: '#4B5563',
  },
});
