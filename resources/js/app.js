import { createApp } from 'vue';

import HomeVue from './components/HomeVue.vue';
import LoginVue from './components/LoginVue.vue';

const app = createApp({});

app.component('HomeVue', HomeVue);
app.component('LoginVue', LoginVue);

app.mount('#app');

require('./bootstrap');
