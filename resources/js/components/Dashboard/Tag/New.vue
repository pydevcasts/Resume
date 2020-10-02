<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Quick Example</h3>
    </div>
    <form role="form" method="post" @click.prevent="addTag()">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName">Name Tag</label>
          <input
            type="text"
            class="form-control"
            id="tagId"
            name="tag_name"
            v-model="form.tag_name"
            placeholder="Enter name of tag ..."
            :class="{
              'is-invalid': form.errors.has('tag_name'),
            }"
          />
          <has-error :form="form" field="tag_name"></has-error>
        </div>
              <div class="form-group">
                                    <label>Select</label>
                                    <select
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'profile_id'
                                            )
                                        }"
                                        v-model="form.profile_id"
                                    >
                                        <option disabled value=""
                                            >Select One</option
                                        >
                                        <option
                                            :value="profile.id"
                                            v-for="(profile,
                                            index) in getAllProfile"
                                            :key="index"
                                            >
                                            {{ profile.title }}</option
                                        >
                                    </select>
                                    <has-error
                                        :form="form"
                                        field="profile_id"
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
        tag_name: "",
        profile_id: "",
      }),
    };
  },
      mounted() {
        this.$store.dispatch("allProfileFromDatabase");
    },
    computed: {
        getAllProfile() {
            return this.$store.getters.getProfileFormGetters;
        }
    },
  methods: {
    addTag() {
      this.form
        .post("/api/tag")
        .then((response) => {
          console.log("ok");
          this.$router.push("/tag_index");
          Toast.fire({
            icon: "success",
            title: "Tag is createde successfully",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>