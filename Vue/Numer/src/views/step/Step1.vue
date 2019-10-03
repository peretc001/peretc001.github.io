<template>
   <div>
      <stepLine />
      <div class="step1">
         <b-container>
            <b-row>
               <b-col md="5">
                  <h3>{{ price }} p.</h3>
                  <slick ref="slick" :options="slickOptions">
                     <div class="list" v-for="(n, index) in options[selected].images" :key="index" :data-index="index">
                        <img class="image" :src="n" :key="index" @click="i = index">
                     </div>
                  </slick>
                  <vue-gallery-slideshow :images="options[selected].images" :index="i" @close="i = null"></vue-gallery-slideshow>
               </b-col>
               <b-col md="7">
                  <p><b>Материал</b></p>
                  <div class="materials">
                     <div v-for="(option, index) in options" :key="index" class="materials__card">
                        <input
                          :id="index"
                          v-model="selected"
                          type="radio"
                          :value="option.text"
                          @change="changeSelectedIndex(index)"
                          required
                        >
                        <label :for="index">{{ index }}<img :src="option.url">{{option.text}}</label>
                      </div>
                  </div>
                  <p class="text">{{options[selected].desc}}</p>
                  <Button />
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
      selected: '',
      i: null
    }
  },
  beforeMount () {
    this.selected = this.$store.state.steps.material
    this.options = this.$store.state.steps.options
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
      this.$store.commit('setMaterial', this.selected)
      this.$store.commit('setPrice', this.options[index].price)
      this.price = this.$store.state.price
    }
  }
}

</script>
