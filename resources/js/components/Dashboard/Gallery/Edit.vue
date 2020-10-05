<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Edit Gallery</h3>
    </div>
    <form role="form" method="post" @submit.prevent="updateGallery()">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName">Name Gallery</label>
          <input
            type="text"
            class="form-control"
            id="galleryId"
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
          <label>Summary</label>
          <input
            type="text"
            class="form-control"
            id="galleryId"
            name="title"
            v-model="form.summary"
            placeholder="Enter summary ..."
            :class="{
              'is-invalid': form.errors.has('summary'),
            }"
          />
          <has-error :form="form" field="summary"></has-error>
        </div>

        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                id="galleryId"
                name="photo"
                :class="{
                  'is-invalid': form.errors.has('photo'),
                }"
              />
              <has-error :form="form" field="photo"></has-error>
              <label class="custom-file-label" for="exampleInputFile"
                >Choose file</label
              >
            </div>
            <div class="input-group-append">
              <span class="input-group-text" id="">Upload</span>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-danger">
          <a
            href="/index_gallery"
            :style="{ 'text-decoration': 'none', color: 'white' }"
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
      })
      .catch(function (error) {
        console.log(error);
      });
  },
  methods: {
    updateGallery() {
      this.form
        .put(`/api/gallery/${this.$route.params.galleryid}`)
        .then((response) => {
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
