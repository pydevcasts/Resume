import Vue from 'vue';
import Vuex from "vuex";
Vue.use(Vuex);
const store = new Vuex.Store({

    state: {
        tag: [],
        profile: [],
        about: [],
    },
    actions: {
        allAboutFromDatabase(context) {
            axios.get('/api/about').then((response) => {
                context.commit('abouts', response.data.abouts)
            })
            .catch(() => {
                console.log("Error........")
            })
        },
        allTagFromDatabase(context) {
            axios.get("api/tag")
                .then((response) => {
                    console.log(response.data.tags)
                    context.commit("tags", response.data.tags) //tags will be run from mutation
                })
                .catch(() => {
                    console.log("Error........")
                })
        },
        allProfileFromDatabase(context) {
            axios.get("api/profile")
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