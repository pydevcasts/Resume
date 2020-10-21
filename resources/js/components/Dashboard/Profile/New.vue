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
             cols="30" rows="10"
          >
  
     </textarea>
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
           <div class="form-group">
                                    <label>Select</label>
                                        <multiselect

                                          v-model="selected"

                                          :multiple="true"

                                          :options="options">

                                        </multiselect>
                                    <!-- <select   v-model="form.tags"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'tags'
                                            )
                                        }"
                                      
                                        
                                    >
                                        <option disabled value=""
                                            >Select One</option
                                        >
                                        <option
                                            :value="tag.id"
                                            v-for="(tag,
                                            index) in getAllTag"
                                            :key="index"
                                            >
                                            {{ tag.tag_name }}</option
                                        >
                                    </select> -->
                                    <!-- <has-error
                                        :form="form"
                                        field="tags"
                                    ></has-error> -->
                                </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
export default {
  components: { Multiselect },
  name: "New",
  data() {
    return {
      selected: null,
       options: [],
      form: new Form({
        title: "",
        description: "",
        photo: "",
        email:"",
        phone:"",
        address:"",
        social_media_1:"",
        social_media_2:"",
        social_media_3:"",
        tags:"",
      }),
    };
  },
 mounted() {
        this.$store.dispatch("allTagFromDatabase");
    },
    computed: {

        getAllTag() {
            
            return this.$store.getters.getTagFormGetters;
        },

      tagsTest(){
      console.log('are')
      alert('fvfvf')
        return tags();
      }
// هستی؟؟؟
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
      // formData.append("tags", this.form.tags);

      axios
        .post("/profile", formData, config)
        .then((response) => {
          console.log(response);
          // this.$router.push("/index_profile");
          Toast.fire({
            icon: "success",
            title: "Gallery is createde successfully",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },

    tags(){
      alert('ok')
      let vm = this;
         axios
        .get("/allTags", config)
        .then((res) => {
          console.log(res.response.data);
    
      vm.options = res.response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    
  
  }
  // ی جا ی \رانتر اشتباه شده
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css">
</style>