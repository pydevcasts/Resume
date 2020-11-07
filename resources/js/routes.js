// Start Backend
import Home from "./components/Dashboard/Main/Home.vue";
import Dashboard from "./components/Dashboard/Main/Dashboard.vue";
import Developer from "./components/Dashboard/Main/Developer.vue";
import NotFound from "./components/Dashboard/Main/NotFound.vue";
// Profile
import ProfileIndex from "./components/Dashboard/Profile/Index.vue";
import AddProfile from "./components/Dashboard/Profile/New.vue";
import EditProfile from "./components/Dashboard/Profile/Edit.vue";
// About
import AboutIndex from "./components/Dashboard/About/Index.vue";
import AddAbout from "./components/Dashboard/About/New.vue";
import EditAbout from "./components/Dashboard/About/Edit.vue";
// Tag
import TagIndex from "./components/Dashboard/Tag/Index.vue";
import AddTag from "./components/Dashboard/Tag/New.vue";
import EditTag from "./components/Dashboard/Tag/Edit.vue";
// Gallery
import GalleryIndex from "./components/Dashboard/Gallery/Index.vue";
import AddGallery from "./components/Dashboard/Gallery/New.vue";
import EditGallery from "./components/Dashboard/Gallery/Edit.vue";
// Services
import ServiceIndex from "./components/Dashboard/Service/Index.vue";
import AddService from "./components/Dashboard/Service/New.vue";
import EditService from "./components/Dashboard/Service/Edit.vue";
// Contact
import ContactIndex from "./components/Dashboard/Message/Index.vue";
import AddContact from "./components/Dashboard/Message/New.vue";
// // End backend
import PDFIndex from "./components/Dashboard/PDF/Index.vue";
import AddPdf from "./components/Dashboard/PDF/New.vue";
// // End backend

// // FrontEnd Component
import Landing from "./components/Frontend/Landing.vue";
import Login from "./components/Auth/Login.vue";
import Logout from "./components/Auth/Logout.vue";

import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
const router = new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Landing },
        {
            path: "/login",
            component: Login,
            meta: {
                requiresVisitor: true
            }
        },
        { path: "/logout", component: Logout },

        {
            path: "/home",
            name: "home",
            component: Home,
            meta: {
                requiresAuth: true
            }
        },

        {
            path: "/dashboard",
            component: Dashboard,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: "/developer",
            component: Developer,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: "*",
            component: NotFound,
            meta: {
                requiresAuth: true
            }
        },

        // Profile
        {
            path: "/index_profile",
            component: ProfileIndex,
            meta: {
                requiresAuth: true
            }
        },
        { path: "/create_profile", component: AddProfile },
        { path: "/edit_profile/:profileid", component: EditProfile },

        // About
        {
            path: "/index_about",
            component: AboutIndex,
            meta: {
                requiresAuth: true
            }
        },
        { path: "/create_about", component: AddAbout },
        { path: "/edit_about/:aboutid", component: EditAbout },

        // Tag
        {
            path: "/index_tag",
            component: TagIndex,
            meta: {
                requiresAuth: true
            }
        },
        { path: "/create_tag", component: AddTag },
        { path: "/edit_tag/:tagid", component: EditTag },

        // Gallery
        {
            path: "/index_gallery",
            component: GalleryIndex,
            meta: {
                requiresAuth: true
            }
        },
        { path: "/create_gallery", component: AddGallery },
        { path: "/edit_gallery/:galleryid", component: EditGallery },

        // Services
        {
            path: "/index_service",
            component: ServiceIndex,
            meta: {
                requiresAuth: true
            }
        },
        { path: "/create_service", component: AddService },
        { path: "/edit_service/:serviceid", component: EditService },
        // Contact

        {
            path: "/index_contact",
            component: ContactIndex,
            meta: {
                requiresAuth: true
            }
        },
        { path: "/create_contact", component: AddContact },
        // Pdf
        {
            path: "/index_pdf",
            component: PDFIndex,
            meta: {
                requiresAuth: true
            }
        },
        { path: "/create_pdf", component: AddPdf }

        //     // End Backend
    ]
});

export default router;
