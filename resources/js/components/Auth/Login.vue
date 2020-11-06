<template>
  <div>
    <h2>Login</h2>
    <form action method="post" @submit.prevent="login">
      <label for="email">
        <i class="entypo-mail"></i>
        <input name="email" class="email" type="text" v-model="email" placeholder="  Enter Email" />
      </label>
      <label for="password">
        <i class="entypo-lock-open"></i>
        <input
          name="password"
          class="password"
          type="password"
          v-model="password"
          placeholder="  Enter Password.."
        />
      </label>
      <button class="form-fields button" value="Send" type="submit">Send</button>
    </form>
  </div>
</template> 

<script>
export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    login() {
      this.$store
        .dispatch("retrieveToken", {
          email: this.email,
          password: this.password,
        })
        .then((response) => {
          this.$router.push(window.location.href="/home");
          console.log(response);
          Toast.fire({
            icon: "success",
            title: "You Are Logedin successfully",
          });
        })
        .catch((error) => {
          console.log("error ...");
        });
    },
  },
};
</script>

<style>
</style>