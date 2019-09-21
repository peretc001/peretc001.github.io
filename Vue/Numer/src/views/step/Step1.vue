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
                     <div class="materials__card" v-for="(option, index) in options" :key="index">
                        <input type="radio" v-model="selected" @change="changeSelectedIndex(index)" :value="option.text">
                        <label>{{option.text}}</label>
                     </div>
                  </div>
                  <p class="text">{{options[selected].desc}}</p>
                  <div class="step_button">
                     <b-button to="/step2" variant="success">Далее</b-button>
                  </div>
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

// https://github.com/KitchenStories/vue-gallery-slideshow
import VueGallerySlideshow from 'vue-gallery-slideshow'

export default {
  components: { stepLine, Slick, VueGallerySlideshow },
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
            'http://placehold.it/420x220/000000',
            'http://placehold.it/420x220/000000',
            'http://placehold.it/420x220/000000',
            'http://placehold.it/420x220/000000',
            'http://placehold.it/420x220/000000'
          ],
          price: 600
        },
        Frosted: {
          text: 'Frosted',
          desc: 'Frosted - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            'http://placehold.it/420x220/FF0000',
            'http://placehold.it/420x220/000000',
            'http://placehold.it/420x220/FF0000',
            'http://placehold.it/420x220/FF0000',
            'http://placehold.it/420x220/FF0000'
          ],
          price: 650
        },
        Aluminium: {
          text: 'Aluminium',
          desc: 'Aluminium - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            'http://placehold.it/420x220/0000FF',
            'http://placehold.it/420x220/000000',
            'http://placehold.it/420x220/FF0000',
            'http://placehold.it/420x220/FF0000',
            'http://placehold.it/420x220/FF0000'
          ],
          price: 700
        },
        Oak: {
          text: 'Oak',
          desc: 'Oak - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            'http://placehold.it/420x220/008000',
            'http://placehold.it/420x220/000000',
            'http://placehold.it/420x220/FF0000',
            'http://placehold.it/420x220/FF0000',
            'http://placehold.it/420x220/FF0000'
          ],
          price: 750
        },
        Brass: {
          text: 'Brass',
          desc: 'Brass - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            'http://placehold.it/420x220/FFFFFF',
            'http://placehold.it/420x220/000000',
            'http://placehold.it/420x220/FF0000',
            'http://placehold.it/420x220/FF0000',
            'http://placehold.it/420x220/FF0000'
          ],
          price: 800
        }
      },
      // Индекс фото в lightbox
      i: null
    }
  },
  beforeMount () {
    // Устанавливаем выбранный материал
    this.selected = this.$store.state.steps.material
    // Устанавливаем цену
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
      // Перезагружаем slick
      this.$refs.slick.reSlick()
      // Записываем выбранный материал
      this.$store.commit('setMaterial', this.selected)
      // Вычисляем стоимость
      this.$store.commit('setPrice', this.options[index].price)
      this.price = this.$store.state.price
    }
  }
}

</script>
