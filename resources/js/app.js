/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue').default;

import { createApp } from "vue";
import router from './router'
import PostIndex from './components/posts/PostIndex'

createApp({
    components: {
        PostIndex
    }
}).use(router).mount('#app')
