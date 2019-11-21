<template>
   <div>
      <stepLine />
      <div class="step2">
         <b-container>
           <h2 class="price">{{ price }} p.</h2>
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
                          :disabled="min == max"
                        >
                        <!-- :disabled="selected_forms.name == 'oak' && i == 'big'" -->
                        <label :for="i">{{size.text}}</label>
                      </div>
                    </div>
                    <div class="params">Размер: <b>{{ selected_forms.width }}</b> х <b>{{ selected_forms.height }}</b> мм</div>  
                  </div>
                  <b-form-input id="range" v-model="range" type="range" :min="min" :max="max" :step="step" @input="changeRange(range)"></b-form-input>
                  <div class="forms">
                     <div v-for="(form, i) in forms" :key="i" class="forms__card">
                        <input
                          :id="i"
                          type="radio"
                          :value="i"
                          name="forms"
                          @change="changeForms(i)"
                          :checked="selected_forms.current == selected_forms.name + i"
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


//Соотношение сторон
let w = 1, h = 1

export default {
  components: {
    stepLine, Button
  },
  data () {
    return {
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
      },
      forms_oak: {
        8: require('@/assets/img/step2/8.png'),
        9: require('@/assets/img/step2/9.png'),
        12: require('@/assets/img/step2/12.png'),
        20: require('@/assets/img/step2/20.png'),
        22: require('@/assets/img/step2/22.png')
      },
    }
  },
  beforeMount () {
    // Устанавливаем выбранный размер
    this.price = this.$store.state.price
    this.forms = this.$store.state.steps.forms
    this.selected_size = this.$store.state.steps.size
    this.selected_forms = this.$store.state.steps.selected_forms
    this.property = this.$store.state.steps.property

    this.range = this.$store.state.steps.range
    
    if ( this.selected_forms.name == 'oak' ) {
      this.forms = this.forms_oak
    //   if (this.range >= 1.5 ) {
    //     this.range = 1.5
    //     this.max = 1.5
    //     this.selected_size = 'middle'
    //     this.selected_forms.width = parseFloat(this.property[this.selected_forms.current_num].width * this.range).toFixed(2)
    //     this.selected_forms.height = parseFloat(this.property[this.selected_forms.current_num].height * this.range).toFixed(2)
    //     this.price = ((((this.selected_forms.width*this.selected_forms.height)/1000000)*15000)+300).toFixed(0)
    //     this.$store.commit('setSize', 'middle')
    //     this.$store.commit('setRange', this.range)
    //     this.$store.commit('setWidth', parseFloat(this.property[this.selected_forms.current_num].width * this.range).toFixed(2))
    //     this.$store.commit('setHeight', parseFloat(this.property[this.selected_forms.current_num].height * this.range).toFixed(2))
    //     this.$store.commit('setPrice', this.price)
    //   }
    } else {
      this.forms = this.$store.state.steps.forms
    }

    this.img = this.$store.state.steps.forms_img[this.selected_forms.name][this.selected_forms.current]

      this.min = this.property[this.selected_forms.current_num].min
      this.max = this.property[this.selected_forms.current_num].max
      this.step = this.property[this.selected_forms.current_num].step
      this.selected_forms.width = parseFloat(this.selected_forms.width).toFixed(2)
      this.selected_forms.height = parseFloat(this.selected_forms.height).toFixed(2)
      this.price = ((((this.selected_forms.width*this.selected_forms.height)/1000000)*15000)+300).toFixed(0)
    // }

    this.forms_img = this.$store.state.steps.forms_img

    if ( this.selected_forms.current_num == 1 || this.selected_forms.current_num == 2 || this.selected_forms.current_num == 3 || this.selected_forms.current_num == 4 || this.selected_forms.current_num == 5 || this.selected_forms.current_num == 6 || this.selected_forms.current_num == 8 || this.selected_forms.current_num == 11 || this.selected_forms.current_num == 14 || this.selected_forms.current_num == 17 || this.selected_forms.current_num == 19 ) {
      w = 3/4
      h = 1
    } else if ( this.selected_forms.current_num == 7 || this.selected_forms.current_num == 9 || this.selected_forms.current_num == 13 ) {
      w = 1
      h = 1/4
    } else if ( this.selected_forms.current_num == 15 || this.selected_forms.current_num == 21 || this.selected_forms.current_num == 22 || this.selected_forms.current_num == 23 || this.selected_forms.current_num == 24 || this.selected_forms.current_num == 25 ) {
      w = 1
      h = 3/4
    } else if ( this.selected_forms.current_num == 12 ) {
      w = 1
      h = 1/2
    } else if ( this.selected_forms.current_num == 10 || this.selected_forms.current_num == 16 || this.selected_forms.current_num == 18 || this.selected_forms.current_num == 20 ) {
      w = 1
      h = 1
    }
  },
  methods: {
    changeSize (i) {
      if ( this.selected_forms.name == 'oak' ) {
        this.max = 300
      }
      if ( i == 'small' ) {
        this.range = this.min
      } else if ( i == 'middle' ) {
        this.range = this.min + (this.max - this.min)/2
      } else {
        this.range = this.max
      }

      this.selected_forms.width = parseFloat(this.range*w).toFixed(2)
      this.selected_forms.height = parseFloat(this.range*h).toFixed(2)
      // Записываем выбранный размер
      this.$store.commit('setSize', i)
      this.$store.commit('setRange', this.range)
      this.$store.commit('setWidth', this.selected_forms.width)
      this.$store.commit('setHeight', this.selected_forms.height)

      //Рассчитываем прайс
      this.price = ((((this.selected_forms.width*this.selected_forms.height)/1000000)*15000)+300).toFixed(0)
      this.$store.commit('setPrice', this.price)
    },
    changeRange (value) {
      if ( this.selected_forms.name == 'oak' ) {
        this.max = 300
      }

      if (value <= this.min ) {
        this.selected_size = 'small'
      }
      if (value > this.min && value < this.max ) {
        this.selected_size = 'middle'
      }
      if (value >= this.max) {
        this.selected_size = 'big'
      }

      
      // if (this.selected_forms.name == 'oak' && this.range >= this.min + (this.max - this.min)/2 ) {
      //   this.range = this.min + (this.max - this.min)/2
      //   this.max = this.min + (this.max - this.min)/2
      // }

      this.selected_forms.width = parseFloat(this.range*w).toFixed(2)
      this.selected_forms.height = parseFloat(this.range*h).toFixed(2)

      // Записываем выбранный размер
      this.$store.commit('setSize', this.selected_size)
      this.$store.commit('setRange', value)
      this.$store.commit('setWidth', this.selected_forms.width)
      this.$store.commit('setHeight', this.selected_forms.height)
      // //Рассчитываем прайс
      this.price = ((((this.selected_forms.width*this.selected_forms.height)/1000000)*15000)+300).toFixed(0)
      this.$store.commit('setPrice', this.price)

    },
    changeForms (index) {
      this.img = this.forms_img[this.selected_forms.name][this.selected_forms.name + '' + index]
      let arr = { material: this.selected_forms.name, img: this.forms_img[this.selected_forms.name][this.selected_forms.name + '' + index], current: this.selected_forms.name + '' + index, current_num: index }
      // Записываем выбранную форму
      this.$store.commit('setForms', arr)
      this.$store.commit('setColor', '1')

      if ( this.selected_forms.current_num == 1 || this.selected_forms.current_num == 2 || this.selected_forms.current_num == 3 || this.selected_forms.current_num == 4 || this.selected_forms.current_num == 5 || this.selected_forms.current_num == 6 || this.selected_forms.current_num == 8 || this.selected_forms.current_num == 11 || this.selected_forms.current_num == 14 || this.selected_forms.current_num == 17 || this.selected_forms.current_num == 19 ) {
        w = 3/4
        h = 1
      } else if ( this.selected_forms.current_num == 7 || this.selected_forms.current_num == 9 || this.selected_forms.current_num == 13 ) {
        w = 1
        h = 1/4
      } else if ( this.selected_forms.current_num == 15 || this.selected_forms.current_num == 21 || this.selected_forms.current_num == 22 || this.selected_forms.current_num == 23 || this.selected_forms.current_num == 24 || this.selected_forms.current_num == 25 ) {
        w = 1
        h = 3/4
      } else if ( this.selected_forms.current_num == 12 ) {
        w = 1
        h = 1/2
      } else if ( this.selected_forms.current_num == 10 || this.selected_forms.current_num == 16 || this.selected_forms.current_num == 18 || this.selected_forms.current_num == 20 ) {
        w = 1
        h = 1
      }

      this.min = this.property[index].min
      if ( this.selected_forms.name == 'oak' ) {
        this.max = 300
      } else {
        this.max = this.property[index].max
      }
      this.step = this.property[index].step
      this.selected_size = 'small'

      this.range = this.property[index].width

      this.selected_forms.width = parseFloat(this.property[index].width).toFixed(2)
      this.selected_forms.height = parseFloat(this.property[index].height).toFixed(2)

      this.$store.commit('setSize', this.selected_size)
      this.$store.commit('setRange', this.range)
      this.$store.commit('setWidth', this.selected_forms.width)
      this.$store.commit('setHeight', this.selected_forms.height)


    }
  }
}
</script>
