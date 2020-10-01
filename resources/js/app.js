
require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import {routes} from './routes'
Vue.use(VueRouter)
import Vue from 'vue';


// vform
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)




const router = new VueRouter({
    mode: 'history',
    routes
    })

const app = new Vue({
  el: '#app',
  router,
});
