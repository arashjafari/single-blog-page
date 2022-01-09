import { createRouter, createWebHistory } from "vue-router";

import Blog from '../components/Blog' 

const routes = [
    {
        path: '/',
        name: 'Blog',
        component: Blog
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
