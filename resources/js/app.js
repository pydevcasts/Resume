require("./bootstrap");
window.Vue = require("vue");
import router from "./routes";

// Axios
import axios from "axios";
axios.defaults.baseURL = "http://localhost:8000/api";

// vuex
import store from "./store/index";

// vform
import { Form, HasError, AlertError } from "vform";
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

//sweetalert
import Swal from "sweetalert2";
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
});
window.Toast = Toast;

//moment
import { filter } from "./filter";
import Axios from "axios";
import { multiselectMixin } from "vue-multiselect";

//CKEDITOR
import CKEditor from "ckeditor4-vue";
Vue.use(CKEditor);

const app = new Vue({
    el: "#app",
    router,
    store
});
