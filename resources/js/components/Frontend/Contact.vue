<template>
  <div>
    <div class="block" id="contact">
      <h2>Contact Us</h2>
      <div class="container">
        <section class="section2">
          <div class="contactform">
            <form role="form" method="post" @submit.prevent="addContact()">
              <label for="name">
                <i class="cntfrmicn entypo-user"></i>
                <input
                  name="name"
                  class="form-fields"
                  type="text"
                  v-model="form.name"
                  placeholder="Enter name ..."
                  :class="{
              'is-invalid': form.errors.has('name')
            }"
                />
              </label>
              <has-error :form="form" field="name" :class="{danger:isError}"></has-error>
              <label for="email">
                <i class="cntfrmicn entypo-mail"></i>
                <input
                  name="email"
                  class="form-fields"
                  type="text"
                  v-model="form.email"
                  placeholder="Enter email ..."
                  :class="{
              'is-invalid': form.errors.has('email'),
            }"
                />
              </label>
              <has-error :form="form" :class="{danger:isError}" field="email"></has-error>
              <label for="textarea">
                <i class="cntfrmicn entypo-comment"></i>
                <textarea
                  class="form-fields"
                  name="textarea"
                  id
                  cols="30"
                  rows="10"
                  v-model="form.description"
                  placeholder="Enter description ..."
                ></textarea>
              </label>
              <button class="form-fields button" value="Send" type="submit">
                Send
                <i class="fa fa-paper-plane"></i>
              </button>
            </form>
          </div>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3205.6266005417406!2d52.69165007063712!3d36.53900184015714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8f89cef66fea2f%3A0x86978ea00b71f5d1!2z2KfYs9iq2KfZhiDZhdin2LLZhtiv2LHYp9mG2Iwg2KjYp9io2YTYjCDZvtmEINix2Yjar9iw2LHYjCDZhduM2K_Yp9mGINi02YfbjNivINqp2LTZiNix24zYjCDYp9uM2LHYp9mG!5e0!3m2!1sfa!2s!4v1596296149313!5m2!1sfa!2s"
            height="400"
            frameborder="10"
            style="border:0; display:block;
                                margin-left: auto;
                                margin-right: auto;
                                margin-bottom:50px;
                                opacity:0.9;
                                box-shadow: -5px 5px 15px rgba(0, 0, 0, 0.3);
                                width: 100%;"
            allowfullscreen
            aria-hidden="false"
            tabindex="0"
          ></iframe>
        </section>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Contact",
  data() {
    return {
      isError: true,
      form: new Form({
        name: "",
        email: "",
        description: "",
      }),
    };
  },

  methods: {
    addContact() {
      this.form
        .post("contact")
        .then((response) => {
          console.log("ok");
          Toast.fire({
            icon: "success",
            title: "Email sent successfully .",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style scoped>
.danger {
  color: red;
}
</style>>

</style>