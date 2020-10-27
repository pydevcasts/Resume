// Start Backend
import Home from './components/Dashboard/Home.vue';
import Dashboard from './components/Dashboard/Dashboard.vue';
import Users from './components/Dashboard/Users.vue';
// Profile
import ProfileIndex from './components/Dashboard/Profile/Index.vue';
import AddProfile from './components/Dashboard/Profile/New.vue';
import EditProfile from './components/Dashboard/Profile/Edit.vue';
// About
import AboutIndex from './components/Dashboard/About/Index.vue';
import AddAbout from './components/Dashboard/About/New.vue';
import EditAbout from './components/Dashboard/About/Edit.vue';
// Tag 
import TagIndex from './components/Dashboard/Tag/Index.vue';
import AddTag from './components/Dashboard/Tag/New.vue';
import EditTag from './components/Dashboard/Tag/Edit.vue';
// Gallery
import GalleryIndex from './components/Dashboard/Gallery/Index.vue';
import AddGallery from './components/Dashboard/Gallery/New.vue';
import EditGallery from './components/Dashboard/Gallery/Edit.vue';
// Services
import ServiceIndex from './components/Dashboard/Service/Index.vue';
import AddService from './components/Dashboard/Service/New.vue';
import EditService from './components/Dashboard/Service/Edit.vue';
// Contact
import ContactIndex from './components/Dashboard/Message/Index.vue';
import AddContact from './components/Dashboard/Message/New.vue';
// End backend

// FrontEnd Component
import Landing from './components/Frontend/Landing.vue';
// import PublicHome from './components/Frontend/PublicHome.vue'
// import PublicMaster from './components/Frontend/PublicMaster.vue'

export const routes = [
    // Start Backend
    { path: '/home', component: Home },
    { path: '/dashboard', component: Dashboard },
    { path: '/users', component: Users },
    // Profile
    { path: '/index_profile', component: ProfileIndex },
    { path: '/create_profile', component: AddProfile },
    { path: '/edit_profile/:profileid', component: EditProfile },
    // About
    { path: '/index_about', component: AboutIndex },
    { path: '/create_about', component: AddAbout },
    { path: '/edit_about/:aboutid', component: EditAbout },
    // Tag 
    { path: '/index_tag', component: TagIndex },
    { path: '/create_tag', component: AddTag },
    { path: '/edit_tag/:tagid', component: EditTag },
    // Gallery
    { path: '/index_gallery', component: GalleryIndex },
    { path: '/create_gallery', component: AddGallery },
    { path: '/edit_gallery/:galleryid', component: EditGallery },

    { path: '/users', component: Users },
    // Services
    { path: '/index_service', component: ServiceIndex },
    { path: '/create_service', component: AddService },
    { path: '/edit_service/:serviceid', component: EditService },
    // Contact
    { path: '/index_contact', component: ContactIndex },
    { path: '/create_contact', component: AddContact},
    // End Backend

   // Frontend Route
 

    { path: '/', component: Landing },
    
   
 ]
