import { createRouter, createWebHistory } from "vue-router";

import CommentBox from '../components/comments/CommentBox' 

const routes = [
    {
        path: '/',
        name: 'CommentBox',
        component: CommentBox
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
