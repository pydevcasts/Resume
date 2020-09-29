import VueRouter from 'vue-router';


import Dashboard from './components/Dashboard.vue'
import Profile from './components/Profile.vue';


export default new VueRouter([{
    path: '/home/dashboard',
    component: Dashboard
}, {
    path: '/home/profile/',
    name: Profile,
    component: Profile
}, ])
