<template>
  <div id="app">
    {{ updWindow }}
    <div v-if="!desctop" class="nav-mobile">
      <input type="text" name="search" placeholder="Поиск">
      <button class="search" @click="search = !search">
        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTEzLjI4IDUxMy4yOCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEzLjI4IDUxMy4yODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiBjbGFzcz0iIj48Zz48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik00OTUuMDQsNDA0LjQ4TDQxMC41NiwzMjBjMTUuMzYtMzAuNzIsMjUuNi02Ni41NiwyNS42LTEwMi40QzQzNi4xNiw5Ny4yOCwzMzguODgsMCwyMTguNTYsMFMwLjk2LDk3LjI4LDAuOTYsMjE3LjYgICAgczk3LjI4LDIxNy42LDIxNy42LDIxNy42YzM1Ljg0LDAsNzEuNjgtMTAuMjQsMTAyLjQtMjUuNmw4NC40OCw4NC40OGMyNS42LDI1LjYsNjQsMjUuNiw4OS42LDAgICAgQzUxOC4wOCw0NjguNDgsNTE4LjA4LDQzMC4wOCw0OTUuMDQsNDA0LjQ4eiBNMjE4LjU2LDM4NGMtOTIuMTYsMC0xNjYuNC03NC4yNC0xNjYuNC0xNjYuNFMxMjYuNCw1MS4yLDIxOC41Niw1MS4yICAgIHMxNjYuNCw3NC4yNCwxNjYuNCwxNjYuNFMzMTAuNzIsMzg0LDIxOC41NiwzODR6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiNDMjUxQzAiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+Cgk8L2c+CjwvZz48L2c+IDwvc3ZnPg==" /> Поиск</button>    
      <div class="catalog-btn" @click="mobile = !mobile">
        <div class="icon" :class="{ active: mobile == true }">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        Каталог товаров
      </div>
    </div>

    <!-- mobile -->
    <transition name="fade2" mode="out-in">
      <div v-if="mobile" class="nav-catalog" :class="{ mob: mobile == true, slide: slide == true, slide1: slide1 == true, slide2: slide2 == true }">
        <div class="nav-catalog__menu">
          <ul>
            <li class="nav-catalog__menu__item"
              v-for="(item,index) of mobileMenu" :key="index" :class="{ top: index < 5}" >
              <a v-if="index < 5" @click.prevent="showMenuMobile(index+1,true)">
                <img :src="item.img" alt="">
                {{item.title}}</a>
              <a v-else @click.prevent="showMenuMobile1(index-5)">
                <img :src="item.img" alt="">
                {{item.title}}</a>
            </li>
          </ul>
        </div>
        
        <transition name="fade3" mode="out-in">
          <div v-if="slide && !slide1 && !slide2" class="nav-catalog__submenu">
            <p v-if="slide && !slide1 && !slide2" @click="backToSubMenu()" class="back">{{parrent}}</p>
            <p v-if="slide && !slide1 && !slide2" class="category"><a :href="parrentURL">Перейти в категорию</a></p>
            <ul v-for="(item,index) of mobileMenuChild" :key="index">
              <li class="first">
                <a :href="item.url" @click.prevent="showMenuMobile1(index)">
                  {{item.title}}
                </a>
              </li>
            </ul>
          </div>
        </transition>

        <transition name="fade3" mode="out-in">
          <div v-if="slide1 && !slide2" class="nav-catalog__submenu">
            <p v-if="slide1 && !slide2" @click="backToSubMenu2()" class="back">{{parrent}}</p>
            <p v-if="slide1 && !slide2" class="category"><a :href="parrentURL">Перейти в категорию</a></p>
            <ul v-for="(item,index) of mobileMenuChild1" :key="index">
              <li class="first">
                <a :href="item.url" @click.prevent="showMenuMobile2(index)">
                  {{item.title}}
                </a>
              </li>
            </ul>
          </div>
        </transition>

        <transition name="fade3" mode="out-in">
          <div v-if="slide2" class="nav-catalog__submenu">
            <p v-if="slide2" @click="backToSubMenu3()" class="back">{{ parrent }}</p>
            <p v-if="slide2" class="category"><a :href="parrentURL">Перейти в категорию</a></p>
            <ul v-for="(item,index) of mobileMenuChild2" :key="index">
              <li class="first">
                <a :href="item.url">
                  {{item.title}}
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
      <ul class="nav-catalog__menu">
        <li :class="{ active: currentTop == index }"
          v-for="(item,index) of topMenu" :key="index">
          <a v-if="index==0" @click="openMenu(index)" :class="item.class">
          <div class="icon" :class="{ active: show == true }">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
          {{item.title}}</a>
          <a v-else @click="openMenu(index, $event)" :class="item.class">
            <img :src="item.img" alt="">
            {{item.title}}
          </a>
        </li>
      </ul>
      
      <transition name="fade" mode="out-in">
        <div v-if="show" class="nav-catalog__submenu">
          
          <div ref="general" class="nav-catalog__general" :class="{ active: show == true }">
            <ul ref="generalUL" >
              <li v-for="(item,index) of catalogMenu" :key="index" @mouseover="showSubMenu(index)" :class="{ active: current == index }">
                <a :href="item.url">
                  <img :src="item.img" alt="">
                  {{item.title}}
                </a>
              </li>
            </ul>
          </div>
          <div class="nav-catalog__parent">
            <div class="nav-catalog__parent__head">
              <p>{{ title }}</p>
              <span>{{ cat }}</span>
            </div>
            <ul v-for="(item,index) of rightMenu" :key="index">
              <li>
                <a href="">{{item.title}}</a>
              </li>
              <li v-for="(elem,i) of item.child" :key="i">
                <a v-if="!elem.more" :href="elem.url">
                  {{elem.title}}
                </a>
                <a v-else :href="elem.url" class="more">
                  {{elem.title}}
                </a>
              </li>

            </ul>
          </div>
        </div>
      </transition>
    </div>
    <!-- / desctop -->

    <!-- search -->
    <transition name="fade2" mode="out-in">
      <div v-if="search" class="search" :class="{ openSearch: search == true }">
        <p class="close" @click="search = !search"></p>
        <form action="/" @submit.prevent>
          <input type="search" ref="search" name="search" placeholder="Найти">
          <button type="submit"></button>
        </form>
      </div>
    </transition>
    <!-- / search -->

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
      slide1: false,
      slide2: false,
      currentTop: 0,
      current: 0,
      currentMobile: 0,
      group: false,
      parrent: '',
      parrentURL: '',
      width: null,
      find: '',
      catalog: [
        { title: 'Каталог товаров',       class: 'catalog'  },
        { title: 'Товары по акциям',      title2: 'Акции',        title3: 'Товары по акциям',      url: './sale.html',  img: require('@/img/sale.svg')  },
        { title: 'Герои и интересы',      title2: 'Герои',        title3: 'Герои и интересы',      url: './catalog.html',  img: require('@/img/hero.svg')  },
        { title: 'Популярные бренды',     title2: 'Бренды',       title3: 'Популярные бренды',     url: './catalog.html',  img: require('@/img/brand.svg') },
        { title: 'Для мальчиков',         title2: 'Мальчикам',    title3: 'Для мальчиков',         url: './catalog.html',  img: require('@/img/boy.svg')   },
        { title: 'Для девочек',           title2: 'Девочкам',     title3: 'Для девочек',          url: './catalog.html',  img: require('@/img/girl.svg')  },
        { title: 'Одежда и обувь',        url: './catalog.html',  img: require('@/img/cat1.svg')  },
        { title: 'Игрушки и игры',        url: './catalog.html',  img: require('@/img/cat2.svg')  },
        { title: 'Детская комната',       url: './catalog.html',  img: require('@/img/cat3.svg')  },
        { title: 'Коляски и автокресла',  url: './catalog.html',  img: require('@/img/cat4.svg')  },
        { title: 'Подгузники и гигиена',  url: './catalog.html',  img: require('@/img/cat5.svg')  },
        { title: 'Кормление и питание',   url: './catalog.html',  img: require('@/img/cat6.svg')  },
        { title: 'Развитие и обучение',   url: './catalog.html',  img: require('@/img/cat7.svg')  },
        { title: 'Для спорта и отдых',   url: './catalog.html',  img: require('@/img/cat8.svg')  },
        { title: 'Хобби и творчество',    url: './catalog.html',  img: require('@/img/cat9.svg')  },
        { title: 'Товары для мам',        url: './catalog.html',  img: require('@/img/cat10.svg') },
      ],
      catalogLeft: {
          //Каталог товаров
          0: {
            0: { title: 'Одежда и обувь',        url: './catalog.html',  img: require('@/img/cat1.svg')  },
            1: { title: 'Игрушки и игры',        url: './catalog.html',  img: require('@/img/cat2.svg')  },
            2: { title: 'Детская комната',       url: './catalog.html',  img: require('@/img/cat3.svg')  },
            3: { title: 'Коляски и автокресла',  url: './catalog.html',  img: require('@/img/cat4.svg')  },
            4: { title: 'Подгузники и гигиена',  url: './catalog.html',  img: require('@/img/cat5.svg')  },
            5: { title: 'Кормление и питание',   url: './catalog.html',  img: require('@/img/cat6.svg')  },
            6: { title: 'Развитие и обучение',   url: './catalog.html',  img: require('@/img/cat7.svg')  },
            7: { title: 'Для спорта и отдых',   url: './catalog.html',  img: require('@/img/cat8.svg')  },
            8: { title: 'Хобби и творчество',    url: './catalog.html',  img: require('@/img/cat9.svg')  },
            9: { title: 'Товары для мам',        url: './catalog.html',  img: require('@/img/cat10.svg') },
          },
          //Товары по акциям
          1: {
            0: { title: 'Игрушки и игры',        url: './sale2.html',  img: require('@/img/cat2.svg')  },
            1: { title: 'Детская комната',       url: './sale3.html',  img: require('@/img/cat3.svg')  },
            2: { title: 'Коляски и автокресла',  url: './sale4.html',  img: require('@/img/cat4.svg')  },
          },
          //Герои и интересы
          2: {
            0: { title: 'Одежда и обувь',        url: './catalog.html',  img: require('@/img/cat1.svg')  },
            1: { title: 'Игрушки и игры',        url: './catalog.html',  img: require('@/img/cat2.svg')  },
            2: { title: 'Детская комната',       url: './catalog.html',  img: require('@/img/cat3.svg')  },
            3: { title: 'Коляски и автокресла',  url: './catalog.html',  img: require('@/img/cat4.svg')  },
            6: { title: 'Развитие и обучение',   url: './catalog.html',  img: require('@/img/cat7.svg')  },
            7: { title: 'Хобби и творчество',    url: './catalog.html',  img: require('@/img/cat8.svg')  },
            9: { title: 'Герои и интересы',      url: './catalog.html',  img: require('@/img/cat9.svg') },
            8: { title: 'Товары для мам',        url: './catalog.html',  img: require('@/img/cat10.svg')  },
          },
          // Попоулярные бренды
          3: {
            0: { title: 'Одежда и обувь',        url: './catalog.html',  img: require('@/img/cat1.svg')  },
            4: { title: 'Подгузники и гигиена',  url: './catalog.html',  img: require('@/img/cat5.svg')  },
            5: { title: 'Кормление и питание',   url: './catalog.html',  img: require('@/img/cat6.svg')  },
            6: { title: 'Развитие и обучение',   url: './catalog.html',  img: require('@/img/cat7.svg')  },
            7: { title: 'Хобби и творчество',    url: './catalog.html',  img: require('@/img/cat8.svg')  },
            8: { title: 'Товары для мам',        url: './catalog.html',  img: require('@/img/cat9.svg')  },
            9: { title: 'Герои и интересы',      url: './catalog.html',  img: require('@/img/cat10.svg') },
          },
          //Для мальчиков
          4: {
            0: { title: 'Одежда и обувь',        url: './catalog.html',  img: require('@/img/cat1.svg')  },
            1: { title: 'Игрушки и игры',        url: './catalog.html',  img: require('@/img/cat2.svg')  },
            2: { title: 'Детская комната',       url: './catalog.html',  img: require('@/img/cat3.svg')  },
            3: { title: 'Коляски и автокресла',  url: './catalog.html',  img: require('@/img/cat4.svg')  },
            8: { title: 'Товары для мам',        url: './catalog.html',  img: require('@/img/cat9.svg')  },
            9: { title: 'Герои и интересы',      url: './catalog.html',  img: require('@/img/cat10.svg') },
          },
          //Для девочек
          5: {
            0: { title: 'Одежда и обувь',        url: './catalog.html',  img: require('@/img/cat1.svg')  },
            2: { title: 'Детская комната',       url: './catalog.html',  img: require('@/img/cat3.svg')  },
            3: { title: 'Коляски и автокресла',  url: './catalog.html',  img: require('@/img/cat4.svg')  },
            4: { title: 'Подгузники и гигиена',  url: './catalog.html',  img: require('@/img/cat5.svg')  },
            8: { title: 'Товары для мам',        url: './catalog.html',  img: require('@/img/cat9.svg')  },
            9: { title: 'Герои и интересы',      url: './catalog.html',  img: require('@/img/cat10.svg') },
          }
      },
      catalogRight: {
        0: {
          0: { 
            0: {
              title: 'Одежда1',
              url: './category00.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек',
              url: './category01.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Жилеты', url: './category.html' },
                5: { title: 'Кардиганы', url: './category.html' },
                6: { title: 'Комбинезоны', url: './category.html' },
                7: { title: 'Комплекты', url: './category.html' },
                8: { title: 'Платья', url: './category.html' },
                9: { title: 'Полукомбинезоны', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков',
              url: './category02.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек',
              url: './category03.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков',
              url: './category04.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей',
              url: './category05.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            }
          },
          1: {
            0: {
              title: 'Игрушки для ванной111',
              url: './category10.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек2',
              url: './category11.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков2',
              url: './category12.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек2',
              url: './category13.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков2',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей2',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          2: {
            0: {
              title: 'Верхняя одежда',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          3: {
            0: {
              title: 'Верхняя одежда4',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей4',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          4: {
            0: {
              title: 'Верхняя одежда5',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей5',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          5: {
            0: {
              title: 'Верхняя одежда6',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей6',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          6: {
            0: {
              title: 'Верхняя одежда',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          7: {
            0: {
              title: 'Верхняя одежда4',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей4',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          8: {
            0: {
              title: 'Верхняя одежда5',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей5',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          9: {
            0: {
              title: 'Верхняя одежда6',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей6',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
        },
        1: {
          0: {
            0: {
              title: 'Игрушки для ванной',
              url: './sale10.html',
              child: {
                0: { title: 'Игрушка1', url: './category.html' },
                1: { title: 'Игрушка2', url: './category.html' },
                2: { title: 'Игрушка3', url: './category.html' },
              }
            },
            1: {
              title: 'Игрушечки',
              url: './sale11.html',
              child: {
                0: { title: 'Игрушечки1', url: './category.html' },
                1: { title: 'Игрушечки2', url: './category.html' },
                2: { title: 'Игрушечки3', url: './category.html' },
                3: { title: 'Игрушечки4', url: './category.html' },
                4: { title: 'Игрушечки5', url: './category.html' },
                5: { title: 'Игрушечки6', url: './category.html' },
                6: { title: 'Игрушечки7', url: './category.html' },
                7: { title: 'Игрушечки8', url: './category.html' },
                8: { title: 'Игрушечки9', url: './category.html' },
                9: { title: 'Игрушечки10', url: './category.html' }
              }
            },
          },
          1: { 
            0: {
              title: 'Игрушки для детей',
              url: './category00.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков22', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек2',
              url: './category01.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Жилеты', url: './category.html' },
                5: { title: 'Кардиганы', url: './category.html' },
                6: { title: 'Комбинезоны', url: './category.html' },
                7: { title: 'Комплекты', url: './category.html' },
                8: { title: 'Платья', url: './category.html' },
                9: { title: 'Полукомбинезоны', url: './category.html' }
              }
            },
            2: {
              title: 'Обувь для девочек',
              url: './category03.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            }
          },
          2: {
            0: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            1: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            2: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
        },
        2: {
          0: { 
            0: {
              title: 'Одежда2',
              url: './category00.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков22', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек2',
              url: './category01.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Жилеты', url: './category.html' },
                5: { title: 'Кардиганы', url: './category.html' },
                6: { title: 'Комбинезоны', url: './category.html' },
                7: { title: 'Комплекты', url: './category.html' },
                8: { title: 'Платья', url: './category.html' },
                9: { title: 'Полукомбинезоны', url: './category.html' }
              }
            },
            2: {
              title: 'Обувь для девочек',
              url: './category03.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            }
          },
          1: {
            0: {
              title: 'Игрушки для ванной',
              url: './category10.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек2',
              url: './category11.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
          },
          2: {
            0: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            1: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            2: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          3: {
            0: {
              title: 'Верхняя одежда4',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей4',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          4: {
            0: {
              title: 'Верхняя одежда5',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей5',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          5: {
            0: {
              title: 'Верхняя одежда6',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей6',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          6: {
            0: {
              title: 'Верхняя одежда',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          7: {
            0: {
              title: 'Верхняя одежда4',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей4',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          8: {
            0: {
              title: 'Верхняя одежда5',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей5',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          9: {
            0: {
              title: 'Верхняя одежда6',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей6',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
        },
        3: {
          0: { 
            0: {
              title: 'Одежда2',
              url: './category00.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков22', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек2',
              url: './category01.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Жилеты', url: './category.html' },
                5: { title: 'Кардиганы', url: './category.html' },
                6: { title: 'Комбинезоны', url: './category.html' },
                7: { title: 'Комплекты', url: './category.html' },
                8: { title: 'Платья', url: './category.html' },
                9: { title: 'Полукомбинезоны', url: './category.html' }
              }
            },
            2: {
              title: 'Обувь для девочек',
              url: './category03.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            }
          },
          1: {
            0: {
              title: 'Игрушки для ванной',
              url: './category10.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек2',
              url: './category11.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
          },
          2: {
            0: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            1: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            2: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          3: {
            0: {
              title: 'Верхняя одежда4',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей4',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          4: {
            0: {
              title: 'Верхняя одежда5',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей5',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          5: {
            0: {
              title: 'Верхняя одежда6',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей6',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          6: {
            0: {
              title: 'Верхняя одежда',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          7: {
            0: {
              title: 'Верхняя одежда4',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей4',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          8: {
            0: {
              title: 'Верхняя одежда5',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей5',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          9: {
            0: {
              title: 'Верхняя одежда6',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей6',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
        },
        4: {
          0: { 
            0: {
              title: 'Одежда2',
              url: './category00.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков22', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек2',
              url: './category01.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Жилеты', url: './category.html' },
                5: { title: 'Кардиганы', url: './category.html' },
                6: { title: 'Комбинезоны', url: './category.html' },
                7: { title: 'Комплекты', url: './category.html' },
                8: { title: 'Платья', url: './category.html' },
                9: { title: 'Полукомбинезоны', url: './category.html' }
              }
            },
            2: {
              title: 'Обувь для девочек',
              url: './category03.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            }
          },
          1: {
            0: {
              title: 'Игрушки для ванной',
              url: './category10.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек2',
              url: './category11.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
          },
          2: {
            0: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            1: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            2: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          3: {
            0: {
              title: 'Верхняя одежда4',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей4',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          4: {
            0: {
              title: 'Верхняя одежда5',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей5',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          5: {
            0: {
              title: 'Верхняя одежда6',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей6',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          6: {
            0: {
              title: 'Верхняя одежда',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          7: {
            0: {
              title: 'Верхняя одежда4',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей4',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          8: {
            0: {
              title: 'Верхняя одежда5',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей5',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          9: {
            0: {
              title: 'Верхняя одежда6',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей6',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
        },
        5: {
          0: { 
            0: {
              title: 'Одежда2',
              url: './category00.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков22', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек2',
              url: './category01.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Жилеты', url: './category.html' },
                5: { title: 'Кардиганы', url: './category.html' },
                6: { title: 'Комбинезоны', url: './category.html' },
                7: { title: 'Комплекты', url: './category.html' },
                8: { title: 'Платья', url: './category.html' },
                9: { title: 'Полукомбинезоны', url: './category.html' }
              }
            },
            2: {
              title: 'Обувь для девочек',
              url: './category03.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            }
          },
          1: {
            0: {
              title: 'Игрушки для ванной',
              url: './category10.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек2',
              url: './category11.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
          },
          2: {
            0: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            1: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            2: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          3: {
            0: {
              title: 'Верхняя одежда4',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей4',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          4: {
            0: {
              title: 'Верхняя одежда5',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей5',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          5: {
            0: {
              title: 'Верхняя одежда6',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей6',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          6: {
            0: {
              title: 'Верхняя одежда',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков3',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей3',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          7: {
            0: {
              title: 'Верхняя одежда4',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков4',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей4',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          8: {
            0: {
              title: 'Верхняя одежда5',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков5',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей5',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
          9: {
            0: {
              title: 'Верхняя одежда6',
              url: './category.html',
              child: {
                0: { title: 'Верхняя одежда для мальчиков', url: './category.html' },
                1: { title: 'Верхняя одежда для девочек', url: './category.html' },
                2: { title: 'Верхняя одежда для малышей', url: './category.html' },
              }
            },
            1: {
              title: 'Одежда для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Блузки', url: './category.html' },
                1: { title: 'Брюки', url: './category.html' },
                2: { title: 'Джемперы', url: './category.html' },
                3: { title: 'Джинсы', url: './category.html' },
                4: { title: 'Кардиганы', url: './category.html' },
                5: { title: 'Блузки', url: './category.html' },
                6: { title: 'Брюки', url: './category.html' },
                7: { title: 'Джемперы', url: './category.html' },
                8: { title: 'Джинсы', url: './category.html' },
                9: { title: 'Кардиганы', url: './category.html' }
              }
            },
            2: {
              title: 'Одежда для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Брюки', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Рубашки', url: './category.html' },
                4: { title: 'Толстовки', url: './category.html' },
                5: { title: 'Брюки', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Рубашки', url: './category.html' },
                9: { title: 'Толстовки', url: './category.html' }
              }
            },
            3: {
              title: 'Обувь для девочек6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            4: {
              title: 'Обувь для мальчиков6',
              url: './category.html',
              child: {
                0: { title: 'Анатомическая обувь', url: './category.html' },
                1: { title: 'Ботинки', url: './category.html' },
                2: { title: 'Домашняя обувь', url: './category.html' },
                3: { title: 'Кроссовки', url: './category.html' },
                4: { title: 'Резиновые сапоги', url: './category.html' },
              }
            },
            5: {
              title: 'Одежда для малышей6',
              url: './category.html',
              child: {
                0: { title: 'Боди', url: './category.html' },
                1: { title: 'Джемперы', url: './category.html' },
                2: { title: 'Джинсы', url: './category.html' },
                3: { title: 'Кардиганы', url: './category.html' },
                4: { title: 'Комбинезоны', url: './category.html' },
                5: { title: 'Боди', url: './category.html' },
                6: { title: 'Джемперы', url: './category.html' },
                7: { title: 'Джинсы', url: './category.html' },
                8: { title: 'Кардиганы', url: './category.html' },
                9: { title: 'Комбинезоны', url: './category.html' }
              }
            },
          },
        }
      },
      catalogTopMenu: [],
      catalogLeftMenu: [],
      catalogRightMenu: [],
      catalogMobile: [],
      search: false
    }
  },
  created() {
    this.width = document.documentElement.clientWidth
    window.addEventListener('resize', this.updateWidth)
  },
  methods: {
    openMenu(index, event) {
      this.currentTop = index
      this.current = 0
      this.show = true
      this.$nextTick(() => {
        this.$refs.general.style.height = this.$refs.generalUL.clientHeight + 5 + 'px';
        this.$refs.generalUL.style.opacity = 0
        setTimeout(() => {
          this.$refs.generalUL.style.opacity = 1
        }, 300);
      })
    },
    showSubMenu(index) {
      this.current = index
    },
    closeMenu() {
      this.currentTop = 0
      this.current = 0
      this.show = false
    },
    showMenuMobile(index,group) {
      this.group = group
      this.currentMobile = index
      this.slide = true
      this.parrent = this.catalog[this.currentMobile].title
      this.parrentURL = this.catalog[this.currentMobile].url
      if (window.pageYOffset > 20) document.querySelector('.nav-mobile').scrollIntoView({block: "start", behavior: "smooth"})
    },
    showMenuMobile1(index) {
      !this.group ? this.currentMobile = 0 : ''
      this.currentTop = index
      this.slide1 = true
      this.parrent = this.catalogLeft[this.currentMobile][index].title
      this.parrentURL = this.catalogLeft[this.currentMobile][index].url
      if (window.pageYOffset > 20) document.querySelector('.nav-mobile').scrollIntoView({block: "start", behavior: "smooth"})
    },
    showMenuMobile2(index) {
      this.current = index
      this.parrent = this.catalogRight[this.currentMobile][this.currentTop][index].title
      this.parrentURL = this.catalogRight[this.currentMobile][this.currentTop][index].url
      this.slide2 = true
      if (window.pageYOffset > 20) document.querySelector('.nav-mobile').scrollIntoView({block: "start", behavior: "smooth"})
    },
    backToSubMenu() {
      this.slide = false
      this.group = false
    },
    backToSubMenu2() {
      !this.group ? this.parrent = this.catalog[this.currentMobile].title : this.parrent = this.catalog[this.currentMobile].title
      this.slide1 = false
    },
    backToSubMenu3() {
      this.parrent = this.catalogLeft[this.currentMobile][this.currentTop].title
      this.parrentURL = this.catalogLeft[this.currentMobile][this.currentTop].url
      this.slide2 = false
    },
    closeAll() {
      this.group = false
      this.slide2 = false
      this.slide1 = false
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
      this.width <= 991   ? this.desctop = false : this.desctop = true
      this.width > 991    ? this.mobile = false : this.mobile = this.mobile
      this.search == true ? document.querySelector('body').classList.add('no-scroll') : document.querySelector('body').classList.remove('no-scroll')
      this.search == true ? this.$nextTick(() => this.$refs.search.focus()) : ''
      if (this.width > 991 && this.width < 1199) {
        this.catalog[1].title = this.catalog[1].title2
        this.catalog[2].title = this.catalog[2].title2
        this.catalog[3].title = this.catalog[3].title2
        this.catalog[4].title = this.catalog[4].title2
        this.catalog[5].title = this.catalog[5].title2
      } else {
        this.catalog[1].title = this.catalog[1].title3
        this.catalog[2].title = this.catalog[2].title3
        this.catalog[3].title = this.catalog[3].title3
        this.catalog[4].title = this.catalog[4].title3
        this.catalog[5].title = this.catalog[5].title3
      }
    },
    cat() {
      return this.catalog[this.currentTop].title
    },
    title() {
      return this.catalogLeftMenu[this.current].title
    },
    topMenu() {
      return this.catalogTopMenu = this.catalog.filter(function (item, index) {
        if (index < 6) return item
      })
    },
    catalogMenu() {
      return this.catalogLeftMenu = this.catalogLeft[this.currentTop]
    },
    rightMenu(index) {
      this.catalogRightMenu = this.catalogRight[this.currentTop][this.current];
      for (let item in this.catalogRightMenu) {
        for (let count in this.catalogRightMenu[item].child) {
          if (count > 5) {
            delete this.catalogRightMenu[item].child[count]
          }
          if (count == 5) {
            this.catalogRightMenu[item].child[5].title = 'показать еще'
            this.catalogRightMenu[item].child[5].url = './category123.html'
            this.catalogRightMenu[item].child[5].more = true
          }
        }
      }
      return this.catalogRightMenu
    },
    mobileMenu() {
      return this.catalogTopMenu = this.catalog.filter(function (item, index) {
        if (index != 0) return item
      })
    },
    mobileMenuChild() {
      return this.catalogMobile = this.catalogLeft[this.currentMobile]
    },
    mobileMenuChild1() {
      return this.catalogMobile = this.catalogRight[this.currentMobile][this.currentTop]
    },
    mobileMenuChild2() {
      return this.catalogMobile = this.catalogRight[this.currentMobile][this.currentTop][this.current].child
    }
  }
}
</script>
