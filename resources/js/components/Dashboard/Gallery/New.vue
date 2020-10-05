<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add Gallery</h3>
    </div>
    <form role="form" method="post" 
                            enctype="multipart/form-data"
                            @submit.prevent="addnewGallery()">
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
            @change="changePhoto($event)"
            name="photo"
            type="file"
            :class="{
              'is-invalid': form.errors.has('photo'),
            }"
          />
          <img :src="form.photo" alt="" width="80" height="80" />
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
            let file = event.target.files[0];
            if (file.size > 1048576) {
                Toast.fire({
                    type: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    footer: "<a href>Why do I have this issue?</a>"
                });
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.photo = event.target.result;
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
    addnewGallery() {
      this.form
        .post("api/gallery")
        .then((response) => {
          console.log(response.data);
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