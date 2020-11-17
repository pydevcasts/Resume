<template>
  <div  id="gallery">
    <div class="last block">
      <h2 class="gallery">Work Example</h2>
      <div class="row">
        <div id="card-container" v-for="gallery in getAllgallery" :key="gallery.id">
          <div id="card">
            <div class="front face">
              <img :src="ourImage(gallery.photo)" />
            </div>
            <div class="back face">
              <h2 :class="{artist:showIs}">{{gallery.title}}</h2>
              <p class="artist" :class="{artist:showIs}">{{gallery.summary}}</p>
              <p class="date" :class="{artist:showIs}">{{gallery.created_at| timeformat}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="horizontal_line">
        <div class="line_left"></div>
        <div class="left_circle"></div>
        <div class="central_circle"></div>
        <div class="right_circle"></div>
        <div class="line_right"></div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Works",
  data() {
    return {
      showIs: true,
    };
  },
  mounted() {
    this.$store.dispatch("allGalleryFromDatabase");
  },
  computed: {
    getAllgallery() {
      return this.$store.getters.getGalleryFormGetters;
    },
  },
  methods: {
    ourImage(img) {
      return `https://s-abasnezhad.ir/storage/gallery/${img}`;
    },
  },
};
</script>
<style scoped>
.artist {
  color: black;
}
</style>
