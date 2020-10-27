<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add Profile</h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputName">Name Profile</label>
        <input
          type="text"
          class="form-control"
          id="profileId"
          name="title"
          v-model="title"
          placeholder="Enter title ..."
        />
      </div>
      <div class="red">{{ errors.title }}</div>

      <div class="form-group">
        <label>Description</label>
        <textarea
          class="form-control"
          id="profileId"
          name="description"
          v-model="description"
          placeholder="Enter description ..."
          cols="30"
          rows="10"
        ></textarea>
      </div>
      <div class="red">{{ errors.description }}</div>
      <div class="form-group">
        <label>Upload File</label>
        <input @change="changePhoto" name="photo" type="file" />
      </div>
      <div class="red">{{ errors.photo }}</div>

      <div class="form-group">
        <label>Phone</label>
        <input
          type="text"
          class="form-control"
          id="profileId"
          name="phone"
          v-model="phone"
          placeholder="Enter phone ..."
        />
      </div>
      <div class="red">{{ errors.phone }}</div>

      <div class="form-group">
        <label>Email</label>
        <input
          type="email"
          class="form-control"
          id="profileId"
          name="email"
          v-model="email"
          placeholder="Enter phone ..."
        />
      </div>
      <div class="red">{{ errors.email }}</div>

      <div class="form-group">
        <label>Address</label>
        <input
          type="text"
          class="form-control"
          id="profileId"
          name="address"
          v-model="address"
          placeholder="Enter address ..."
        />
      </div>
      <div class="red">{{ errors.address }}</div>

      <div class="form-group">
        <label>Social</label>
        <input
          type="text"
          class="form-control"
          id="profileId"
          name="social_media_1"
          v-model="social_media_1"
          placeholder="Enter social_media_1 ..."
        />
      </div>
      <div class="red">{{ errors.social_media_1 }}</div>

      <div class="form-group">
        <label>Social</label>
        <input
          type="text"
          class="form-control"
          id="profileId"
          name="social_media_2"
          v-model="social_media_2"
          placeholder="Enter social_media_2 ..."
        />
      </div>
      <div class="red">{{ errors.social_media_2 }}</div>

      <div class="form-group">
        <label>Social</label>
        <input
          type="text"
          class="form-control"
          id="profileId"
          name="social_media_1"
          v-model="social_media_3"
          placeholder="Enter social_media_3 ..."
        />
      </div>
      <div class="red">{{ errors.social_media_3 }}</div>

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
      <div></div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary" @click="addnewGallery">Submit</button>
    </div>
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
      photo: "",
      value: [],
      errors: {},
      valid: true,
      title: "",
      description: "",
      email: "",
      phone: "",
      address: "",
      social_media_1: "",
      social_media_2: "",
      social_media_3: "",
    };
  },

  mounted() {

    this.lisTag();
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

      formData.append("title", this.title);
      formData.append("description", this.description);
      formData.append("photo", this.photo);
      formData.append("email", this.email);
      formData.append("phone", this.phone);
      formData.append("address", this.address);
      formData.append("social_media_1", this.social_media_1);
      formData.append("social_media_2", this.social_media_2);
      formData.append("social_media_3", this.social_media_3);

      for (let i = 0; i < this.value.length; i++) {
        formData.append("tags[]", this.value[i].code);
      }

      this.errors = {};
      const validateTitle = (title) => {
        if (!this.title) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validTitle = validateTitle(this.title);
      this.errors.title = validTitle.error;
      if (this.valid) {
        this.valid = validTitle.valid;
      }

      const validateDescription = (description) => {
        if (!this.description) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validDescription = validateDescription(this.description);
      this.errors.description = validDescription.error;
      if (this.valid) {
        this.valid = validDescription.valid;
      }

      const validatePhone = (phone) => {
        if (!this.phone) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validPhone = validatePhone(this.phone);
      this.errors.phone = validPhone.error;
      if (this.valid) {
        this.valid = validPhone.valid;
      }

      const validateAddress = (address) => {
        if (!this.address) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validAddress = validateAddress(this.address);
      this.errors.address = validAddress.error;
      if (this.valid) {
        this.valid = validAddress.valid;
      }

      const validateEmail = (email) => {
        if (!this.email) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validEmail = validateEmail(this.email);
      this.errors.email = validEmail.error;
      if (this.valid) {
        this.valid = validEmail.valid;
      }

      const validateSocial_media_1 = (social_media_1) => {
        if (!this.social_media_1) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validSocial = validateSocial_media_1(this.social_media_1);
      this.errors.social_media_1 = validSocial.error;
      if (this.valid) {
        this.valid = validSocial.valid;
      }

      const validateSocial_media_2 = (social_media_2) => {
        if (!this.social_media_2) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validSocial2 = validateSocial_media_2(this.social_media_2);
      this.errors.social_media_2 = validSocial2.error;
      if (this.valid) {
        this.valid = validSocial2.valid;
      }

      const validateSocial_media_3 = (social_media_3) => {
        if (!this.social_media_3) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };

      const validSocial3 = validateSocial_media_3(this.social_media_3);
      this.errors.social_media_3 = validSocial3.error;
      if (this.valid) {
        this.valid = validSocial3.valid;
      }

      const validatePhoto = (photo) => {
        if (!this.photo) {
          return { valid: false, error: "This field is required" };
        }
        return { valid: true, error: null };
      };
      const validPhoto = validatePhoto(this.photo);
      this.errors.photo = validPhoto.error;
      if (this.valid) {
        this.valid = validPhoto.valid;
      }

      axios
        .post("/profile", formData, config)
        .then((response) => {
          console.log("test is : ", response);
          // this.$router.push("/index_profile");
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
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>




