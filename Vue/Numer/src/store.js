import Vue from 'vue'
import Vuex from 'vuex'

import squareImg from './assets/img/01_sp.png'

Vue.use(Vuex)

export default new Vuex.Store({

  state: {
    price: 750,
    steps: {
      number: 1,
      material: 'aluminium',
      size: 'small',
      range: '1',
      width: '150',
      height: '200',
      forma: {
        brass: {
          brass1: {
            url: require('@/assets/img/step2/brass/brass-1.png')
          },
          brass2: {
            url: require('@/assets/img/step2/brass/brass-2.png')
          },
          brass3: {
            url: require('@/assets/img/step2/brass/brass-3.png')
          },
          brass4: {
            url: require('@/assets/img/step2/brass/brass-4.png')
          },
          brass5: {
            url: require('@/assets/img/step2/brass/brass-5.png')
          },
          brass6: {
            url: require('@/assets/img/step2/brass/brass-6.png')
          },
          brass7: {
            url: require('@/assets/img/step2/brass/brass-7.png')
          },
          brass8: {
            url: require('@/assets/img/step2/brass/brass-8.png')
          },
          brass9: {
            url: require('@/assets/img/step2/brass/brass-9.png')
          },
          brass10: {
            url: require('@/assets/img/step2/brass/brass-10.png')
          },
          brass11: {
            url: require('@/assets/img/step2/brass/brass-11.png')
          },
          brass12: {
            url: require('@/assets/img/step2/brass/brass-12.png')
          },
          brass13: {
            url: require('@/assets/img/step2/brass/brass-13.png')
          },
          brass14: {
            url: require('@/assets/img/step2/brass/brass-14.png')
          },
          brass15: {
            url: require('@/assets/img/step2/brass/brass-15.png')
          },
          brass16: {
            url: require('@/assets/img/step2/brass/brass-16.png')
          },
          brass17: {
            url: require('@/assets/img/step2/brass/brass-17.png')
          },
          brass18: {
            url: require('@/assets/img/step2/brass/brass-18.png')
          },
          brass19: {
            url: require('@/assets/img/step2/brass/brass-19.png')
          },
          brass20: {
            url: require('@/assets/img/step2/brass/brass-20.png')
          },
          brass21: {
            url: require('@/assets/img/step2/brass/brass-21.png')
          },
          brass22: {
            url: require('@/assets/img/step2/brass/brass-22.png')
          },
          brass23: {
            url: require('@/assets/img/step2/brass/brass-23.png')
          },
          brass24: {
            url: require('@/assets/img/step2/brass/brass-24.png')
          },
          brass25: {
            url: require('@/assets/img/step2/brass/brass-25.png')
          }
        },
        aluminium: {
          aluminium1: {
            url: require('@/assets/img/step2/aluminium/aluminium-1.png')
          },
          aluminium2: {
            url: require('@/assets/img/step2/aluminium/aluminium-2.png')
          },
          aluminium3: {
            url: require('@/assets/img/step2/aluminium/aluminium-3.png')
          },
          aluminium4: {
            url: require('@/assets/img/step2/aluminium/aluminium-4.png')
          },
          aluminium5: {
            url: require('@/assets/img/step2/aluminium/aluminium-5.png')
          },
          aluminium6: {
            url: require('@/assets/img/step2/aluminium/aluminium-6.png')
          },
          aluminium7: {
            url: require('@/assets/img/step2/aluminium/aluminium-7.png')
          },
          aluminium8: {
            url: require('@/assets/img/step2/aluminium/aluminium-8.png')
          },
          aluminium9: {
            url: require('@/assets/img/step2/aluminium/aluminium-9.png')
          },
          aluminium10: {
            url: require('@/assets/img/step2/aluminium/aluminium-10.png')
          },
          aluminium11: {
            url: require('@/assets/img/step2/aluminium/aluminium-11.png')
          },
          aluminium12: {
            url: require('@/assets/img/step2/aluminium/aluminium-12.png')
          },
          aluminium13: {
            url: require('@/assets/img/step2/aluminium/aluminium-13.png')
          },
          aluminium14: {
            url: require('@/assets/img/step2/aluminium/aluminium-14.png')
          },
          aluminium15: {
            url: require('@/assets/img/step2/aluminium/aluminium-15.png')
          },
          aluminium16: {
            url: require('@/assets/img/step2/aluminium/aluminium-16.png')
          },
          aluminium17: {
            url: require('@/assets/img/step2/aluminium/aluminium-17.png')
          },
          aluminium18: {
            url: require('@/assets/img/step2/aluminium/aluminium-18.png')
          }
        }
      },
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
