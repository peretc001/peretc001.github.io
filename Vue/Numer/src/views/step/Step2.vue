<template>
   <div>
      <stepLine />
      <div class="step2">
         <b-container>
           <h2>{{ price }} p.</h2>
            <b-row>
               <b-col md="5">
                  <div class="step2__img">
                     <img :src="img">
                  </div>
                  <Button class="d-none d-md-flex" />
               </b-col>
               <b-col md="7">
                  <h2>Размер и форма</h2>
                  <div class="sizes">
                    <div class="sizes__label">
                      <div v-for="(size, i) in sizes" :key="i" class="sizes__card">
                        <input
                          :id="i"
                          type="radio"
                          name="size"
                          :value="i"
                          @input="changeSize(i)"
                          :checked="selected_size == i"
                        >
                        <label :for="i">{{size.text}}</label>
                      </div>
                    </div>
                    <div class="params">Размер: <b>{{ selected_forms.width }}</b> х <b>{{ selected_forms.height }}</b> см</div>  
                  </div>
                  <b-form-input id="range" v-model="range" type="range" min="1" max="2.5" step="0.005" @input="changeRange(range)"></b-form-input>
                  <div class="forms">
                     <div v-for="(form, i) in forms[selected_forms.name]" :key="i" class="forms__card">
                        <input
                          :id="i"
                          type="radio"
                          :value="i"
                          name="forms"
                          @change="changeForms(i)"
                          :checked="selected_forms.current == i"
                        >
                        <label :for="i"><img :src="form"></label>
                     </div>
                  </div>
                  <Button class="d-md-none mt-4 mb-4" />
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
      img: '',
      sizes: {
        small: {
          text: 'Маленький',
          size: '1'
        },
        middle: {
          text: 'Средний',
          size: '1.5'
        },
        big: {
          text: 'Большой',
          size: '2'
        }
      }
    }
  },
  beforeMount () {
    // Устанавливаем выбранный размер
    this.price = this.$store.state.price
    this.selected_size = this.$store.state.steps.size
    this.range = this.$store.state.steps.range

    this.img = this.$store.state.steps.selected_forms.img
    this.selected_forms = this.$store.state.steps.selected_forms
    this.forms = this.$store.state.steps.forms
  },
  methods: {
    changeSize (i) {
      this.range = this.sizes[i].size
      this.selected_forms.width = parseFloat(150 * this.sizes[i].size).toFixed(2)
      this.selected_forms.height = parseFloat(200 * this.sizes[i].size).toFixed(2)
      // Записываем выбранный размер
      this.$store.commit('setSize', i)
      this.$store.commit('setRange', this.sizes[i].size)
      this.$store.commit('setWidth', parseFloat(150 * this.sizes[i].size).toFixed(2))
      this.$store.commit('setHeight', parseFloat(200 * this.sizes[i].size).toFixed(2))
    },
    changeRange (value) {
      if (value <= 1.5) {
        this.selected_size = 'small'
      }
      if (value > 1.5 && value < 2) {
        this.selected_size = 'middle'
      }
      if (value >= 2) {
        this.selected_size = 'big'
      }
      this.selected_forms.width = parseFloat(150 * this.range).toFixed(2)
      this.selected_forms.height = parseFloat(200 * this.range).toFixed(2)

      // Записываем выбранный размер
      this.$store.commit('setSize', this.selected_size)
      this.$store.commit('setRange', value)
      this.$store.commit('setWidth', parseFloat(150 * this.range).toFixed(2))
      this.$store.commit('setHeight', parseFloat(200 * this.range).toFixed(2))
      //Рассчитываем прайс
      this.price = ((((this.selected_forms.width*this.selected_forms.height)/1000000)*15000)+300).toFixed(0)
      this.$store.commit('setPrice', this.price)

    },
    changeForms (index) {
      this.img = this.forms[this.selected_forms.name][index]
      let arr = { material: this.selected_forms.name, img: this.forms[this.selected_forms.name][index], current: index }
      // Записываем выбранную форму
      this.$store.commit('setForms', arr)
    }
  }
}
</script>
