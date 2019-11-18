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
          ]
        },
        frosted: {
          name: 'Иней',
          desc: 'Иней - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            require('@/assets/img/step1/frosted/1.jpg'),
            require('@/assets/img/step1/frosted/2.jpg'),
            require('@/assets/img/step1/frosted/3.jpg'),
            require('@/assets/img/step1/frosted/4.jpg'),
            require('@/assets/img/step1/frosted/5.jpg')
          ]
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
          ]
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
          ]
        },
        oak: {
          name: 'Дуб',
          desc: 'Дуб - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            require('@/assets/img/step1/oak/1.jpg'),
            require('@/assets/img/step1/oak/2.jpg'),
            require('@/assets/img/step1/oak/3.jpg'),
            require('@/assets/img/step1/oak/4.jpg'),
            require('@/assets/img/step1/oak/5.jpg')
          ],
        },
        combi: {
          name: 'Комбинировынные',
          desc: 'Комбинировынные - Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Снова приставка она текстов домах щеке инициал ему маленький. Безорфографичный путь текста, текстов великий все силуэт вопрос своего рукопись они журчит коварный предупредила курсивных, что если. Алфавит его предупреждал языкового ipsum о безопасную дал свое, осталось пустился единственное снова страну!',
          images: [
            require('@/assets/img/step1/combi/1.jpg'),
            require('@/assets/img/step1/combi/2.jpg'),
            require('@/assets/img/step1/combi/3.jpg'),
            require('@/assets/img/step1/combi/4.jpg'),
            require('@/assets/img/step1/combi/5.jpg')
          ]
        }
      },
      size: 'small',
      range: '1',
      selected_forms: {
        name: 'plexiglass',
        current: 'plexiglass1',
        img: require('@/assets/img/step2/1.png'),
        width: '150.00',
        height: '200.00'
      },
      forms: {
        1: require('@/assets/img/step2/1.png'),
        2: require('@/assets/img/step2/2.png'),
        3: require('@/assets/img/step2/3.png'),
        4: require('@/assets/img/step2/4.png'),
        5: require('@/assets/img/step2/5.png'),
        6: require('@/assets/img/step2/6.png'),
        7: require('@/assets/img/step2/7.png'),
        8: require('@/assets/img/step2/8.png'),
        9: require('@/assets/img/step2/9.png'),
        10: require('@/assets/img/step2/10.png'),
        11: require('@/assets/img/step2/11.png'),
        12: require('@/assets/img/step2/12.png'),
        13: require('@/assets/img/step2/13.png'),
        14: require('@/assets/img/step2/14.png'),
        15: require('@/assets/img/step2/15.png'),
        16: require('@/assets/img/step2/16.png'),
        17: require('@/assets/img/step2/17.png'),
        18: require('@/assets/img/step2/18.png'),
        19: require('@/assets/img/step2/19.png'),
        20: require('@/assets/img/step2/20.png'),
        21: require('@/assets/img/step2/21.png'),
        22: require('@/assets/img/step2/22.png'),
        23: require('@/assets/img/step2/23.png'),
        24: require('@/assets/img/step2/24.png'),
        25: require('@/assets/img/step2/25.png')
      },
      forms_img: {
        plexiglass: {
          plexiglass1: require('@/assets/img/step3/plexiglass/1.png'),
          plexiglass2: require('@/assets/img/step3/plexiglass/2.png'),
          plexiglass3: require('@/assets/img/step3/plexiglass/3.png'),
          plexiglass4: require('@/assets/img/step3/plexiglass/4.png'),
          plexiglass5: require('@/assets/img/step3/plexiglass/5.png'),
          plexiglass6: require('@/assets/img/step3/plexiglass/6.png'),
          plexiglass7: require('@/assets/img/step3/plexiglass/7.png'),
          plexiglass8: require('@/assets/img/step3/plexiglass/8.png'),
          plexiglass9: require('@/assets/img/step3/plexiglass/9.png'),
          plexiglass10: require('@/assets/img/step3/plexiglass/10.png'),
          plexiglass11: require('@/assets/img/step3/plexiglass/11.png'),
          plexiglass12: require('@/assets/img/step3/plexiglass/12.png'),
          plexiglass13: require('@/assets/img/step3/plexiglass/13.png'),
          plexiglass14: require('@/assets/img/step3/plexiglass/14.png'),
          plexiglass15: require('@/assets/img/step3/plexiglass/15.png'),
          plexiglass16: require('@/assets/img/step3/plexiglass/16.png'),
          plexiglass17: require('@/assets/img/step3/plexiglass/17.png'),
          plexiglass18: require('@/assets/img/step3/plexiglass/18.png'),
          plexiglass19: require('@/assets/img/step3/plexiglass/19.png'),
          plexiglass20: require('@/assets/img/step3/plexiglass/20.png'),
          plexiglass21: require('@/assets/img/step3/plexiglass/21.png'),
          plexiglass22: require('@/assets/img/step3/plexiglass/22.png'),
          plexiglass23: require('@/assets/img/step3/plexiglass/23.png'),
          plexiglass24: require('@/assets/img/step3/plexiglass/24.png'),
          plexiglass25: require('@/assets/img/step3/plexiglass/25.png')
        },
        frosted: {
          frosted1: require('@/assets/img/step3/frosted/1.png'),
          frosted2: require('@/assets/img/step3/frosted/2.png'),
          frosted3: require('@/assets/img/step3/frosted/3.png'),
          frosted4: require('@/assets/img/step3/frosted/4.png'),
          frosted5: require('@/assets/img/step3/frosted/5.png'),
          frosted6: require('@/assets/img/step3/frosted/6.png'),
          frosted7: require('@/assets/img/step3/frosted/7.png'),
          frosted8: require('@/assets/img/step3/frosted/8.png'),
          frosted9: require('@/assets/img/step3/frosted/9.png'),
          frosted10: require('@/assets/img/step3/frosted/10.png'),
          frosted11: require('@/assets/img/step3/frosted/11.png'),
          frosted12: require('@/assets/img/step3/frosted/12.png'),
          frosted13: require('@/assets/img/step3/frosted/13.png'),
          frosted14: require('@/assets/img/step3/frosted/14.png'),
          frosted15: require('@/assets/img/step3/frosted/15.png'),
          frosted16: require('@/assets/img/step3/frosted/16.png'),
          frosted17: require('@/assets/img/step3/frosted/17.png'),
          frosted18: require('@/assets/img/step3/frosted/18.png'),
          frosted19: require('@/assets/img/step3/frosted/19.png'),
          frosted20: require('@/assets/img/step3/frosted/20.png'),
          frosted21: require('@/assets/img/step3/frosted/21.png'),
          frosted22: require('@/assets/img/step3/frosted/22.png'),
          frosted23: require('@/assets/img/step3/frosted/23.png'),
          frosted24: require('@/assets/img/step3/frosted/24.png'),
          frosted25: require('@/assets/img/step3/frosted/25.png')
        },
        aluminium: {
          aluminium1: require('@/assets/img/step3/aluminium/1.png'),
          aluminium2: require('@/assets/img/step3/aluminium/2.png'),
          aluminium3: require('@/assets/img/step3/aluminium/3.png'),
          aluminium4: require('@/assets/img/step3/aluminium/4.png'),
          aluminium5: require('@/assets/img/step3/aluminium/5.png'),
          aluminium6: require('@/assets/img/step3/aluminium/6.png'),
          aluminium7: require('@/assets/img/step3/aluminium/7.png'),
          aluminium8: require('@/assets/img/step3/aluminium/8.png'),
          aluminium9: require('@/assets/img/step3/aluminium/9.png'),
          aluminium10: require('@/assets/img/step3/aluminium/10.png'),
          aluminium11: require('@/assets/img/step3/aluminium/11.png'),
          aluminium12: require('@/assets/img/step3/aluminium/12.png'),
          aluminium13: require('@/assets/img/step3/aluminium/13.png'),
          aluminium14: require('@/assets/img/step3/aluminium/14.png'),
          aluminium15: require('@/assets/img/step3/aluminium/15.png'),
          aluminium16: require('@/assets/img/step3/aluminium/16.png'),
          aluminium17: require('@/assets/img/step3/aluminium/17.png'),
          aluminium18: require('@/assets/img/step3/aluminium/18.png'),
          aluminium19: require('@/assets/img/step3/aluminium/19.png'),
          aluminium20: require('@/assets/img/step3/aluminium/20.png'),
          aluminium21: require('@/assets/img/step3/aluminium/21.png'),
          aluminium22: require('@/assets/img/step3/aluminium/22.png'),
          aluminium23: require('@/assets/img/step3/aluminium/23.png'),
          aluminium24: require('@/assets/img/step3/aluminium/24.png'),
          aluminium25: require('@/assets/img/step3/aluminium/25.png')
        },
        oak: {
          oak1: require('@/assets/img/step3/oak/1.png'),
          oak2: require('@/assets/img/step3/oak/2.png'),
          oak3: require('@/assets/img/step3/oak/3.png'),
          oak4: require('@/assets/img/step3/oak/4.png'),
          oak5: require('@/assets/img/step3/oak/5.png')
        },
        brass: {
          brass1: require('@/assets/img/step3/brass/1.png'),
          brass2: require('@/assets/img/step3/brass/2.png'),
          brass3: require('@/assets/img/step3/brass/3.png'),
          brass4: require('@/assets/img/step3/brass/4.png'),
          brass5: require('@/assets/img/step3/brass/5.png'),
          brass6: require('@/assets/img/step3/brass/6.png'),
          brass7: require('@/assets/img/step3/brass/7.png'),
          brass8: require('@/assets/img/step3/brass/8.png'),
          brass9: require('@/assets/img/step3/brass/9.png'),
          brass10: require('@/assets/img/step3/brass/10.png'),
          brass11: require('@/assets/img/step3/brass/11.png'),
          brass12: require('@/assets/img/step3/brass/12.png'),
          brass13: require('@/assets/img/step3/brass/13.png'),
          brass14: require('@/assets/img/step3/brass/14.png'),
          brass15: require('@/assets/img/step3/brass/15.png'),
          brass16: require('@/assets/img/step3/brass/16.png'),
          brass17: require('@/assets/img/step3/brass/17.png'),
          brass18: require('@/assets/img/step3/brass/18.png'),
          brass19: require('@/assets/img/step3/brass/19.png'),
          brass20: require('@/assets/img/step3/brass/20.png'),
          brass21: require('@/assets/img/step3/brass/21.png'),
          brass22: require('@/assets/img/step3/brass/22.png'),
          brass23: require('@/assets/img/step3/brass/23.png'),
          brass24: require('@/assets/img/step3/brass/24.png'),
          brass25: require('@/assets/img/step3/brass/25.png')
        },
        combi: {
          combi1: require('@/assets/img/step3/combi/1_1.png'),
          combi1_2: require('@/assets/img/step3/combi/1_2.png'),
          combi1_3: require('@/assets/img/step3/combi/1_3.png'),
          combi1_4: require('@/assets/img/step3/combi/1_4.png'),
          combi1_5: require('@/assets/img/step3/combi/1_5.png'),
          combi1_6: require('@/assets/img/step3/combi/1_6.png'),

          combi2: require('@/assets/img/step3/combi/2_1.png'),
          combi2_2: require('@/assets/img/step3/combi/2_2.png'),
          combi2_3: require('@/assets/img/step3/combi/2_3.png'),
          combi2_4: require('@/assets/img/step3/combi/2_4.png'),
          combi2_5: require('@/assets/img/step3/combi/2_5.png'),
          combi2_6: require('@/assets/img/step3/combi/2_6.png'),

          combi3: require('@/assets/img/step3/combi/3_1.png'),
          combi3_2: require('@/assets/img/step3/combi/3_2.png'),
          combi3_3: require('@/assets/img/step3/combi/3_3.png'),
          combi3_4: require('@/assets/img/step3/combi/3_4.png'),
          combi3_5: require('@/assets/img/step3/combi/3_5.png'),
          combi3_6: require('@/assets/img/step3/combi/3_6.png'),

          combi4: require('@/assets/img/step3/combi/4_1.png'),
          combi4_2: require('@/assets/img/step3/combi/4_2.png'),
          combi4_3: require('@/assets/img/step3/combi/4_3.png'),
          combi4_4: require('@/assets/img/step3/combi/4_4.png'),
          combi4_5: require('@/assets/img/step3/combi/4_5.png'),
          combi4_6: require('@/assets/img/step3/combi/4_6.png'),

          combi5: require('@/assets/img/step3/combi/5_1.png'),
          combi5_2: require('@/assets/img/step3/combi/5_2.png'),
          combi5_3: require('@/assets/img/step3/combi/5_3.png'),
          combi5_4: require('@/assets/img/step3/combi/5_4.png'),
          combi5_5: require('@/assets/img/step3/combi/5_5.png'),
          combi5_6: require('@/assets/img/step3/combi/5_6.png'),

          combi6: require('@/assets/img/step3/combi/6_1.png'),
          combi6_2: require('@/assets/img/step3/combi/6_2.png'),
          combi6_3: require('@/assets/img/step3/combi/6_3.png'),
          combi6_4: require('@/assets/img/step3/combi/6_4.png'),
          combi6_5: require('@/assets/img/step3/combi/6_5.png'),
          combi6_6: require('@/assets/img/step3/combi/6_6.png'),

          combi7: require('@/assets/img/step3/combi/7_1.png'),
          combi7_2: require('@/assets/img/step3/combi/7_2.png'),
          combi7_3: require('@/assets/img/step3/combi/7_3.png'),
          combi7_4: require('@/assets/img/step3/combi/7_4.png'),
          combi7_5: require('@/assets/img/step3/combi/7_5.png'),
          combi7_6: require('@/assets/img/step3/combi/7_6.png'),

          combi8: require('@/assets/img/step3/combi/8_1.png'),
          combi8_2: require('@/assets/img/step3/combi/8_2.png'),
          combi8_3: require('@/assets/img/step3/combi/8_3.png'),
          combi8_4: require('@/assets/img/step3/combi/8_4.png'),
          combi8_5: require('@/assets/img/step3/combi/8_5.png'),
          combi8_6: require('@/assets/img/step3/combi/8_6.png'),

          combi9: require('@/assets/img/step3/combi/9_1.png'),
          combi9_2: require('@/assets/img/step3/combi/9_2.png'),
          combi9_3: require('@/assets/img/step3/combi/9_3.png'),
          combi9_4: require('@/assets/img/step3/combi/9_4.png'),
          combi9_5: require('@/assets/img/step3/combi/9_5.png'),
          combi9_6: require('@/assets/img/step3/combi/9_6.png'),

          combi10: require('@/assets/img/step3/combi/10_1.png'),
          combi10_2: require('@/assets/img/step3/combi/10_2.png'),
          combi10_3: require('@/assets/img/step3/combi/10_3.png'),
          combi10_4: require('@/assets/img/step3/combi/10_4.png'),
          combi10_5: require('@/assets/img/step3/combi/10_5.png'),
          combi10_6: require('@/assets/img/step3/combi/10_6.png'),

          combi11: require('@/assets/img/step3/combi/11_1.png'),
          combi11_2: require('@/assets/img/step3/combi/11_2.png'),
          combi11_3: require('@/assets/img/step3/combi/11_3.png'),
          combi11_4: require('@/assets/img/step3/combi/11_4.png'),
          combi11_5: require('@/assets/img/step3/combi/11_5.png'),
          combi11_6: require('@/assets/img/step3/combi/11_6.png'),

          combi12: require('@/assets/img/step3/combi/12_1.png'),
          combi12_2: require('@/assets/img/step3/combi/12_2.png'),
          combi12_3: require('@/assets/img/step3/combi/12_3.png'),
          combi12_4: require('@/assets/img/step3/combi/12_4.png'),
          combi12_5: require('@/assets/img/step3/combi/12_5.png'),
          combi12_6: require('@/assets/img/step3/combi/12_6.png'),

          combi13: require('@/assets/img/step3/combi/13_1.png'),
          combi13_2: require('@/assets/img/step3/combi/13_2.png'),
          combi13_3: require('@/assets/img/step3/combi/13_3.png'),
          combi13_4: require('@/assets/img/step3/combi/13_4.png'),
          combi13_5: require('@/assets/img/step3/combi/13_5.png'),
          combi13_6: require('@/assets/img/step3/combi/13_6.png'),

          combi14: require('@/assets/img/step3/combi/14_1.png'),
          combi14_2: require('@/assets/img/step3/combi/14_2.png'),
          combi14_3: require('@/assets/img/step3/combi/14_3.png'),
          combi14_4: require('@/assets/img/step3/combi/14_4.png'),
          combi14_5: require('@/assets/img/step3/combi/14_5.png'),
          combi14_6: require('@/assets/img/step3/combi/14_6.png'),

          combi15: require('@/assets/img/step3/combi/15_1.png'),
          combi15_2: require('@/assets/img/step3/combi/15_2.png'),
          combi15_3: require('@/assets/img/step3/combi/15_3.png'),
          combi15_4: require('@/assets/img/step3/combi/15_4.png'),
          combi15_5: require('@/assets/img/step3/combi/15_5.png'),
          combi15_6: require('@/assets/img/step3/combi/15_6.png'),

          combi16: require('@/assets/img/step3/combi/16_1.png'),
          combi16_2: require('@/assets/img/step3/combi/16_2.png'),
          combi16_3: require('@/assets/img/step3/combi/16_3.png'),
          combi16_4: require('@/assets/img/step3/combi/16_4.png'),
          combi16_5: require('@/assets/img/step3/combi/16_5.png'),
          combi16_6: require('@/assets/img/step3/combi/16_6.png'),

          combi17: require('@/assets/img/step3/combi/17_1.png'),
          combi17_2: require('@/assets/img/step3/combi/17_2.png'),
          combi17_3: require('@/assets/img/step3/combi/17_3.png'),
          combi17_4: require('@/assets/img/step3/combi/17_4.png'),
          combi17_5: require('@/assets/img/step3/combi/17_5.png'),
          combi17_6: require('@/assets/img/step3/combi/17_6.png'),

          combi18: require('@/assets/img/step3/combi/18_1.png'),
          combi18_2: require('@/assets/img/step3/combi/18_2.png'),
          combi18_3: require('@/assets/img/step3/combi/18_3.png'),
          combi18_4: require('@/assets/img/step3/combi/18_4.png'),
          combi18_5: require('@/assets/img/step3/combi/18_5.png'),
          combi18_6: require('@/assets/img/step3/combi/18_6.png'),

          combi19: require('@/assets/img/step3/combi/19_1.png'),
          combi19_2: require('@/assets/img/step3/combi/19_2.png'),
          combi19_3: require('@/assets/img/step3/combi/19_3.png'),
          combi19_4: require('@/assets/img/step3/combi/19_4.png'),
          combi19_5: require('@/assets/img/step3/combi/19_5.png'),
          combi19_6: require('@/assets/img/step3/combi/19_6.png'),

          combi20: require('@/assets/img/step3/combi/20_1.png'),
          combi20_2: require('@/assets/img/step3/combi/20_2.png'),
          combi20_3: require('@/assets/img/step3/combi/20_3.png'),
          combi20_4: require('@/assets/img/step3/combi/20_4.png'),
          combi20_5: require('@/assets/img/step3/combi/20_5.png'),
          combi20_6: require('@/assets/img/step3/combi/20_6.png'),

          combi21: require('@/assets/img/step3/combi/21_1.png'),
          combi21_2: require('@/assets/img/step3/combi/21_2.png'),
          combi21_3: require('@/assets/img/step3/combi/21_3.png'),
          combi21_4: require('@/assets/img/step3/combi/21_4.png'),
          combi21_5: require('@/assets/img/step3/combi/21_5.png'),
          combi21_6: require('@/assets/img/step3/combi/21_6.png'),

          combi22: require('@/assets/img/step3/combi/22_1.png'),
          combi22_2: require('@/assets/img/step3/combi/22_2.png'),
          combi22_3: require('@/assets/img/step3/combi/22_3.png'),
          combi22_4: require('@/assets/img/step3/combi/22_4.png'),
          combi22_5: require('@/assets/img/step3/combi/22_5.png'),
          combi22_6: require('@/assets/img/step3/combi/22_6.png'),

          combi23: require('@/assets/img/step3/combi/23_1.png'),
          combi23_2: require('@/assets/img/step3/combi/23_2.png'),
          combi23_3: require('@/assets/img/step3/combi/23_3.png'),
          combi23_4: require('@/assets/img/step3/combi/23_4.png'),
          combi23_5: require('@/assets/img/step3/combi/23_5.png'),
          combi23_6: require('@/assets/img/step3/combi/23_6.png'),

          combi24: require('@/assets/img/step3/combi/24_1.png'),
          combi24_2: require('@/assets/img/step3/combi/24_2.png'),
          combi24_3: require('@/assets/img/step3/combi/24_3.png'),
          combi24_4: require('@/assets/img/step3/combi/24_4.png'),
          combi24_5: require('@/assets/img/step3/combi/24_5.png'),
          combi24_6: require('@/assets/img/step3/combi/24_6.png'),

          combi25: require('@/assets/img/step3/combi/25_1.png'),
          combi25_2: require('@/assets/img/step3/combi/25_2.png'),
          combi25_3: require('@/assets/img/step3/combi/25_3.png'),
          combi25_4: require('@/assets/img/step3/combi/25_4.png'),
          combi25_5: require('@/assets/img/step3/combi/25_5.png'),
          combi25_6: require('@/assets/img/step3/combi/25_6.png'),
        }
      },
      step3: {
        number: {
          number: '1',
          font: '1',
          size: '150',
          color: '#fff',
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        adress: {
          number: 'Красных',
          font: '1',
          size: '24',
          color: '#fff',
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        adressSecond: {
          number: 'Партизан',
          font: '1',
          size: '24',
          color: '#fff',
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        fonts: {
          1: 'Arial',
          2: 'Calibri',
          3: 'Freeset',
          4: 'Chicago',
          5: 'Gost',
          6: 'Evropa',
          7: 'GothamPro',
          8: 'Gothic',
          9: 'Impact',
          10: 'HRM',
          11: 'Bankrus'
        },
        colors: {
          black: {
            color: '#000000'
          },
          blue: {
            color: '#0000FF'
          },
          red: {
            color: '#FF0000'
          },
          white: {
            color: '#FFFFFF'
          }
        }
      },
      disabled: true,
      selected_number: '',
      selected_color: 'blue',
      selected_img: '',
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
      state.steps.selected_forms.current = value + '1'
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
      value.current_num != '' ? state.steps.selected_forms.current_num = value.current_num : ''
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
    setImg (state, value) {
      state.steps.selected_forms.img = value
    },
    setImg2 (state, value) {
      state.steps.selected_img = value
    },
    setColor (state, value) {
      state.steps.selected_color = value
    },
    setText (state, value) {
      state.steps.selected_number = value
    },
    setDisabled (state, value) {
      state.steps.disabled = false
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
