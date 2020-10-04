<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Edit Tag</h3>
    </div>
    <form role="form" method="post" @submit.prevent="updateTag()">
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
        <button type="submit" class="btn btn-danger"><a href="/index_tag" :class="{underline: isUnderlined}">Back</a></button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "Edit",
  data() {
    return {
      isUnderlined: true,
      form: new Form({
        tag_name: "",

      }),
    };
  },

  mounted() {
    axios.get(`/api/tag/edit/${this.$route.params.tagid}`).then((response) => {
      this.form.fill(response.data.tag);
    });
  },
  methods: {
    updateTag() {
      this.form
        .put(`/api/tag/${this.$route.params.tagid}`)
        .then((response) => {
          this.$router.push("/index_tag");

          Toast.fire({
            icon: "success",
            title: "Tag is Updated Successfully",
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
.underline { text-decoration: none; color:white }
</style>