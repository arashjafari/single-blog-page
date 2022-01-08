import { createRouter, createWebHistory } from "vue-router";

import Post from '../components/Post' 

const routes = [
    {
        path: '/',
        name: 'Post',
        component: Post
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
