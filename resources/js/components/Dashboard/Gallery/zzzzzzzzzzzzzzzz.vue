<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Edit Gallery</h3>
    </div>
    <form role="form" method="post" @submit="updateGallery" enctype="multipart/form-data" >
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName">Edit Gallery</label>
          <input
            type="text"
            class="form-control"
            id="galleryId"
            name="title"
            v-model="title"
            placeholder="Enter title ..."
          />
          <!-- <has-error :form="form" field="title"></has-error> -->
        </div>
        <div class="form-group">
          <label>Summary</label>
          <input
            type="text"
            class="form-control"
            id="galleryId"
            name="title"
            v-model="summary"
            placeholder="Enter summary ..."
          />
          <!-- <has-error :form="form" field="summary"></has-error> -->
        </div>

        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <input type="file" @change="changePhoto" id="galleryId" name="photo" />
          <!-- <has-error :form="form" field="photo"></has-error> -->
          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-danger">
          <a href="/index_gallery" :style="{ 'text-decoration': 'none', color: 'white' }">Back</a>
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
      // form: new Form({
      title: "",
      summary: "",
      // }),
      photo: "",
    };
  },
  mounted() {
    axios
      .get(`/api/gallery/edit/${this.$route.params.galleryid}`)
      .then((response) => {
        this.title = response.data.gallery.title;
        this.summary = response.data.gallery.summary;
      })
      .catch(function (error) {
        console.log(error);
      });
  },
  methods: {
    changePhoto(event) {
      console.log(event.target.files[0]);
      this.photo = event.target.files[0];
    },
    updateGallery(event) {
      event.preventDefault();

      let formData = new FormData();
      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };

      formData.append("photo", this.photo);
      formData.append("title", this.title);
      formData.append("summary", this.summary);
      axios({
        method: "PUT",
        url: `/api/gallery/${this.$route.params.galleryid}`,
        data: formData,
        headers: {
          "content-type": "multipart/form-data",
        },
      })
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
