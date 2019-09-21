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
                  <p>Заказ</p>
                  <p>Материал: {{ this.$store.state.steps.material }}</p>
                  <p>Размер: {{ this.$store.state.steps.height }} x {{ this.$store.state.steps.width }} см</p>
                  <p>Форма: {{ this.$store.state.steps.forms }}</p>
                  <p>Бордер: {{ this.$store.state.steps.borders }}</p>
                  <p>Итог: {{ this.$store.state.price }} руб</p>
                  <br>
                  <form class="form" @submit.prevent="someAction()">
                     <b-form-group>
                        <div class="input-group">
                           <span class="input-group-addon"><span>+7</span></span>
                              <b-form-input type="tel"
                              v-model="phone"
                              name="phone"
                              id="phone"
                              placeholder="(555) 555-5555"
                              autocomplete="tel"
                              maxlength="14"
                              class="form-control"
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
                           <span class="input-group-addon"><span>Email</span></span>
                              <b-form-input id="email"
                                 v-model="email"
                                 type="email"
                                 @blur="isEmailTouched = true"
                                 :class="{ error: isEmailError }"
                                 placeholder="mail@mail.ru"
                                 @input="setEmail(email)"
                              required />
                        </div>
                        <div v-if="isEmailError">Поле заполено неверно</div>
                     </b-form-group>

                     <b-button type="submit" :disabled="!isAllValid" variant="success">
                        Заказать
                     </b-button>
                  </form>
                  <div class="answer">Good</div>
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
      price: '',
      step3: {},
      img: '',
      phone: null,
      phoneValid: false,
      isPhoneTouched: false,
      email: null,
      isEmailTouched: false
    }
  },
  beforeMount () {
    // Устанавливаем выбранный размер
    this.price = this.$store.state.price
    this.img = this.$store.state.steps.img

    this.step3['number'] = this.$store.state.steps.step3.number
    this.step3['adress'] = this.$store.state.steps.step3.adress
    this.step3['adressSecond'] = this.$store.state.steps.step3.adressSecond

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
      if (!this.isAllValid) {
        return
      }

      axios.post('/thankyou.php', {
        data: this.$store.state
      })
        .then(function (response) {
          console.log(response.data)
          if (response.data.answer === 'good') {
            let thisStep = document.querySelector('.form')
            let thisAnswer = document.querySelector('.answer')
            thisStep.style.display = 'none'
            thisAnswer.style.display = 'block'
          }
        })
        .catch(function (error) {
          console.log(error)
        })
    }
  }
}
</script>
