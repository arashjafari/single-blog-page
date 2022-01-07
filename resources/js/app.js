/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue').default;

import { createApp } from "vue";
import router from './router'
import CommentBox from './components/comments/CommentBox'

createApp({
    components: {
        CommentBox
    }
}).use(router).mount('#app')
