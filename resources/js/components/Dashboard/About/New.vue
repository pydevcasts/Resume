<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add About</h3>
    </div>
    <form role="form" method="post" @submit.prevent="addAbout()">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName">Name About</label>
          <input
            type="text"
            class="form-control"
            id="aboutId"
            name="title"
            v-model="form.title"
            placeholder="Enter title ..."
            :class="{
              'is-invalid': form.errors.has('title'),
            }"
          />
          <has-error :form="form" field="title"></has-error>
        </div>
        <div class="form-group">
          <label>Description</label>
             <ckeditor v-model="form.description" :class="{
              'is-invalid': form.errors.has('description'),
            }" ></ckeditor>
          
          <has-error :form="form" field="description"></has-error>
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
        title: "",
        description: "",
      }),
    };
  },

  methods: {
    addAbout() {
      this.form
        .post("/about")
        .then((response) => {
          console.log("ok");
          this.$router.push("/index_about");
          Toast.fire({
            icon: "success",
            title: "About is createde successfully",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>