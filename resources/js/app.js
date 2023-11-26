import { createApp } from 'vue/dist/vue.esm-bundler.js';
import './bootstrap';
import Employee from './components/Employee.vue';

const app = createApp({
    components : {
        Employee,
    }
});

app.mount('#app');


