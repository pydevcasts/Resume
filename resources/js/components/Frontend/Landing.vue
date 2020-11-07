<template>
  <div>
    <div id="main_container">
      <div id="header">
        <div class="header_logotype_container">
          <h1 class="logotype_name">
            Siyamak
            <span class="purple">Abasnezhad</span>
          </h1>
          <h2 class="logotype_occupation">Full stack Web Developer</h2>
        </div>
        <div class="header_menu_container">
          <ul class="header_menu horizontal_list">
            <li>
              <a class="no_border purple" href="#home">Profile</a>
            </li>
            <li>
              <a href="#about">About</a>
            </li>
            <li>
              <a href="#service">Services</a>
            </li>
            <li>
              <a href="#gallery">Experience</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
      <aside>
        <div id="left_col" v-for="profile in getAllprofile" :key="profile.id">
          <div class="profile_frame">
            <div class="profile_picture">
              <img :src="ourImage(profile.photo)" alt="#" />
            </div>
          </div>
          <div class="hello_content">
            <h2>{{profile.title}}</h2>
            <p>{{profile.description|striphtml}}</p>
          </div>
          <div class="contact_details_content">
            <h2>Contact details</h2>
            <p class="purple">Phone:</p>
            <p>{{profile.phone}}</p>
            <p class="purple">Email:</p>
            <p>{{profile.email}}</p>
            <p class="purple">Adress:</p>
            <p>{{profile.address}}</p>
          </div>
          <div class="get_social_content">
            <h2>Get social</h2>
            <ul class="social_icons horizontal_list">
              <li>
                <a class="facebook" :href="profile.link_1">
                  <span :class="profile.social_media_1"></span>
                </a>
              </li>
              <li>
                <a class="twitter" :href="profile.link_2">
                  <span :class="profile.social_media_2"></span>
                </a>
              </li>
              <li>
                <a class="linkedin" :href="profile.link_3">
                  <span :class="profile.social_media_3"></span>
                </a>
              </li>
            </ul>
          </div>
          <div class="download-resume">
            <h2>Download resume</h2>
            <a href="#" class="send_message_button">
              <span class="cut1"></span>
              <span class="cut2"></span>
              <form v-on:submit.prevent="downloadFile">
                <span class="content">
                  <button
                    type="submit"
                    style="background:transparent;
border:none;
 color:white;"
                  >Resume
                  <span class="entypo-download"></span>
                  </button>
                </span>
              </form>
            </a>
          </div>
          <div class="tagcloud">
            <h2>Skills</h2>
            <ul>
              <li v-for="tag in getAllTag" :key="tag.id">
                <a href="#">
                  <span>{{tag.tag_name}}</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </aside>
      <section id="content_container">
        <About></About>
        <Services></Services>
        <Works></Works>
        <Contact></Contact>
      </section>
      <!-- FOOTER -->
      <div id="footer">
        <p class="footer_name">
          &angle; : Siyamak Abasnezhad
          <i class="entypo-heart"></i>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import About from "./About.vue";
import Services from "./Services.vue";
import Works from "./Works.vue";
import Contact from "./Contact.vue";
export default {
  name: "Landing",
  components: {
    isUnderlined: true,
    About,
    Services,
    Works,
    Contact,
  },
  data() {
    return {};
  },
  mounted() {
    this.$store.dispatch("destroyToken");
    Toast.fire({
      icon: "success",
      title: "You Welcome !",
    });

    this.$store.dispatch("allProfileFromDatabase");
    this.$store.dispatch("allTagFromDatabase");
  },
  computed: {
    getAllTag() {
      return this.$store.getters.getTagFormGetters;
    },
    getAllprofile() {
      return this.$store.getters.getProfileFormGetters;
    },
  },
  methods: {
    downloadFile(file) {
      axios
        .get("/download/upload-folder/" + "resume.pdf", {
          responseType: "arraybuffer",
        })
        .then((response) => {
          let blob = new Blob([response.data], { type: "application/*" });
          let link = document.createElement("a");
          link.href = window.URL.createObjectURL(blob);
          link.download = "resume.pdf";
          link.click();
        });
    },
    ourImage(img) {
      return `http://127.0.0.1:8000/storage/profile/${img}`;
    },
  },
};
</script>

<style>
</style>
