<template>
   <div>
      <stepLine />
      <div class="step2">
         <b-container>
            <b-row>
               <b-col md="5">
                  <h3>{{ price }} p.</h3>
                  <div class="step2__img">
                     <img :src="this.img">
                  </div>
               </b-col>
               <b-col md="7">
                  <b-form-group label="Размер и форма">
                     <b-form-radio-group
                     id="btn-size"
                     v-model="checked"
                     :options="options"
                     buttons
                     name="size"
                     @input="changeSelectedSize(checked)"
                     ></b-form-radio-group>
                  </b-form-group>
                  <br>
                  <b-form-input id="range" v-model="value" type="range" min="1" max="2" step="0.00555" @input="changeSelectedSize2(value)"></b-form-input>
                  <div class="mt-4 mb-4">W: {{ width }} H: {{ height }}</div>
                  <div class="step2form">
                     <div v-for="(img, index) in forms" :key="index" class="step2form__card">
                        <input
                           :id="index"
                           v-model="forma"
                           type="radio"
                           :value="index"
                           name="forms"
                           @change="changeForms(index)"
                           required
                        >
                        <label :for="index"><img :src="img.url"></label>
                     </div>
                  </div>
                  <div class="step_button">
                     <b-button to="/step1" variant="outline-success">Назад</b-button><b-button to="/step3" variant="success">Далее</b-button>
                  </div>
               </b-col>
            </b-row>
         </b-container>
      </div>
   </div>
</template>

<script>
import stepLine from '../../components/stepLine.vue'

export default {
  components: {
    stepLine
  },
  data () {
    return {
      price: '',
      width: '200',
      height: '150',
      img: '',
      checked: '',
      options: {
        small: {
          text: 'Маленький',
          size: '1'
        },
        middle: {
          text: 'Средний',
          size: '1.30525'
        },
        big: {
          text: 'Большой',
          size: '1.60495'
        }
      },
      value: '',
      forma: '',
      forms: {
        square: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/01_sp.png'
        },
        rectangle: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/02_sp.png'
        },
        triangle: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/03_sp.png'
        },
        curcle: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/03_sp.png'
        },
        square2: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/05_sp.png'
        },
        rectangle2: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/06_sp.png'
        },
        triangle2: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/07_sp.png'
        },
        curcle2: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/08_sp.png'
        },
        square3: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/09_sp.png'
        },
        rectangle3: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/10_sp.png'
        },
        triangle3: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/11_sp.png'
        },
        curcle3: {
          url: 'https://www.designahousesign.com/app/themes/dahs/assets/images/12_sp.png'
        }
      }
    }
  },
  beforeMount () {
    // Устанавливаем выбранный размер
    this.price = this.$store.state.price
    this.checked = this.$store.state.steps.size
    this.value = this.$store.state.steps.range
    this.width = this.$store.state.steps.width
    this.height = this.$store.state.steps.height
    this.forma = this.$store.state.steps.forms
    this.img = this.$store.state.steps.img
  },
  methods: {
    changeSelectedSize (checked) {
      this.value = this.options[checked].size

      this.width = parseFloat(200 * this.options[checked].size).toFixed()
      this.height = parseFloat(150 * this.options[checked].size).toFixed()

      // Записываем выбранный размер
      this.$store.commit('setSize', checked)
      this.$store.commit('setRange', this.options[checked].size)
      this.$store.commit('setWidth', parseFloat(200 * this.options[checked].size).toFixed())
      this.$store.commit('setHeight', parseFloat(150 * this.options[checked].size).toFixed())
    },
    changeSelectedSize2 (value) {
      if (this.value <= 1.3) {
        this.checked = 'small'
      }
      if (this.value > 1.3 && this.value < 1.6) {
        this.checked = 'middle'
      }
      if (this.value >= 1.6) {
        this.checked = 'big'
      }

      this.width = parseFloat(200 * this.value).toFixed()
      this.height = parseFloat(150 * this.value).toFixed()

      // Записываем выбранный размер
      this.$store.commit('setSize', this.checked)
      this.$store.commit('setRange', value)
      this.$store.commit('setWidth', parseFloat(200 * this.value).toFixed())
      this.$store.commit('setHeight', parseFloat(150 * this.value).toFixed())
    },
    changeForms (index) {
      this.img = this.forms[index].url
      let arr = { forms: index, url: this.forms[index].url }
      // Записываем выбранную форму
      this.$store.commit('setForms', arr)
    }
  }
}
</script>
