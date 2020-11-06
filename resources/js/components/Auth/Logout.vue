<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <button type="submit" v-if="loggedIn" class="btn btn-danger" @click="logout">Log Out</button>
      <button type="submit" v-else class="btn btn-info" @click="login">Log In</button>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {};
  },
  computed: {
    loggedIn() {
      return this.$store.getters.loggedIn;
    },
  },

  methods: {
    logout() {
      this.$store.dispatch("destroyToken");
      console.log("this is a test for logout:",response)
      this.$router.push((window.location.href = "/"));
      Toast.fire({
        icon: "success",
        title: "You Log out In Successfully !",
      });
    },
    login() {
      this.$router.push((window.location.href = "/login"));
    },
  },
};
</script>