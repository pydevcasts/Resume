
import Home from './components/Dashboard/Home.vue';
import Dashboard from './components/Dashboard/Dashboard.vue';
import Profile from './components/Dashboard/Profile.vue';
import Users from './components/Dashboard/Users.vue';
import About from './components/Dashboard/About.vue';
import TagIndex from './components/Dashboard/Tag/Index.vue';
import AddTag from './components/Dashboard/Tag/New.vue';
import EditTag from './components/Dashboard/Tag/Edit.vue';
import Gallery from './components/Dashboard/Gallery.vue';


export const routes =[
    { path: '/home', component: Home },
    { path: '/dashboard', component: Dashboard },
    { path: '/profile', component: Profile },
    { path: '/users', component: Users },
    { path: '/about', component: About },
    { path: '/index_tag', component: TagIndex },
    { path: '/create_tag', component: AddTag },
    { path: '/edit_tag/:tagid', component: EditTag },
    { path: '/gallery', component: Gallery },
    { path: '/users', component: Users },
 ]
