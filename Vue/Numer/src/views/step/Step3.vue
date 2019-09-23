<template>
   <div>
      <stepLine />
      <div class="step3">
         <b-container>
            <b-row>
               <b-col md="5">
                  <h3>{{ price }} p.</h3>
                  <houseNumberView :step3="step3" :img="img"/>
               </b-col>
               <b-col md="7">
                  <p>Текст</p>
                  <houseNumberInput v-on:number="number"         id="number"        placeholder="Номер здания" />
                  <houseNumberInput v-on:number="adress"         id="adress"        placeholder="Адрес" />
                  <houseNumberInput v-on:number="adressSecond"   id="adressSecond"  placeholder="Адрес" />
                  <Button />
               </b-col>
            </b-row>
         </b-container>
      </div>
   </div>
</template>

<script>

import stepLine from '../../components/stepLine'
import houseNumberView from '../../components/HouseNumberView'
import houseNumberInput from '../../components/HouseNumberInput'
import Button from '../../components/Button.vue'

export default {
  components: {
    stepLine,
    houseNumberView,
    houseNumberInput,
    Button
  },
  data () {
    return {
      price: '',
      step3: {}
    }
  },
  beforeMount () {
    // Устанавливаем выбранный размер
    this.price = this.$store.state.price
    this.img = this.$store.state.steps.img
    this.step3['number'] = this.$store.state.steps.step3.number
    this.step3['adress'] = this.$store.state.steps.step3.adress
    this.step3['adressSecond'] = this.$store.state.steps.step3.adressSecond
  },
  methods: {
    number (value) {
      this.step3['number'] = value
    },
    adress (value) {
      this.step3['adress'] = value
    },
    adressSecond (value) {
      this.step3['adressSecond'] = value
    }
  }
}
</script>
