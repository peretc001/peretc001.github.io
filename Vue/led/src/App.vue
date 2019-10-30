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
          <div class="kp">
            <button class="btn" data-toggle="modal" data-target="#tab1_modal2">Получить коммерческое предложение</button>
          </div>
          <div class="row price">
            <div class="col-sm-6"><p>Цена <span>{{ calcPrice }} ₽</span></p>
            </div>
            <div class="col-sm-6"><p>Размер <span>{{ h }} x {{ w }} см</span></p></div>
          </div>

          <div class="dop_params">
            <span class="btn dop_params_btn">Доп. параметры</span>
            <div class="dop_params_checkbox">
              <p class="dop_name">Доп. параметры</p>
              <div class="dop_params_checkbox_item" v-for="(item, i) in led" :key="i">
                <input :id="i" type="checkbox" name="led" :value="i" @change="checkLed($event)">
                <label :for="i">{{ item.name }}</label>
              </div>
              <p class="dop_name">Монтаж</p>
              <div class="dop_params_checkbox_item" v-for="(item, i) in setting" :key="i">
                <input :id="i" type="checkbox" name="setting" :value="i" @change="checkSetting($event)">
                <label :for="i">{{ item.name }}</label>
              </div>
              <p class="dop_name">Доставка</p>
              <div class="dop_params_checkbox_item">
                <input id="delivery" type="checkbox" name="delivery" v-model="check_delivery">
                <label for="delivery">Доставка</label>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>

    <div class="content---first-line">
      <div class="options-first-block-big">
        <p class="caption-block">Видеоэкран</p>
        <p id="name-room-module-p" class="caption-block-n first---step---name">P{{ this.steps[selected_where][selected_step].name }}-{{ this.steps[selected_where][selected_step].pixel }}</p>
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
              <p class="options-first-block-caption__size first---step--size" id="resolution-room">{{ calcPixel }} {{ pixel_h }} x {{ pixel_w }} px</p>
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
              <span class="parval" id="size-room-module">{{ this.steps[selected_where][selected_step].size }}</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Разрешение модуля</span>
              <span class="dotted"></span>
              <span class="parval" id="raz-room">{{ this.steps[selected_where][selected_step].pixel }}</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Контрастность</span>
              <span class="dotted"></span>
              <span class="parval" id="cont-room">1000 Кнд/м<sup>2</sup></span>
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
              <span class="parval" id="size-street-module">{{ this.steps[selected_where][selected_step].size }}</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Разрешение модуля</span>
              <span class="dotted"></span>
              <span class="parval" id="raz-street">{{ this.steps[selected_where][selected_step].pixel }}</span>
            </li>
            <li class="options-second-block-big-photo-block__item">
              <span class="parname">Контрастность</span>
              <span class="dotted"></span>
              <span class="parval" id="cont-room">5500 Кнд/м<sup>2</sup></span>
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

    <div class="options-fourth-block-big">
      <div class="options-fourth-block-big-photo">
        <p class="caption-block caption-block-par">Параметры Экрана</p>
        <ul class="options-fourth-block-big-block__list">
          <li class="options-second-block-big-photo-block__item">
            <span class="parname-fourth">Размер экрана</span>
            <span class="dotted-fourth"></span>
            <span class="parval-fourth option-first-size" id="size-screen-room">{{ h }} x {{ w }} см</span>
          </li>
          <li class="options-second-block-big-photo-block__item">
            <span class="parname-fourth">Разрешение экрана</span>
            <span class="dotted-fourth"></span>
            <span class="parval-fourth first---step--size" id="resolution-screen-room">{{ calcPixel }} {{ pixel_h }} x {{ pixel_w }} px</span>
          </li>
          <li class="options-second-block-big-photo-block__item">
            <span class="parname-fourth">Вес экрана кг</span>
            <span class="dotted-fourth"></span>
            <span class="parval-fourth" id="weight-screen-room">32.00</span>
          </li>
          <li class="options-second-block-big-photo-block__item">
            <span class="parname-fourth">Энергопотребление экрана макс / сред, Вт</span>
            <span class="dotted-fourth"></span>
            <span class="parval-fourth" id="energo-screen-room">700 / 350</span>
          </li>
          <li class="options-second-block-big-photo-block__item">
            <span class="parname-fourth">Контрастность</span>
            <span class="dotted-fourth"></span>
            <span class="parval-fourth" id="energo-screen-room" v-if="selected_where == 'inside'">1000 Кнд/м<sup>2</sup></span>
            <span class="parval-fourth" id="energo-screen-room" v-if="selected_where == 'outside'">5500 Кнд/м<sup>2</sup></span>
          </li>
          <li class="options-second-block-big-photo-block__item">
            <span class="parname-fourth">Рабочее напряжение</span>
            <span class="dotted-fourth"></span>
            <span class="parval-fourth" id="work-screen-room">220V/50Hz</span>
          </li>
          <li class="options-second-block-big-photo-block__item">
            <span class="parname-fourth">Степень защиты IP</span>
            <span class="dotted-fourth"></span>
            <span class="parval-fourth" id="protected-screen-room">IP31</span>
          </li>
          <li class="options-second-block-big-photo-block__item">
            <span class="parname-fourth">Угол обзора</span>
            <span class="dotted-fourth"></span>
            <span class="parval-fourth" id="corner-screen-room">H=140° / V=120°</span>
          </li>
          <li class="options-second-block-big-photo-block__item">
            <span class="parname-fourth">Температурный режим работы</span>
            <span class="dotted-fourth"></span>
            <span class="parval-fourth" id="temp-screen-room">-10°C~+60°C, влажн. до 90%</span>
          </li>
          <li class="options-second-block-big-photo-block__item">
            <span class="parname-fourth">Срок службы светодиодов</span>
            <span class="dotted-fourth"></span>
            <span class="parval-fourth" id="srok-screen-room">>100 000</span>
          </li>
        </ul>
      </div>
    </div>

    <div class="form-itog-block">
      <div class="form-itog">
        <p class="caption-block">Итог</p>
        <div class="form-itog-item">
          <span class="form-itog-item__caption">Монтаж</span>
          <span class="form-itog-item__value option-first-settingup">{{ sum_setting * width * height }} &#x20bd;</span>
        </div>
        <div class="form-itog-item">
          <span class="form-itog-item__caption">Стоимость экрана</span>
          <span class="form-itog-item__value option-first-led" id="itog_room">{{ price - sum_led - sum_delivery - sum_setting * (width * height)  }} &#x20bd;</span>
        </div>
        <div class="form-itog-item">
          <span class="form-itog-item__caption">Управляющий компьютер</span>
          <span class="form-itog-item__value option-first-control">{{ sum_led }} &#x20bd;</span>
        </div>
        <div class="form-itog-item">
          <span class="form-itog-item__caption">Доставка</span>
          <span class="form-itog-item__value option-first-delivery">{{ sum_delivery }} &#x20bd;</span>
        </div>
        <div class="form-itog-item">
          <span class="form-itog-item__caption">Итого</span>
          <span class="form-itog-item__value option-first-price" id="itog_room_all">{{ price }} &#x20bd;</span>
        </div>
      </div>
    

      <form class="callback__form" @submit.prevent="sendEmail()">
        <div class="container form_request">
          <p class="form_caption">Заполните контактные данные и получите скидку 5%</p>
          <input type="hidden" name="human" value="false">
          <input type="text" placeholder="Имя" v-model="name" @input="validName($event)" class="user" />
          <input type="email" name="email" v-model="email" placeholder="Укажите e-mail" required>
          <masked-input v-model="phone" mask="\+7\ (111) 111-1111" placeholder="Телефон" type="tel" class="phone" required/>

          <div class="robot" @click="checkRobot()">
            <div class="robot__check">
              <svg viewBox="0 0 60 60">
                  <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                  <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
              </svg>
            </div>
            <span>Согласен с условиями Политики конфиденциальности</span>
          </div>

          <button type="submit" class="btn callback__form__button">Заказать</button>
        </div>
        <div class="responce_good">
          <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTIgNTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUyIDUyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTI2LDBDMTEuNjY0LDAsMCwxMS42NjMsMCwyNnMxMS42NjQsMjYsMjYsMjZzMjYtMTEuNjYzLDI2LTI2UzQwLjMzNiwwLDI2LDB6IE0yNiw1MEMxMi43NjcsNTAsMiwzOS4yMzMsMiwyNiAgIFMxMi43NjcsMiwyNiwyczI0LDEwLjc2NywyNCwyNFMzOS4yMzMsNTAsMjYsNTB6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIiBzdHlsZT0iZmlsbDojRkZGRkZGIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguMjUyLDE1LjMzNmwtMTUuMzY5LDE3LjI5bC05LjI1OS03LjQwN2MtMC40My0wLjM0NS0xLjA2MS0wLjI3NC0xLjQwNSwwLjE1NmMtMC4zNDUsMC40MzItMC4yNzUsMS4wNjEsMC4xNTYsMS40MDYgICBsMTAsOEMyMi41NTksMzQuOTI4LDIyLjc4LDM1LDIzLDM1YzAuMjc2LDAsMC41NTEtMC4xMTQsMC43NDgtMC4zMzZsMTYtMThjMC4zNjctMC40MTIsMC4zMy0xLjA0NS0wLjA4My0xLjQxMSAgIEMzOS4yNTEsMTQuODg1LDM4LjYyLDE0LjkyMiwzOC4yNTIsMTUuMzM2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiI+PC9wYXRoPgo8L2c+PC9nPiA8L3N2Zz4=" />
          <p><b>Благодарим за заявку!</b></p>
          <p>В ближайшее время наш менеджер свяжется с вами</p>
        </div>
      </form>

    </div>

    <div class="modal fade" id="tab1_modal2" tabindex="-1" role="dialog" aria-labelledby="Замер" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form_request_modal">
              <h5 class="modal-title">Получить коммерческое предложение</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <form class="modal__form" @submit.prevent="sendKp()">
                <input type="hidden" name="humanModal" value="false">
                <input type="text" name="fio" v-model="nameModal" placeholder="Укажите ФИО" required>
                <input type="email" name="email" v-model="emailModal" placeholder="Укажите e-mail" required>
                <masked-input v-model="phoneModal" mask="\+7\ (111) 111-1111" placeholder="Телефон" type="tel" class="phoneModal" required/>
                
                <div class="row price">
                  <div class="col-sm-6"><p>Цена <span>{{ calcPrice }} ₽</span></p>
                  </div>
                  <div class="col-sm-6"><p>Размер <span>{{ h }} x {{ w }} см</span></p></div>
                </div>
                <div class="robot" @click="checkRobotModal()">
                  <div class="robot__check__modal">
                    <svg viewBox="0 0 60 60">
                        <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                        <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                    </svg>
                  </div>
                  <span>Согласен с условиями Политики конфиденциальности</span>
                </div>
                <input type="submit" value="Отправить" class="btn callback__form__button__modal" disabled>
              </form>
            </div>
            <div class="responce_good_modal">
              <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUyIDUyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MiA1MjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxnPgoJPHBhdGggZD0iTTI2LDBDMTEuNjY0LDAsMCwxMS42NjMsMCwyNnMxMS42NjQsMjYsMjYsMjZzMjYtMTEuNjYzLDI2LTI2UzQwLjMzNiwwLDI2LDB6IE0yNiw1MEMxMi43NjcsNTAsMiwzOS4yMzMsMiwyNiAgIFMxMi43NjcsMiwyNiwyczI0LDEwLjc2NywyNCwyNFMzOS4yMzMsNTAsMjYsNTB6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8cGF0aCBkPSJNMzguMjUyLDE1LjMzNmwtMTUuMzY5LDE3LjI5bC05LjI1OS03LjQwN2MtMC40My0wLjM0NS0xLjA2MS0wLjI3NC0xLjQwNSwwLjE1NmMtMC4zNDUsMC40MzItMC4yNzUsMS4wNjEsMC4xNTYsMS40MDYgICBsMTAsOEMyMi41NTksMzQuOTI4LDIyLjc4LDM1LDIzLDM1YzAuMjc2LDAsMC41NTEtMC4xMTQsMC43NDgtMC4zMzZsMTYtMThjMC4zNjctMC40MTIsMC4zMy0xLjA0NS0wLjA4My0xLjQxMSAgIEMzOS4yNTEsMTQuODg1LDM4LjYyLDE0LjkyMiwzOC4yNTIsMTUuMzM2eiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
              <p><b>Благодарим за заявку!</b></p>
              <p>Коммерческое предложение отправленно вам на почту</p>
            </div>
          </div>
        </div>
      </div>
    </div>

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
      selected_step: 's9',
      steps: {
        inside: {
          s1: {
            name: '1.25',
            size: '320x160 мм',
            pixel: '256x128 px',
            price: 480 },
          s2: {
            name: '1.66',
            size: '320x160 мм',
            pixel: '192x96 px',
            price: 265 },
          s3: {
            name: '1.83',
            size: '320x160 мм',
            pixel: '174x87 px',
            price: 165 },
          s4: {
            name: '2',
            size: '320x160 мм',
            pixel: '160x80 px',
            price: 97 },
          s5: {
            name: '2.5',
            size: '320x160 мм',
            pixel: '128x64 px',
            price: 68 },
          s6: {
            name: '3',
            size: '192x192 мм',
            pixel: '64x64 px',
            price: 51 },
          s7: {
            name: '3.07',
            size: '320x160 мм',
            pixel: '104x52 px',
            price: 48 },
          s8: {
            name: '4',
            size: '320x160 мм',
            pixel: '80x40 px',
            price: 40 },
          s9: {
            name:  '5',
            size: '320x160 мм',
            pixel: '64x32 px',
            price: 36 }
        },
        outside: {
          s1: {
            name: '4',
            size: '320x160 мм',
            pixel: '80x40 px',
            price: 65 },
          s2: {
            name: '4.81',
            size: '320x160 мм',
            pixel: '67x33 px',
            price: 60 },
          s3: {
            name:  '5',
            size: '320x160 мм',
            pixel: '64x32 px',
            price: 52 },
          s4: {
            name:  '6',
            size: '192x192 мм',
            pixel: '32x32 px',
            price: 47 },
          s5: {
            name:  '6.66',
            size: '320x160 мм',
            pixel: '48x24 px',
            price: 42 },
          s6: {
            name:  '8',
            size: '320x160 мм',
            pixel: '40x20 px',
            price: 38 },
          s7: {
            name:  '10',
            size: '320x160 мм',
            pixel: '32x16 px',
            price: 34 }
        }
      },
      select: {},
      led: {
        dop1: {
          check: false,
          name: 'Управляющий компьютер',
          price: 32000
        },
        dop2: {
          check: false,
          name: 'Отправляющий контроллер',
          price: 13500
        },
        dop3: {
          check: false,
          name: 'Wi-Fi модуль',
          price: 3500
        },
        dop4: {
          check: false,
          name: 'Датчик яркости',
          price: 14500
        },
        dop5: {
          check: false,
          name: 'Датчик температуры',
          price: 1000
        },
        dop6: {
          check: false,
          name: 'Видеопроцессор',
          price: 55000
        }
      },
      setting: {
        set1: {
          check: false,
          name: 'Электрощитовая',
          price: 80
        },
        set2: {
          check: false,
          name: 'Шефмонтаж',
          price: 55
        },
        set3: {
          check: false,
          name: 'Монтаж оборудования',
          price: 110
        },
        set4: {
          check: false,
          name: 'Изгот. металлоконструкции',
          price: 220
        },
        set5: {
          check: false,
          name: 'Монтаж металлоконструкций',
          price: 140
        },
        set6: {
          check: false,
          name: 'Набор запасных частей',
          price: 15
        }
      },
      delivery: 25,
      check_led: {},
      sum_led: 0,
      check_setting: {},
      sum_setting: 0,
      check_delivery: '',
      sum_delivery: 0,
      width: 3,
      height: 6,
      h: 96,
      w: 96,
      pixel_w: '384',
      pixel_h: '96',
      human: false,
      name: '',
      phone: '',
      humanModal: false,
      nameModal: '',
      emailModal: '',
      phoneModal: ''
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
      if (this.height < 150) {
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
      if (this.width < 150) {
        this.width += 1
        this.w += 32
      }
    },
    setColor(i) {
      this.selected_color = i
    },
    checkRobot() {
      const callbackForm = document.querySelector('.callback__form')
      const checkBtn = callbackForm.querySelector('.robot__check');
      checkBtn.classList.toggle('active')

      const human = callbackForm.querySelector('input[name=human]')
      checkBtn.classList.contains('active') ? human.value = 'good' : human.value = false
      checkBtn.classList.contains('active') ? this.human = 'good' : this.human = false

      const formBtn = callbackForm.querySelector('.callback__form__button')
      this.human == 'good' ? formBtn.disabled = false : formBtn.disabled = true
    },
    checkRobotModal() {
      const ModalForm = document.querySelector('.modal__form');
      const checkBtnModal = ModalForm.querySelector('.robot__check__modal');
      checkBtnModal.classList.toggle('active')

      const humanModal = ModalForm.querySelector('input[name=humanModal]')
      checkBtnModal.classList.contains('active') ? humanModal.value = 'good' : humanModal.value = false
      checkBtnModal.classList.contains('active') ? this.humanModal = 'good' : this.humanModal = false

      const formBtnModal = ModalForm.querySelector('.callback__form__button__modal')
      this.humanModal == 'good' ? formBtnModal.disabled = false : formBtnModal.disabled = true
    },
    checkLed(event) {
      this.led[event.target.value].check = event.target.checked
      if (this.led[event.target.value].check == true) {
        this.check_led[event.target.value] = this.led[event.target.value].price
        this.sum_led += this.led[event.target.value].price
      } else {
        delete this.check_led[event.target.value]
        this.sum_led -= this.led[event.target.value].price
      }
    },
    checkSetting(event) {
      this.setting[event.target.value].check = event.target.checked
      if (this.setting[event.target.value].check == true) {
        this.check_setting[event.target.value] = this.setting[event.target.value].price
        this.sum_setting += this.setting[event.target.value].price;
      } else {
        delete this.check_setting[event.target.value]
        this.sum_setting -= this.setting[event.target.value].price;
      }
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
        led: this.check_led,
        setting: this.check_setting,
        delivery: this.check_delivery,
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

        axios.post('http://calculator.ledimperial.ru/v2/thankyou.php', {
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
    sendKp() {
      let sendData = {
        price: this.price.toLocaleString(),
        color: this.colors[this.selected_color].name,
        where: this.selected_where,
        step: this.steps[this.selected_where][this.selected_step].name,
        size: this.steps[this.selected_where][this.selected_step].size,
        pixel: this.steps[this.selected_where][this.selected_step].pixel,
        led: this.check_led,
        setting: this.check_setting,
        delivery: this.check_delivery,
        width: this.width,
        height: this.height,
        h: this.h,
        w: this.w,
        pixel_w: this.pixel_w,
        pixel_h: this.pixel_h,
        human: this.humanModal,
        name: this.nameModal,
        email: this.emailModal,
        phone: this.phoneModal,
        sum_led: this.sum_led,
        sum_setting: this.sum_setting * this.width * this.height,
        sum_delivery: this.sum_delivery,
        monitor: this.price - this.sum_led - this.sum_delivery - this.sum_setting * (this.width * this.height),
        commercial: 'yes'
      }
      
      const phoneModal = document.querySelector('.phoneModal')

      if ( this.humanModal == 'good' && this.phoneModal != '') {
          
        phoneModal.style.border = ''

        axios.post('http://calculator.ledimperial.ru/v2/thankyou.php', {
            data: { sendData }
          }).then(function (response) {
            if (response.data.answer === 'good') {
              if (response.data.answer === 'good') {
                  let thisStep = document.querySelector('.form_request_modal')
                  let thisAnswer = document.querySelector('.responce_good_modal')
                  thisStep.classList.add('done');
                  setTimeout(() => {
                      thisStep.classList.remove('done');
                      thisStep.classList.add('hide');
                      thisAnswer.classList.add('done');
                  }, 500);
                      thisAnswer.classList.add('show');
                  setTimeout(() => {
                      $('.close').click(); 
                  }, 1500);
              }
            }
          }).catch(function (error) {
            console.log(error)
          })

        } else {
          phoneModal.style.border  = '1px solid red'
        }
    },
  },
  computed: {
    calcPixel() {
      if (this.pixel_h) {
        if (this.selected_where == 'outside' && this.selected_step == 's4') {
          this.pixel_h = (192/this.steps[this.selected_where][this.selected_step].name*this.height).toFixed()
        } else if (this.selected_where == 'inside' && this.selected_step == 's6') {
          this.pixel_h = (192/this.steps[this.selected_where][this.selected_step].name*this.height).toFixed()
        } else {
          this.pixel_h = (320/this.steps[this.selected_where][this.selected_step].name*this.height).toFixed()
        }
      }
      if (this.pixel_w) {
        if (this.selected_where == 'outside' && this.selected_step == 's4') {
          this.pixel_w = (192/this.steps[this.selected_where][this.selected_step].name*this.width).toFixed()
        } else if (this.selected_where == 'inside' && this.selected_step == 's6') {
          this.pixel_w = (192/this.steps[this.selected_where][this.selected_step].name*this.width).toFixed()
        } else {
          this.pixel_w = (160/this.steps[this.selected_where][this.selected_step].name*this.width).toFixed()
        }
      }
    },
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
        this.price = this.height * this.width * this.steps[this.selected_where][this.selected_step].price * 66
      }
      if (this.sum_led) {
        this.price += this.sum_led
      }
      if (this.sum_setting) {
        this.price += this.sum_setting*this.width*this.height
      }
      if (this.check_delivery == true) {
        this.price += this.delivery*this.width*this.height
        this.sum_delivery = this.delivery*this.width*this.height
      } else if (this.check_delivery == false) {
        this.sum_delivery = 0
      }
      return this.price.toLocaleString()
    },
    setStep() {
      return this.select = this.steps[this.selected_where]
    }
  },
  mounted() {
    const dopBtn = document.querySelector('.dop_params_btn')
    const dopParams = document.querySelector('.dop_params')
    const colLg7 = document.querySelector('.col-lg-7.right')

    dopBtn.addEventListener('click', () => {
      dopParams.classList.toggle('opened')
      if ( !dopParams.classList.contains('opened') ) dopParams.classList.remove('hovered')
    })
    dopBtn.addEventListener('mouseover', () => {
      if ( !dopParams.classList.contains('opened') ) dopParams.classList.add('hovered')
    })
    dopBtn.addEventListener('mouseout', () => {
      if ( !dopParams.classList.contains('opened') ) dopParams.classList.remove('hovered')
    })
    document.addEventListener('click', (e) => {
      if ( !dopParams.contains(event.target) && dopParams.classList.contains('opened') ) 
        dopParams.classList.remove('opened')
        dopParams.classList.remove('hovered')
    })

    const formBtn = document.querySelector('.callback__form__button')
    formBtn.disabled = true

  }
}
</script>

