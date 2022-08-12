import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Wizkids from '../components/Wizkids';
import AddWizkid from '../components/AddWizkid';
import EditWizkid from '../components/EditWizkid';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'wizkids',
        path: '/wizkids',
        component: Wizkids
    },
    {
        name: 'addwizkid',
        path: '/wizkids/add',
        component: AddWizkid
    },
    {
        name: 'editwizkid',
        path: '/wizkids/edit/:id',
        component: EditWizkid
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
