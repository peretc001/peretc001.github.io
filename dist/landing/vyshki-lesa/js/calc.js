// <![CDATA[
      function calc1(obj) {
      
          // объявление и задание значений переменных
          var v_visota = obj.visota.value; // высота
          var v_dlina = obj.dlina.value; // длина
          var v_kolvo_podemov = obj.kolvo_podemov.value; // кол-во подъемов
          var v_kolvo_yarus_s_nastil = obj.kolvo_yarus_s_nastil.value; // кол-во подъемов
      
          obj.dlina.value = Math.ceil(v_dlina / 3) * 3
          obj.visota.value = Math.ceil(v_visota / 2) * 2
      
          calc_square = v_visota * v_dlina;// рассчет площади и количества оборудования
          obj.square.value = calc_square; // площадь
      
              if(v_dlina > 0 ) { 
          calc_pyatki = Math.round((v_dlina / 3 + 1) * 2);
              }else {
                  calc_pyatki = 0
              }
          obj.kolvo_pyatki.value = calc_pyatki; // пятки
          if (v_visota < 8) {
              b = 0
          } else {
              b = 1
          }
      
      
          calc_gorizont = Math.round(v_visota * (v_dlina / 6));
          obj.kolvo_gorizont.value = calc_gorizont; // Горизонталь<span id="CmCaReT"></span>
      
          calc_diag = Math.round(v_visota * (v_dlina / 6));
          obj.kolvo_diag.value = calc_diag // Диагональ
      
          calc_rama_l = Math.round(v_visota / 2 * v_kolvo_podemov);
          obj.kolvo_rama_l.value = calc_rama_l // Рама с лестницей<span id="CmCaReT"></span>
      
          calc_rama_p = Math.round(calc_diag + v_visota / 2 - calc_rama_l);
          obj.kolvo_rama_p.value = calc_rama_p // Рама проходная
      
          calc_kolvo_nastil = Math.round(Math.ceil(v_dlina / 3) * 3 * v_kolvo_yarus_s_nastil);
          obj.kolvo_nastil.value = calc_kolvo_nastil; // настил
      
          calc_kolvo_rigel = Math.round(Math.ceil(v_dlina / 3) * 2 * v_kolvo_yarus_s_nastil);
          obj.kolvo_rigel.value = calc_kolvo_rigel; // ригель
      
          // calc_kronshtein = Math.round(b * (((v_visota - 8) / 2) * (v_dlina / 3 + 1)) / 2);
      
          calc_kronshtein = Math.round((calc_rama_l + calc_rama_p) / 2);
          obj.kolvo_kronshtein.value = calc_kronshtein; // кронштейн
      
          // рассчет сумм
          calc_cena_rama_p_n = obj.cena_rama_p_n.value
          calc_cena_rama_p_b = obj.cena_rama_p_b.value
          calc_sum_rama_p_n = Math.round(calc_rama_p * calc_cena_rama_p_n);
          calc_sum_rama_p_b = Math.round(calc_rama_p * calc_cena_rama_p_b);
          obj.sum_rama_p_b.value = calc_sum_rama_p_b // сумма рама проходная
          obj.sum_rama_p_n.value = calc_sum_rama_p_n // сумма рама проходная
      
          calc_cena_rama_l_n = obj.cena_rama_l_n.value
          calc_cena_rama_l_b = obj.cena_rama_l_b.value
          calc_sum_rama_l_n = Math.round(calc_rama_l * calc_cena_rama_l_n);
          calc_sum_rama_l_b = Math.round(calc_rama_l * calc_cena_rama_l_b);
          obj.sum_rama_l_b.value = calc_sum_rama_l_b // сумма рама с лестницей
          obj.sum_rama_l_n.value = calc_sum_rama_l_n // сумма рама с лестницей
      
          calc_cena_diag_n = obj.cena_diag_n.value
          calc_cena_diag_b = obj.cena_diag_b.value
          calc_sum_diag_n = Math.round(calc_diag * calc_cena_diag_n);
          calc_sum_diag_b = Math.round(calc_diag * calc_cena_diag_b);
          obj.sum_diag_b.value = calc_sum_diag_b // сумма диагональ
          obj.sum_diag_n.value = calc_sum_diag_n // сумма диагональ
      
          calc_cena_gorizont_n = obj.cena_gorizont_n.value
          calc_cena_gorizont_b = obj.cena_gorizont_b.value
          calc_sum_gorizont_n = Math.round(calc_gorizont * calc_cena_gorizont_n);
          calc_sum_gorizont_b = Math.round(calc_gorizont * calc_cena_gorizont_b);
          obj.sum_gorizont_b.value = calc_sum_gorizont_b // сумма горизонталь
          obj.sum_gorizont_n.value = calc_sum_gorizont_n // сумма горизонталь
      
          calc_cena_pyatki_n = obj.cena_pyatki_n.value
          calc_cena_pyatki_b = obj.cena_pyatki_b.value
          calc_sum_pyatki_n = Math.round(calc_pyatki * calc_cena_pyatki_n);
          calc_sum_pyatki_b = Math.round(calc_pyatki * calc_cena_pyatki_b);
          obj.sum_pyatki_b.value = calc_sum_pyatki_n // сумма пятки
          obj.sum_pyatki_n.value = calc_sum_pyatki_b // сумма пятки
      
          calc_cena_kronshtein_n = obj.cena_kronshtein_n.value
          calc_cena_kronshtein_b = obj.cena_kronshtein_b.value
          calc_sum_kronshtein_n = Math.round(calc_kronshtein * calc_cena_kronshtein_n);
          calc_sum_kronshtein_b = Math.round(calc_kronshtein * calc_cena_kronshtein_b);
          obj.sum_kronshtein_b.value = calc_sum_kronshtein_n // сумма кронштейн
          obj.sum_kronshtein_n.value = calc_sum_kronshtein_b // сумма кронштейн
      
          calc_sum_nastil_n = Math.round(obj.cena_nastil_n.value * calc_kolvo_nastil);
          calc_sum_nastil_b = Math.round(obj.cena_nastil_b.value * calc_kolvo_nastil);
          obj.sum_nastil_b.value = calc_sum_nastil_b; // настил
          obj.sum_nastil_n.value = calc_sum_nastil_n; // настил
      
          calc_sum_rigel_n = Math.round(obj.cena_rigel_n.value * calc_kolvo_rigel);
          calc_sum_rigel_b = Math.round(obj.cena_rigel_b.value * calc_kolvo_rigel);
          obj.sum_rigel_b.value = calc_sum_rigel_b; // ригель
          obj.sum_rigel_n.value = calc_sum_rigel_n; // ригель
      
      
          // сумма итого
          calc_itogo_sum_n = calc_sum_rama_p_n + calc_sum_rama_l_n + calc_sum_diag_n + calc_sum_gorizont_n + calc_sum_pyatki_n + calc_sum_kronshtein_n + calc_sum_rigel_n;
          calc_itogo_sum_b = calc_sum_rama_p_b + calc_sum_rama_l_b + calc_sum_diag_b + calc_sum_gorizont_b + calc_sum_pyatki_b + calc_sum_kronshtein_b + calc_sum_rigel_b;
          obj.itogo_sum_n.value = calc_itogo_sum_n // сумма итого<span id="CmCaReT"></span>
          obj.itogo_sum_b.value = calc_itogo_sum_b // сумма итого<span id="CmCaReT"></span>
          return false;
      }
      
      // ]]>

      $(function () {
         $('.calc').on('submit', function (event) {
             event.preventDefault();
         });
 
 
         $('.num_wrap > div').on('click', function() {
             var input = $(this).closest('.num_wrap').find('input'); // инпут
             var value = parseInt(input.val()) || 0; // получаем value инпута или 0
             if ($(this).hasClass('next')) {
                if(input.attr('id') == 'visota'){
                     if(value > 0) {
                       value = value - 2; // вычитаем из value 1
                     }else {
                       value = 0;
                     }
                }else if(input.attr('id') == 'dlina'){
                     if(value > 0) {
                       value = value - 3; // вычитаем из value 1
                     }else {
                       value = 0;
                     }
                }else {
                     if(value > 0) {
                       value = value - 1; // вычитаем из value 1
                     }else {
                       value = 0;
                     }
                }
                
             }
             if ($(this).hasClass('prev')) {
           
                  if(input.attr('id') == 'visota'){
                          value = value + 2; // прибавляем к value 1
                          
                }else if(input.attr('id') == 'dlina'){
                          value = value + 3; // прибавляем к value 1
                }else {
                         value = value + 1; // прибавляем к value 1
                }
             }
             input.val(value).change(); // выводим полученное value в инпут; триггер .change() - на случай, если на изменение этого инпута у вас уже объявлен еще какой-то обработчик
         });
     });