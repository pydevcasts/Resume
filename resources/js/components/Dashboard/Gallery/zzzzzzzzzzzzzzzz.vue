<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add Gallery</h3>
    </div>
    <form role="form" method="POST" enctype="multipart/form-data" @submit.prevent="addnewGallery()">
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
          <input
            @change="changePhoto($event)"
            name="photo"
            type="file"
         
          />
          <img :src="photo" alt width="80" height="80" />
          <!-- <has-error :form="form" field="photo"></has-error> -->
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
  // name: "New",
  data() {
    return {
      // form: new Form({
        title: "",
        summary: "",
        photo: "",
      // }),
    };
  },

  methods: {
    changePhoto(event) {
     let file = event.target.files[0];
    
    },
    addnewGallery() {
       let formData = new FormData();
       const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };

formData.append('photo', this.changePhoto.file);
formData.append('title', this.title);
formData.append('summary', this.summary);
axios({
    method: 'POST',
    url: 'api/gallery',
    data: formData,
    headers: {
        'Content-Type': 'multipart/form-data'
    }
    })
      // this.form
      //   .post("/api/gallery", config)
        .then((response) => {
          console.log(response)
          this.$router.push("/index_gallery");
          Toast.fire({
            icon: "success",
            title: "Gallery is createde successfully",
          });
        })
        .catch((error) => {
          console.log(error);
        });
  //     const config = {
  //       headers: {
  //         "content-type": "multipart/form-data",
       
  //       },
  //     };
   
  //     this.form
  //       .post("/api/gallery")
  //       .then((response) => {
  //         console.log(response)
  //         this.$router.push("/index_gallery");
  //         Toast.fire({
  //           icon: "success",
  //           title: "Gallery is createde successfully",
  //         });
  //       })
  //       .catch((error) => {
  //         console.log(error);
  //       });
    },
  },
};


</script>