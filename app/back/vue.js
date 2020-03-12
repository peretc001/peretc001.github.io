let subMenu = new Vue({
    el: '.nav',
    data: {
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
            img: './img/submenu/1.png',
            t: 'Верхняя одежда',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: './img/submenu/2.png',
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
            img: './img/submenu/3.png',
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
            img: './img/submenu/4.png',
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
            img: './img/submenu/5.png',
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
            img: './img/submenu/6.png',
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
            img: './img/submenu/1.png',
            t: 'Верхняя одежда2',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: './img/submenu/2.png',
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
            img: './img/submenu/3.png',
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
            img: './img/submenu/4.png',
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
            img: './img/submenu/5.png',
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
            img: './img/submenu/6.png',
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
            img: './img/submenu/1.png',
            t: 'Верхняя одежда',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: './img/submenu/2.png',
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
            img: './img/submenu/3.png',
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
            img: './img/submenu/4.png',
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
            img: './img/submenu/5.png',
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
            img: './img/submenu/6.png',
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
            img: './img/submenu/1.png',
            t: 'Верхняя одежда4',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: './img/submenu/2.png',
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
            img: './img/submenu/3.png',
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
            img: './img/submenu/4.png',
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
            img: './img/submenu/5.png',
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
            img: './img/submenu/6.png',
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
            img: './img/submenu/1.png',
            t: 'Верхняя одежда5',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: './img/submenu/2.png',
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
            img: './img/submenu/3.png',
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
            img: './img/submenu/4.png',
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
            img: './img/submenu/5.png',
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
            img: './img/submenu/6.png',
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
            img: './img/submenu/1.png',
            t: 'Верхняя одежда6',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: './img/submenu/2.png',
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
            img: './img/submenu/3.png',
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
            img: './img/submenu/4.png',
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
            img: './img/submenu/5.png',
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
            img: './img/submenu/6.png',
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
            img: './img/submenu/1.png',
            t: 'Верхняя одежда',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: './img/submenu/2.png',
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
            img: './img/submenu/3.png',
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
            img: './img/submenu/4.png',
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
            img: './img/submenu/5.png',
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
            img: './img/submenu/6.png',
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
            img: './img/submenu/1.png',
            t: 'Верхняя одежда4',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: './img/submenu/2.png',
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
            img: './img/submenu/3.png',
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
            img: './img/submenu/4.png',
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
            img: './img/submenu/5.png',
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
            img: './img/submenu/6.png',
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
            img: './img/submenu/1.png',
            t: 'Верхняя одежда5',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: './img/submenu/2.png',
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
            img: './img/submenu/3.png',
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
            img: './img/submenu/4.png',
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
            img: './img/submenu/5.png',
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
            img: './img/submenu/6.png',
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
            img: './img/submenu/1.png',
            t: 'Верхняя одежда6',
            url: './category.html',
            child: {
              0: { t: 'Верхняя одежда для мальчиков', url: './category.html' },
              1: { t: 'Верхняя одежда для девочек', url: './category.html' },
              2: { t: 'Верхняя одежда для малышей', url: './category.html' },
            }
          },
          1: {
            img: './img/submenu/2.png',
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
            img: './img/submenu/3.png',
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
            img: './img/submenu/4.png',
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
            img: './img/submenu/5.png',
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
            img: './img/submenu/6.png',
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
  })