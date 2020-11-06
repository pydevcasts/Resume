<template>
    <div>
         <div class="block" id="service">
          <div class="row">
            <div class="ftco-animate" v-for="service in getAllService" :key="service.id">
              <div class="icon-d-flex">
                <span v-bind:class="service.icon"></span>
              </div>
 
              <div class="media-body">
                <h3 class="heading">{{service.title}}</h3>
                <span>
                {{service.description|striphtml}}
                </span>
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
</template>
<script>

export default {
    name:"Services",
  data(){
      return{
 isActive: true,
      }
  },

  mounted() {
    this.$store.dispatch("allServiceFromDatabase");
  },
  computed: {
    getAllService() {
      return this.$store.getters.getServiceFromGetters;
    },
  },
}
</script>
<style lang="stylus" scoped>

</style>