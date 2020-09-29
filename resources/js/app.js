require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router'
import Vue from 'vue';
Vue.use(VueRouter);

import router from './routes';

let app = new Vue({
    el: '#app',
    mode: 'history',
    router,
})
