<html>
<head>
  <title>
    Калькулятор
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- IMPORTANT -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/main.min.css">
  <!-- / IMPORTANT -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
</head>

<body>
<div style="display:none">Переменная из php:
  <span id="perem"><?php echo $homepage; ?></span>
</div>

<div class="region region-header">
  <div id="block-block-1" class="block block-block">


    <div class="content">
      <!--ШАПКА--><div id="header">
        <div class="width" id="header-inner">
          <div id="logo"><a href="http://ledimperial.ru/"><img alt="На главную" src="http://ledimperial.ru/sites/all/themes/mytheme/images/logo.png"></a></div>
          <div id="desc"><font size="4">Светодиодная продукция от производителя<br>
              в Краснодаре, Краснодарском крае и Республике Крым</font></div>
          <div id="head-contacts">
            <div class="srow">
              <div class="sval"><a class="phoneicon" href="tel:+78007770291" rel="nofollow">8 (800) 777-02-91</a></div>
              <div><span style="font-size: 10px; line-height: 5px; color: #6d6e71;">Звонок по России бесплатный</span></div>
            </div>
            <div class="srow">
              <div class="slab">Краснодар</div>
              <div class="sval"><a href="tel+79186742828" rel="nofollow" style="text-decoration:none;">8 (918) 674-28-28</a></div>
            </div>
            <div class="srow">
              <div class="slab">Сочи</div>
            </div>
          </div>
        </div>
      </div>
      <div id="mobi-header">
        <div id="burger">&nbsp;</div>
        <div id="burger-navi">
          <div id="exit-burger">&nbsp;</div>
          <ul><li><a href="/index.php">Главная</a></li>
            <li><a href="/uslugi">Услуги</a></li>
            <li><a href="/raschyot-stoimosti">Расчёт стоимости</a></li>
            <li><a href="/nashi-proekty">Наши проекты</a></li>
            <li><a href="/products">Продукция</a></li>
            <li><a href="/sertifikaty">Сертификаты</a></li>
            <li><a href="/poleznoe">Полезное</a></li>
            <li><a href="/kontaktnaya-informaciya">Контакты</a></li>
          </ul></div>
        <div id="mobi-logo"><a href="/"><img alt="" src="/sites/all/themes/mytheme/images/mobi-logo.png"></a></div>
      </div>
    </div>
  </div>
  <div id="block-search-form" class="block block-search">


    <div class="content">
      <form action="/" method="post" id="search-block-form" accept-charset="UTF-8"><div><div class="container-inline">
            <span class="element-invisible">Форма поиска</span>
            <div class="form-item form-type-textfield form-item-search-block-form">
              <label class="element-invisible" for="edit-search-block-form--2">Поиск </label>
              <input title="Введите ключевые слова для поиска." type="text" id="edit-search-block-form--2" name="search_block_form" value="" size="15" maxlength="128" class="form-text" placeholder="Ваш запрос">
            </div>
            <div class="form-actions form-wrapper" id="edit-actions"><input type="submit" id="edit-submit" name="op" value="Поиск" class="form-submit"></div><input type="hidden" name="form_build_id" value="form-N1Ych2ECM-pQu_TiEHQqSumlY7lG6_6Sjrg95_uzVAA">
            <input type="hidden" name="form_id" value="search_block_form">
          </div>
        </div></form>  </div>
  </div>
  <div id="block-system-main-menu" class="block block-system block-menu">


    <div class="content">
      <ul class="menu"><li class="first leaf"><a href="http://ledimperial.ru/lenta_news">Новости</a></li>
        <li class="leaf"><a href="http://ledimperial.ru/uslugi">Услуги</a></li>
        <li class="leaf"><a href="http://ledimperial.ru/raschyot-stoimosti">Расчёт стоимости</a></li>
        <li class="leaf"><a href="http://ledimperial.ru/nashi-proekty" title="">Проекты</a></li>
        <li class="leaf"><a href="http://ledimperial.ru/products">Продукция</a></li>
        <li class="leaf"><a href="http://ledimperial.ru/uslugi/arenda-svetodiodnogo-ekrana" title="">Аренда led экрана</a></li>
        <li class="leaf"><a href="http://ledimperial.ru/poleznoe">Полезное</a></li>
        <li class="leaf"><a href="http://ledimperial.ru/sertifikaty">Сертификаты</a></li>
        <li class="leaf"><a href="http://ledimperial.ru/kontaktnaya-informaciya">Контакты</a></li>
      </ul>  </div>
  </div>
</div>
<section class="calc---page">
  <h1>Online Калькулятор</h1>

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <span>Выберите тип экрана</span>
    </li>
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i>Видеоэкран</i> для помещения</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i>Видеоэкран</i> для улицы</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Медиафасад</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane  show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <!-- TAB1 -->
      <section class="tab-content tab-content-room">

        <div class="form-room">
          <form method="post" class="calc-room---form calc__ajax__form--first">
              
            <div class="calc-room">
                <span class="dop"><i class="fa fa-arrow-right" aria-hidden="true"></i>Доп.параметры</span>

                <div class="calc-room__caption-block">
                  <p class="name-block">Размер экрана</p>
                </div>
                
                <div class="range---value">
                  <label for="rangeWidthRoom" class="labelWidth">Ширина</label>
                  <div class="range---value-index">
                    <span id="rangeWidthRoomSpan" class="spanWidth rangeWidth">0.96</span><span class="spanWidth"> M</span>
                  </div>
                </div>
                <input type="range" name="width" id="rangeWidthRoom" class="rangeWidthRoom" value="0.96" min="0.96" max="14.40" step="0.96">
      
                <div class="range---value">
                  <label for="rangeHeightRoom" class="labelHeight">Высота</label>
                  <div class="range---value-index">
                    <span id="rangeHeightRoomSpan" class="spanHeight rangeHeight">0.96</span><span class="spanHeight"> M</span>
                  </div>
                </div>
                <input type="range" name="height" id="rangeHeightRoom" class="rangeHeightRoom" value="0.96" min="0.96" max="14.40" step="0.96">
      
                <div class="name-big-block">
                  <p class="name-block">Выберите шаг пикселя</p>
                  <span>
                    <i class="fa fa-question-circle quest-pix" aria-hidden="true" id="quest-pix-room"></i>
                  </span>
                </div>

                <select name="step" class="select-css select-first-step" id="select-step-pixel-room">
                  <option>1.25</option>
                  <option>1.66</option>
                  <option>1.83</option>
                  <option>2</option>
                  <option>2.5</option>
                  <option>3.07</option>
                  <option>3</option>
                  <option>4</option>
                  <option selected>5</option>
                </select>
      
                <select class="select-css select-module select-first-module redblock" id="select-module-room">
                  <option>Q1.25AT32V2 SMD 320x160mm</option>
                </select>
      
                <!-- <p class="name-block">Выберите яркость</p>
                <select name="light" class="select-css">
                  <option>Яркий</option>
                  <option>Повышеная яркость</option>
                </select> -->
      
                <div class="block-inline">
                  <p class="name-block">Гарантия</p>
                  <a class="form-modal" href="#" data-toggle="modal" data-target="#tab1_modal1">Бесплатный выезд замерщика</a>
                </div>
      
                <div class="warranty-room-big-block">
                  <div class="warranty-room-big-block---year">
                    <div class="warranty-room-block">
                      <input type="radio" name="warranty-room" id="warranty-room1" class="warranty-room__radio warranty-first" value="1" checked>
                      <label for="warranty-room1"><span></span>1 год</label>
                    </div>
                    <div class="warranty-room-block">
                      <input type="radio" name="warranty-room" id="warranty-room2" class="warranty-room__radio warranty-first" value="2">
                      <label for="warranty-room2"><span></span>2 года</label>
                    </div>
                    <div class="warranty-room-block">
                      <input type="radio" name="warranty-room" id="warranty-room3" class="warranty-room__radio warranty-first" value="3">
                      <label for="warranty-room3"><span></span>3 года</label>
                    </div>
                  </div>
                  <div class="get-room-pred">
                    <a class="form-modal" href="#" class="get-room-pred-text" data-toggle="modal" data-target="#tab1_modal2">Получить ком. предложение</a>
                  </div>
                </div>
      
                <div class="result-room-block">
                  <div class="result-room-block-price">
                    <p class="result-room-block-price__caption">Цена экрана</p>
                    <p class="result-room-block-price__price" id="result-room-block-price__price">0 Р</p>
                  </div>
                  <div class="result-room-block-size">
                    <p class="result-room-block-price__caption">Площадь экрана</p>
                    <p class="result-room-block-price__size" id="result-room-block-size__size">0.92 M <sup>2</sup></p>
                  </div>
                </div>
      
            </div>

            <div class="calc-room-option" id="calc-room-option">
                <p class="name-block">Доп. параметры</p>
                <div class="calc-room-option-big-block">
                  <div class="calc-room-option-block">
                    <input name="calc-room-option1" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option1">
                    <label for="calc-room-option1"><span></span>Управляющий компьютер</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Управляющий компьютер" name="dop-options-room"></i>
                  </div>
                  <div class="calc-room-option-block">
                    <input name="calc-room-option2" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option2">
                    <label for="calc-room-option2"><span></span>Отправляющий контроллер</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Отправляющий контроллер" name="dop-options-room"></i>
                  </div>
                  <div class="calc-room-option-block">
                    <input name="calc-room-option3" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option3">
                    <label for="calc-room-option3"><span></span>Wi-Fi модуль</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Wi-Fi модуль" name="dop-options-room"></i>
                  </div>
                  <div class="calc-room-option-block">
                    <input name="calc-room-option4" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option4">
                    <label for="calc-room-option4"><span></span>Датчик яркости</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Датчик яркости" name="dop-options-room"></i>
                  </div>
                  <div class="calc-room-option-block">
                    <input name="calc-room-option5" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option5">
                    <label for="calc-room-option5"><span></span>Датчик температуры</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Датчик температуры" name="dop-options-room"></i>
                  </div>
                  <div class="calc-room-option-block">
                    <input name="calc-room-option6" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option6">
                    <label for="calc-room-option6"><span></span>Видеопроцессор</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Видеопроцессор" name="dop-options-room"></i>
                  </div>
      
                </div>

                <p class="name-block">Монтаж</p>
                <div class="calc-room-option-big-block">
                  <div class="calc-room-option-block">
                    <input name="calc-room-option7" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option7">
                    <label for="calc-room-option7"><span></span>Электрощитовая</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Электрощитовая" name="dop-options-room"></i>
                  </div>
                  <div class="calc-room-option-block">
                    <input name="calc-room-option8" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option8">
                    <label for="calc-room-option8"><span></span>Шефмонтаж</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Шефмонтаж" name="dop-options-room"></i>
                  </div>
                  <div class="calc-room-option-block">
                    <input name="calc-room-option9" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option9">
                    <label for="calc-room-option9"><span></span>Монтаж оборудования</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Монтаж оборудования" name="dop-options-room"></i>
                  </div>
                  <div class="calc-room-option-block">
                    <input name="calc-room-option10" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option10">
                    <label for="calc-room-option10"><span></span>Изгот. металлоконструкции</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Изгот. металлоконструкции" name="dop-options-room"></i>
                  </div>
                  <div class="calc-room-option-block">
                    <input name="calc-room-option11" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option11">
                    <label for="calc-room-option11"><span></span>Монтаж металлоконструкций</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Монтаж металлоконструкций" name="dop-options-room"></i>
                  </div>
                  <div class="calc-room-option-block">
                    <input name="calc-room-option12" type="checkbox" class="calc-room-option-block__checkbox" id="calc-room-option12">
                    <label for="calc-room-option12"><span></span>Набор запасных частей</label>
                    <i class="fa fa-question-circle" aria-hidden="true" value="Набор запасных частей" name="dop-options-room"></i>
                  </div>
                </div>

                <p class="name-block">Доставка</p>
                <div class="calc-room-option-big-block">
                  <div class="calc-room-option-block">
                    <input name="delivery" type="checkbox" class="calc-room-option-block__checkbox" id="delivery">
                    <label for="delivery"><span></span>Доставка</label>
                  </div>
                </div>
            </div>
          </form>

          <div class="calc-room---monitor">
            <div class="resize-container">
              <div class="resize-drag">
                <video  autoplay loop muted>
                  <source src="video/smart.mp4">
                </video>
                <div class="resize-container---text">
                  <span class="videoSize" id="resize-drag-room">0.96 М x 0.96 М</span>
                  <span class="videoSquare" id="resize-drag-room-itog">0.92 M <sup>2</sup></span>
                </div>
              </div>
            </div>
          </div>

          <div class="calc-room-option-help" id="calc-room-option-help">
            <p class="name-block" id="calc-room-option-help-caption">Тест</p>
            <p id="calc-room-option-help-text"></p>
          </div>
  
          <div class="calc-room-option-help" id="step-pix-block">
            <p class="name-block">Шаг пикселя</p>
            <p>Чем меньше шаг пикселя, тем более качественное изображение можно отображать на светодиодном экране.
  
              Для того чтобы подобрать оптимальный шаг пикселя, в первую очередь необходимо понять место для установки экрана, во-вторых определить минимальное расстояние, с которого будет читаться изображение.
  
              Нет смысла выбирать шаг 3 мм, под экран с установкой на фасаде здания с минимальным расстоянием обзора 10 м.
  
              Минимальное расстояние (МР) от экрана до зрителя прямо пропорционально шагу пикселя (ШП).
  
              Например:
              МР – 1 м = ШП – 1.2, 1.5 мм.
              МР – 3 м = ШП – 3 мм.
              МР – 10 м = ШП – 10мм.</p>
          </div>
        </div>

        <div class="content---first-line">
          <div class="options-first-block-big">
            <p class="caption-block">Видеоэкран для помещения</p>
            <p id="name-room-module-p" class="caption-block-n">Q1.25AT32V2 SMD 320x160mm</p>
            
            <div class="options-first-block-big-flex">
              
              <div class="options-first-block">
                <i class="fa fa-arrows-alt options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Размер экрана</p>
                  <p class="options-first-block-caption__size option-first-size" id="size-room">960 х 960 мм</p>
                </div>
              </div>

              <div class="options-first-block">
                <i class="fa fa-picture-o options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption redblock">
                  <p class="options-first-block-caption__title">Разрешение экрана</p>
                  <p class="options-first-block-caption__size" id="resolution-room">960 х 960 px</p>
                </div>
              </div>

              <div class="options-first-block">
                <i class="fa fa-square options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Шаг пикселя</p>
                  <p class="options-first-block-caption__size option-first-step" id="step-pixel-room">5 мм</p>
                </div>
              </div>

              <div class="options-first-block">
                <i class="fa fa-get-pocket options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Гарантия</p>
                  <p class="options-first-block-caption__size option-first-warranty" id="safe-room">1 год</p>
                </div>
              </div>
    
            </div>
          </div>
          <div class="content---first-line---img">
            <div class="img---wrapper">
              <img src="img/content---first.png">
            </div>
          </div>
        </div>
        
        <div class="options-second-block-big">
          <p class="caption-block">Характеристики</p>
  
          <div class="options-second-block-big-photo">
            <div class="content---second-line---img">
              <div class="img---wrapper">
                <img src="img/1235_site-758130484.jpg">
              </div>
            </div>
            <div class="options-second-block-big-photo-block">
              <p class="caption-block caption-block-par">Параметры модуля</p>
              <ul class="options-second-block-big-photo-block__list">
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Шаг пикселя</span>
                  <span class="dotted"></span>
                  <span class="parval option-first-step" id="step-room">5 мм</span>
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
            </div>
          </div>
        </div>
        
        <div class="options-third-block-big">
          <p class="caption-block caption-block-par">Параметры кабинета</p>
          <div class="options-third-block-big-photo">
            <div class="options-third-block-big-photo-block">
              <ul class="options-third-block-big-photo-block__list">
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Размер кабинета</span>
                  <span class="dotted"></span>
                  <span class="parval" id="size-cab-room">768 x 768 мм</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Доступ для обслуживания экрана</span>
                  <span class="dotted"></span>
                  <span class="parval" id ="dost-obs-room">Тыльное</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Вес (кг/м2)</span>
                  <span class="dotted"></span>
                  <span class="parval" id="weight-room">32.00</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Плотность пикселей на м2</span>
                  <span class="dotted"></span>
                  <span class="parval" id="density-room">62500</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Потребляемая мощность макс / сред, Вт/м2</span>
                  <span class="dotted"></span>
                  <span class="parval" id="power-room">700 / 350</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Частота обновления (Гц)</span>
                  <span class="dotted"></span>
                  <span class="parval" id="frequency-update-room">1920</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Частота кадра (Гц)</span>
                  <span class="dotted"></span>
                  <span class="parval" id="frequency-screen-room">50/60</span>
                </li>
              </ul>
            </div>
            <div class="content---third-line---img">
              <div class="img---wrapper">
                <img src="img/0020_875x492_3e6.jpg">
              </div>
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
                <span class="parval-fourth option-first-size" id="size-screen-room">960 x 960 мм</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Разрешение экрана</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="resolution-screen-room">768 x 768 px</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Кол-во кабинетов</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="count-cab-room">1</span>
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
                <span class="parname-fourth">Яркость кд/м2</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="bright-screen-room">>1000</span>
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
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Площадь экрана м2</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth videoSquare" id="squar-screen-room">0.92 M <sup>2</sup></span>
              </li>
            </ul>
          </div>
          <div class="content---fourth-line---img">
            <div class="calc-room---monitor">
                <div class="resize-container">
                  <div class="resize-drag">
                    <video  autoplay loop muted>
                      <source src="video/smart.mp4">
                    </video>
                    <div class="resize-container---text">
                      <span id="resize-drag-room">0.96 М x 0.96 М</span>
                      <span id="resize-drag-room-itog">0.9216 M <sup>2</sup></span>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <p id="rangeWidth"></p>

        <div class="form-itog-block">
          <div class="form-itog">
            <p class="caption-block">Итог</p>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Монтаж</span>
              <span class="form-itog-item__value option-first-settingup">0 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Стоимость экрана</span>
              <span class="form-itog-item__value option-first-led" id="itog_room">639 431 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Управляющий компьютер</span>
              <span class="form-itog-item__value option-first-control">0 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Доставка</span>
              <span class="form-itog-item__value option-first-delivery">0 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Итого</span>
              <span class="form-itog-item__value option-first-price" id="itog_room_all">0 &#x20bd;</span>
            </div>
          </div>
  
          <form action="" class="form callback__form" method="post">
            <p class="form__caption">Оформить заказ со скидкой</p>
            <input type="text" name="fio" placeholder="Укажите ФИО" class="form__input" id="user_name_room">
            <input type="text" name="email" placeholder="Укажите e-mail" class="form__input" id="user_email_room">
            <input type="text" placeholder="Телефон" class="phone_mask form__input" id="user_phone_room" required>
            <div class="robot">
              <div class="robot__check">
                  <svg viewBox="0 0 60 60">
                    <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                    <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                  </svg>
              </div>
              <span>Согласен с условиями <a href="/policy/" target="_blank">Политики конфиденциальности</a></span>
            </div>
            <input type="submit" value="Отправить" class="form__submit callback__form__button">
          </form>
        </div>

        <!-- Modal TAB1_MODAL1 -->
        <div class="modal fade" id="tab1_modal1" tabindex="-1" role="dialog" aria-labelledby="Замер" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Бесплатный замер</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" class="popupform callback__form" method="post">
                  <input type="text" name="fio" placeholder="Укажите ФИО" class="form-control" id="user_name_room_popup">
                  <input type="text" name="email" placeholder="Укажите e-mail" class="form-control" id="user_email_room_popup">
                  <input type="text" placeholder="Телефон" class="phone_mask form-control" id="user_phone_room_popup"  required>
                  <div class="robot">
                    <div class="robot__check">
                        <svg viewBox="0 0 60 60">
                          <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                          <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                        </svg>
                    </div>
                    <span>Согласен с условиями <a href="/policy/" target="_blank">Политики конфиденциальности</a></span>
                  </div>
                  <input type="submit" value="Отправить" class="form-submit callback__form__button">
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal TAB1_MODAL2 -->
        <div class="modal fade" id="tab1_modal2" tabindex="-1" role="dialog" aria-labelledby="Замер" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Получить коммерческое предложение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" class="popupform callback__form" method="post">
                  <input type="text" name="fio" placeholder="Укажите ФИО" class="form-control" id="user_name_room_popup_com">
                  <input type="text" name="email" placeholder="Укажите e-mail" class="form-control" id="user_email_room_popup_com">
                  <input type="text" placeholder="Телефон" class="phone_mask form-control" id="user_phone_room_popup_com" required>
                  <div class="result-room-block">
                    <div class="result-room-block-price">
                      <p class="result-room-block-price__caption">Цена экрана</p>
                      <p class="result-room-block-price__price modal-first-price" id="result-room-block-price__price-com"></p>
                    </div>
                    <div class="result-room-block-size">
                      <p class="result-room-block-price__caption">Площадь экрана</p>
                      <p class="result-room-block-price__size modal-first-square" id="result-room-block-size__size-com">0.9216 M <sup>2</sup></p>
                    </div>
                  </div>
                  <div class="robot">
                    <div class="robot__check">
                        <svg viewBox="0 0 60 60">
                          <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                          <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                        </svg>
                    </div>
                    <span>Согласен с условиями <a href="/policy/" target="_blank">Политики конфиденциальности</a></span>
                  </div>
                  <input type="submit" value="Отправить" class="form-submit  callback__form__button">
                </form>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- /TAB1 -->
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <!-- TAB2 -->
      <section class="tab-content">
        <!--<video width="100%" height="auto" loop="" muted="" autoplay="" id="myvideo" class="myvideo">
            <source src="./video/SB3.mp4">
          </video>-->
        <div class="form-street">
  
          <form method="post" class="calc-room---form calc__ajax__form--second">
            <div class="calc-room">

              <div class="calc-room__caption-block">
                <p class="name-block">Размер экрана</p>
                <span id="option-block-room" class="dop"><i class="fa fa-arrow-right" aria-hidden="true"></i>Доп.параметры</span>
              </div>

              <div class="range---value">
                <label for="rangeWidthRoom" class="labelWidth">Ширина</label>
                <div class="range---value-index">
                  <span id="rangeWidthRoomSpan" class="spanWidth rangeWidthStreet">0.96</span><span class="spanWidth"> M</span>
                </div>
              </div>
              <input type="range" name="width" id="rangeWidthRoom" class="rangeWidthRoomStreet" value="0.96" min="0.96" max="14.40" step="0.96">
    
              <div class="range---value">
                <label for="rangeHeightRoom" class="labelHeight">Высота</label>
                <div class="range---value-index">
                  <span id="rangeHeightRoomSpan" class="spanHeight rangeHeightStreet">0.96</span><span class="spanHeight"> M</span>
                </div>
              </div>
              <input type="range" name="height" id="rangeHeightRoom" class="rangeHeightRoomStreet" value="0.96" min="0.96" max="14.40" step="0.96">
    
              <div class="name-big-block">
                <p class="name-block">Выберите шаг пикселя</p>
                <span>
                  <i class="fa fa-question-circle quest-pix" aria-hidden="true" id="quest-pix-room"></i>
                </span>
              </div>
    
              <select name="step" class="select-css" id="select-step-pixel-street">
                <option>4</option>
                <option>4.81</option>
                <option>5</option>
                <option>6</option>
                <option>6.66</option>
                <option>8</option>
                <option selected>10</option>
              </select>
    
              <select class="select-css select-module" id="select-module-street">
                <option>P4 SMD1921 5500 cd/㎡ 320*160mm</option>
              </select>
    
              <!-- <p class="name-block">Выберите яркость</p>
              <select class="select-css">
                <option>Яркий</option>
                <option>Повышеная яркость</option>
              </select> -->
    
              <div class="block-inline">
                <p class="name-block">Гарантия</p>
                <a class="form-modal" href="#" data-toggle="modal" data-target="#tab2_modal1">Бесплатный выезд замерщика</a>
              </div>
    
              <div class="warranty-room-big-block">
                <div class="warranty-room-big-block---year">
                  <div class="warranty-room-block">
                    <input type="radio" name="warranty-room" id="warranty-street1" class="warranty-room__radio" value="1" checked>
                    <label for="warranty-street1"><span></span>1 год</label>
                  </div>
                  <div class="warranty-room-block">
                    <input type="radio" name="warranty-room" id="warranty-street2" class="warranty-room__radio" value="2">
                    <label for="warranty-street2"><span></span>2 года</label>
                  </div>
                  <div class="warranty-room-block">
                    <input type="radio" name="warranty-room" id="warranty-street3" class="warranty-room__radio" value="3">
                    <label for="warranty-street3"><span></span>3 года</label>
                  </div>
                </div>
                <div class="get-room-pred">
                    <a class="form-modal" href="#" class="get-room-pred-text" data-toggle="modal" data-target="#tab2_modal2">Получить ком. предложение</a>
                </div>
              </div>

              <!--<div style="margin-top: 10px;">
                <span class="name-block"> Введите курс доллара</span>
                <input type="text" id="kurs-dollar-street">
              </div>-->

              <div class="result-room-block">
                <div class="result-room-block-price">
                  <p class="result-room-block-price__caption">Цена экрана</p>
                  <p class="result-room-block-price__price" id="result-room-block-price__price">0 Р</p>
                </div>
                <div class="result-room-block-size">
                  <p class="result-room-block-price__caption">Площадь экрана</p>
                  <p class="result-room-block-price__size" id="result-room-block-size__size">0.92 M <sup>2</sup></p>
                </div>
              </div>
    
            </div>

            <div class="calc-room-option" id="calc-street-option">
              <p class="name-block">Доп. параметры</p>
              <div class="calc-room-option-big-block">
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option1">
                  <label for="calc-street-option1"><span></span>Управляющий компьютер</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Управляющий компьютер" name="dop-options-street"></i>
                </div>
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option2">
                  <label for="calc-street-option2"><span></span>Отправляющий контроллер</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Отправляющий контроллер" name="dop-options-street"></i>
                </div>
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option3">
                  <label for="calc-street-option3"><span></span>Wi-Fi модуль</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Wi-Fi модуль" name="dop-options-street"></i>
                </div>
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option4">
                  <label for="calc-street-option4"><span></span>Датчик яркости</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Датчик яркости" name="dop-options-street"></i>
                </div>
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option5">
                  <label for="calc-street-option5"><span></span>Датчик температуры</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Датчик температуры" name="dop-options-street"></i>
                </div>
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option6">
                  <label for="calc-street-option6"><span></span>Видеопроцессор</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Видеопроцессор" name="dop-options-street"></i>
                </div>
              </div>
    
    
              <p class="name-block">Монтаж</p>
              <div class="calc-room-option-big-block">
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option7">
                  <label for="calc-street-option7"><span></span>Электрощитовая</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Электрощитовая" name="dop-options-street"></i>
                </div>
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option8">
                  <label for="calc-street-option8"><span></span>Шефмонтаж</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Шефмонтаж" name="dop-options-street"></i>
                </div>
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option9">
                  <label for="calc-street-option9"><span></span>Монтаж оборудования</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Монтаж оборудования" name="dop-options-street"></i>
                </div>
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option10">
                  <label for="calc-street-option10"><span></span>Изгот. металлоконструкции</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Изгот. металлоконструкции" name="dop-options-street"></i>
                </div>
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option11">
                  <label for="calc-street-option11"><span></span>Монтаж металлоконструкций</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Монтаж металлоконструкций" name="dop-options-street"></i>
                </div>
                <div class="calc-room-option-block">
                  <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-street-option12">
                  <label for="calc-street-option12"><span></span>Набор запасных частей</label>
                  <i class="fa fa-question-circle" aria-hidden="true" value="Набор запасных частей" name="dop-options-street"></i>
                </div>
              </div>
            </div>
          </form>

          <div class="calc-room---monitor">
            <div class="resize-container-street">
              <div class="resize-drag-street">
                <video  autoplay loop muted>
                  <source src="video/smart.mp4">
                </video>
                <div class="resize-container---text">
                  <span class="videoSizeStreet" id="resize-drag-room">0.96 М x 0.96 М</span>
                  <span class="videoSquareStreet" id="resize-drag-room-itog">0.92 M <sup>2</sup></span>
                </div>
              </div>
            </div>
          </div>

          <div class="calc-room-option-help" id="calc-street-option-help">
            <p class="name-block" id="calc-street-option-help-caption">Тест</p>
            <p id="calc-street-option-help-text"></p>
          </div>
  
          <div class="calc-room-option-help" id="step-pix-block-street">
            <p class="name-block">Шаг пикселя</p>
            <p>Чем меньше шаг пикселя, тем более качественное изображение можно отображать на светодиодном экране.
  
              Для того чтобы подобрать оптимальный шаг пикселя, в первую очередь необходимо понять место для установки экрана, во-вторых определить минимальное расстояние, с которого будет читаться изображение.
  
              Нет смысла выбирать шаг 3 мм, под экран с установкой на фасаде здания с минимальным расстоянием обзора 10 м.
  
              Минимальное расстояние (МР) от экрана до зрителя прямо пропорционально шагу пикселя (ШП).
  
              Например:
              МР – 1 м = ШП – 1.2, 1.5 мм.
              МР – 3 м = ШП – 3 мм.
              МР – 10 м = ШП – 10мм.</p>
          </div>
  
        </div>

        <div class="content---first-line">
          <div class="options-first-block-big">
            <p class="caption-block">Видеоэкран для улицы</p>
            <p id="name-street-module-p" class="caption-block-n">Q1.25AT32V2 SMD 320x160mm</p>
    
            <div class="options-first-block-big-flex">
              <div class="options-first-block">
                <i class="fa fa-arrows-alt options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Размер экрана</p>
                  <p class="options-first-block-caption__size" id="size-street">960 x 960 мм</p>
                </div>
              </div>
    
    
              <div class="options-first-block">
                <i class="fa fa-picture-o options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Разрешение экрана</p>
                  <p class="options-first-block-caption__size" id="resolution-street">240 x 240 px</p>
                </div>
              </div>
    
    
              <div class="options-first-block">
                <i class="fa fa-square options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Шаг пикселя</p>
                  <p class="options-first-block-caption__size" id="step-pixel-street">4</p>
                </div>
              </div>
    
    
              <div class="options-first-block">
                <i class="fa fa-get-pocket options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Гарантия</p>
                  <p class="options-first-block-caption__size" id="safe-street">1 год</p>
                </div>
              </div>
    
            </div>
    
          </div>
          <div class="content---first-line---img">
            <div class="img---wrapper">
              <img src="img/content---first.png">
            </div>
          </div>
        </div>

        <div class="options-second-block-big">
          <p class="caption-block">Характеристики</p>
  
          <div class="options-second-block-big-photo">
            <div class="content---second-line---img">
              <div class="img---wrapper">
                <img src="img/1235_site-758130484.jpg">
              </div>
            </div>
            <div class="options-second-block-big-photo-block">
              <p class="caption-block caption-block-par">Параметры модуля</p>
              <ul class="options-second-block-big-photo-block__list">
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Шаг пикселя</span>
                  <span class="dotted"></span>
                  <span class="parval" id="step-street">4 мм</span>
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

        <div class="options-third-block-big">
          <p class="caption-block caption-block-par">Параметры кабинета</p>
          <div class="options-third-block-big-photo">
            <div class="options-third-block-big-photo-block">
              <ul class="options-third-block-big-photo-block__list">
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Размер кабинета</span>
                  <span class="dotted"></span>
                  <span class="parval" id="size-cab-street">768 x 768 мм</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Доступ для обслуживания экрана</span>
                  <span class="dotted"></span>
                  <span class="parval" id ="dost-obs-street">Тыльное</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Вес (кг/м2)</span>
                  <span class="dotted"></span>
                  <span class="parval" id="weight-street">32.00</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Плотность пикселей на м2</span>
                  <span class="dotted"></span>
                  <span class="parval" id="density-street">62500</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Потребляемая мощность макс / сред, Вт/м2</span>
                  <span class="dotted"></span>
                  <span class="parval" id="power-street">1000 / 500</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Частота обновления (Гц)</span>
                  <span class="dotted"></span>
                  <span class="parval" id="frequency-update-street">960</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Частота кадра (Гц)</span>
                  <span class="dotted"></span>
                  <span class="parval" id="frequency-screen-street">50/60</span>
                </li>
              </ul>
            </div>
            <div class="content---third-line---img">
              <div class="img---wrapper">
                <img src="img/0020_875x492_3e6.jpg">
              </div>
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
                <span class="parval-fourth" id="size-screen-street">960 x 960 мм</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Разрешение экрана</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="resolution-screen-street">240 x 240 px</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Кол-во кабинетов</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="count-cab-street">1</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Вес экрана кг</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="weight-screen-street">32</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Энергопотребление экрана макс / сред, Вт</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="energo-screen-street">2360 / 1180</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Яркость кд/м2</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="bright-screen-street">>6000</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Рабочее напряжение</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="work-screen-street">220V/50Hz</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Степень защиты IP</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="protected-screen-street">IP65</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Угол обзора</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="corner-screen-street">H=160° / V=160°</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Температурный режим работы</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="temp-screen-street">-45°C~+50°C, влажн. до 90%</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Срок службы светодиодов</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="srok-screen-street">>100 000</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Площадь экрана м2</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="squar-screen-street">0.9216 M <sup>2</sup></span>
              </li>
            </ul>
          </div>
          <div class="content---fourth-line---img">
            <div class="calc-room---monitor">
                <div class="resize-container">
                  <div class="resize-drag">
                    <video  autoplay loop muted>
                      <source src="video/smart.mp4">
                    </video>
                    <div class="resize-container---text">
                      <span id="resize-drag-room">0.96 М x 0.96 М</span>
                      <span id="resize-drag-room-itog">0.9216 M <sup>2</sup></span>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="form-itog-block">
          <div class="form-itog">
            <p class="caption-block">Итог</p>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Монтаж</span>
              <span class="form-itog-item__value">0 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Стоимость экрана</span>
              <span class="form-itog-item__value" id="itog_street">90 597 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Управляющий компьютер</span>
              <span class="form-itog-item__value">0 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Доставка</span>
              <span class="form-itog-item__value">0 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Итого</span>
              <span class="form-itog-item__value" id="itog_street_all">90 597 &#x20bd;</span>
            </div>
          </div>
  
          <form action="" class="form callback__form" method="post">
            <p class="form__caption">Оформить заказ со скидкой</p>
            <input type="text" name="fio" placeholder="Укажите ФИО" class="form__input" id="user_name_room">
            <input type="text" name="email" placeholder="Укажите e-mail" class="form__input" id="user_email_room">
            <input type="text" placeholder="Телефон" class="phone_mask form__input" id="user_phone_room" required>
            <div class="robot">
              <div class="robot__check">
                  <svg viewBox="0 0 60 60">
                    <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                    <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                  </svg>
              </div>
              <span>Согласен с условиями <a href="/policy/" target="_blank">Политики конфиденциальности</a></span>
            </div>
            <input type="submit" value="Отправить" class="form__submit callback__form__button">
          </form>
        </div>

        <!-- Modal TAB1_MODAL1 -->
        <div class="modal fade" id="tab2_modal1" tabindex="-1" role="dialog" aria-labelledby="Замер" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Бесплатный замер</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" class="popupform callback__form" method="post">
                    <input type="text" name="fio" placeholder="Укажите ФИО" class="form-control" id="user_name_room_popup">
                    <input type="text" name="email" placeholder="Укажите e-mail" class="form-control" id="user_email_room_popup">
                    <input type="text" placeholder="Телефон" class="phone_mask form-control" id="user_phone_room_popup"  required>
                    <div class="robot">
                      <div class="robot__check">
                          <svg viewBox="0 0 60 60">
                            <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                            <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                          </svg>
                      </div>
                      <span>Согласен с условиями <a href="/policy/" target="_blank">Политики конфиденциальности</a></span>
                    </div>
                    <input type="submit" value="Отправить" class="form-submit callback__form__button">
                  </form>
                </div>
              </div>
            </div>
        </div>
  
        <!-- Modal TAB1_MODAL2 -->
        <div class="modal fade" id="tab2_modal2" tabindex="-1" role="dialog" aria-labelledby="Замер" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Получить коммерческое предложение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" class="popupform callback__form" method="post">
                  <input type="text" name="fio" placeholder="Укажите ФИО" class="form-control" id="user_name_room_popup_com">
                  <input type="text" name="email" placeholder="Укажите e-mail" class="form-control" id="user_email_room_popup_com">
                  <input type="text" placeholder="Телефон" class="phone_mask form-control" id="user_phone_room_popup_com" required>
                  <div class="result-room-block">
                    <div class="result-room-block-price">
                      <p class="result-room-block-price__caption">Цена экрана</p>
                      <p class="result-room-block-price__price" id="result-room-block-price__price-com">89 203 ₽</p>
                    </div>
                    <div class="result-room-block-size">
                      <p class="result-room-block-price__caption">Площадь экрана</p>
                      <p class="result-room-block-price__size" id="result-room-block-size__size-com">0.9216 M <sup>2</sup></p>
                    </div>
                  </div>
                  <div class="robot">
                    <div class="robot__check">
                        <svg viewBox="0 0 60 60">
                          <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                          <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                        </svg>
                    </div>
                    <span>Согласен с условиями <a href="/policy/" target="_blank">Политики конфиденциальности</a></span>
                  </div>
                  <input type="submit" value="Отправить" class="form-submit  callback__form__button">
                </form>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- /TAB2 -->
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <!-- TAB3 -->
      <section class="tab-content">

        <div class="form-media">
          <div class="calc-room---form">

          <div class="switch-street" style="display: none;">
            <p id="switch-street-day">День</p>
            <p id="switch-street-night">Ночь</p>
          </div>
  
          <div class="calc-media">

            <div class="calc-room__caption-block">
              <p class="name-block">Размер экрана</p>
              <button id="option-block-media"><i class="fa fa-arrow-right" aria-hidden="true"></i>Доп.параметры</button>
            </div>

            <div class="range---value">
              <label for="rangeWidthMedia" class="labelWidth">Ширина</label>
              <div class="range---value-index">
                <span id="rangeWidthMediaSpan" class="spanWidth">1</span><span class="spanWidth"> M</span>
              </div>
            </div>
            <input type="range" id="rangeWidthMedia" value="1" min="1" max="50" step="1">
            
            <div class="range---value">
              <label for="rangeHeightMedia" class="labelHeight">Высота</label>
              <div class="range---value-index">
                <span id="rangeHeightMediaSpan" class="spanHeight">1</span><span class="spanHeight"> M</span>
              </div>
            </div>
            <input type="range" id="rangeHeightMedia" value="1" min="1" max="50" step="1">
  
            <div class="name-big-block">
              <p class="name-block">Выберите шаг пикселя</p>
              <span>
                <i class="fa fa-question-circle quest-pix" aria-hidden="true" id="quest-pix-media"></i>
              </span>
            </div>
  
            <select class="select-css" id="select-step-pixel-media">
              <option value="25">25x25</option>
              <option value="50">50x25</option>
              <option value="31">31x31</option>
              <option value="10.4">10.4x13.8</option>
              <option value="15.6">15.6x15.6</option>
              <option value="15.63">15.63x31.25</option>
              <option value="16.6">16.6x16.6</option>
            </select>
  
            <select class="select-css select-module" id="select-module-media">
              <option>HD-XL-P 25 x 25 (прозрачность 60%)</option>
            </select>
  
            <p class="name-block">Выберите яркость</p>
            <select class="select-css">
              <option>Яркий</option>
              <option>Повышеная яркость</option>
            </select>
  
            <div class="block-inline">
              <p class="name-block">Гарантия</p>
              <a class="form-modal" href="#" data-toggle="modal" data-target="#tab3_modal1">Бесплатный выезд замерщика</a>
            </div>
  
            <div class="warranty-room-big-block">
              <div class="warranty-room-big-block---year">
                <div class="warranty-room-block">
                  <input type="radio" name="warranty-media" id="warranty-media1" class="warranty-room__radio" value="1" checked>
                  <label for="warranty-media1"><span></span>1 год</label>
                </div>
                <div class="warranty-room-block">
                  <input type="radio" name="warranty-media" id="warranty-media2" class="warranty-room__radio" value="2">
                  <label for="warranty-media2"><span></span>2 года</label>
                </div>
                <div class="warranty-room-block">
                  <input type="radio" name="warranty-media" id="warranty-media3" class="warranty-room__radio" value="3">
                  <label for="warranty-media3"><span></span>3 года</label>
                </div>
              </div>
              <div class="get-room-pred">
                  <a class="form-modal" href="#" class="get-room-pred-text" data-toggle="modal" data-target="#tab3_modal2">Получить ком. предложение</a>
              </div>
            </div>

            <!--<div style="margin-top: 10px;">
              <span class="name-block"> Введите курс доллара</span>
              <input type="text" id="kurs-dollar-media">
            </div>-->
  
            <div class="result-room-block">
              <div class="result-room-block-price">
                <p class="result-room-block-price__caption">Цена экрана</p>
                <p class="result-room-block-price__price" id="result-media-block-price__price">121 400 &#x20bd;</p>
              </div>
              <div class="result-room-block-price" style="display: none">
                <p class="result-room-block-price__caption">Цена экрана в $</p>
                <p class="result-room-block-price__price" id="result-media-block-price__price-dollar">0 $</p>
              </div>
              <div class="result-room-block-size">
                <p class="result-room-block-price__caption">Площадь экрана</p>
                <p class="result-room-block-price__size" id="result-media-block-size__size">1 М <sup>2</sup></p>
              </div>
            </div>
  
          </div>

          <div class="calc-room-option" id="calc-media-option">
            <p class="name-block">Доп. параметры</p>
            <div class="calc-room-option-big-block">
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option1">
                <label for="calc-media-option1"><span></span>Управляющий компьютер</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Управляющий компьютер" name="dop-options-media"></i>
              </div>
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option2">
                <label for="calc-media-option2"><span></span>Отправляющий контроллер</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Отправляющий контроллер" name="dop-options-media"></i>
              </div>
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option3">
                <label for="calc-media-option3"><span></span>Wi-Fi модуль</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Wi-Fi модуль" name="dop-options-media"></i>
              </div>
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option4">
                <label for="calc-media-option4"><span></span>Датчик яркости</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Датчик яркости" name="dop-options-media"></i>
              </div>
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option5">
                <label for="calc-media-option5"><span></span>Датчик температуры</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Датчик температуры" name="dop-options-media"></i>
              </div>
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option6">
                <label for="calc-media-option6"><span></span>Видеопроцессор</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Видеопроцессор" name="dop-options-media"></i>
              </div>
            </div>
  
  
            <p class="name-block">Монтаж</p>
            <div class="calc-room-option-big-block">
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option7">
                <label for="calc-media-option7"><span></span>Электрощитовая</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Электрощитовая" name="dop-options-media"></i>
              </div>
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option8">
                <label for="calc-media-option8"><span></span>Шефмонтаж</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Шефмонтаж" name="dop-options-media"></i>
              </div>
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option9">
                <label for="calc-media-option9"><span></span>Монтаж оборудования</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Монтаж оборудования" name="dop-options-media"></i>
              </div>
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option10">
                <label for="calc-media-option10"><span></span>Изгот. металлоконструкции</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Изгот. металлоконструкции" name="dop-options-media"></i>
              </div>
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option11">
                <label for="calc-media-option11"><span></span>Монтаж металлоконструкций</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Монтаж металлоконструкций" name="dop-options-media"></i>
              </div>
              <div class="calc-room-option-block">
                <input type="checkbox" class="calc-room-option-block__checkbox" id="calc-media-option12">
                <label for="calc-media-option12"><span></span>Набор запасных частей</label>
                <i class="fa fa-question-circle" aria-hidden="true" value="Набор запасных частей" name="dop-options-media"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="calc-room---monitor">
          <div class="resize-container-media">
            <div class="resize-drag-media">
              <video autoplay loop muted>
                <source src="video/smart.mp4">
              </video>
              <div class="resize-container---text">
                <span id="resize-drag-media-span">1 М x 1 М</span>
                <span id="resize-drag-media-span-itog">1 M <sup>2</sup></span>
              </div>
            </div>
          </div>
        </div>
  
        <div class="calc-room-option-help" id="calc-media-option-help">
          <p class="name-block" id="calc-media-option-help-caption">Тест</p>
          <p id="calc-media-option-help-text"></p>
        </div>
  
  
        <div class="calc-room-option-help" id="step-pix-block-media">
          <p class="name-block">Шаг пикселя</p>
          <p>Чем меньше шаг пикселя, тем более качественное изображение можно отображать на светодиодном экране.

            Для того чтобы подобрать оптимальный шаг пикселя, в первую очередь необходимо понять место для установки экрана, во-вторых определить минимальное расстояние, с которого будет читаться изображение.

            Нет смысла выбирать шаг 3 мм, под экран с установкой на фасаде здания с минимальным расстоянием обзора 10 м.

            Минимальное расстояние (МР) от экрана до зрителя прямо пропорционально шагу пикселя (ШП).

            Например:
            МР – 1 м = ШП – 1.2, 1.5 мм.
            МР – 3 м = ШП – 3 мм.
            МР – 10 м = ШП – 10мм.</p>
        </div>
  
        </div>
  
        <div class="content---first-line">
          <div class="options-first-block-big">
            <p class="caption-block">Медиафасад</p>
            <p id="name-media-module-p" class="caption-block-n">HD-XL-P 25 x 25 (прозрачность 60%)</p>
    
            <div class="options-first-block-big-flex">
              <div class="options-first-block">
                <i class="fa fa-arrows-alt options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Размер экрана</p>
                  <p class="options-first-block-caption__size" id="size-media">1000 x 1000 мм</p>
                </div>
              </div>
    
    
              <div class="options-first-block">
                <i class="fa fa-picture-o options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Разрешение экрана</p>
                  <p class="options-first-block-caption__size" id="resolution-media">1000 х 1000 px</p>
                </div>
              </div>
    
    
              <div class="options-first-block">
                <i class="fa fa-square options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Шаг пикселя</p>
                  <p class="options-first-block-caption__size" id="step-pixel-media">25х25</p>
                </div>
              </div>
    
    
              <div class="options-first-block">
                <i class="fa fa-get-pocket options-first-block__icon" aria-hidden="true"></i>
                <div class="options-first-block-caption">
                  <p class="options-first-block-caption__title">Гарантия</p>
                  <p class="options-first-block-caption__size" id="safe-media">1 год</p>
                </div>
              </div>
    
            </div>
    
          </div>
          <div class="content---first-line---img">
            <div class="img---wrapper">
              <img src="img/content---first.png">
            </div>
          </div>
        </div>

        <div class="options-second-block-big">
          <p class="caption-block">Характеристики</p>
  
          <div class="options-second-block-big-photo">
            <div class="content---second-line---img">
              <div class="img---wrapper">
                <img src="img/1235_site-758130484.jpg">
              </div>
            </div>
            <div class="options-second-block-big-photo-block">
              <p class="caption-block caption-block-par">Параметры модуля</p>
              <ul class="options-second-block-big-photo-block__list">
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Шаг пикселя</span>
                  <span class="dotted"></span>
                  <span class="parval" id="step-media">25 мм</span>
                </li>
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Конфигурация светодиодов</span>
                  <span class="dotted"></span>
                  <span class="parval" id ="conf-media">DIP 1R1G1B</span>
                </li>
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Производитель светодиодов</span>
                  <span class="dotted"></span>
                  <span class="parval" id="proiz-media">Xinda</span>
                </li>
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Размер модуля</span>
                  <span class="dotted"></span>
                  <span class="parval" id="size-media-module">1200 х 1200 мм</span>
                </li>
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Разрешение модуля</span>
                  <span class="dotted"></span>
                  <span class="parval" id="raz-media">48 х 48 px</span>
                </li>
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Контрастность</span>
                  <span class="dotted"></span>
                  <span class="parval" id="cont-media">3000:1</span>
                </li>
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Цветовая температура (°К)</span>
                  <span class="dotted"></span>
                  <span class="parval" id="color-media">3200 ~ 9300° K</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="options-third-block-big">
          <p class="caption-block caption-block-par">Параметры кабинета</p>
          <div class="options-third-block-big-photo">
            <div class="options-third-block-big-photo-block">
              <ul class="options-third-block-big-photo-block__list">
                <li class="options-second-block-big-photo-block__item">
                  <span class="parname">Размер кабинета</span>
                  <span class="dotted"></span>
                  <span class="parval" id="size-cab-media">640 x 640 мм</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Доступ для обслуживания экрана</span>
                  <span class="dotted"></span>
                  <span class="parval" id ="dost-obs-media">Фронтальное/с тыльной стороны</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Вес (кг/м2)</span>
                  <span class="dotted"></span>
                  <span class="parval" id="weight-media">38.00</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Плотность пикселей на м2</span>
                  <span class="dotted"></span>
                  <span class="parval" id="density-media">1600</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Потребляемая мощность макс / сред, Вт/м2</span>
                  <span class="dotted"></span>
                  <span class="parval" id="power-media">550 / 230</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Частота обновления (Гц)</span>
                  <span class="dotted"></span>
                  <span class="parval" id="frequency-update-media">3840</span>
                </li>
                <li class="options-third-block-big-photo-block__item">
                  <span class="parname">Частота кадра (Гц)</span>
                  <span class="dotted"></span>
                  <span class="parval" id="frequency-screen-media">50/60</span>
                </li>
              </ul>
            </div>
            <div class="content---third-line---img">
              <div class="img---wrapper">
                <img src="img/0020_875x492_3e6.jpg">
              </div>
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
                <span class="parval-fourth" id="size-screen-media">1000 x 1000 мм</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Разрешение экрана</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="resolution-screen-media">1000 х 1000 мм</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Кол-во кабинетов</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="count-cab-media">1</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Вес экрана кг</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="weight-screen-media">38</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Энергопотребление экрана макс / сред, Вт</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="energo-screen-media">550 / 230</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Яркость кд/м2</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="bright-screen-media">>6500</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Рабочее напряжение</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="work-screen-media">220V/50Hz</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Степень защиты IP</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="protected-screen-media">IP65</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Угол обзора</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="corner-screen-media">H=120° / V=60°</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Температурный режим работы</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="temp-screen-media">-40°C~+60°C, влажн. 10% - 90% RH</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Срок службы светодиодов</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="srok-screen-media">>100 000</span>
              </li>
              <li class="options-second-block-big-photo-block__item">
                <span class="parname-fourth">Площадь экрана м2</span>
                <span class="dotted-fourth"></span>
                <span class="parval-fourth" id="squar-screen-media">1 М <sup>2</sup></span>
              </li>
            </ul>
          </div>
          <div class="content---fourth-line---img">
            <div class="calc-room---monitor">
                <div class="resize-container">
                  <div class="resize-drag">
                    <video  autoplay loop muted>
                      <source src="video/smart.mp4">
                    </video>
                    <div class="resize-container---text">
                      <span id="resize-drag-room">0.96 М x 0.96 М</span>
                      <span id="resize-drag-room-itog">0.9216 M <sup>2</sup></span>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="form-itog-block">
          <div class="form-itog">
            <p class="caption-block">Итог</p>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Монтаж</span>
              <span class="form-itog-item__value">0 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Стоимость экрана</span>
              <span class="form-itog-item__value" id="itog_media">124 472 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Управляющий компьютер</span>
              <span class="form-itog-item__value">0 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Доставка</span>
              <span class="form-itog-item__value">0 &#x20bd;</span>
            </div>
            <div class="form-itog-item">
              <span class="form-itog-item__caption">Итого</span>
              <span class="form-itog-item__value" id="itog_media_all">124 472 &#x20bd;</span>
            </div>
          </div>
  
          <form action="" class="form callback__form" method="post">
            <p class="form__caption">Оформить заказ со скидкой</p>
            <input type="text" name="fio" placeholder="Укажите ФИО" class="form__input" id="user_name_room">
            <input type="text" name="email" placeholder="Укажите e-mail" class="form__input" id="user_email_room">
            <input type="text" placeholder="Телефон" class="phone_mask form__input" id="user_phone_room" required>
            <div class="robot">
              <div class="robot__check">
                  <svg viewBox="0 0 60 60">
                    <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                    <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                  </svg>
              </div>
              <span>Согласен с условиями <a href="/policy/" target="_blank">Политики конфиденциальности</a></span>
            </div>
            <input type="submit" value="Отправить" class="form__submit callback__form__button">
          </form>
        </div>


        <!-- Modal TAB1_MODAL1 -->
        <div class="modal fade" id="tab3_modal1" tabindex="-1" role="dialog" aria-labelledby="Замер" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Бесплатный замер</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" class="popupform callback__form" method="post">
                    <input type="text" name="fio" placeholder="Укажите ФИО" class="form-control" id="user_name_room_popup">
                    <input type="text" name="email" placeholder="Укажите e-mail" class="form-control" id="user_email_room_popup">
                    <input type="text" placeholder="Телефон" class="phone_mask form-control" id="user_phone_room_popup"  required>
                    <div class="robot">
                      <div class="robot__check">
                          <svg viewBox="0 0 60 60">
                            <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                            <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                          </svg>
                      </div>
                      <span>Согласен с условиями <a href="/policy/" target="_blank">Политики конфиденциальности</a></span>
                    </div>
                    <input type="submit" value="Отправить" class="form-submit callback__form__button">
                  </form>
                </div>
              </div>
            </div>
        </div>
  
        <!-- Modal TAB1_MODAL2 -->
        <div class="modal fade" id="tab3_modal2" tabindex="-1" role="dialog" aria-labelledby="Замер" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Получить коммерческое предложение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" class="popupform callback__form" method="post">
                  <input type="text" name="fio" placeholder="Укажите ФИО" class="form-control" id="user_name_room_popup_com">
                  <input type="text" name="email" placeholder="Укажите e-mail" class="form-control" id="user_email_room_popup_com">
                  <input type="text" placeholder="Телефон" class="phone_mask form-control" id="user_phone_room_popup_com" required>
                  <div class="result-room-block">
                    <div class="result-room-block-price">
                      <p class="result-room-block-price__caption">Цена экрана</p>
                      <p class="result-room-block-price__price" id="result-room-block-price__price-com">122 557 ₽</p>
                    </div>
                    <div class="result-room-block-size">
                      <p class="result-room-block-price__caption">Площадь экрана</p>
                      <p class="result-room-block-price__size" id="result-room-block-size__size-com">0.9216 M <sup>2</sup></p>
                    </div>
                  </div>
                  <div class="robot">
                    <div class="robot__check">
                        <svg viewBox="0 0 60 60">
                          <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                          <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                        </svg>
                    </div>
                    <span>Согласен с условиями <a href="/policy/" target="_blank">Политики конфиденциальности</a></span>
                  </div>
                  <input type="submit" value="Отправить" class="form-submit  callback__form__button">
                </form>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- /TAB3 -->
    </div>
  </div>

</section>



<!-- BS4 -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script>
  $(".phone_mask").mask("+7(999)999-99-99");
</script>
<!-- FontAwesome -->
<script src="https://use.fontawesome.com/402f73ccf5.js"></script>
<!-- CUSTOM -->
<script>  
$('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
});
$('.select-module').on('mousedown', function(e) {
   e.preventDefault();
});
$('.select-module').on('touchstart', function(e) {
   e.preventDefault();
});

let form = document.querySelectorAll('.callback__form');
  form.forEach(item => {
      let formBtn = item.querySelector('.callback__form__button');
      let checkBtn = item.querySelector('.robot__check');

      formBtn.disabled = true;
      checkBtn.addEventListener('click', () => {
          checkBtn.classList.add('active');
      
          item.action = '/thankyou.php';
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
</script>
<!-- /CUSTOM -->


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  


<script type="text/javascript">
  $(function() {

    $('.dop').on('click', function(){
      $('.calc-room-option').toggleClass('active');
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
          $('.option-first-size').html(rangeWidth*1000 + ' x ' + rangeHeight*1000 + ' мм');
          let step = $('.select-first-step').val();
          $('.option-first-step').html(step + ' мм');
          let warranty = $('.warranty-room-big-block---year input:checked').val();
          console.log(warranty);
          let formYear = 'год';
          if (warranty > 1) {
            formYear = 'года';
          }
          $('.option-first-warranty').html(warranty + ' ' + formYear);

          //Total
          $('.option-first-settingup').html(prettify(result.settingup) + ' &#x20bd;');
          $('.option-first-led').html(prettify(result.led) + ' &#x20bd;');
          $('.option-first-control').html(prettify(result.control) + ' &#x20bd;');
          $('.option-first-delivery').html(prettify(result.delivery) + ' &#x20bd;');
          $('.option-first-price').html(prettify(result.price) + ' &#x20bd;');

          //Modal
          $('.modal-first-price').html(prettify(result.price) + ' &#x20bd;');
          $('.modal-first-square').html(result.square + ' М <sup>2</sup>');

        }).fail(function(xhr, ajaxOptions, thrownError){
          console.log(thrownError);
        });
    }

    /////// Просто отправка
    $('.calc__ajax__form--first').on('change', function(e) {
        e.preventDefault();
        sendFirst();
      })

    /////Ползунок Ширина
    $(".rangeWidthRoom").mousemove(function(){
      //Расчитываем кличество шагов
      let rangeWidth = ((($(this).val()-0.96)/0.96)*20)+100;
      let setRangeWidth = (($(this).val()-0.96)+0.96).toFixed(2);
      //Изменяем шаг ползунка
      $(".resize-drag").css('width', rangeWidth);
      //Изменяем html значение ползунка
      $('.rangeWidth').html(setRangeWidth);
    });
    //Ползунок Высота
    $(".rangeHeightRoom").mousemove(function(){
      let rangeHeight = ((($(this).val()-0.96)/0.96)*20)+100;
      let setRangeHeight = (($(this).val()-0.96)+0.96).toFixed(2);
      $(".resize-drag").css('height', rangeHeight);
      $('.rangeHeight').html(setRangeHeight);
    });


    //Перетаскивание экрана
    $('.resize-drag').draggable({
      containment: "parent"
    });
    //Изменение размера экрана
    $(".resize-drag").resizable({
      containment: "parent",
      grid: 20,
      
      minWidth: 100,
      maxWidth: 380,
      minHeight: 100,
      maxHeight: 380,

      resize: function(event, ui) {
        //Определяем шаг
        let width = (ui.size.width-100)/20+1;
        let height = (ui.size.height-100)/20+1;
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

    /////Ползунок Ширина
    $(".rangeWidthRoomStreet").mousemove(function(){
      //Расчитываем кличество шагов
      let rangeWidth = ((($(this).val()-0.96)/0.96)*20)+100;
      let setRangeWidth = (($(this).val()-0.96)+0.96).toFixed(2);
      //Изменяем шаг ползунка
      $(".resize-drag-street").css('width', rangeWidth);
      //Изменяем html значение ползунка
      $('.rangeWidthStreet').html(setRangeWidth);
    });
    //Ползунок Высота
    $(".rangeHeightRoomStreet").mousemove(function(){
      let rangeHeight = ((($(this).val()-0.96)/0.96)*20)+100;
      let setRangeHeight = (($(this).val()-0.96)+0.96).toFixed(2);
      $(".resize-drag-street").css('height', rangeHeight);
      $('.rangeHeightStreet').html(setRangeHeight);
    });

    //Перетаскивание экрана
    $('.resize-drag-street').draggable({
      containment: "parent"
    });
    //Изменение размера экрана
    $(".resize-drag-street").resizable({
      containment: "parent",
      grid: 20,
      
      minWidth: 100,
      maxWidth: 380,
      minHeight: 100,
      maxHeight: 380,

      resize: function(event, ui) {
        //Определяем шаг
        let width = (ui.size.width-100)/20+1;
        let height = (ui.size.height-100)/20+1;
        //Устанавливаем ползунок в нужное положение
        $(".rangeWidthRoomStreet").val(0.96*width);
        $(".rangeHeightRoomStreet").val(0.96*height);
        //Устанавливаем html значение над ползунком
        $('.rangeWidthStreet').html((0.96*width).toFixed(2));
        $('.rangeHeightStreet').html((0.96*height).toFixed(2));
        sendSecond();
      }
    });
    
    //////////////////////////////////////////////////
    //Отправка формы и получение значений

    function sendSecond() {
      let data = $('.calc__ajax__form--second').serialize();
      $.ajax({
        method: "POST",
        url: "calc2.php",
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
        $('.videoSizeStreet').html(rangeWidth + ' М ' + rangeHeight + ' M');
        $('.videoSquareStreet').html(result.square + ' М <sup>2</sup>');

      }).fail(function(xhr, ajaxOptions, thrownError){
        console.log(thrownError);
      });
    };

    $('.calc__ajax__form--second').on('change', function(e) {
      e.preventDefault();
      sendSecond();
    })
    

    //Вуаля бля - магия
  });
  </script>

</body>
</html>