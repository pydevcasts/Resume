<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add Pdf</h3>
    </div>
    <form role="form" method="POST" enctype="multipart/form-data" @submit="addnewPdf">
      <div class="card-body">
        <div class="form-group">
          <input @change="changePdf" name="file" type="file" />
        </div>
        <div class="red">{{ errors.file }}</div>
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
     
      file: "",
      valid: true,
      errors: {},
    };
  },

  methods: {
    changePdf(event) {
      console.log(event.target.files[0]);
      this.file = event.target.files[0];
    },
    addnewPdf(event) {
      event.preventDefault();
      let formData = new FormData();
      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };

      formData.append("file", this.file);

      this.errors = {};


      const validateFile = (file) => {
        if (!file.length) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validFile = validateFile(this.file);
      this.errors.file = validFile.error;
      if (this.valid) {
        this.valid = validFile.valid;
      }
      axios
        .post("/upload", formData, config)
        .then((response) => {
          console.log(response);
          this.$router.push("/index_pdf");
          Toast.fire({
            icon: "success",
            title: "PDF is createde successfully",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>