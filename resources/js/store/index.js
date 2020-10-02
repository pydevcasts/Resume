import Vue from 'vue';
import Vuex from "vuex";
Vue.use(Vuex);
const store = new Vuex.Store({

    state: {
        tag: [],
        profile:[],
    },
    actions: {
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
        tags(state, data) {
            return state.tag = data
        },
        profiles(state, data) {
            return state.profile = data
        },
    },
    getters: {
        getTagFormGetters(state) { //take parameter state
            return state.tag
        },
        getProfileFormGetters(state) { //take parameter state
            return state.profile
        },
    },
})
export default store