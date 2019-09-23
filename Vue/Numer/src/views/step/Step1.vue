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
                        <label :for="index"><img :src="option.url">{{option.text}}</label>
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

import slideImg from '../../assets/img/000000.png'
import slideImg2 from '../../assets/img/FF0000.png'
import slideImg3 from '../../assets/img/008000.png'
import slideImg4 from '../../assets/img/0000FF.png'
import slideImg5 from '../../assets/img/FFFFFF.png'

export default {
  name: 'home',
  components: { stepLine, Slick, VueGallerySlideshow, Button },
  data () {
    return {
      price: '',
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
      options: {
        Plexiglass: {
          text: 'Plexiglass',
          desc: 'Plexiglass - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            slideImg, slideImg2, slideImg3, slideImg4, slideImg5
          ],
          price: 600
        },
        Frosted: {
          text: 'Frosted',
          desc: 'Frosted - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            slideImg2, slideImg3, slideImg4, slideImg5, slideImg
          ],
          price: 650
        },
        Aluminium: {
          text: 'Aluminium',
          desc: 'Aluminium - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            slideImg2, slideImg3, slideImg4, slideImg5, slideImg
          ],
          price: 700
        },
        Oak: {
          text: 'Oak',
          desc: 'Oak - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            slideImg3, slideImg4, slideImg5, slideImg, slideImg2
          ],
          price: 750
        },
        Brass: {
          text: 'Brass',
          desc: 'Brass - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            slideImg4, slideImg5, slideImg, slideImg2, slideImg3
          ],
          price: 800
        }
      },
      i: null
    }
  },
  beforeMount () {
    this.selected = this.$store.state.steps.material
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
