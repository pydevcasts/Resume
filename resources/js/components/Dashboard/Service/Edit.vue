<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Edit Service</h3>
    </div>
    <form role="form" method="post" @submit.prevent="updateService()">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName">Name Icon</label>
          <input
            type="text"
            class="form-control"
            id="serviceId"
            name="icon"
            v-model="form.icon"
            placeholder="Enter icon class ..."
            :class="{
              'is-invalid': form.errors.has('icon'),
            }"
          />
          <has-error :form="form" field="icon"></has-error>
          <label for="exampleInputName">Name Service</label>
          <input
            type="text"
            class="form-control"
            id="serviceId"
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
                                  <textarea name="description" id="" v-model="form.description"></textarea>
                                    <has-error
                                        :form="form"
                                        field="description"
                                    ></has-error>
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
        icon:"",
        title: "",
        description: "",
      }),
    };
  },
mounted() {
    axios
      .get(`/api/service/edit/${this.$route.params.serviceid}`)
      .then((response) => {
        this.form.fill(response.data.service);
      });
  },
      
  methods: {
    updateService() {
      this.form
        .put(`/api/service/${this.$route.params.serviceid}`)
        .then((response) => {
          this.$router.push("/index_service");

          Toast.fire({
            icon: "success",
            title: "Service is Updated Successfully",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>