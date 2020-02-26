<template>
  <div id="app">
    <!-- VUE -->
      {{ updWindow }}

      <div v-if="!desctop" class="nav-mobile">
        <button class="btn btn-outline-accent search"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTEzLjI4IDUxMy4yOCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEzLjI4IDUxMy4yODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+PGc+PGc+PGc+PHBhdGggZD0iTTQ5NS4wNCw0MDQuNDhMNDEwLjU2LDMyMGMxNS4zNi0zMC43MiwyNS42LTY2LjU2LDI1LjYtMTAyLjRDNDM2LjE2LDk3LjI4LDMzOC44OCwwLDIxOC41NiwwUzAuOTYsOTcuMjgsMC45NiwyMTcuNiAgICBzOTcuMjgsMjE3LjYsMjE3LjYsMjE3LjZjMzUuODQsMCw3MS42OC0xMC4yNCwxMDIuNC0yNS42bDg0LjQ4LDg0LjQ4YzI1LjYsMjUuNiw2NCwyNS42LDg5LjYsMCAgICBDNTE4LjA4LDQ2OC40OCw1MTguMDgsNDMwLjA4LDQ5NS4wNCw0MDQuNDh6IE0yMTguNTYsMzg0Yy05Mi4xNiwwLTE2Ni40LTc0LjI0LTE2Ni40LTE2Ni40UzEyNi40LDUxLjIsMjE4LjU2LDUxLjIgICAgczE2Ni40LDc0LjI0LDE2Ni40LDE2Ni40UzMxMC43MiwzODQsMjE4LjU2LDM4NHoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiIGZpbGw9IiNDMjUxQzAiLz48L2c+PC9nPjwvZz4gPC9zdmc" alt=""> Поиск</button>    
        <div class="sale"><a href=""><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTEuMzkyMzQgMTEuOTU1M0wxMS43MjUyIDEuNTE1MTNDMTIuNzc2NCAwLjQ1MjgwNSAxNC4yMzczIDAuMjA2NzkgMTQuOTg4MiAwLjk2NTYwMUMxNS43MzkxIDEuNzIzOTcgMTUuNDk1NiAzLjIwMDQ1IDE0LjQ0NDMgNC4yNjIzNUw0LjExMTUxIDE0LjcwM0MzLjA2MDI2IDE1Ljc2NTMgMS41OTkzNyAxNi4wMTEzIDAuODQ4NTEgMTUuMjUyNUMwLjA5NzYzNjYgMTQuNDkzNyAwLjM0MTEwNiAxMy4wMTc3IDEuMzkyMzQgMTEuOTU1M1pNMTIuMzgwNiA5LjcxNjk1QzE0LjA2NTYgOS43MTY5NSAxNS40MzE0IDExLjA1MzYgMTUuNDMxNCAxMi43MDIyQzE1LjQzMTQgMTQuMzUxMiAxNC4wNjU2IDE1LjY4NzkgMTIuMzgwNiAxNS42ODc5QzEwLjY5NTggMTUuNjg3OSA5LjMyOTg5IDE0LjM1MTIgOS4zMjk4OSAxMi43MDIyQzkuMzI5ODkgMTEuMDUzNiAxMC42OTU4IDkuNzE2OTUgMTIuMzgwNiA5LjcxNjk1Wk02LjUxNzUyIDMuNzQ2MDFDNi41MTc1MiAyLjA5NzQxIDUuMTUxNjEgMC43NjA3NTEgMy40NjY3NiAwLjc2MDc1MUMxLjc4MTc4IDAuNzYwNzUxIDAuNDE2MDI0IDIuMDk3NDEgMC40MTYwMjQgMy43NDYwMUMwLjQxNjAyNCA1LjM5NDU5IDEuNzgxNzggNi43MzEyNSAzLjQ2Njc2IDYuNzMxMjVDNS4xNTE2MSA2LjczMTI1IDYuNTE3NTIgNS4zOTQ1OSA2LjUxNzUyIDMuNzQ2MDFaIiBmaWxsPSIjRkZDMTAwIi8+PC9zdmc+" alt="">Акции</a></div>
        <div class="btn btn-accent catalog-btn" @click="mobile = !mobile">
          <div class="hamburger" :class="{ open: mobile == true }" >
            <span></span>
            <span></span>
            <span></span>
          </div>
          Каталог товаров
        </div>
      </div>
    
      <!-- mobile -->
      <transition name="fade2" mode="out-in">
      <div v-if="mobile" class="nav-catalog" :class="{ mob: mobile == true, slide: slide == true, slide2: slide2 == true }">
        <div class="nav-catalog__menu">
          <ul>
            <li class="nav-catalog__menu__item sale"><a href="" class="sale"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTEuMzkyMzQgMTEuOTU1M0wxMS43MjUyIDEuNTE1MTNDMTIuNzc2NCAwLjQ1MjgwNSAxNC4yMzczIDAuMjA2NzkgMTQuOTg4MiAwLjk2NTYwMUMxNS43MzkxIDEuNzIzOTcgMTUuNDk1NiAzLjIwMDQ1IDE0LjQ0NDMgNC4yNjIzNUw0LjExMTUxIDE0LjcwM0MzLjA2MDI2IDE1Ljc2NTMgMS41OTkzNyAxNi4wMTEzIDAuODQ4NTEgMTUuMjUyNUMwLjA5NzYzNjYgMTQuNDkzNyAwLjM0MTEwNiAxMy4wMTc3IDEuMzkyMzQgMTEuOTU1M1pNMTIuMzgwNiA5LjcxNjk1QzE0LjA2NTYgOS43MTY5NSAxNS40MzE0IDExLjA1MzYgMTUuNDMxNCAxMi43MDIyQzE1LjQzMTQgMTQuMzUxMiAxNC4wNjU2IDE1LjY4NzkgMTIuMzgwNiAxNS42ODc5QzEwLjY5NTggMTUuNjg3OSA5LjMyOTg5IDE0LjM1MTIgOS4zMjk4OSAxMi43MDIyQzkuMzI5ODkgMTEuMDUzNiAxMC42OTU4IDkuNzE2OTUgMTIuMzgwNiA5LjcxNjk1Wk02LjUxNzUyIDMuNzQ2MDFDNi41MTc1MiAyLjA5NzQxIDUuMTUxNjEgMC43NjA3NTEgMy40NjY3NiAwLjc2MDc1MUMxLjc4MTc4IDAuNzYwNzUxIDAuNDE2MDI0IDIuMDk3NDEgMC40MTYwMjQgMy43NDYwMUMwLjQxNjAyNCA1LjM5NDU5IDEuNzgxNzggNi43MzEyNSAzLjQ2Njc2IDYuNzMxMjVDNS4xNTE2MSA2LjczMTI1IDYuNTE3NTIgNS4zOTQ1OSA2LjUxNzUyIDMuNzQ2MDFaIiBmaWxsPSIjRkZDMTAwIi8+PC9zdmc+" alt="">Акции</a></li>
            <li class="nav-catalog__menu__item" @click.prevent="showSubMenu(index)"
              v-for="(item,index) of menu" :data-menu="index" >
              <a :href="item.url">{{item.t}}</a>
            </li>
          </ul>
        </div>
        
        <transition name="fade3">
          <div v-if="slide && !slide2" class="nav-catalog__submenu">
            <p v-if="slide && !slide2" @click="slide = !slide" class="back">Назад</p>
            <ul v-if="!slide2" v-for="(item,index) of showMenu">
              <li class="first">
                <a :href="item.url" @click.prevent="showSubMenu2(index)">
                  {{item.t}}
                </a>
              </li>
            </ul>
          </div>
        </transition>

        <transition name="fade3" mode="out-in">
          <div v-if="slide2" class="nav-catalog__submenu">
            <p v-if="slide2" @click="backToSubMenu()" class="back">{{ parrent }}</p>
            <ul v-if="slide2" v-for="(item,index) of showMenu">
              <li class="first">
                <a :href="item.url">
                  {{item.t}}
                </a>
              </li>
            </ul>
          </div>
        </transition>
        <div v-if="mobile" class="layout" @click="closeAll"></div>
      </div>
      </transition>
      <!-- / mobile -->

      <!-- desctop -->
      <div v-if="desctop" class="nav-catalog" @mouseleave="closeMenu">
        <div class="nav-catalog__menu">
          <ul>
            <li class="nav-catalog__menu__item sale" @mouseover="closeMenu"><a href="" class="sale"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTEuMzkyMzQgMTEuOTU1M0wxMS43MjUyIDEuNTE1MTNDMTIuNzc2NCAwLjQ1MjgwNSAxNC4yMzczIDAuMjA2NzkgMTQuOTg4MiAwLjk2NTYwMUMxNS43MzkxIDEuNzIzOTcgMTUuNDk1NiAzLjIwMDQ1IDE0LjQ0NDMgNC4yNjIzNUw0LjExMTUxIDE0LjcwM0MzLjA2MDI2IDE1Ljc2NTMgMS41OTkzNyAxNi4wMTEzIDAuODQ4NTEgMTUuMjUyNUMwLjA5NzYzNjYgMTQuNDkzNyAwLjM0MTEwNiAxMy4wMTc3IDEuMzkyMzQgMTEuOTU1M1pNMTIuMzgwNiA5LjcxNjk1QzE0LjA2NTYgOS43MTY5NSAxNS40MzE0IDExLjA1MzYgMTUuNDMxNCAxMi43MDIyQzE1LjQzMTQgMTQuMzUxMiAxNC4wNjU2IDE1LjY4NzkgMTIuMzgwNiAxNS42ODc5QzEwLjY5NTggMTUuNjg3OSA5LjMyOTg5IDE0LjM1MTIgOS4zMjk4OSAxMi43MDIyQzkuMzI5ODkgMTEuMDUzNiAxMC42OTU4IDkuNzE2OTUgMTIuMzgwNiA5LjcxNjk1Wk02LjUxNzUyIDMuNzQ2MDFDNi41MTc1MiAyLjA5NzQxIDUuMTUxNjEgMC43NjA3NTEgMy40NjY3NiAwLjc2MDc1MUMxLjc4MTc4IDAuNzYwNzUxIDAuNDE2MDI0IDIuMDk3NDEgMC40MTYwMjQgMy43NDYwMUMwLjQxNjAyNCA1LjM5NDU5IDEuNzgxNzggNi43MzEyNSAzLjQ2Njc2IDYuNzMxMjVDNS4xNTE2MSA2LjczMTI1IDYuNTE3NTIgNS4zOTQ1OSA2LjUxNzUyIDMuNzQ2MDFaIiBmaWxsPSIjRkZDMTAwIi8+PC9zdmc+" alt="">Акции</a></li>
            <li class="nav-catalog__menu__item" :class="{ active: current == index }"
              v-for="(item,index) of menu" :data-menu="index" >
              <a :href="item.url" @mouseenter="openMenu(index)">{{item.t}}</a>
            </li>
          </ul>
        </div>
        <transition name="fade" mode="out-in">
          <div v-if="show" class="nav-catalog__submenu">
            <p v-if="mobile" @click="closeMenu" class="back">Назад</p>
            <ul v-for="(item,index) of showMenu">
              <li class="first">
                <a :href="item.url">
                  <img :src="item.img" :alt="item.t">
                  {{item.t}}
                </a>
              </li>
              <li v-for="item of item.child">
                <a :href="item.url">
                  {{item.t}}
                </a>
              </li>
            </ul>
          </div>
        </transition>
      </div>
      <!-- / desctop -->
    <!-- VUE -->
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      desctop: true,
      mobile: false,
      show: false,
      slide: false,
      slide2: false,
      timer: 0,
      current: null,
      parrent: '',
      width: null,
      menu: {
        0: { t:'Одежда и обувь',       url: './category.html' },
        1: { t:'Игрушки и игры',       url: './category.html' },
        2: { t:'Детская комната',      url: './category.html' },
        3: { t:'Коляски и автокресла', url: './category.html' },
        4: { t:'Подгузники и гигиена', url: './category.html' },
        5: { t:'Кормление и питание',  url: './category.html' },
        6: { t:'Развитие и обучение',  url: './category.html' },
        7: { t:'Хобби и творчество',   url: './category.html' },
        8: { t:'Товары для мам',       url: './category.html' },
        9: { t:'Герои и интересы',     url: './category.html' },
      },
      showMenu: {},
      subMenu: {
        0: {
          0: {
            img: require('@/img/submenu/1.png'),
            t: 'Верхняя одежда',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: require('@/img/submenu/2.png'),
            t: 'Одежда для девочек',
            url: './category.html',
            child: {
              0: { t: 'Блузки', url: './category.html' },
              1: { t: 'Брюки', url: './category.html' },
              2: { t: 'Джемперы', url: './category.html' },
              3: { t: 'Джинсы', url: './category.html' },
              4: { t: 'Кардиганы', url: './category.html' },
              5: { t: 'Блузки', url: './category.html' },
              6: { t: 'Брюки', url: './category.html' },
              7: { t: 'Джемперы', url: './category.html' },
              8: { t: 'Джинсы', url: './category.html' },
              9: { t: 'Кардиганы', url: './category.html' }
            }
          },
          2: {
            img: require('@/img/submenu/3.png'),
            t: 'Одежда для мальчиков',
            url: './category.html',
            child: {
              0: { t: 'Брюки', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Рубашки', url: './category.html' },
              4: { t: 'Толстовки', url: './category.html' },
              5: { t: 'Брюки', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Рубашки', url: './category.html' },
              9: { t: 'Толстовки', url: './category.html' }
            }
          },
          3: {
            img: require('@/img/submenu/4.png'),
            t: 'Обувь для девочек',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          4: {
            img: require('@/img/submenu/5.png'),
            t: 'Обувь для мальчиков',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          5: {
            img: require('@/img/submenu/6.png'),
            t: 'Одежда для малышей',
            url: './category.html',
            child: {
              0: { t: 'Боди', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Кардиганы', url: './category.html' },
              4: { t: 'Комбинезоны', url: './category.html' },
              5: { t: 'Боди', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Кардиганы', url: './category.html' },
              9: { t: 'Комбинезоны', url: './category.html' }
            }
          },
        },

        1: {
          0: {
            img: require('@/img/submenu/1.png'),
            t: 'Верхняя одежда2',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: require('@/img/submenu/2.png'),
            t: 'Одежда для девочек2',
            url: './category.html',
            child: {
              0: { t: 'Блузки', url: './category.html' },
              1: { t: 'Брюки', url: './category.html' },
              2: { t: 'Джемперы', url: './category.html' },
              3: { t: 'Джинсы', url: './category.html' },
              4: { t: 'Кардиганы', url: './category.html' },
              5: { t: 'Блузки', url: './category.html' },
              6: { t: 'Брюки', url: './category.html' },
              7: { t: 'Джемперы', url: './category.html' },
              8: { t: 'Джинсы', url: './category.html' },
              9: { t: 'Кардиганы', url: './category.html' }
            }
          },
          2: {
            img: require('@/img/submenu/3.png'),
            t: 'Одежда для мальчиков2',
            url: './category.html',
            child: {
              0: { t: 'Брюки', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Рубашки', url: './category.html' },
              4: { t: 'Толстовки', url: './category.html' },
              5: { t: 'Брюки', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Рубашки', url: './category.html' },
              9: { t: 'Толстовки', url: './category.html' }
            }
          },
          3: {
            img: require('@/img/submenu/4.png'),
            t: 'Обувь для девочек2',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          4: {
            img: require('@/img/submenu/5.png'),
            t: 'Обувь для мальчиков2',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          5: {
            img: require('@/img/submenu/6.png'),
            t: 'Одежда для малышей2',
            url: './category.html',
            child: {
              0: { t: 'Боди', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Кардиганы', url: './category.html' },
              4: { t: 'Комбинезоны', url: './category.html' },
              5: { t: 'Боди', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Кардиганы', url: './category.html' },
              9: { t: 'Комбинезоны', url: './category.html' }
            }
          },
        },

        2: {
          0: {
            img: require('@/img/submenu/1.png'),
            t: 'Верхняя одежда',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: require('@/img/submenu/2.png'),
            t: 'Одежда для девочек3',
            url: './category.html',
            child: {
              0: { t: 'Блузки', url: './category.html' },
              1: { t: 'Брюки', url: './category.html' },
              2: { t: 'Джемперы', url: './category.html' },
              3: { t: 'Джинсы', url: './category.html' },
              4: { t: 'Кардиганы', url: './category.html' },
              5: { t: 'Блузки', url: './category.html' },
              6: { t: 'Брюки', url: './category.html' },
              7: { t: 'Джемперы', url: './category.html' },
              8: { t: 'Джинсы', url: './category.html' },
              9: { t: 'Кардиганы', url: './category.html' }
            }
          },
          2: {
            img: require('@/img/submenu/3.png'),
            t: 'Одежда для мальчиков3',
            url: './category.html',
            child: {
              0: { t: 'Брюки', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Рубашки', url: './category.html' },
              4: { t: 'Толстовки', url: './category.html' },
              5: { t: 'Брюки', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Рубашки', url: './category.html' },
              9: { t: 'Толстовки', url: './category.html' }
            }
          },
          3: {
            img: require('@/img/submenu/4.png'),
            t: 'Обувь для девочек3',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          4: {
            img: require('@/img/submenu/5.png'),
            t: 'Обувь для мальчиков3',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          5: {
            img: require('@/img/submenu/6.png'),
            t: 'Одежда для малышей3',
            url: './category.html',
            child: {
              0: { t: 'Боди', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Кардиганы', url: './category.html' },
              4: { t: 'Комбинезоны', url: './category.html' },
              5: { t: 'Боди', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Кардиганы', url: './category.html' },
              9: { t: 'Комбинезоны', url: './category.html' }
            }
          },
        },

        3: {
          0: {
            img: require('@/img/submenu/1.png'),
            t: 'Верхняя одежда4',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: require('@/img/submenu/2.png'),
            t: 'Одежда для девочек4',
            url: './category.html',
            child: {
              0: { t: 'Блузки', url: './category.html' },
              1: { t: 'Брюки', url: './category.html' },
              2: { t: 'Джемперы', url: './category.html' },
              3: { t: 'Джинсы', url: './category.html' },
              4: { t: 'Кардиганы', url: './category.html' },
              5: { t: 'Блузки', url: './category.html' },
              6: { t: 'Брюки', url: './category.html' },
              7: { t: 'Джемперы', url: './category.html' },
              8: { t: 'Джинсы', url: './category.html' },
              9: { t: 'Кардиганы', url: './category.html' }
            }
          },
          2: {
            img: require('@/img/submenu/3.png'),
            t: 'Одежда для мальчиков4',
            url: './category.html',
            child: {
              0: { t: 'Брюки', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Рубашки', url: './category.html' },
              4: { t: 'Толстовки', url: './category.html' },
              5: { t: 'Брюки', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Рубашки', url: './category.html' },
              9: { t: 'Толстовки', url: './category.html' }
            }
          },
          3: {
            img: require('@/img/submenu/4.png'),
            t: 'Обувь для девочек4',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          4: {
            img: require('@/img/submenu/5.png'),
            t: 'Обувь для мальчиков4',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          5: {
            img: require('@/img/submenu/6.png'),
            t: 'Одежда для малышей4',
            url: './category.html',
            child: {
              0: { t: 'Боди', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Кардиганы', url: './category.html' },
              4: { t: 'Комбинезоны', url: './category.html' },
              5: { t: 'Боди', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Кардиганы', url: './category.html' },
              9: { t: 'Комбинезоны', url: './category.html' }
            }
          },
        },

        4: {
          0: {
            img: require('@/img/submenu/1.png'),
            t: 'Верхняя одежда5',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: require('@/img/submenu/2.png'),
            t: 'Одежда для девочек5',
            url: './category.html',
            child: {
              0: { t: 'Блузки', url: './category.html' },
              1: { t: 'Брюки', url: './category.html' },
              2: { t: 'Джемперы', url: './category.html' },
              3: { t: 'Джинсы', url: './category.html' },
              4: { t: 'Кардиганы', url: './category.html' },
              5: { t: 'Блузки', url: './category.html' },
              6: { t: 'Брюки', url: './category.html' },
              7: { t: 'Джемперы', url: './category.html' },
              8: { t: 'Джинсы', url: './category.html' },
              9: { t: 'Кардиганы', url: './category.html' }
            }
          },
          2: {
            img: require('@/img/submenu/3.png'),
            t: 'Одежда для мальчиков5',
            url: './category.html',
            child: {
              0: { t: 'Брюки', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Рубашки', url: './category.html' },
              4: { t: 'Толстовки', url: './category.html' },
              5: { t: 'Брюки', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Рубашки', url: './category.html' },
              9: { t: 'Толстовки', url: './category.html' }
            }
          },
          3: {
            img: require('@/img/submenu/4.png'),
            t: 'Обувь для девочек5',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          4: {
            img: require('@/img/submenu/5.png'),
            t: 'Обувь для мальчиков5',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          5: {
            img: require('@/img/submenu/6.png'),
            t: 'Одежда для малышей5',
            url: './category.html',
            child: {
              0: { t: 'Боди', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Кардиганы', url: './category.html' },
              4: { t: 'Комбинезоны', url: './category.html' },
              5: { t: 'Боди', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Кардиганы', url: './category.html' },
              9: { t: 'Комбинезоны', url: './category.html' }
            }
          },
        },
        
        5: {
          0: {
            img: require('@/img/submenu/1.png'),
            t: 'Верхняя одежда6',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: require('@/img/submenu/2.png'),
            t: 'Одежда для девочек6',
            url: './category.html',
            child: {
              0: { t: 'Блузки', url: './category.html' },
              1: { t: 'Брюки', url: './category.html' },
              2: { t: 'Джемперы', url: './category.html' },
              3: { t: 'Джинсы', url: './category.html' },
              4: { t: 'Кардиганы', url: './category.html' },
              5: { t: 'Блузки', url: './category.html' },
              6: { t: 'Брюки', url: './category.html' },
              7: { t: 'Джемперы', url: './category.html' },
              8: { t: 'Джинсы', url: './category.html' },
              9: { t: 'Кардиганы', url: './category.html' }
            }
          },
          2: {
            img: require('@/img/submenu/3.png'),
            t: 'Одежда для мальчиков6',
            url: './category.html',
            child: {
              0: { t: 'Брюки', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Рубашки', url: './category.html' },
              4: { t: 'Толстовки', url: './category.html' },
              5: { t: 'Брюки', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Рубашки', url: './category.html' },
              9: { t: 'Толстовки', url: './category.html' }
            }
          },
          3: {
            img: require('@/img/submenu/4.png'),
            t: 'Обувь для девочек6',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          4: {
            img: require('@/img/submenu/5.png'),
            t: 'Обувь для мальчиков6',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          5: {
            img: require('@/img/submenu/6.png'),
            t: 'Одежда для малышей6',
            url: './category.html',
            child: {
              0: { t: 'Боди', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Кардиганы', url: './category.html' },
              4: { t: 'Комбинезоны', url: './category.html' },
              5: { t: 'Боди', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Кардиганы', url: './category.html' },
              9: { t: 'Комбинезоны', url: './category.html' }
            }
          },
        },
        
        6: {
          0: {
            img: require('@/img/submenu/1.png'),
            t: 'Верхняя одежда',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: require('@/img/submenu/2.png'),
            t: 'Одежда для девочек3',
            url: './category.html',
            child: {
              0: { t: 'Блузки', url: './category.html' },
              1: { t: 'Брюки', url: './category.html' },
              2: { t: 'Джемперы', url: './category.html' },
              3: { t: 'Джинсы', url: './category.html' },
              4: { t: 'Кардиганы', url: './category.html' },
              5: { t: 'Блузки', url: './category.html' },
              6: { t: 'Брюки', url: './category.html' },
              7: { t: 'Джемперы', url: './category.html' },
              8: { t: 'Джинсы', url: './category.html' },
              9: { t: 'Кардиганы', url: './category.html' }
            }
          },
          2: {
            img: require('@/img/submenu/3.png'),
            t: 'Одежда для мальчиков3',
            url: './category.html',
            child: {
              0: { t: 'Брюки', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Рубашки', url: './category.html' },
              4: { t: 'Толстовки', url: './category.html' },
              5: { t: 'Брюки', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Рубашки', url: './category.html' },
              9: { t: 'Толстовки', url: './category.html' }
            }
          },
          3: {
            img: require('@/img/submenu/4.png'),
            t: 'Обувь для девочек3',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          4: {
            img: require('@/img/submenu/5.png'),
            t: 'Обувь для мальчиков3',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          5: {
            img: require('@/img/submenu/6.png'),
            t: 'Одежда для малышей3',
            url: './category.html',
            child: {
              0: { t: 'Боди', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Кардиганы', url: './category.html' },
              4: { t: 'Комбинезоны', url: './category.html' },
              5: { t: 'Боди', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Кардиганы', url: './category.html' },
              9: { t: 'Комбинезоны', url: './category.html' }
            }
          },
        },

        7: {
          0: {
            img: require('@/img/submenu/1.png'),
            t: 'Верхняя одежда4',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: require('@/img/submenu/2.png'),
            t: 'Одежда для девочек4',
            url: './category.html',
            child: {
              0: { t: 'Блузки', url: './category.html' },
              1: { t: 'Брюки', url: './category.html' },
              2: { t: 'Джемперы', url: './category.html' },
              3: { t: 'Джинсы', url: './category.html' },
              4: { t: 'Кардиганы', url: './category.html' },
              5: { t: 'Блузки', url: './category.html' },
              6: { t: 'Брюки', url: './category.html' },
              7: { t: 'Джемперы', url: './category.html' },
              8: { t: 'Джинсы', url: './category.html' },
              9: { t: 'Кардиганы', url: './category.html' }
            }
          },
          2: {
            img: require('@/img/submenu/3.png'),
            t: 'Одежда для мальчиков4',
            url: './category.html',
            child: {
              0: { t: 'Брюки', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Рубашки', url: './category.html' },
              4: { t: 'Толстовки', url: './category.html' },
              5: { t: 'Брюки', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Рубашки', url: './category.html' },
              9: { t: 'Толстовки', url: './category.html' }
            }
          },
          3: {
            img: require('@/img/submenu/4.png'),
            t: 'Обувь для девочек4',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          4: {
            img: require('@/img/submenu/5.png'),
            t: 'Обувь для мальчиков4',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          5: {
            img: require('@/img/submenu/6.png'),
            t: 'Одежда для малышей4',
            url: './category.html',
            child: {
              0: { t: 'Боди', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Кардиганы', url: './category.html' },
              4: { t: 'Комбинезоны', url: './category.html' },
              5: { t: 'Боди', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Кардиганы', url: './category.html' },
              9: { t: 'Комбинезоны', url: './category.html' }
            }
          },
        },

        8: {
          0: {
            img: require('@/img/submenu/1.png'),
            t: 'Верхняя одежда5',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: require('@/img/submenu/2.png'),
            t: 'Одежда для девочек5',
            url: './category.html',
            child: {
              0: { t: 'Блузки', url: './category.html' },
              1: { t: 'Брюки', url: './category.html' },
              2: { t: 'Джемперы', url: './category.html' },
              3: { t: 'Джинсы', url: './category.html' },
              4: { t: 'Кардиганы', url: './category.html' },
              5: { t: 'Блузки', url: './category.html' },
              6: { t: 'Брюки', url: './category.html' },
              7: { t: 'Джемперы', url: './category.html' },
              8: { t: 'Джинсы', url: './category.html' },
              9: { t: 'Кардиганы', url: './category.html' }
            }
          },
          2: {
            img: require('@/img/submenu/3.png'),
            t: 'Одежда для мальчиков5',
            url: './category.html',
            child: {
              0: { t: 'Брюки', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Рубашки', url: './category.html' },
              4: { t: 'Толстовки', url: './category.html' },
              5: { t: 'Брюки', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Рубашки', url: './category.html' },
              9: { t: 'Толстовки', url: './category.html' }
            }
          },
          3: {
            img: require('@/img/submenu/4.png'),
            t: 'Обувь для девочек5',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          4: {
            img: require('@/img/submenu/5.png'),
            t: 'Обувь для мальчиков5',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          5: {
            img: require('@/img/submenu/6.png'),
            t: 'Одежда для малышей5',
            url: './category.html',
            child: {
              0: { t: 'Боди', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Кардиганы', url: './category.html' },
              4: { t: 'Комбинезоны', url: './category.html' },
              5: { t: 'Боди', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Кардиганы', url: './category.html' },
              9: { t: 'Комбинезоны', url: './category.html' }
            }
          },
        },
        
        9: {
          0: {
            img: require('@/img/submenu/1.png'),
            t: 'Верхняя одежда6',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: require('@/img/submenu/2.png'),
            t: 'Одежда для девочек6',
            url: './category.html',
            child: {
              0: { t: 'Блузки', url: './category.html' },
              1: { t: 'Брюки', url: './category.html' },
              2: { t: 'Джемперы', url: './category.html' },
              3: { t: 'Джинсы', url: './category.html' },
              4: { t: 'Кардиганы', url: './category.html' },
              5: { t: 'Блузки', url: './category.html' },
              6: { t: 'Брюки', url: './category.html' },
              7: { t: 'Джемперы', url: './category.html' },
              8: { t: 'Джинсы', url: './category.html' },
              9: { t: 'Кардиганы', url: './category.html' }
            }
          },
          2: {
            img: require('@/img/submenu/3.png'),
            t: 'Одежда для мальчиков6',
            url: './category.html',
            child: {
              0: { t: 'Брюки', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Рубашки', url: './category.html' },
              4: { t: 'Толстовки', url: './category.html' },
              5: { t: 'Брюки', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Рубашки', url: './category.html' },
              9: { t: 'Толстовки', url: './category.html' }
            }
          },
          3: {
            img: require('@/img/submenu/4.png'),
            t: 'Обувь для девочек6',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          4: {
            img: require('@/img/submenu/5.png'),
            t: 'Обувь для мальчиков6',
            url: './category.html',
            child: {
              0: { t: 'Анатомическая обувь', url: './category.html' },
              1: { t: 'Ботинки', url: './category.html' },
              2: { t: 'Домашняя обувь', url: './category.html' },
              3: { t: 'Кроссовки', url: './category.html' },
              4: { t: 'Резиновые сапоги', url: './category.html' },
            }
          },
          5: {
            img: require('@/img/submenu/6.png'),
            t: 'Одежда для малышей6',
            url: './category.html',
            child: {
              0: { t: 'Боди', url: './category.html' },
              1: { t: 'Джемперы', url: './category.html' },
              2: { t: 'Джинсы', url: './category.html' },
              3: { t: 'Кардиганы', url: './category.html' },
              4: { t: 'Комбинезоны', url: './category.html' },
              5: { t: 'Боди', url: './category.html' },
              6: { t: 'Джемперы', url: './category.html' },
              7: { t: 'Джинсы', url: './category.html' },
              8: { t: 'Кардиганы', url: './category.html' },
              9: { t: 'Комбинезоны', url: './category.html' }
            }
          },
        },
      
      }
    }
  },
  created() {
    this.width = document.documentElement.clientWidth
    window.addEventListener('resize', this.updateWidth)
  },
  methods: {
    openMenu(index) {
        this.timer = setTimeout(() => {
          this.showMenu = this.subMenu[index]
          this.show = true
          this.current = index
        }, 1000);
    },
    closeMenu() {
        clearTimeout(this.timer)
        this.timer = 0
        this.show = false
        this.current = null
    },
    showSubMenu(index) {
      this.showMenu = this.subMenu[index]
      this.current = index
      this.slide = true
      if (window.pageYOffset > 20) document.querySelector('.mobile').scrollIntoView({block: "start", behavior: "smooth"})
    },
    showSubMenu2(index) {
      this.showMenu = this.subMenu[index][index].child
      this.parrent = this.subMenu[this.current][index].t
      this.slide2 = true
    },
    backToSubMenu() {
      this.slide2 = false
      this.showMenu = this.subMenu[this.current]
    },
    closeAll() {
      this.slide2 = false
      this.slide = false
      this.mobile = false
    },
    updateWidth() {
        this.width = window.innerWidth 
        this.height = window.pageYOffset
    },
  },
  computed: {
    updWindow() {
      this.width = document.documentElement.clientWidth
      this.width < 991 ? this.desctop = false : this.desctop = true
      this.width > 991 ? this.mobile = false : this.mobile = this.mobile
    }
  }
}
</script>
