<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add Gallery</h3>
    </div>
    <form role="form" method="POST" enctype="multipart/form-data" @submit="addnewGallery">
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
          <input
            @change="changePhoto"
            name="photo"
            type="file"
            :class="{
              'is-invalid': form.errors.has('photo'),
            }"
          />
          <has-error :form="form" field="photo"></has-error>
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
        summary: "",
        photo: "",
      }),
    };
  },

  methods: {
    changePhoto(event) {
      console.log(event.target.files[0]);
      this.form.photo = event.target.files[0];
    },
    addnewGallery(event) {
      event.preventDefault();
      let formData = new FormData();
      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };

      formData.append("photo", this.form.photo);
      formData.append("title", this.form.title);
      formData.append("summary", this.form.summary);
      axios
        .post("/gallery", formData, config)
        .then((response) => {
          console.log(response);
          this.$router.push("/index_gallery");
          Toast.fire({
            icon: "success",
            title: "Gallery is createde successfully",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>