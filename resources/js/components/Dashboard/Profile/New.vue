<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Add Profile</h3>
    </div>



    <!-- <form role="form" method="POST" enctype="multipart/form-data" @submit="addnewGallery"> -->
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
          <div class="form-group">
          <input
            @change="changePhoto"
            name="photo"
            type="file"
         
          />
     
        </div>
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
        <div class="form-group">
          <label>Email</label>
          <input
            type="text"
            class="form-control"
            id="profileId"
            name="email"
            v-model="email"
            placeholder="Enter phone ..."
         
          />

        </div>
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
        <div class="form-group">
        
  <label class="typo__label">Tagging</label>
  <multiselect v-model="value" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="code" :options="options" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
  <pre class="language-json"><code>{{ value  }}</code></pre>
</div>
         <div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary" @click="addnewGallery">Submit</button>
      </div>
      {{this.value}}
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
        photo: "",
        value:[],
        title: "",
        description: "",
        email: "",
        phone: "",
        address: "",
        social_media_1: "",
        social_media_2: "",
        social_media_3: "",
      // form: new Form({
      // }),
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


axios.post("/profile", formData, config)
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
<style src="vue-multiselect/dist/vue-multiselect.min.css">
</style>