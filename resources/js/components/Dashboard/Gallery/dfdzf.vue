<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Edit Tag</h3>
    </div>
    <form role="form" method="POST" enctype="multipart/form-data" @submit.prevent="updateGallery">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName">Name Gallery</label>
          <input
            type="text"
            class="form-control"
            id="tagId"
            name="title"
            v-model="form.title"
            placeholder="Enter name of title ..."
            :class="{
              'is-invalid': form.errors.has('title'),
            }"
          />
          <has-error :form="form" field="title"></has-error>
        </div>
        <div class="form-group">
          <label for="exampleInputName">Name Gallery</label>
          <input
            type="text"
            class="form-control"
            id="summaryId"
            name="summary"
            v-model="form.summary"
            placeholder="Enter name of summary ..."
            :class="{
              'is-invalid': form.errors.has('summary'),
            }"
          />
          <has-error :form="form" field="summary"></has-error>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <input
            type="file"
            @change="changePhoto($event)"
            id="photoId"
            name="photo"
            :class="{
              'is-invalid': form.errors.has('photo'),
            }"
          />
          <has-error :form="form" field="photo"></has-error>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-danger">
          <a href="/index_tag" :class="{underline: isUnderlined}">Back</a>
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
        summary: "",
        photo: "",
      }),
    };
  },

  mounted() {
    axios
      .get(`/api/gallery/edit/${this.$route.params.galleryid}`)
      .then((response) => {
        this.form.fill(response.data.gallery);
      });
  },
  methods: {
    changePhoto(event) {
      this.form.photo = event.target.files[0];
    },
    updateGallery(event) {
      let formData = new FormData();
      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };
      formData.append("photo", this.form.photo);
      formData.append("title", this.form.title);
      formData.append("summary", this.form.summary);
      this.form
        .put(`/api/gallery/${this.$route.params.galleryid}`, formData, config)
        .then((response) => {
          consol.log(response);
          this.$router.push("/index_gallery");

          Toast.fire({
            icon: "success",
            title: "Gallery is Updated Successfully",
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
.underline {
  text-decoration: none;
  color: white;
}
</style>