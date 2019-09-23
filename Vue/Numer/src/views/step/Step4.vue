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
                  <p>Бордер 20 р</p>
                  <div class="step2form">
                     <div v-for="(border, i) in borders" :key="i" class="step2form__card">
                        <input
                           :id="i"
                           v-model="selected"
                           type="radio"
                           :value="border"
                           name="borders"
                           @change="changeBorders(i)"
                           required
                        >
                        <label :for="i"><img :src="border"></label>
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
import houseNumberView from '../../components/HouseNumberView.vue'
import Button from '../../components/Button.vue'
export default {
  components: {
    stepLine,
    houseNumberView,
    Button
  },
  data () {
    return {
      price: '',
      step3: {},
      img: '',
      selected: '',
      borders: {
        square: 'http://placehold.it/150x150/000000',
        rectangle: 'http://placehold.it/150x150/FF0000',
        triangle: 'http://placehold.it/150x150/0000FF',
        curcle: 'http://placehold.it/150x150/008800'
      }
    }
  },
  beforeMount () {
   this.price = this.$store.state.price
   this.img = this.$store.state.steps.img
   this.step3['number'] = this.$store.state.steps.step3.number
   this.step3['adress'] = this.$store.state.steps.step3.adress
   this.step3['adressSecond'] = this.$store.state.steps.step3.adressSecond
  },
  methods: {
    changeBorders (index) {
      let arr = { borders: index, url: this.borders[index] }
      // Записываем выбранную форму
      this.$store.commit('setBorders', arr)
      this.img = this.borders[index]
    }
  }
}
</script>
