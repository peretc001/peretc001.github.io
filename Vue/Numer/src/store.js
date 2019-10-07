import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({

  state: {
    price: 750,
    steps: {
      material: 'plexiglass',
      materials: {
        plexiglass: {
          name: 'Стекло',
          desc: 'Стекло - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            require('@/assets/img/step1/plexiglass/1.jpg'),
            require('@/assets/img/step1/plexiglass/2.jpg'),
            require('@/assets/img/step1/plexiglass/3.jpg'),
            require('@/assets/img/step1/plexiglass/4.jpg'),
            require('@/assets/img/step1/plexiglass/5.jpg')
          ],
          price: 600
        },
        frosted: {
          name: 'Комбинированные',
          desc: 'Комбинированные - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            require('@/assets/img/step1/frosted/1.jpg'),
            require('@/assets/img/step1/frosted/2.jpg'),
            require('@/assets/img/step1/frosted/3.jpg'),
            require('@/assets/img/step1/frosted/4.jpg'),
            require('@/assets/img/step1/frosted/5.jpg')
          ],
          price: 650
        },
        aluminium: {
          name: 'Аллюминий',
          desc: 'Аллюминий - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            require('@/assets/img/step1/aluminium/1.jpg'),
            require('@/assets/img/step1/aluminium/2.jpg'),
            require('@/assets/img/step1/aluminium/3.jpg'),
            require('@/assets/img/step1/aluminium/4.jpg'),
            require('@/assets/img/step1/aluminium/5.jpg')
          ],
          price: 700
        },
        oak: {
          name: 'Дуб',
          desc: 'Дуб - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            require('@/assets/img/step1/frosted/1.jpg'),
            require('@/assets/img/step1/frosted/2.jpg'),
            require('@/assets/img/step1/frosted/3.jpg'),
            require('@/assets/img/step1/frosted/4.jpg'),
            require('@/assets/img/step1/frosted/5.jpg')
          ],
          price: 750
        },
        brass: {
          name: 'Латунь',
          desc: 'Латунь - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            require('@/assets/img/step1/brass/1.jpg'),
            require('@/assets/img/step1/brass/2.jpg'),
            require('@/assets/img/step1/brass/3.jpg'),
            require('@/assets/img/step1/brass/4.jpg'),
            require('@/assets/img/step1/brass/5.jpg')
          ],
          price: 800
        }
      },
      size: 'small',
      range: '1',
      selected_forms: {
        name: 'plexiglass',
        current: 'plexiglass1',
        img: require('@/assets/img/step2/brass/brass-1.png'),
        width: 150,
        height: 200,
        price: 750
      },
      forms: {
        plexiglass: {
          plexiglass1: require('@/assets/img/step2/brass/brass-1.png'),
          plexiglass2: require('@/assets/img/step2/brass/brass-2.png'),
          plexiglass3: require('@/assets/img/step2/brass/brass-3.png'),
          plexiglass4: require('@/assets/img/step2/brass/brass-4.png'),
          plexiglass5: require('@/assets/img/step2/brass/brass-5.png'),
          plexiglass6: require('@/assets/img/step2/brass/brass-6.png'),
          plexiglass7: require('@/assets/img/step2/brass/brass-7.png'),
          plexiglass8: require('@/assets/img/step2/brass/brass-8.png'),
          plexiglass9: require('@/assets/img/step2/brass/brass-9.png'),
          plexiglass10: require('@/assets/img/step2/brass/brass-10.png'),
          plexiglass11: require('@/assets/img/step2/brass/brass-11.png'),
          plexiglass12: require('@/assets/img/step2/brass/brass-12.png'),
          plexiglass13: require('@/assets/img/step2/brass/brass-13.png'),
          plexiglass14: require('@/assets/img/step2/brass/brass-14.png'),
          plexiglass15: require('@/assets/img/step2/brass/brass-15.png'),
          plexiglass16: require('@/assets/img/step2/brass/brass-16.png'),
          plexiglass17: require('@/assets/img/step2/brass/brass-17.png'),
          plexiglass18: require('@/assets/img/step2/brass/brass-18.png'),
          plexiglass19: require('@/assets/img/step2/brass/brass-19.png'),
          plexiglass20: require('@/assets/img/step2/brass/brass-20.png'),
          plexiglass21: require('@/assets/img/step2/brass/brass-21.png'),
          plexiglass22: require('@/assets/img/step2/brass/brass-22.png'),
          plexiglass23: require('@/assets/img/step2/brass/brass-23.png'),
          plexiglass24: require('@/assets/img/step2/brass/brass-24.png'),
          plexiglass25: require('@/assets/img/step2/brass/brass-25.png')
        },
        frosted: {
          frosted1: require('@/assets/img/step2/brass/brass-1.png'),
          frosted2: require('@/assets/img/step2/brass/brass-2.png'),
          frosted3: require('@/assets/img/step2/brass/brass-3.png'),
          frosted4: require('@/assets/img/step2/brass/brass-4.png'),
          frosted5: require('@/assets/img/step2/brass/brass-5.png'),
          frosted6: require('@/assets/img/step2/brass/brass-6.png'),
          frosted7: require('@/assets/img/step2/brass/brass-7.png'),
          frosted8: require('@/assets/img/step2/brass/brass-8.png'),
          frosted9: require('@/assets/img/step2/brass/brass-9.png'),
          frosted10: require('@/assets/img/step2/brass/brass-10.png'),
          frosted11: require('@/assets/img/step2/brass/brass-11.png'),
          frosted12: require('@/assets/img/step2/brass/brass-12.png'),
          frosted13: require('@/assets/img/step2/brass/brass-13.png'),
          frosted14: require('@/assets/img/step2/brass/brass-14.png'),
          frosted15: require('@/assets/img/step2/brass/brass-15.png'),
          frosted16: require('@/assets/img/step2/brass/brass-16.png'),
          frosted17: require('@/assets/img/step2/brass/brass-17.png'),
          frosted18: require('@/assets/img/step2/brass/brass-18.png'),
          frosted19: require('@/assets/img/step2/brass/brass-19.png'),
          frosted20: require('@/assets/img/step2/brass/brass-20.png'),
          frosted21: require('@/assets/img/step2/brass/brass-21.png'),
          frosted22: require('@/assets/img/step2/brass/brass-22.png'),
          frosted23: require('@/assets/img/step2/brass/brass-23.png'),
          frosted24: require('@/assets/img/step2/brass/brass-24.png'),
          frosted25: require('@/assets/img/step2/brass/brass-25.png')
        },
        aluminium: {
          aluminium1: require('@/assets/img/step2/aluminium/aluminium-1.png'),
          aluminium2: require('@/assets/img/step2/aluminium/aluminium-2.png'),
          aluminium3: require('@/assets/img/step2/aluminium/aluminium-3.png'),
          aluminium4: require('@/assets/img/step2/aluminium/aluminium-4.png'),
          aluminium5: require('@/assets/img/step2/aluminium/aluminium-5.png'),
          aluminium6: require('@/assets/img/step2/aluminium/aluminium-6.png'),
          aluminium7: require('@/assets/img/step2/aluminium/aluminium-7.png'),
          aluminium8: require('@/assets/img/step2/aluminium/aluminium-8.png'),
          aluminium9: require('@/assets/img/step2/aluminium/aluminium-9.png'),
          aluminium10: require('@/assets/img/step2/aluminium/aluminium-10.png'),
          aluminium11: require('@/assets/img/step2/aluminium/aluminium-11.png'),
          aluminium12: require('@/assets/img/step2/aluminium/aluminium-12.png'),
          aluminium13: require('@/assets/img/step2/aluminium/aluminium-13.png'),
          aluminium14: require('@/assets/img/step2/aluminium/aluminium-14.png'),
          aluminium15: require('@/assets/img/step2/aluminium/aluminium-15.png'),
          aluminium16: require('@/assets/img/step2/aluminium/aluminium-16.png'),
          aluminium17: require('@/assets/img/step2/aluminium/aluminium-17.png'),
          aluminium18: require('@/assets/img/step2/aluminium/aluminium-18.png')
        },
        oak: {
          oak1: require('@/assets/img/step2/brass/brass-1.png'),
          oak2: require('@/assets/img/step2/brass/brass-2.png'),
          oak3: require('@/assets/img/step2/brass/brass-3.png'),
          oak4: require('@/assets/img/step2/brass/brass-4.png'),
          oak5: require('@/assets/img/step2/brass/brass-5.png'),
          oak6: require('@/assets/img/step2/brass/brass-6.png'),
          oak7: require('@/assets/img/step2/brass/brass-7.png'),
          oak8: require('@/assets/img/step2/brass/brass-8.png'),
          oak9: require('@/assets/img/step2/brass/brass-9.png'),
          oak10: require('@/assets/img/step2/brass/brass-10.png'),
          oak11: require('@/assets/img/step2/brass/brass-11.png'),
          oak12: require('@/assets/img/step2/brass/brass-12.png'),
          oak13: require('@/assets/img/step2/brass/brass-13.png'),
          oak14: require('@/assets/img/step2/brass/brass-14.png'),
          oak15: require('@/assets/img/step2/brass/brass-15.png'),
          oak16: require('@/assets/img/step2/brass/brass-16.png'),
          oak17: require('@/assets/img/step2/brass/brass-17.png'),
          oak18: require('@/assets/img/step2/brass/brass-18.png'),
          oak19: require('@/assets/img/step2/brass/brass-19.png'),
          oak20: require('@/assets/img/step2/brass/brass-20.png'),
          oak21: require('@/assets/img/step2/brass/brass-21.png'),
          oak22: require('@/assets/img/step2/brass/brass-22.png'),
          oak23: require('@/assets/img/step2/brass/brass-23.png'),
          oak24: require('@/assets/img/step2/brass/brass-24.png'),
          oak25: require('@/assets/img/step2/brass/brass-25.png')
        },
        brass: {
          brass1: require('@/assets/img/step2/brass/brass-1.png'),
          brass2: require('@/assets/img/step2/brass/brass-2.png'),
          brass3: require('@/assets/img/step2/brass/brass-3.png'),
          brass4: require('@/assets/img/step2/brass/brass-4.png'),
          brass5: require('@/assets/img/step2/brass/brass-5.png'),
          brass6: require('@/assets/img/step2/brass/brass-6.png'),
          brass7: require('@/assets/img/step2/brass/brass-7.png'),
          brass8: require('@/assets/img/step2/brass/brass-8.png'),
          brass9: require('@/assets/img/step2/brass/brass-9.png'),
          brass10: require('@/assets/img/step2/brass/brass-10.png'),
          brass11: require('@/assets/img/step2/brass/brass-11.png'),
          brass12: require('@/assets/img/step2/brass/brass-12.png'),
          brass13: require('@/assets/img/step2/brass/brass-13.png'),
          brass14: require('@/assets/img/step2/brass/brass-14.png'),
          brass15: require('@/assets/img/step2/brass/brass-15.png'),
          brass16: require('@/assets/img/step2/brass/brass-16.png'),
          brass17: require('@/assets/img/step2/brass/brass-17.png'),
          brass18: require('@/assets/img/step2/brass/brass-18.png'),
          brass19: require('@/assets/img/step2/brass/brass-19.png'),
          brass20: require('@/assets/img/step2/brass/brass-20.png'),
          brass21: require('@/assets/img/step2/brass/brass-21.png'),
          brass22: require('@/assets/img/step2/brass/brass-22.png'),
          brass23: require('@/assets/img/step2/brass/brass-23.png'),
          brass24: require('@/assets/img/step2/brass/brass-24.png'),
          brass25: require('@/assets/img/step2/brass/brass-25.png')
        }
      },
      step3: {
        number: {
          number: '1',
          font: 'Arial Black',
          size: '48',
          color: '#000000',
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
          color: '#000000',
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
          color: '#000000',
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
      state.steps.selected_forms.name = value

      // Устанавливаем первое изображение при смене материала
      let firstImg = []
      firstImg.push(Object.values(state.steps.forms[value]))
      state.steps.selected_forms.img = firstImg[0][0]
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
      state.steps.selected_forms.name = value.material
      state.steps.selected_forms.img = value.img
      state.steps.selected_forms.current = value.current
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
