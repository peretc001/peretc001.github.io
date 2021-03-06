$(function() {

   $(".phone_mask").mask("+7(999)999-99-99");

   $('#myTab a').on('click', function (e) {
      e.preventDefault();
      $(this).tab('show');
   });
   $('.select-module').on('mousedown', function(e) {
      e.preventDefault();
   });
   $('.select-module').on('touchstart', function(e) {
      e.preventDefault();
   });

   //Форма  
   let form = document.querySelectorAll('.callback__form');
   form.forEach(item => {
      let formBtn = item.querySelector('.callback__form__button');
      let checkBtn = item.querySelector('.robot__check');

      formBtn.disabled = true;
      checkBtn.addEventListener('click', () => {
         checkBtn.classList.add('active');
      
         item.action = './thankyou.php';
         let input = document.createElement("input");
         input.setAttribute("type", "hidden");
         input.setAttribute("name", "human");
         input.setAttribute("value", "human");
         input.classList.add('human');
         console.log(typeof input);
         //
         item.appendChild(input);
         //
         formBtn.disabled = false;
      });
   });

   /* Показываем Дополнительные опции*/
   /////////////////// TAB1

   

   const showBlock = document.querySelectorAll('.calc-room-option-help');
   showBlock.forEach((item, index) => {
      item.style.display = 'none';
   });

   const showStep = document.querySelectorAll('.desc---step');
   showStep.forEach((item, index) => {
      item.addEventListener('click', () => {
         showBlock[index].style.display = 'block';
         setTimeout(() => {
            if( showBlock[index].style.display = 'block' )
            document.addEventListener('click', (e) => {
               if( e.target != showBlock[index] )
                  showBlock[index].style.display = 'none';
            })
         }, 10);
      });
   });

   const dopOption = document.querySelectorAll('.dop---option');
   dopOption.forEach((item, index) => {
      let calcRoomOptionHelp = document.querySelectorAll("i[name='dop-options-room']");

      calcRoomOptionHelp.forEach((item) => {
         item.addEventListener('click', (e) => {
               showBlock[index].style.display = 'block';
               let label = item.previousSibling.previousSibling.innerText;
               showBlock[index].innerHTML = `<p><b>${label}</b></p>
               <p>${dopOptionsRoomMas[label]}</p>`;
               setTimeout(() => {
                  if( showBlock[index].style.display = 'block' )
                  document.addEventListener('click', (e) => {
                     if( e.target != showBlock[index] )
                        showBlock[index].style.display = 'none';
                  })
               }, 10);
               
         });
      });
   })

   const stepDop = document.querySelectorAll('.step-dop');
   stepDop.forEach((item, index) => {
      item.addEventListener('click', () => {
         showBlock[index].innerHTML = '<p><b>Шаг пикселя</b></p><p>Шаг пикселя определяется минимальным расстоянием от зрителя до светодиодного экрана. Чем меньше шаг пикселя, тем выше разрешение у экрана. Например, (Шаг пикселя 10мм означает, что оптимально расстояние от зрителя до экрана будет составлять 10метров) Шаг 10мм=10м, шаг 8мм=8м и тд.</p>';
      });
   });
   

  var dopOptionsRoomMas = {
    "Управляющий компьютер" : "" ,
    "Отправляющий контроллер" : "" ,
    "Wi-Fi модуль" : "" ,
    "Датчик яркости" : "" ,
    "Датчик температуры" : "" ,
    "Видеопроцессор" :  "" ,
    "Электрощитовая" :  "" ,
    "Шефмонтаж" :  "" ,
    "Монтаж оборудования" : "" ,
    "Изгот. металлоконструкции" : "" ,
    "Монтаж металлоконструкций" : "" ,
    "Набор запасных частей" : ""
  }
   
   const tabs = document.querySelectorAll('.tab-pane');
   tabs.forEach(item => {
      const dopBtn = item.querySelector('.dop-btn')
      const dopParams = item.querySelector('.dop---option')

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
   })

   
   

   //Приводим сумму в красивый вид
   function prettify (num) {
      let n = num.toString();
      let separator = " ";
      return n.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + separator);
   }

   //////////////////////////////// TAB1
   //ФУНКЦИЯ Отправка формы и получение значений
   function sendFirst() {
      let data = $('.calc__ajax__form--first').serialize();
      $.ajax({
         method: "POST",
         url: "calc.php",
         data: data
      }).done(function(response) {

         let result = $.parseJSON(response);
         console.log(result);
         
         //Цена и площадь
         $('.calc__ajax__form--first .result-room-block-price__price').html(prettify(result.price) + ' Р');
         $('.calc__ajax__form--first .result-room-block-price__size').html(result.square + ' М <sup>2</sup>');
         
         //Ширина 
         let rangeWidth = $('.rangeWidthRoom').val();
         //Высота
         let rangeHeight = $('.rangeHeightRoom').val();
         $('.videoSize').html(rangeWidth + ' М x ' + rangeHeight + ' M');
         $('.videoSquare').html(result.square + ' М <sup>2</sup>');

         //Вставляем в следующие блоки ниже
         let smodule = $('.select-first-module').val();
         $('.caption-block-n').html(smodule);
         let stepName = $('.first---step---name').html(result.step_name);
         let stepSize = $('.first---step--size').html(result.pixel_w + ' x ' + result.pixel_y + ' px');
         $('.option-first-size').html(rangeWidth*1000 + ' x ' + rangeHeight*1000 + ' мм');
         let step = $('.select-first-step').val();
         $('.option-first-step').html(result.step + ' мм');
         $('.option-first-step__size').html(result.step_size);
         $('.option-first-step__ratio').html(result.step_ratio);
         $('.option-first-step__col').html(result.col);
         let garanty = result.garanty;
         let formYear = 'год';
         if (garanty > 1) {
         formYear = 'года';
         }
         $('.option-first-warranty').html(garanty + ' ' + formYear);

         $('.content---first---img').attr('src', './img/tab1/step---' + result.step + '.jpg');

         //Total
         $('.option-first-settingup').html(prettify(result.settingup) + ' &#x20bd;');
         $('.option-first-led').html(prettify(result.led) + ' &#x20bd;');
         $('.option-first-control').html(prettify(result.control) + ' &#x20bd;');
         $('.option-first-delivery').html(prettify(result.delivery) + ' &#x20bd;');
         $('.option-first-price').html(prettify(result.price) + ' &#x20bd;');
         
         $('.option-first-settingup-input').val(prettify(result.settingup) + ' &#x20bd;');
         $('.option-first-led-input').val(prettify(result.led) + ' &#x20bd;');
         $('.option-first-control-input').val(prettify(result.control) + ' &#x20bd;');
         $('.option-first-delivery-input').val(prettify(result.delivery) + ' &#x20bd;');
         $('.option-first-price-input').val(prettify(result.price) + ' &#x20bd;');

         //Modal
         $('.modal-first-price').html(prettify(result.price) + ' &#x20bd;');
         $('.modal-first-square').html(result.square + ' М <sup>2</sup>');
         $('.modal-first-price-input').val(prettify(result.price) + ' &#x20bd;');
         $('.modal-first-square-input').val(result.square + ' М <sup>2</sup>');


         $('.commercial--first--input').val('/pdf.php?tab=1&step_name='+ result.step_name 
         +'&width='+ rangeWidth*1000 
         +'&height='+ rangeHeight*1000 
         +'&pixel_w='+ result.pixel_w 
         +'&pixel_y='+ result.pixel_y 
         +'&step='+ result.step 
         +'&garanty='+ garanty
         +'&square='+ result.square
         +'&settingup='+ result.settingup
         +'&led='+ result.led
         +'&control='+ result.control
         +'&delivery='+ result.delivery
         +'&price='+ result.price
         +'&step_size='+ result.step_size
         +'&step_ratio='+ result.step_ratio
         +'&col='+ result.col
         );
         

      }).fail(function(xhr, ajaxOptions, thrownError){
         //console.log(thrownError);
      });
   }

   /////// Просто отправка
   $('.calc__ajax__form--first').on('change', function(e) {
      e.preventDefault();
      sendFirst();
   })
   
   if ($(window).width() < '650') {
      /////Ползунок Ширина
      $(".rangeWidthRoom").on('change', function(){
         //Расчитываем кличество шагов
         let rangeWidth = ((($(this).val()-0.96)/0.96)*10)+100;
         let setRangeWidth = (($(this).val()-0.96)+0.96).toFixed(2);
         //Изменяем шаг ползунка
         $(".resize-drag").css('width', rangeWidth);
         //Изменяем html значение ползунка
         $('.rangeWidth').html(setRangeWidth);
      });
      //Ползунок Высота
      $(".rangeHeightRoom").on('change', function(){
         let rangeHeight = ((($(this).val()-0.96)/0.96)*5)+100;
         let setRangeHeight = (($(this).val()-0.96)+0.96).toFixed(2);
         $(".resize-drag").css('height', rangeHeight);
         $('.rangeHeight').html(setRangeHeight);
      });
   } else {
      /////Ползунок Ширина
      $(".rangeWidthRoom").mousemove(function(){
         //Расчитываем кличество шагов
         let rangeWidth = ((($(this).val()-0.96)/0.96)*10)+100;
         let setRangeWidth = (($(this).val()-0.96)+0.96).toFixed(2);
         //Изменяем шаг ползунка
         $(".resize-drag").css('width', rangeWidth);
         //Изменяем html значение ползунка
         $('.rangeWidth').html(setRangeWidth);
      });
      //Ползунок Высота
      $(".rangeHeightRoom").mousemove(function(){
         let rangeHeight = ((($(this).val()-0.96)/0.96)*5)+100;
         let setRangeHeight = (($(this).val()-0.96)+0.96).toFixed(2);
         $(".resize-drag").css('height', rangeHeight);
         $('.rangeHeight').html(setRangeHeight);
      });
   }

   //Перетаскивание экрана
   $('.resize-drag').draggable({
      containment: "parent"
   });
   //Изменение размера экрана
   $(".resize-drag").resizable({
      containment: "parent",
      grid: 20,
      
      minWidth: 100,
      maxWidth: 400,
      minHeight: 100,
      maxHeight: 365,

      resize: function(event, ui) {
        //Определяем шаг
        let width = (ui.size.width-100)/10+1;
        let height = (ui.size.height-100)/5;
        //Устанавливаем ползунок в нужное положение
        $(".rangeWidthRoom").val(0.96*width);
        $(".rangeHeightRoom").val(0.96*height);
        //Устанавливаем html значение над ползунком
        $('.rangeWidth').html((0.96*width).toFixed(2));
        $('.rangeHeight').html((0.96*height).toFixed(2));
        sendFirst();

      }
   });





   //////////////////////////////// TAB2
   //Отправка формы и получение значений
   function sendSecond() {
      let data = $('.calc__ajax__form--second').serialize();
      $.ajax({
         method: "POST",
         url: "calc.php",
         data: data
      }).done(function(response) {

         let result = $.parseJSON(response);
         console.log(result);
        
         //Цена и площадь
         $('.calc__ajax__form--second .result-room-block-price__price').html(prettify(result.price) + ' Р');
         $('.calc__ajax__form--second .result-room-block-price__size').html(result.square + ' М <sup>2</sup>');
         
         //Ширина 
         let rangeWidth = $('.rangeWidthRoomStreet').val();
         //Высота
         let rangeHeight = $('.rangeHeightRoomStreet').val();
         $('.videoSizeStreet').html(rangeWidth + ' М x ' + rangeHeight + ' M');
         $('.videoSquareStreet').html(result.square + ' М <sup>2</sup>');

         //Вставляем в следующие блоки ниже
         let smodule = $('.select-second-module').val();
         $('.caption-block-n').html(smodule);
         let stepName = $('.second---step---name').html(result.step_name);
         let stepSize = $('.second---step--size').html(result.pixel_w + ' x ' + result.pixel_y + ' px');
         $('.option-second-size').html(rangeWidth*1000 + ' x ' + rangeHeight*1000 + ' мм');
         let step = $('.select-second-step').val();
         $('.option-second-step').html(result.step + ' мм');
         $('.option-second-step__size').html(result.step_size);
         $('.option-second-step__ratio').html(result.step_ratio);
         $('.option-second-step__col').html(result.col);
         let garanty = result.garanty;
         let formYear = 'год';
         if (garanty > 1) {
         formYear = 'года';
         }
         $('.option-second-warranty').html(garanty + ' ' + formYear);

         $('.content---second---img').attr('src', './img/tab2/step---' + result.step + '.jpg');

         //Total
         $('.option-second-settingup').html(prettify(result.settingup) + ' &#x20bd;');
         $('.option-second-led').html(prettify(result.led) + ' &#x20bd;');
         $('.option-second-control').html(prettify(result.control) + ' &#x20bd;');
         $('.option-second-delivery').html(prettify(result.delivery) + ' &#x20bd;');
         $('.option-second-price').html(prettify(result.price) + ' &#x20bd;');

         $('.option-second-settingup-input').val(prettify(result.settingup) + ' &#x20bd;');
         $('.option-second-led-input').val(prettify(result.led) + ' &#x20bd;');
         $('.option-second-control-input').val(prettify(result.control) + ' &#x20bd;');
         $('.option-second-delivery-input').val(prettify(result.delivery) + ' &#x20bd;');
         $('.option-second-price-input').val(prettify(result.price) + ' &#x20bd;');

         //Modal
         $('.modal-second-price').html(prettify(result.price) + ' &#x20bd;');
         $('.modal-second-square').html(result.square + ' М <sup>2</sup>');
         $('.modal-second-price-input').val(prettify(result.price) + ' &#x20bd;');
         $('.modal-second-square-input').val(result.square + ' М <sup>2</sup>');

         $('.commercial--second--input').val('/pdf.php?tab=2&step_name='+ result.step_name 
         +'&width='+ rangeWidth*1000 
         +'&height='+ rangeHeight*1000 
         +'&pixel_w='+ result.pixel_w 
         +'&pixel_y='+ result.pixel_y 
         +'&step='+ result.step 
         +'&garanty='+ garanty
         +'&square='+ result.square
         +'&settingup='+ result.settingup
         +'&led='+ result.led
         +'&control='+ result.control
         +'&delivery='+ result.delivery
         +'&price='+ result.price
         +'&step_size='+ result.step_size
         +'&step_ratio='+ result.step_ratio
         +'&col='+ result.col
         );

      }).fail(function(xhr, ajaxOptions, thrownError){
         //console.log(thrownError);
      });
   };

   /////// Просто отправка
   $('.calc__ajax__form--second').on('change', function(e) {
      e.preventDefault();
      sendSecond();
   })
    
   if ($(window).width() < '650') {
      /////Ползунок Ширина
      $(".rangeWidthRoomStreet").on('change', function(){
         //Расчитываем кличество шагов
         let rangeWidth = ((($(this).val()-0.96)/0.96)*10)+100;
         let setRangeWidth = (($(this).val()-0.96)+0.96).toFixed(2);
         //Изменяем шаг ползунка
         $(".resize-drag-street").css('width', rangeWidth);
         //Изменяем html значение ползунка
         $('.rangeWidthStreet').html(setRangeWidth);
      });
      //Ползунок Высота
      $(".rangeHeightRoomStreet").on('change', function(){
         let rangeHeight = ((($(this).val()-0.96)/0.96)*5)+100;
         let setRangeHeight = (($(this).val()-0.96)+0.96).toFixed(2);
         $(".resize-drag-street").css('height', rangeHeight);
         $('.rangeHeightStreet').html(setRangeHeight);
      });
   } else {
      /////Ползунок Ширина
      $(".rangeWidthRoomStreet").mousemove(function(){
         //Расчитываем кличество шагов
         let rangeWidth = ((($(this).val()-0.96)/0.96)*10)+100;
         let setRangeWidth = (($(this).val()-0.96)+0.96).toFixed(2);
         //Изменяем шаг ползунка
         $(".resize-drag-street").css('width', rangeWidth);
         //Изменяем html значение ползунка
         $('.rangeWidthStreet').html(setRangeWidth);
      });
      //Ползунок Высота
      $(".rangeHeightRoomStreet").mousemove(function(){
         let rangeHeight = ((($(this).val()-0.96)/0.96)*5)+100;
         let setRangeHeight = (($(this).val()-0.96)+0.96).toFixed(2);
         $(".resize-drag-street").css('height', rangeHeight);
         $('.rangeHeightStreet').html(setRangeHeight);
      });
   }

   //Перетаскивание экрана
   $('.resize-drag-street').draggable({
      containment: "parent"
   });
   //Изменение размера экрана
   $(".resize-drag-street").resizable({
      containment: "parent",
      grid: 20,
      
      minWidth: 100,
      maxWidth: 400,
      minHeight: 100,
      maxHeight: 365,

      resize: function(event, ui) {
        //Определяем шаг
        let width = (ui.size.width-100)/10+1;
        let height = (ui.size.height-100)/5;
        //Устанавливаем ползунок в нужное положение
        $(".rangeWidthRoomStreet").val(0.96*width);
        $(".rangeHeightRoomStreet").val(0.96*height);
        //Устанавливаем html значение над ползунком
        $('.rangeWidthStreet').html((0.96*width).toFixed(2));
        $('.rangeHeightStreet').html((0.96*height).toFixed(2));
        sendSecond();
      }
   });

   //////////////////////////////// TAB3
   //Отправка формы и получение значений
   function sendThird() {
      let data = $('.calc__ajax__form--third').serialize();
      $.ajax({
         method: "POST",
         url: "calc.php",
         data: data
      }).done(function(response) {

         let result = $.parseJSON(response);
         console.log(result);
        
         //Цена и площадь
         $('.calc__ajax__form--third .result-room-block-price__price').html(prettify(result.price) + ' Р');
         $('.calc__ajax__form--third .result-room-block-price__size').html(result.square + ' М <sup>2</sup>');
         
         //Ширина 
         let rangeWidth = $('.rangeWidthMediaStreet').val();
         //Высота
         let rangeHeight = $('.rangeHeightMediaStreet').val();
         $('.videoSizeMedia').html(rangeWidth + ' М x ' + rangeHeight + ' M');
         $('.videoSquareMedia').html(result.square + ' М <sup>2</sup>');

         // //Вставляем в следующие блоки ниже
         // let smodule = $('.select-second-module').val();
         // $('.caption-block-n').html(smodule);

         let stepName = $('.third---step---name').html(result.step_name);
         let stepSize = $('.third---step--size').html(result.pixel_w + ' x ' + result.pixel_y + ' px');
         $('.option-third-size').html(rangeWidth*1000 + ' x ' + rangeHeight*1000 + ' мм');
         let step = $('.select-third-step').val();
         $('.option-third-step').html(result.step + ' мм');
         $('.option-third-step__ratio').html(result.step_ratio);
         $('.option-third-step__col').html(result.col);
         let garanty = result.garanty;
         let formYear = 'год';
         if (garanty > 1) {
         formYear = 'года';
         }
         $('.option-third-warranty').html(garanty + ' ' + formYear);

         $('.content---third---img').attr('src', './img/tab3/step---' + result.step + '.jpg');

         // //Total
         $('.option-third-settingup').html(prettify(result.settingup) + ' &#x20bd;');
         $('.option-third-led').html(prettify(result.led) + ' &#x20bd;');
         $('.option-third-control').html(prettify(result.control) + ' &#x20bd;');
         $('.option-third-delivery').html(prettify(result.delivery) + ' &#x20bd;');
         $('.option-third-price').html(prettify(result.price) + ' &#x20bd;');

         $('.option-third-settingup-input').val(prettify(result.settingup) + ' &#x20bd;');
         $('.option-third-led-input').val(prettify(result.led) + ' &#x20bd;');
         $('.option-third-control-input').val(prettify(result.control) + ' &#x20bd;');
         $('.option-third-delivery-input').val(prettify(result.delivery) + ' &#x20bd;');
         $('.option-third-price-input').val(prettify(result.price) + ' &#x20bd;');

         // //Modal
         $('.modal-third-price').html(prettify(result.price) + ' &#x20bd;');
         $('.modal-third-square').html(result.square + ' М <sup>2</sup>');
         $('.modal-third-price-input').val(prettify(result.price) + ' &#x20bd;');
         $('.modal-third-square-input').val(result.square + ' М <sup>2</sup>');

         $('.commercial--third--input').val('/pdf.php?tab=3&step_name='+ result.step_name 
         +'&width='+ rangeWidth*1000 
         +'&height='+ rangeHeight*1000 
         +'&pixel_w='+ result.pixel_w 
         +'&pixel_y='+ result.pixel_y 
         +'&step='+ result.step 
         +'&garanty='+ garanty
         +'&square='+ result.square
         +'&settingup='+ result.settingup
         +'&led='+ result.led
         +'&control='+ result.control
         +'&delivery='+ result.delivery
         +'&price='+ result.price
         +'&step_size='+ result.step_size
         +'&step_ratio='+ result.step_ratio
         +'&col='+ result.col
         );

      }).fail(function(xhr, ajaxOptions, thrownError){
         console.log(thrownError);
      });
   };

   /////// Просто отправка
   $('.calc__ajax__form--third').on('change', function(e) {
      e.preventDefault();
      sendThird();
   })
    
   if ($(window).width() < '650') {
      /////Ползунок Ширина
      $(".rangeWidthMediaStreet").on('change', function(){
         //Расчитываем кличество шагов
         let rangeWidth = ((($(this).val()-1)/1)*5)+100;
         let setRangeWidth = (($(this).val()-1)+1).toFixed(2);
         //Изменяем шаг ползунка
         $(".resize-drag-media").css('width', rangeWidth);
         //Изменяем html значение ползунка
         $('.rangeWidthMedia').html(setRangeWidth);
      });
      //Ползунок Высота
      $(".rangeHeightMediaStreet").on('change', function(){
         let rangeHeight = ((($(this).val()-1)/1)*5)+100;
         let setRangeHeight = (($(this).val()-1)+1).toFixed(2);
         $(".resize-drag-media").css('height', rangeHeight);
         $('.rangeHeightMedia').html(setRangeHeight);
      });
   } else {
      /////Ползунок Ширина
      $(".rangeWidthMediaStreet").mousemove(function(){
         //Расчитываем кличество шагов
         let rangeWidth = ((($(this).val()-1)/1)*5)+100;
         let setRangeWidth = (($(this).val()-1)+1).toFixed(2);
         //Изменяем шаг ползунка
         $(".resize-drag-media").css('width', rangeWidth);
         //Изменяем html значение ползунка
         $('.rangeWidthMedia').html(setRangeWidth);
      });
      //Ползунок Высота
      $(".rangeHeightMediaStreet").mousemove(function(){
         let rangeHeight = ((($(this).val()-1)/1)*5)+100;
         let setRangeHeight = (($(this).val()-1)+1).toFixed(2);
         $(".resize-drag-media").css('height', rangeHeight);
         $('.rangeHeightMedia').html(setRangeHeight);
      });
   }

   //Перетаскивание экрана
   $('.resize-drag-media').draggable({
      containment: "parent"
   });
   //Изменение размера экрана
   $(".resize-drag-media").resizable({
      containment: "parent",
      grid: 10,
      
      minWidth: 100,
      maxWidth: 352,
      minHeight: 100,
      maxHeight: 352,

      resize: function(event, ui) {
        //Определяем шаг
        let width = (ui.size.width-100)/5;
        let height = (ui.size.height-100)/5;
        //Устанавливаем ползунок в нужное положение
        $(".rangeWidthMediaStreet").val(width);
        $(".rangeHeightMediaStreet").val(height);
        //Устанавливаем html значение над ползунком
        $('.rangeWidthMedia').html((width).toFixed(2));
        $('.rangeHeightMedia').html((height).toFixed(2));
        sendThird();
      }
   });


   
    //Вуаля бля - магия
  });