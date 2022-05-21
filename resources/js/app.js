import { createApp } from 'vue';

import HomeVue from './components/HomeVue.vue';
import HomeAdminVue from './components/HomeAdminVue/HomeAdminVue.vue';
import LoginVue from './components/LoginVue.vue';
import HeaderVue from './components/HeaderVue.vue';

const app = createApp({});

app.component('HomeVue', HomeVue);
app.component('HomeAdminVue', HomeAdminVue);
app.component('LoginVue', LoginVue);
app.component('HeaderVue', HeaderVue);

app.mount('#app');

require('./bootstrap');
