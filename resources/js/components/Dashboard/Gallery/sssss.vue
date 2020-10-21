<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form
                            role="form"
                            enctype="multipart/form-data"
                            @submit.prevent="updatePost()"
                        >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postId">Update Post </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="postId"
                                        placeholder="Add New Post"
                                        v-model="form.title"
                                        name="title"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'title'
                                            )
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="title"
                                    ></has-error>
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
                                    <input
                                        @change="changePhoto($event)"
                                        name="photo"
                                        type="file"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'photo'
                                            )
                                        }"
                                    />
                                    <img
                                        :src="updateImage(form.photo)"
                                        alt=""
                                        width="80"
                                        height="80"
                                    />
                                    <has-error
                                        :form="form"
                                        field="photo"
                                    ></has-error>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</template>

<script>
export default {
    name: "Edit",
    data() {
        return {
            form: new Form({
                title: "",
                  summary: "",
                photo: ""
            })
        };
    },
   
    created() {
      axios
      .get(`gallery/edit/${this.$route.params.galleryid}`)
      .then((response) => {
        this.form.fill(response.data.gallery);
      });
  },
   
    methods: {
          changePhoto(event) {
      this.form.photo = event.target.files[0];
    },
    
        updatePost() {
            this.form
                .put(`gallery/${this.$route.params.galleryid}`)
                .then(() => {
                    this.$router.push("/index_gallery");
                    Toast.fire({
                        icon: "success",
                        type: "success",
                        title: "Post Updated successfully"
                    });
                })
                .catch(() => {});
        },
        updateImage() {
            let img = this.form.photo;
            if (img.length > 100) {
                return this.form.photo;
            } else {
                return `./gallery/${this.form.photo}`;
            }
        }
    }
    }

</script>

<style scoped></style>
