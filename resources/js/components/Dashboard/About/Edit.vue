

















<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Edit About</h3>
    </div>
    <form role="form" method="post" @submit.prevent="updateAbout()">
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
          <textarea
            name="description"
            id="aboutId"
            v-model="form.description"
            placeholder="Enter description ..."
            :class="{
              'is-invalid': form.errors.has('description'),
            }"
          ></textarea>
          <has-error :form="form" field="description"></has-error>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-danger">
          <a
            href="/index_about"
             :class="{underline: isUnderlined}"
            >Back</a
          >
        </button>
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
        title: "",
        description: "",
      }),
    };
  },

  mounted() {
    axios
      .get(`/api/about/edit/${this.$route.params.aboutid}`)
      .then((response) => {
        this.form.fill(response.data.about);
      });
  },
  methods: {
    updateAbout() {
      this.form
        .put(`/api/about/${this.$route.params.aboutid}`)
        .then((response) => {
          this.$router.push("/index_about");

          Toast.fire({
            icon: "success",
            title: "About is Updated Successfully",
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



