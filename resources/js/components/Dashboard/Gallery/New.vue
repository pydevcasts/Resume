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
            v-model="title"
            placeholder="Enter title ..."
          />
        </div>
        <div class="red">{{ errors.title }}</div>
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
        </div>
        <div class="red">{{ errors.summary }}</div>
        <div class="form-group">
          <input @change="changePhoto" name="photo" type="file" />
        </div>
        <div class="red">{{ errors.photo }}</div>
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
      title: "",
      summary: "",
      photo: "",
      valid: true,
      errors: {},
    };
  },

  methods: {
    changePhoto(event) {
      console.log(event.target.files[0]);
      this.photo = event.target.files[0];
    },
    addnewGallery(event) {
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
      this.errors = {};
      const validateName = (title) => {
        if (!title.length) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validName = validateName(this.title);
      this.errors.title = validName.error;
      if (this.valid) {
        this.valid = validName.valid;
      }

      const validateSummary = (summary) => {
        if (!summary.length) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validSummary = validateSummary(this.summary);
      this.errors.summary = validSummary.error;
      if (this.valid) {
        this.valid = validSummary.valid;
      }

      const validatePhoto = (photo) => {
        if (!photo.length) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validPhoto = validatePhoto(this.title);
      this.errors.photo = validPhoto.error;
      if (this.valid) {
        this.valid = validPhoto.valid;
      }
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