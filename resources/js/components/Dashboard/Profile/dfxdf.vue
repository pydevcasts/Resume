<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add Profile</h3>
    </div>
    <!-- <form
      role="form"
      method="post"
      @submit="addnewGallery"
      @keydown="form.onKeydown($event)"
    > -->
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
            :class="{ 'is-invalid': form.errors.has('title') }">
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
          <has-error :form="form" field="social_media_1"></has-error>
        </div>
          <div class="form-group">
          <input
            @change="changePhoto"
            name="photo"
            type="file"
          />
        </div>
        <div class="form-group">
          <label class="typo__label">Tagging</label>
          <multiselect
            v-model="value"
            tag-placeholder="Add this as new tag"
            placeholder="Search or add a tag"
            label="name"
            track-by="code"
            :options="options"
            :multiple="true"
            :taggable="true"
            @tag="addTag"
   ></multiselect>
          <pre class="language-json"><code>{{ value  }}</code></pre>
        </div>
        <div>
        </div>
      </div>
      <div class="card-footer">
           <button type="submit" class="btn btn-primary" @click="addnewGallery">Submit</button>
      </div>
    <!-- </form> -->
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
export default {
  components: { Multiselect },
  name: "New",
  data() {
    return {
      options: [],
      value: [],
        photo: "",
      form: new Form({
        title: "",
        description: "",
        email: "",
        phone: "",
        address: "",
        social_media_1: "",
        social_media_2: "",
        social_media_3: "",
      }),
    };
  },
  mounted() {
    this.$store.dispatch("allTagFromDatabase");
    this.lisTag();
  },

  computed: {
    getAllTag(newTag) {
      return this.$store.getters.getTagFormGetters;
    },
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

      formData.append("title", this.form.title);
      formData.append("description", this.form.description);
      formData.append("photo", this.form.photo);
      formData.append("email", this.form.email);
      formData.append("phone", this.form.phone);
      formData.append("address", this.form.address);
      formData.append("social_media_1", this.form.social_media_1);
      formData.append("social_media_2", this.form.social_media_2);
      formData.append("social_media_3", this.form.social_media_3);

      for (let i = 0; i < this.value.length; i++) {
        formData.append("tags[]", this.value[i].code);
      }

      this.form
        .post("/profile", formData, config)
        .then((response) => {
          console.log("test is : ", response);
          this.$router.push("/index_profile");
          Toast.fire({
            icon: "success",
            title: "Gallery is createde successfully",
          });
        })
        .catch((error) => {
          console.log("error ...");
        });
    },

    addTag(newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000),
      };
      this.options.push(tag);
      this.value.push(tag);
    },

    lisTag() {
      axios
        .get("tag/")
        .then((response) => {
          for (let i = 0; i < response.data.tags.length; i++) {
            this.tags = response.data.tags;
            let obj = {};
            obj["name"] = response.data.tags[i].tag_name;
            obj["code"] = response.data.tags[i].id;
            this.options.push(obj);
          }
        })
        .catch((error) => {
          console.log("error...");
        });
    },
  },
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css">
</style>