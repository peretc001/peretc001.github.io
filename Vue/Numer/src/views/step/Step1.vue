<template>
   <div>
      <stepLine />
      <div class="step1">
         <b-container>
           <h2>{{ price }} p.</h2>
            <b-row>
               <b-col md="5">
                  <slick ref="slick" :options="slickOptions">
                     <div class="list" v-for="(n, index) in materials[selected_material].images" :key="index" :data-index="index">
                        <img class="image" :src="n" :key="index" @click="i = index">
                     </div>
                  </slick>
                  <vue-gallery-slideshow :images="materials[selected_material].images" :index="i" @close="i = null"></vue-gallery-slideshow>
                  <Button class="d-none d-md-flex" />
               </b-col>
               <b-col md="7">
                  <h3>Выберите материал</h3>
                  <div class="materials">
                     <div v-for="(material, index) in materials" :key="index" class="materials__card">
                        <input
                          :id="index"
                          type="radio"
                          v-model="selected_material"
                          name="material"
                          :value="index"
                          @change="changeSelectedIndex(index)"
                        >
                        <label :for="index">{{material.name}}</label>
                      </div>
                  </div>
                  <p class="text">{{materials[selected_material].desc}}</p>
                  <Button class="d-md-none mt-4 mb-4" />
               </b-col>
            </b-row>
         </b-container>
      </div>
   </div>
</template>

<script>
import stepLine from '../../components/stepLine.vue'
import Slick from 'vue-slick'
import '../../../node_modules/slick-carousel/slick/slick.css'
import Button from '../../components/Button.vue'

// https://github.com/KitchenStories/vue-gallery-slideshow
import VueGallerySlideshow from 'vue-gallery-slideshow'

export default {
  name: 'home',
  components: { stepLine, Slick, VueGallerySlideshow, Button },
  data () {
    return {
      slickOptions: {
        slidesToShow: 1,
        infinite: true,
        accessibility: true,
        adaptiveHeight: false,
        arrows: false,
        dots: true,
        draggable: true,
        edgeFriction: 0.30,
        swipe: true
      },
      selected_material: 'plexiglass',
      i: null
    }
  },
  beforeMount () {
    this.selected_material = this.$store.state.steps.material
    this.materials = this.$store.state.steps.materials
    this.price = this.$store.state.price
  },
  methods: {
    next () {
      this.$refs.slick.next()
    },
    prev () {
      this.$refs.slick.prev()
    },
    reInit () {
      this.$refs.slick.reSlick()
    },
    changeSelectedIndex (index) {
      this.$refs.slick.reSlick()
      this.$store.commit('setMaterial', this.selected_material)
      this.$store.commit('setPrice', this.materials[index].price)
      this.price = this.$store.state.price
    }    
  }
}

</script>
