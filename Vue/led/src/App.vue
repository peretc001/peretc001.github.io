<template>
  <div id="app" class="calc_modules">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5 left order-2 order-lg-1">
          <div class="display">
            <table class="table">
              <tr v-for="(h, i) in this.height" :key="i">
                <td v-for="(w, j) in width" :key="j">
                  <span :class="selected_color"></span>
                </td>
              </tr>
            </table>
          </div>
        </div>

        <div class="col-lg-7 right order-1 order-lg-2">
          <p class="caption mt-gutter">Выбор цвета</p>
          <div class="color">
            <div v-for='(color, i) in colors' :key='i' class="color__card">
              <input :id="i" type="radio" name="color" :value="i" @change="setColor(i)">
              <label :for="i" :class="i"></label>
            </div>
          </div>
          <div class="mh-60">
            <transition name="fade">
            <div class="row" v-show="selected_color == 'rgb'">
              <div class="col-sm-6">
                <p class="caption">Использование</p>
              </div>
              <div class="col-sm-6">
                <div class="where">
                  <div class="where__card">
                    <input id="inside" type="radio" name="where" v-model="selected_where" value="inside">
                    <label for="inside">В помещении</label>
                  </div>
                  <div class="where__card">
                    <input id="outside" type="radio" name="where" v-model="selected_where" value="outside">
                    <label for="outside">На улице</label>
                  </div>
                </div>
              </div>
            </div>
            </transition>
          </div>
          <div class="row pb-gutter">
            <div class="col-md-7">
              <p class="caption pb-gutter">Количество модулей</p>

              <div class="params">
                <div class="width">
                  <p class="name">По высоте</p>
                  <div class="params__block">
                    <button @click="heightMinus()">-</button>
                    <span>{{ height }}</span>
                    <button @click="heightPlus()">+</button>
                  </div>
                </div>
                <div class="height">
                  <p class="name">По ширине</p>
                  <div class="params__block">
                    <button @click="widthMinus()">-</button>
                    <span>{{ width }}</span>
                    <button @click="widthPlus()">+</button>
                  </div>
                </div>
              </div>
              
            </div>
            <transition name="fade">
            <div class="col-md-5 text-center" v-show="selected_color == 'rgb'">
              
              <p class="caption pb-gutter">Шаг пикселя</p>
              <select class="select_step" v-model="selected_step">
                {{ setStep }}
                <option v-for='(step, i) in select' :key='i' :value="i">
                  {{ step.name }}
                </option>
              </select>
            </div>
            </transition>
          </div>
          
          <div class="row price">
            <div class="col-sm-6"><p>Цена <span>{{ calcPrice }} ₽</span></p>
            </div>
            <div class="col-sm-6"><p>Размер <span>{{ h }} x {{ w }} см</span></p></div>
          </div>

        </div>
      </div>
    </div>

    <div class="content---first-line">
      <div class="options-first-block-big">
        <p class="caption-block">Видеоэкран</p>
        <p id="name-room-module-p" class="caption-block-n first---step---name">P-{{ this.steps[selected_where][selected_step].name }}мм-32x16мм</p>
        
        <div class="options-first-block-big-flex">
          
          <div class="options-first-block">
            <div class="options-first-block__icon" aria-hidden="true">
              <img src="http://calcled.skipao.site/img/icon/size.svg">
            </div>
            <div class="options-first-block-caption">
              <p class="options-first-block-caption__title">Размер экрана</p>
              <p class="options-first-block-caption__size option-first-size" id="size-room">{{ h }} x {{ w }} см</p>
            </div>
          </div>

          <div class="options-first-block">
            <div class="options-first-block__icon" aria-hidden="true">
              <img src="http://calcled.skipao.site/img/icon/photo-size.svg">
            </div>
            <div class="options-first-block-caption">
              <p class="options-first-block-caption__title">Разрешение экрана</p>
              <p class="options-first-block-caption__size first---step--size" id="resolution-room">{{ height*16 }} x {{ width*32 }} px</p>
            </div>
          </div>

          <div class="options-first-block">
            <div class="options-first-block__icon" aria-hidden="true">
              <img src="http://calcled.skipao.site/img/icon/reduce.svg">
            </div>
            <div class="options-first-block-caption">
              <p class="options-first-block-caption__title">Шаг пикселя</p>
              <p class="options-first-block-caption__size option-first-step" id="step-pixel-room">{{ this.steps[selected_where][selected_step].name }} мм</p>
            </div>
          </div>

          <div class="options-first-block">
            <div class="options-first-block__icon" aria-hidden="true">
              <img src="http://calcled.skipao.site/img/icon/guarantee.svg">
            </div>
            <div class="options-first-block-caption">
              <p class="options-first-block-caption__title">Гарантия</p>
              <p class="options-first-block-caption__size option-first-warranty" id="safe-room">2 года</p>
            </div>
          </div>

        </div>
      </div>
      <div class="content---first-line---img">
        <div class="img---wrapper">
          <img class="content---first---img" :src="'http://calcled.skipao.site/img/steps/step---' + this.steps[selected_where][selected_step].name + '.jpg'">
        </div>
      </div>
    </div>

    <div class="options-second-block-big">
      <p class="caption-block">Характеристики</p>
      <div class="options-second-block-big-photo">
        <div class="content---second-line---img">
          <div class="img---wrapper">
            <img src="http://calcled.skipao.site/img/1235_site-758130484.jpg">
          </div>
        </div>
        <div class="options-second-block-big-photo-block">
          <p class="caption-block caption-block-par">Параметры модуля</p>
          <ul class="options-second-block-big-photo-block__list" v-if="selected_where == 'inside'">
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Шаг пикселя</span>
              <span class="dotted"></span>
              <span class="parval option-first-step" id="step-room">{{ this.steps[selected_where][selected_step].name }} мм</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Конфигурация светодиодов</span>
              <span class="dotted"></span>
              <span class="parval" id ="conf-room">SMD 3in1 1RGB</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Производитель светодиодов</span>
              <span class="dotted"></span>
              <span class="parval" id="proiz-room">NationStar SMD2121</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Размер модуля</span>
              <span class="dotted"></span>
              <span class="parval" id="size-room-module">256 х 128 мм</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Разрешение модуля</span>
              <span class="dotted"></span>
              <span class="parval" id="raz-room">32 х 64 px</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Контрастность</span>
              <span class="dotted"></span>
              <span class="parval" id="cont-room">3000:1</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Цветовая температура (°К)</span>
              <span class="dotted"></span>
              <span class="parval" id="color-room">3200 ~ 9300° K</span>
            </li>
          </ul>
          <ul class="options-second-block-big-photo-block__list" v-else>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Шаг пикселя</span>
              <span class="dotted"></span>
              <span class="parval option-second-step" id="step-street">{{ this.steps[selected_where][selected_step].name }} мм</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Конфигурация светодиодов</span>
              <span class="dotted"></span>
              <span class="parval" id ="conf-street">SMD</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Производитель светодиодов</span>
              <span class="dotted"></span>
              <span class="parval" id="proiz-street">SMD 1921</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Размер модуля</span>
              <span class="dotted"></span>
              <span class="parval" id="size-street-module">256 х 128 мм</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Разрешение модуля</span>
              <span class="dotted"></span>
              <span class="parval" id="raz-street">32 х 64 px</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Контрастность</span>
              <span class="dotted"></span>
              <span class="parval" id="cont-street">3000:1</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Цветовая температура (°К)</span>
              <span class="dotted"></span>
              <span class="parval" id="color-street">3200 ~ 9300° K</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <form class="callback__form" @submit.prevent="sendEmail()">
      <div class="container">
        <div class="row form_request">
            <input type="hidden" name="human" value="false">
            <div class="col-md-4">
              <input type="text" placeholder="Имя" v-model="name" @input="validName($event)" class="user" />
            </div>
            <div class="col-md-4">
              <masked-input v-model="phone" mask="\+7\ (111) 111-1111" placeholder="Телефон" type="tel" class="phone" required/>
            </div>

            <div class="col-md-4">
              <button type="submit" class="btn callback__form__button">Заказать</button>
            </div>

            <div class="col-12">
              <div class="robot" @click="checkRobot()">
                <div class="robot__check">
                  <svg viewBox="0 0 60 60">
                      <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                      <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                  </svg>
                </div>
                <span>Согласен с условиями Политики конфиденциальности</span>
              </div>
            </div>

        </div>
        <div class="responce_good">
          <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTIgNTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUyIDUyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTI2LDBDMTEuNjY0LDAsMCwxMS42NjMsMCwyNnMxMS42NjQsMjYsMjYsMjZzMjYtMTEuNjYzLDI2LTI2UzQwLjMzNiwwLDI2LDB6IE0yNiw1MEMxMi43NjcsNTAsMiwzOS4yMzMsMiwyNiAgIFMxMi43NjcsMiwyNiwyczI0LDEwLjc2NywyNCwyNFMzOS4yMzMsNTAsMjYsNTB6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIiBzdHlsZT0iZmlsbDojRkZGRkZGIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguMjUyLDE1LjMzNmwtMTUuMzY5LDE3LjI5bC05LjI1OS03LjQwN2MtMC40My0wLjM0NS0xLjA2MS0wLjI3NC0xLjQwNSwwLjE1NmMtMC4zNDUsMC40MzItMC4yNzUsMS4wNjEsMC4xNTYsMS40MDYgICBsMTAsOEMyMi41NTksMzQuOTI4LDIyLjc4LDM1LDIzLDM1YzAuMjc2LDAsMC41NTEtMC4xMTQsMC43NDgtMC4zMzZsMTYtMThjMC4zNjctMC40MTIsMC4zMy0xLjA0NS0wLjA4My0xLjQxMSAgIEMzOS4yNTEsMTQuODg1LDM4LjYyLDE0LjkyMiwzOC4yNTIsMTUuMzM2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiI+PC9wYXRoPgo8L2c+PC9nPiA8L3N2Zz4=" />
          <p><b>Благодарим за заявку!</b></p>
          <p>В ближайшее время наш менеджер свяжется с вами</p>
        </div>
      </div>
    </form>

  </div>
</template>

<script>
const axios = require('axios')
import MaskedInput from 'vue-masked-input'
export default {
  name: 'app',
  components: {
    MaskedInput
  },
  data() {
    return {
      price: 19800,
      selected_color: 'red',
      colors: {
        red: { 
          name: 'Красный',
          price: 1000 
        },
        blue: { 
          name: 'Синий',
          price: 1100 
        },
        green: {
          name: 'Зеленый',
          price: 1100
        },
        yellow: {
          name: 'Желтый',
          price: 1100
        },
        white: {
          name: 'Белый',
          price: 1100  
        },
        rgb: {
          name: 'Полноцвет',
          price: 1300
        }
      },
      selected_where: 'inside',
      selected_step: 's1',
      steps: {
        inside: {
          s1: {
            name: '1.25',
            price: 480 },
          s2: {
            name: '1.66',
            price: 265 },
          s3: {
            name: '1.83',
            price: 165 },
          s4: {
            name: '2',
            price: 97 },
          s5: {
            name: '2.5',
            price: 68 },
          s6: {
            name: '3',
            price: 51 },
          s7: {
            name: '3.07',
            price: 48 },
          s8: {
            name: '4',
            price: 40 },
          s9: {
            name:  '5',
            price: 36 }
        },
        outside: {
          s1: {
            name: '4',
            price: 65 },
          s2: {
            name: '4.81',
            price: 60 },
          s3: {
            name:  '5',
            price: 52 },
          s4: {
            name:  '6',
            price: 47 },
          s5: {
            name:  '6.66',
            price: 42 },
          s6: {
            name:  '8',
            price: 38 },
          s7: {
            name:  '10',
            price: 34 }
        }
      },
      select: {},
      width: 3,
      height: 6,
      w: 96,
      h: 96,
      human: false,
      name: '',
      phone: ''
    }
  },
  methods: {
    heightMinus() {
      if (this.height > 1) {
        this.height -= 1
        this.h -= 16
      }
    },
    heightPlus() {
      if (this.height < 15) {
        this.height += 1
        this.h += 16
      }
    },
    widthMinus() {
      if (this.width > 1) {
        this.width -= 1
        this.w -= 32 
      }
    },
    widthPlus() {
      if (this.width < 15) {
        this.width += 1
        this.w += 32
      }
    },
    setColor(i) {
      this.selected_color = i
    },
    checkRobot() {
      const checkBtn = document.querySelector('.robot__check');
      checkBtn.classList.toggle('active')

      const human = document.querySelector('input[name=human]')
      checkBtn.classList.contains('active') ? human.value = 'good' : human.value = false
      checkBtn.classList.contains('active') ? this.human = 'good' : this.human = false

      const formBtn = document.querySelector('.callback__form__button')
      this.human == 'good' ? formBtn.disabled = false : formBtn.disabled = true
    },
    validName(event) {
      if (event.target.value == '') {
        event.target.style.border = '1px solid red'
      } else {
        event.target.style.border = ''
      }
    },
    sendEmail() {
      let sendData = {
        price: this.price.toLocaleString(),
        color: this.colors[this.selected_color].name,
        where: this.selected_where,
        step: this.steps[this.selected_where][this.selected_step].name,
        width: this.width,
        height: this.height,
        h: this.h,
        w: this.w,
        human: this.human,
        name: this.name,
        phone: this.phone
      }

      
      const phone = document.querySelector('.phone')

      if ( this.human == 'good' && this.phone != '') {
          
        phone.style.border = ''

        axios.post('thankyou.php', {
            data: { sendData }
          }).then(function (response) {
            if (response.data.answer === 'good') {
              if (response.data.answer === 'good') {
                  let thisStep = document.querySelector('.form_request')
                  let thisAnswer = document.querySelector('.responce_good')
                  thisStep.classList.add('done');
                  setTimeout(() => {
                      thisStep.classList.remove('done');
                      thisStep.classList.add('hide');
                      thisAnswer.classList.add('done');
                  }, 500);
                      thisAnswer.classList.add('show');
              }
            }
          }).catch(function (error) {
            console.log(error)
          })

        } else {
          phone.style.border  = '1px solid red'
        }
    },
  },
  computed: {
    calcPrice() {
      if (this.selected_color == 'red') {
        this.price = this.height * this.width * 1000
      }
      else if (this.selected_color != 'red' && this.selected_color != 'rgb') {
        this.price = this.height * this.width * 1100
      }
      //Полноцвет
      else {
        if (this.selected_step == 's8' && this.selected_where == 'outside') {
          this.selected_step = 's1'
        }
        if (this.selected_step == 's9' && this.selected_where == 'outside') {
          this.selected_step = 's3'
        }
        this.price = (this.height * this.width)*1300 + (this.height * this.width)*(this.steps[this.selected_where][this.selected_step].price * 65)
      }
      return this.price.toLocaleString()
    },
    setStep() {
      return this.select = this.steps[this.selected_where]
    }
  },
  mounted() {
    const formBtn = document.querySelector('.callback__form__button')
    formBtn.disabled = true
  }
}
</script>

