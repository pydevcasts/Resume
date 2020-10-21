import Vue from 'vue';
import Vuex from "vuex";
Vue.use(Vuex);
const store = new Vuex.Store({

    state: {
        tag: [],
        value:[],
        options:[],
        profile: [],
        about: [],
        gallery:[],
        service:[],
        contact:[],

    },
    actions: {
        allContactFromDatabase(context){
            axios.get('/contact').then((response)=>{
                console.log(response);
               context.commit('contacts',response.data.contacts)
            }).catch((error)=>{
                console.log(error)
            })
        },
        allServiceFromDatabase(context){
            axios.get('/service').then((response)=>{
                console.log(response);
               context.commit('services',response.data.services)
            }).catch((error)=>{
                console.log(error)
            })
        },
        allGalleryFromDatabase(context){
            axios.get('/gallery').then((response)=>{
                context.commit('galleries',response.data.galleries)
            }).catch((error)=>{
                console.log(error)
            })
        },
        allAboutFromDatabase(context) {
            axios.get('/about').then((response) => {
                context.commit('abouts', response.data.abouts)
            })
            .catch(() => {
                console.log("Error........")
            })
        },
        allTagFromDatabase(context) {
            axios.get("tag")
                .then((response) => {
                    console.log(response.data.tags)
                    context.commit("tags", response.data.tags) //tags will be run from mutation
                })
                .catch(() => {
                    console.log("Error........")
                })
        },
        allProfileFromDatabase(context) {
            axios.get("profile")
                .then((response) => {
                    console.log(response.data.profiles)
                    context.commit("profiles", response.data.profiles) //categories will be run from mutation
                })
                .catch(() => {
                    console.log("Error........")
                })
        },
    },
    mutations: {
        contacts(state,data){
            return state.contact = data
        },
        services(state,data){
            return state.service = data
        },
        galleries(state, data){
            return state.gallery = data
        },
        abouts(state, data) {
            return state.about = data
        },

        tags(state, data) {
            return state.tag = data
        },
        profiles(state, data) {
            return state.profile = data
        },
    },
    getters: {
        getContactFromGetters(state){
            return state.contact
        },
        getServiceFromGetters(state){
            return state.service
        },
        getGalleryFormGetters(state){
            return state.gallery
        },
        getAboutFormGetters(state) {
            return state.about
        },
        getTagFormGetters(state) { //take parameter state
            return state.tag
        },
        getProfileFormGetters(state) { //take parameter state
            return state.profile
        },
    },
})
export default store