<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add Contact</h3>
    </div>
    <form role="form" method="post" @submit.prevent="addContact()">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName">Name Contact</label>
          <input
            type="text"
            class="form-control"
            id="contactId"
            name="name"
            v-model="form.name"
            placeholder="Enter name ..."
            :class="{
              'is-invalid': form.errors.has('name'),
            }"
          />
          <has-error :form="form" field="name"></has-error>
        </div>
        <div class="form-group">
          <label for="exampleInputName">Email Contact</label>
          <input
            type="email"
            class="form-control"
            id="contactId"
            name="email"
            v-model="form.email"
            placeholder="Enter Email ..."
            :class="{
              'is-invalid': form.errors.has('email'),
            }"
          />
          <has-error :form="form" field="email"></has-error>
        </div>
        <div class="form-group">
          <label for="exampleInputName">Description</label>
          <textarea
            class="form-control"
            name="description"
            v-model="form.description"
            placeholder="Enter description ..."
            cols="30"
            rows="10"
          ></textarea>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "New",

  data() {
    return {
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
          this.$router.push("/index_contact");
          Toast.fire({
            icon: "success",
            title: "Contact is createde successfully",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>