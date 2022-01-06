import { createRouter, createWebHistory } from "vue-router";

import PostIndex from '../components/posts/PostIndex' 

const routes = [
    {
        path: '/',
        name: 'post.index',
        component: PostIndex
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
