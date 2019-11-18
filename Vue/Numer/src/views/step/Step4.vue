<template>
   <div>
      <stepLine />
      <div class="step3 last">
         <b-container>
           <h2>&nbsp;</h2>
            <b-row>
               <b-col md="5">
                 <div ref="printMe">
                    <houseNumberView :step3="step3" :img="img" :selected_number="selected_number" />
                  </div>
               </b-col>
               <b-col md="7">
                  <h2>Ваш Заказ</h2>
                  <p>Материал: {{ current_material }}</p>
                  <p>Размер: {{ this.$store.state.steps.selected_forms.width }} x {{ this.$store.state.steps.selected_forms.height }} мм</p>
                  <h2>Итог: {{ this.$store.state.price }} руб</h2>
                  <br>
                  <form class="form" @submit.prevent="someAction()">
                    <input type="hidden" name="screen" :value="output">
                     <b-form-group>
                        <div class="input-group">
                           <span class="input-group-addon">+7</span>
                            <b-form-input type="tel"
                              v-model="phone"
                              name="phone"
                              id="phone"
                              placeholder="(912) 345-6789"
                              autocomplete="tel"
                              maxlength="14"
                              v-phone
                              pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}"
                              @blur="isPhoneTouched = true"
                              @input="setPhone(phone)"
                              required />
                        </div>
                        <div v-if="isPhoneError">Поле заполено неверно</div>
                     </b-form-group>
                     <b-form-group>
                        <div class="input-group">
                           <span class="input-group-addon">Email</span>
                            <b-form-input id="email"
                              v-model="email"
                              type="email"
                              @blur="isEmailTouched = true"
                              :class="{ error: isEmailError }"
                              placeholder="info@mail.ru"
                              @input="setEmail(email)"
                              required />
                        </div>
                        <div v-if="isEmailError">Поле заполено неверно</div>
                     </b-form-group>

                    <div class="group-btn">
                      <b-button to="/step3" variant="outline-success">Назад</b-button>
                      <b-button type="submit" :disabled="!isAllValid" variant="success">
                          Заказать
                      </b-button>
                    </div>
                  </form>
                  <br>
                  <div class="answer">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTIgNTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUyIDUyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTI2LDBDMTEuNjY0LDAsMCwxMS42NjMsMCwyNnMxMS42NjQsMjYsMjYsMjZzMjYtMTEuNjYzLDI2LTI2UzQwLjMzNiwwLDI2LDB6IE0yNiw1MEMxMi43NjcsNTAsMiwzOS4yMzMsMiwyNiAgIFMxMi43NjcsMiwyNiwyczI0LDEwLjc2NywyNCwyNFMzOS4yMzMsNTAsMjYsNTB6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNGRkZGRkYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguMjUyLDE1LjMzNmwtMTUuMzY5LDE3LjI5bC05LjI1OS03LjQwN2MtMC40My0wLjM0NS0xLjA2MS0wLjI3NC0xLjQwNSwwLjE1NmMtMC4zNDUsMC40MzItMC4yNzUsMS4wNjEsMC4xNTYsMS40MDYgICBsMTAsOEMyMi41NTksMzQuOTI4LDIyLjc4LDM1LDIzLDM1YzAuMjc2LDAsMC41NTEtMC4xMTQsMC43NDgtMC4zMzZsMTYtMThjMC4zNjctMC40MTIsMC4zMy0xLjA0NS0wLjA4My0xLjQxMSAgIEMzOS4yNTEsMTQuODg1LDM4LjYyLDE0LjkyMiwzOC4yNTIsMTUuMzM2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkZGRkZGIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPgo8L2c+PC9nPiA8L3N2Zz4=" />
                    <p><b>Благодарим за заявку!</b></p>
                    <p>В ближайшее время наш менеджер свяжется с вами</p>
                  </div>
               </b-col>
            </b-row>
         </b-container>
      </div>
   </div>
</template>
<script>
import stepLine from '../../components/stepLine.vue'
import houseNumberView from '../../components/HouseNumberView.vue'
const axios = require('axios')
const emailCheckRegex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
export default {
  components: {
    stepLine,
    houseNumberView
  },
  data () {
    return {
      step3: {},
      phone: null,
      phoneValid: false,
      isPhoneTouched: false,
      email: null,
      isEmailTouched: false,
      output: null
    }
  },
  beforeMount () {
    // Устанавливаем выбранный размер
    this.price = this.$store.state.price
    
    this.selected_number = this.$store.state.steps.selected_number
    this.selected_color = this.$store.state.steps.selected_color
    this.current_material = this.$store.state.steps.materials[this.$store.state.steps.selected_forms.name].name
    this.step3 = this.$store.state.steps.step3
    this.img = this.$store.state.steps.selected_forms.img

    this.phone = this.$store.state.steps.phone
    this.email = this.$store.state.steps.email
  },
  watch: {
    phone: function (val) {
      if (val.length === 14) {
        this.phoneValid = true
      } else {
        this.phoneValid = false
      }
    }
  },
  computed: {
    isPhoneError () {
      return !this.phoneValid && this.isPhoneTouched
    },
    isEmailValid () {
      return emailCheckRegex.test(this.email)
    },
    isEmailError () {
      return !this.isEmailValid && this.isEmailTouched
    },
    isAllValid () {
      return this.isEmailValid && this.phoneValid
    }
  },
  methods: {
    setPhone (value) {
      this.$store.commit('setPhone', value)
    },
    setEmail (value) {
      this.$store.commit('setEmail', value)
    },
    someAction () {
      if (this.isAllValid) {
        let sendData = {
          price: this.price,
          material: this.current_material,
          width: this.$store.state.steps.selected_forms.width,
          height: this.$store.state.steps.selected_forms.height,
          phone: this.phone,
          email: this.email
        }
        console.log(sendData)
        this.print()
        setTimeout(() => {
          axios.post('/thankyou.php', {
            data: { all: sendData, img: this.output}
          }).then(function (response) {
            if (response.data.answer === 'good') {
              let thisStep = document.querySelector('.form')
              let thisAnswer = document.querySelector('.answer')
              thisStep.classList.add('done')
              thisAnswer.classList.add('done')
            }
          }).catch(function (error) {
            console.log(error)
          })
        }, 500);
      }
    },
    async print () {
      const el = this.$refs.printMe
      const options = {
        type: 'dataURL',
        scale: 1,
      }
      this.output = await this.$html2canvas(el, options)
    }
  }
}
</script>
