<template>
   <div>
      <stepLine />
      <div class="step3">
         <b-container>
           <h2>{{ price }} p.</h2>
            <b-row>
               <b-col md="5">
                  <houseNumberView :step3="step3" :img="img" :selected_number="selected_number" />
                  <Button class="d-none d-md-flex" :disabled="disabled"/>
               </b-col>
               <b-col md="7">
                  <h2>Вариант размещения</h2>
                  <div v-if="this.$store.state.steps.selected_forms.name == 'combi'">
                  <p>Цвет подложки</p>
                  <div class="step3__color">
                     <div v-for="(color, i) in colors" :key="i" class="step3__color__item">
                        <input
                          :id="i"
                          type="radio"
                          name="color"
                          :value="i"
                          @input="changeColor(i)"
                          :checked="i == selected_color"
                        >
                        <label :for="i" :class="color"></label>
                     </div>
                  </div>
                  </div>

                  <p>Вариант надписи</p>
                  <div class="step3__card">
                     <div v-for="(tpl, i) in templates" :key="i" class="step3__card__item">
                        <input
                          :id="i"
                          type="radio"
                          name="template"
                          :value="i"
                          @input="changeText(i)"
                          v-model="selected_number"
                          :disabled="i != 'number' && blocked"
                        >
                        <label :for="i">{{tpl}}</label>
                     </div>
                  </div>

                  <span v-if="selected_number == 'number'">
                     <houseNumberInput v-on:number="number"         id="number"        placeholder="Номер здания" />
                  </span>
                  <span v-if="selected_number == 'adress'">
                     <houseNumberInput v-on:number="number"         id="number"        placeholder="Номер здания" />
                     <houseNumberInput v-on:number="adress"         id="adress"        placeholder="Адрес" />
                  </span>
                  <span v-if="selected_number == 'adressSecond'">
                     <houseNumberInput v-on:number="number"         id="number"        placeholder="Номер здания" />
                     <houseNumberInput v-on:number="adress"         id="adress"        placeholder="Адрес" />
                     <houseNumberInput v-on:number="adressSecond"   id="adressSecond"  placeholder="Адрес" />
                  </span>
                  
                  <Button class="d-md-none mt-4 mb-4" />
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
import Button from '../../components/Button'

export default {
   components: {
      stepLine,
      houseNumberView,
      houseNumberInput,
      Button
   },
   data () {
      return {
         blocked: false,
         img: '',
         selected_number: '',
         colors: {
            1: 'blue',
            2: 'brown',
            3: 'red',
            4: 'black',
            5: 'white',
            6: 'grey',
         },
         templates: {
            number: 'Номер',
            adress: 'Номер + Адрес',
            adressSecond: 'Номер + Адрес + Адрес',
         },
         step3: {}
      }
  },

  beforeMount () {
   // Устанавливаем выбранный размер
   this.price = this.$store.state.price
   this.current_item = this.$store.state.steps.selected_forms.current
   this.selected_number = this.$store.state.steps.selected_number
   this.selected_color = this.$store.state.steps.selected_color
   this.step3 = this.$store.state.steps.step3
   this.selected_img = this.$store.state.steps.selected_img

   this.img = this.$store.state.steps.selected_forms.img  
   

   this.disabled = this.$store.state.steps.disabled
   this.selected_forms = this.$store.state.steps.selected_forms

   if ( this.$store.state.steps.selected_forms.name == 'oak' && this.selected_forms.current_num == 2 ) {
      this.blocked = true
      let fontSize = Number(this.step3.number.size)
      fontSize >= 80 ? this.step3.number.size = '80' : ''
      this.selected_number = 'number'
      this.disabled = false
      this.$store.commit('setDisabled', false)
      this.$store.commit('setText', 'number')
   } else if ( this.$store.state.steps.selected_forms.name == 'oak' && this.selected_forms.current_num == 3 ) {
      this.blocked = true
      let fontSize = Number(this.step3.number.size)
      fontSize >= 80 ? this.step3.number.size = '80' : ''
      this.selected_number = 'number'
      this.disabled = false
      this.$store.commit('setDisabled', false)
      this.$store.commit('setText', 'number')
   } else if ( this.selected_forms.current_num == 7 || this.selected_forms.current_num == 9 || this.selected_forms.current_num == 13 ) {
      this.blocked = true
      let fontSize = Number(this.step3.number.size)
      fontSize >= 80 ? this.step3.number.size = '80' : ''
      this.selected_number = 'number'
      this.disabled = false
      this.$store.commit('setDisabled', false)
      this.$store.commit('setText', 'number')
   } else {
      this.blocked = false
      this.step3.number.size = '150'
      this.selected_number = this.$store.state.steps.selected_number
   }



  },
  methods: {
   changeColor (i) {
      if (i == 1) {
         this.current_item = this.$store.state.steps.selected_forms.current
      } else {
         this.current_item = this.$store.state.steps.selected_forms.current + '_' + i
      }
      this.selected_color = this.colors[i]
      this.img = this.$store.state.steps.forms_img[this.$store.state.steps.selected_forms.name][this.current_item]
      //Отправляем
      this.$store.commit('setImg', this.img)
      this.$store.commit('setImg2', this.current_item)
      this.$store.commit('setColor', i)
    },
    changeText (i) {
      this.selected_number = i
      //Отправляем
      this.$store.commit('setText', i)
      this.disabled = false
      this.$store.commit('setDisabled', false)
    },
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