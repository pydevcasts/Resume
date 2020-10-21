<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add Tag</h3>
    </div>
    <form role="form" method="post" @submit.prevent="addTag()">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName">Name Tag</label>
          <input
            type="text"
            class="form-control"
            id="tagId"
            name="tag_name"
            v-model="form.tag_name"
            placeholder="Enter name of tag ..."
            :class="{
              'is-invalid': form.errors.has('tag_name'),
            }"
          />
          <has-error :form="form" field="tag_name"></has-error>
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
        tag_name: "",
      }),
    };
  },
   
  methods: {
    addTag() {
      this.form
        .post("/tag")
        .then((response) => {
          console.log("ok");
          this.$router.push("/index_tag");
          Toast.fire({
            icon: "success",
            title: "Tag is createde successfully",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>