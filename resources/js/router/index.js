import { createRouter, createWebHistory } from "vue-router";

import App from '../components/App.vue';
import Page from '../components/Page.vue'
import maroon_shop from '../components/index.vue'
import admin from '../components/admin/admin.vue'
import dash from '../components/admin/dash.vue';

const routes = [
    // {
    //     path:'/',
    //     component: index
    // },
    {
        path: '/maroon_shop',
        component:maroon_shop
    },
    {
        path: '/page',
        component: Page
    },
    {
        path: '/admin/panel',
        component: admin
    },
    {
        path: '/admin/panel/dash',
        component: dash
    }
]

const router = createRouter({
    history: createWebHistory(), routes
})

export default router;
