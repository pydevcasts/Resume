<template>
  <div>
    <div class="block" id="about" v-for="about in getAllAbout" :key="about.id">
      <h2>{{about.title}}</h2>
      <blockquote class="profile_quote">
        <p>"{{about.description|striphtml }}"</p>
        <span class="entypo-quote"></span>
      </blockquote>
    </div>
    <div class="horizontal_line">
      <div class="line_left"></div>
      <div class="left_circle"></div>
      <div class="central_circle"></div>
      <div class="right_circle"></div>
      <div class="line_right"></div>
    </div>
    <div class="block">
      <h2>Programming Skills</h2>
      <ul>
        <li data-percent="95">
          <span>HTML5</span>
          <div class="skills-bar">
            <div class="bar"></div>
          </div>95%
        </li>
        <li data-percent="90">
          <span>CSS3 & SCSS</span>
          <div class="skills-bar">
            <div class="bar"></div>
          </div>90%
        </li>
        <li data-percent="60">
          <span>JavaScript</span>
          <div class="skills-bar">
            <div class="bar"></div>
          </div>60%
        </li>
        <li data-percent="60">
          <span>jQuery</span>
          <div class="skills-bar">
            <div class="bar"></div>
          </div>60%
        </li>
        <li data-percent="60">
          <span>Vue</span>
          <div class="skills-bar">
            <div class="bar"></div>
          </div>60%
        </li>
        <li data-percent="70">
          <span>Python</span>
          <div class="skills-bar">
            <div class="bar"></div>
          </div>70%
        </li>
        <li data-percent="73">
          <span>Django</span>
          <div class="skills-bar">
            <div class="bar"></div>
          </div>73%
        </li>
        <li data-percent="75">
          <span>Laravel</span>
          <div class="skills-bar">
            <div class="bar"></div>
          </div>75%
        </li>
        <li data-percent="79">
          <span>PHP</span>
          <div class="skills-bar">
            <div class="bar"></div>
          </div>79%
        </li>
        <li data-percent="77">
          <span>MySQL</span>
          <div class="skills-bar">
            <div class="bar"></div>
          </div>77%
        </li>
      </ul>
    </div>
    <div class="horizontal_line">
      <div class="line_left"></div>
      <div class="left_circle"></div>
      <div class="central_circle"></div>
      <div class="right_circle"></div>
      <div class="line_right"></div>
    </div>
  </div>
</template>
<script>
export default {
  name: "About",
  data() {
    return {};
  },
  mounted() {
    this.$store.dispatch("allAboutFromDatabase");
  },

  computed: {
    getAllAbout() {
      return this.$store.getters.getAboutFormGetters;
    },
  },
};
</script>
<style lang="sass" scoped>

</style>