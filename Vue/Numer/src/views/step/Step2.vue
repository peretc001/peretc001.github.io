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
                  <p>Прямоугольные 3:4</p>
                  <b-form-input id="range" v-model="value" type="range" min="1" max="2.5" step="0.005" @input="changeSelectedSize2(value)"></b-form-input>
                  <div class="mt-4 mb-4">X: {{ width }} см х Y: {{ height }} см</div>
                  <div class="step2form">
                     <div v-for="(img, index) in forma" :key="index" class="step2form__card">
                        <input
                           :id="index"
                           v-model="forma"
                           type="radio"
                           :value="index"
                           name="forms"
                           @change="changeForms(index)"
                           required
                        >
                        <label :for="index">{{ index }}<img :src="img.url"></label>
                     </div>
                  </div>
                  <Button />
               </b-col>
            </b-row>
         </b-container>
      </div>
   </div>
</template>

<script>
import stepLine from '../../components/stepLine.vue'
import Button from '../../components/Button.vue'

export default {
  components: {
    stepLine, Button
  },
  data () {
    return {
      price: '',
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
      value2: '',
      forma: 'aluminium'
    }
  },
  beforeMount () {
    // Устанавливаем выбранный размер
    this.price = this.$store.state.price
    this.checked = this.$store.state.steps.size
    this.value = this.$store.state.steps.range
    this.width = this.$store.state.steps.width
    this.height = this.$store.state.steps.height

    this.forma = this.$store.state.steps.material
    this.img = this.$store.state.steps.img
  },
  methods: {
    changeSelectedSize (checked) {
      this.value = this.options[checked].size

      this.width = parseFloat(150 * this.options[checked].size).toFixed(2)
      this.height = parseFloat(200 * this.options[checked].size).toFixed(2)

      // Записываем выбранный размер
      this.$store.commit('setSize', checked)
      this.$store.commit('setRange', this.options[checked].size)
      this.$store.commit('setWidth', parseFloat(150 * this.options[checked].size).toFixed(2))
      this.$store.commit('setHeight', parseFloat(200 * this.options[checked].size).toFixed(2))
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

      this.width = parseFloat(150 * this.value).toFixed(2)
      this.height = parseFloat(200 * this.value).toFixed(2)

      // Записываем выбранный размер
      this.$store.commit('setSize', this.checked)
      this.$store.commit('setRange', value)
      this.$store.commit('setWidth', parseFloat(150 * this.value).toFixed(2))
      this.$store.commit('setHeight', parseFloat(200 * this.value).toFixed(2))
      //Рассчитываем прайс
      this.price = ((((this.width*this.height)/1000000)*15000)+300).toFixed(2)
      this.$store.commit('setPrice', this.price)

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
