import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);
const store = new Vuex.Store({
    state: {
        tag: [],
        value: [],
        options: [],
        profile: [],
        about: [],
        gallery: [],
        service: [],
        contact: [],
        pdf:[],
        token: localStorage.getItem("access_token") || null
    },
    actions: {
        destroyToken(context) {
            axios.defaults.headers.common['Authorization'] = 'Bearer' + context.state.token
            if (context.getters.loggedIn) {
                return new Promise((resolve, reject) => {
                    const token = localStorage.getItem('access_token');
                    axios.post('/logout', {
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': `Bearer ${ token }`
                            },
                        })
                        .then(response => {
                            localStorage.removeItem('access_token')
                            const newLocal = 'destroyToken';
                            context.commit(newLocal)
                            resolve(response)

                        }).catch(error => {
                            localStorage.removeItem('access_token')
                            context.commit('destroyToken')
                            reject(error)
                        })
                })
            }
        },
        retrieveToken(context, credentials) {
            return new Promise((resolve, reject) => {
                axios
                    .post("/login/", {
                        email: credentials.email,
                        password: credentials.password
                    })
                    .then(response => {
                        const token = response.data.access_token;
                        localStorage.setItem("access_token", token);
                        context.commit("retrieveToken", token);
                        console.log(response);
                        resolve(response);
                    })
                    .catch(error => {
                        console.log("error");
                        reject(error);
                    });
            });
        },

        allPDFFromDatabase(context) {
            axios
                .get("/files")
                .then(response => {
                    console.log(response);
                    context.commit("upload", response.data.upload);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        allContactFromDatabase(context) {
            axios
                .get("/contact")
                .then(response => {
                    console.log(response);
                    context.commit("contacts", response.data.contacts);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        allServiceFromDatabase(context) {
            axios
                .get("/service")
                .then(response => {
                    console.log(response);
                    context.commit("services", response.data.services);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        allGalleryFromDatabase(context) {
            axios
                .get("/gallery")
                .then(response => {
                    context.commit("galleries", response.data.galleries);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        allAboutFromDatabase(context) {
            axios
                .get("/about")
                .then(response => {
                    context.commit("abouts", response.data.abouts);
                })
                .catch(() => {
                    console.log("Error........");
                });
        },
        allTagFromDatabase(context) {
            axios
                .get("/tag")
                .then(response => {
                    console.log(response.data.tags);
                    context.commit("tags", response.data.tags); //tags will be run from mutation
                })
                .catch(() => {
                    console.log("Error........");
                });
        },
        allProfileFromDatabase(context) {
            axios
                .get("/profile")
                .then(response => {
                    console.log(response.data.profiles);
                    context.commit("profiles", response.data.profiles); //categories will be run from mutation
                })
                .catch(() => {
                    console.log("Error........");
                });
        }
    },
    mutations: {
        destroyToken(state) {
            state.token = null
        },
        retrieveToken(state, token) {
            return (state.token = token);
        },
        upload(state, data) {
            return (state.pdf = data);
        },
        contacts(state, data) {
            return (state.contact = data);
        },
        services(state, data) {
            return (state.service = data);
        },
        galleries(state, data) {
            return (state.gallery = data);
        },
        abouts(state, data) {
            return (state.about = data);
        },

        tags(state, data) {
            return (state.tag = data);
        },
        profiles(state, data) {
            return (state.profile = data);
        }
    },
    getters: {
        loggedIn(state) {
            return state.token;
        },
        getPdfFormGetters(state) {
            return state.pdf;
        },
        getContactFromGetters(state) {
            return state.contact;
        },
        getServiceFromGetters(state) {
            return state.service;
        },
        getGalleryFormGetters(state) {
            return state.gallery;
        },
        getAboutFormGetters(state) {
            return state.about;
        },
        getTagFormGetters(state) {
            //take parameter state
            return state.tag;
        },
        getProfileFormGetters(state) {
            //take parameter state
            return state.profile;
        }
    }
});
export default store;
