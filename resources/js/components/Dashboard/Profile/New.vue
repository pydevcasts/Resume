<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add Profile</h3>
    </div>
    <form role="form" method="POST" enctype="multipart/form-data" @submit="addnewGallery">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName">Name Profile</label>
          <input
            type="text"
            class="form-control"
            id="profileId"
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
          <textarea
            class="form-control"
            id="profileId"
            name="description"
            v-model="form.description"
            placeholder="Enter description ..."
            :class="{
              'is-invalid': form.errors.has('description'),
            }"
            cols="30"
            rows="10"
          ></textarea>
          <has-error :form="form" field="description"></has-error>
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
        <div class="form-group">
          <label>Phone</label>
          <input
            type="text"
            class="form-control"
            id="profileId"
            name="phone"
            v-model="form.phone"
            placeholder="Enter phone ..."
            :class="{
              'is-invalid': form.errors.has('phone'),
            }"
          />
          <has-error :form="form" field="phone"></has-error>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input
            type="text"
            class="form-control"
            id="profileId"
            name="email"
            v-model="form.email"
            placeholder="Enter phone ..."
            :class="{
              'is-invalid': form.errors.has('email'),
            }"
          />
          <has-error :form="form" field="email"></has-error>
        </div>
        <div class="form-group">
          <label>Address</label>
          <input
            type="text"
            class="form-control"
            id="profileId"
            name="address"
            v-model="form.address"
            placeholder="Enter address ..."
            :class="{
              'is-invalid': form.errors.has('address'),
            }"
          />
          <has-error :form="form" field="address"></has-error>
        </div>
        <div class="form-group">
          <label>Social</label>
          <input
            type="text"
            class="form-control"
            id="profileId"
            name="social_media_1"
            v-model="form.social_media_1"
            placeholder="Enter social_media_1 ..."
            :class="{
              'is-invalid': form.errors.has('social_media_1'),
            }"
          />
          <has-error :form="form" field="social_media_1"></has-error>
        </div>
        <div class="form-group">
          <label>Social</label>
          <input
            type="text"
            class="form-control"
            id="profileId"
            name="social_media_2"
            v-model="form.social_media_2"
            placeholder="Enter social_media_2 ..."
            :class="{
              'is-invalid': form.errors.has('social_media_2'),
            }"
          />
          <has-error :form="form" field="social_media_2"></has-error>
        </div>
        <div class="form-group">
          <label>Social</label>
          <input
            type="text"
            class="form-control"
            id="profileId"
            name="social_media_1"
            v-model="form.social_media_3"
            placeholder="Enter social_media_3 ..."
            :class="{
              'is-invalid': form.errors.has('social_media_3'),
            }"
          />
          <has-error :form="form" field="social_media_3"></has-error>
        </div>

        <div>
          <label class="typo__label">Tagging</label>
          <multiselect
            v-model="form.tags"
            tag-placeholder="Add this as new tag"
            placeholder="Search or add a tag"
            label="name"
            track-by="code"
            :options="options"
            :multiple="true"
            :taggable="true"
            @tag="addTag"
          ></multiselect>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
export default {
  components: { Multiselect },
  name: "New",
  data() {
    return {
      value: [],
      options: [],

      form: new Form({
        title: "",
        description: "",
        photo: "",
        email: "",
        phone: "",
        address: "",
        social_media_1: "",
        social_media_2: "",
        social_media_3: "",
        tags: "",
      }),
    };
  },
  mounted() {
    this.$store.dispatch("allTagFromDatabase");
    this.addtagtest();
  },
  computed: {
    getAllTag(newTag) {
      return this.options.push(this.$store.getters.getTagFormGetters);
      return this.value.push(this.$store.getters.getTagFormGetters);
    },
  },
  methods: {
    addTag(newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000),
      };
      this.options.push(tag);
      this.value.push(tag);
    },
    addtagtest() {
      let vm = this;
      axios
        .get("tag/")
        .then((res) => {
          // console.log( 'in res hast',res.data.tags)
          let resTags = res.data.tags;

          for (let i = 0; i < resTags.length; i++) {
            let obj = {};
            obj["code"] = resTags[i].id;
            obj["name"] = resTags[i].tag_name;
            vm.options.push(obj);
            console.log(25);
          }

          console.log("in options hast", vm.options);
        })
        .catch((err) => {
          console.log(err);
        });

      // tag_name = this.form.tags,
    },

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
      formData.append("description", this.form.description);
      formData.append("email", this.form.email);
      formData.append("phone", this.form.phone);
      formData.append("address", this.form.address);
      formData.append("social_media_1", this.form.social_media_1);
      formData.append("social_media_2", this.form.social_media_2);
      formData.append("social_media_3", this.form.social_media_3);
      formData.append("tags", this.form.tags);

      axios
        .post("/profile", formData, config)
        .then((response) => {
          console.log(response);
          this.$router.push("/index_profile");
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
<style src="vue-multiselect/dist/vue-multiselect.min.css">
</style>