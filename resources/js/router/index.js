import {createRouter, createWebHistory} from 'vue-router';
import Login from '../components/Login.vue';
import Register from '../components/Register.vue';
import Employee from '../components/Employee.vue';
import Dashboard from '../components/Dashboard.vue';
import NotFound from '../components/NotFound.vue';

const routes = [
    {
        path : '/',
        component : Login,
        name : 'login'
    },
    {
        path : '/register',
        component : Register,
        name : 'register'
    },
    {
        path : '/dashboard',
        component : Dashboard,
        name : 'dashboard'
    },
    {
        path : '/employee',
        component : Employee,
        name : 'employee'
    },
    // {
    //     path : '/employee/:id',
    //     component : Employee,
    //     name : 'employee'
    // },
    {
        path : '/:pathMatch(.*)*',
        component : NotFound,
        name : 'notfound'
    },
];

const router = createRouter({
    history : createWebHistory(),
    routes
});

export default router;