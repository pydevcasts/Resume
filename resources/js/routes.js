
import Home from './components/Dashboard/Home.vue';
import Dashboard from './components/Dashboard/Dashboard.vue';
import Profile from './components/Dashboard/Profile.vue';
import Users from './components/Dashboard/Users.vue';
import AboutIndex from './components/Dashboard/About/Index.vue';
import AddAbout from './components/Dashboard/About/New.vue';
import EditAbout from './components/Dashboard/About/Edit.vue';
import TagIndex from './components/Dashboard/Tag/Index.vue';
import AddTag from './components/Dashboard/Tag/New.vue';
import EditTag from './components/Dashboard/Tag/Edit.vue';
import Gallery from './components/Dashboard/Gallery.vue';


export const routes = [
    { path: '/home', component: Home },
    { path: '/dashboard', component: Dashboard },
    { path: '/profile', component: Profile },
    { path: '/users', component: Users },
    { path: '/index_about', component: AboutIndex },
    { path: '/create_about', component: AddAbout },
    { path: '/edit_about/:aboutid', component: EditAbout },
    { path: '/index_tag', component: TagIndex },
    { path: '/create_tag', component: AddTag },
    { path: '/edit_tag/:tagid', component: EditTag },
    { path: '/gallery', component: Gallery },
    { path: '/users', component: Users },
 ]
