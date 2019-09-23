import Vue from 'vue'
import Vuex from 'vuex'

import squareImg from './assets/img/01_sp.png'

Vue.use(Vuex)

export default new Vuex.Store({

  state: {
    price: 600,
    steps: {
      number: 1,
      material: 'Plexiglass',
      size: 'small',
      range: '1',
      width: '200',
      height: '150',
      forms: '',
      img: squareImg,
      step3: {
        number: {
          number: '1',
          font: 'Arial Black',
          size: '48',
          color: '#ffffff',
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        adress: {
          number: 'Красных',
          font: 'Arial Black',
          size: '48',
          color: '#ffffff',
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        adressSecond: {
          number: 'Партизан',
          font: 'Arial Black',
          size: '48',
          color: '#ffffff',
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        }
      },
      borders: '',
      phone: '',
      email: ''
    }
  },
  mutations: {
    setPrice (state, value) {
      state.price = value
    },
    setNumber (state, value) {
      state.steps.number = value
    },
    setMaterial (state, value) {
      state.steps.material = value
    },
    // Step2
    setSize (state, value) {
      state.steps.size = value
    },
    setRange (state, value) {
      state.steps.range = value
    },
    setWidth (state, value) {
      state.steps.width = value
    },
    setHeight (state, value) {
      state.steps.height = value
    },
    setForms (state, value) {
      state.steps.forms = value.forms
      state.steps.img = value.url
    },
    // Step3
    setHouseNumber (state, value) {
      state.steps.step3[value.id].number = value.val
    },
    setHouseNumberFont (state, value) {
      state.steps.step3[value.id].font = value.val
    },
    setHouseNumberFontSize (state, value) {
      state.steps.step3[value.id].size = value.val
    },
    setHouseNumberFontColor (state, value) {
      state.steps.step3[value.id].color = value.val
    },
    setHouseNumberPadding (state, value) {
      state.steps.step3[value.id].padding = value.val
    },
    // Step4
    setBorders (state, value) {
      state.steps.borders = value.borders
      state.steps.img = value.url
    },
    setPhone (state, value) {
      state.steps.phone = value
    },
    setEmail (state, value) {
      state.steps.email = value
    }
  },
  actions: {

  }
})
