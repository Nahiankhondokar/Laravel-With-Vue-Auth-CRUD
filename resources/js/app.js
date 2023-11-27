import { createApp } from 'vue/dist/vue.esm-bundler.js';
import Employee from './components/Employee.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import Dashboard from './components/Dashboard.vue';
import NotFound from './components/NotFound.vue';
import routes from './router/index.js';
import './bootstrap';

const app = createApp({
    components : {
        Dashboard,
        Employee,
        Login,
        Register,
        NotFound
    },
});

app.use(routes)
app.mount('#app');


