<?get_header()?>

<header style="background-image: url('<?=get_template_directory_uri()?>/img/header.jpg');">
    <div class="container">
      <h1>
        Комплексные климатические системы
      </h1>
      <p>
        на базе воздушного отопления
      </p>
    </div>
  </header>

  <form action="/" method="post" class="callback__form top-form">
    <div class="container">
      <p><b>
        Бесплатный расчёт
      </b></p>
      <p>
        Закажите бесплатный расчёт вашего объекта 
      </p>
      <div class="form__field">
        <label for="name">&nbsp;</label>
        <input type="text" id="name" name="user" value="" placeholder="Имя" required pattern="^[А-Яа-яЁё\s]+$" maxlength="100">
        <span class="form__error">Ваше имя на русском языке</span>
      </div>
      <div class="form__field">
        <label for="phone">&nbsp;</label>
        <input type="tel" id="phone" name="phone" class="phone_mask" value="" placeholder="Телефон" required pattern="[\+]\d{1}\s[\(]\d{3}[\)]\s\d{3}[\-]\d{2}[\-]\d{2}" minlength="18" maxlength="18">
        <span class="form__error">Пример +7 (912) 345-67-89</span>
      </div>
      <div class="form__field">
        <div class="robot">
          <div class="robot__check">
            <svg viewBox="0 0 60 60">
                <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
            </svg>
          </div>
          <span>Соглашаюсь с <a href="">политикой конфиденциальности.</a></span>
        </div>
      </div>
      <div class="form__field">
        <button type="submit" class="callback__form__button" disabled>Заказать бесплатный расчёт</button>
      </div>
    </div>
  </form>

  <div class="picture">
    <div class="container">
      <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/picture.jpg" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="">
    </div>
  </div>

  <section class="catalog">
    <div class="container">
      <h2>Краткий перечень оборудования <span>Lennox (Леннокс)</span></h2>
      <div class="catalog__grid">
        <div class="catalog__grid__item">
          <div class="first">
            <p>Руфтопы (с газовым нагревом)</p>
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/catalog/1.png" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="">
          </div>
          <div class="second">
            <p><b>Руфтопы (с газовым нагревом)</b></p>
            <ul>
              <li>KGA 060 (тепло: 38 кВт. / холод: 17 кВт.)</li>
              <li>KGA 120 (тепло: 38 кВт. / холод: 35 кВт.)</li>
              <li>KGA 150 (тепло: 52 кВт. / холод: 44 кВт.)</li>
              <li>KGA 180 (тепло: 68 кВт. / холод: 52 кВт.)</li>
              <li>KGA 240 (тепло: 91 кВт. / холод: 70 кВт.)</li>
              <li>KGA 300 (тепло: 123 кВт. / холод: 88 кВт.)</li>
              <li>LGH 360 (тепло: 123 кВт. / холод: 105 кВт.)</li>
            </ul>
            <a href="" class="btn btn-accent">Подробнее</a>
          </div>
        </div>
        <div class="catalog__grid__item">
          <div class="first">
            <p>Воздухонагреватели</p>
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/catalog/2.png" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="">
          </div>
          <div class="second">
            <p><b>Воздухонагреватели</b></p>
            <ul>
              <li>G61MPVT-36B – 070</li>
              <li>G61MPVT-36B – 070</li>
              <li>G61MPVT-36B – 070</li>
              <li>G61MPVT-36B – 070</li>
            </ul>
            <a href="" class="btn btn-accent">Подробнее</a>
          </div>
        </div>
        <div class="catalog__grid__item">
          <div class="first">
            <p>Очистка воздуха РСО</p>
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/catalog/3.png" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="">
          </div>
          <div class="second">
            <p><b>Очистка воздуха РСО</b></p>
            <ul>
              <li>PCO 14-23</li>
              <li>PCO 16-28</li>
              <li>PCO 20-28</li>
            </ul>
            <a href="" class="btn btn-accent">Подробнее</a>
          </div>
        </div>
        <div class="catalog__grid__item">
          <div class="first">
            <p>Испарители</p>
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/catalog/4.png" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="">
          </div>
          <div class="second">
            <p><b>Испарители</b></p>
            <ul>
              <li>C33-24 B-2F</li>
              <li>C33-36 B-2F</li>
              <li>C33-48 C-2F</li>
              <li>C33-60 С-2F</li>
              <li>C33-60 D-2F</li>
            </ul>
            <a href="" class="btn btn-accent">Подробнее</a>
          </div>
        </div>
        <div class="catalog__grid__item">
          <div class="first">
            <p>Очистка воздуха НСС</p>
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/catalog/5.png" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="">
          </div>
          <div class="second">
            <p><b>Очистка воздуха НСС</b></p>
            <ul>
              <li>HCC 14-23</li>
              <li>HCC 16-28</li>
              <li>HCC 20-28</li>
            </ul>
            <a href="" class="btn btn-accent">Подробнее</a>
          </div>
        </div>
        <div class="catalog__grid__item">
          <div class="first">
            <p>Вентиляторный доводчик Air Handlers</p>
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/catalog/6.png" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="">
          </div>
          <div class="second">
            <p><b>Вентиляторный доводчик Air Handlers</b></p>
            <ul>
              <li>BC(V)RM.B9.9.36</li>
              <li>BC(V)RM.B9.9.60</li>
            </ul>
            <a href="" class="btn btn-accent">Подробнее</a>
          </div>
        </div>
        <div class="catalog__grid__item">
          <div class="first">
            <p>Наружные блоки (ККБ)</p>
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/catalog/7.png" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="">
          </div>
          <div class="second">
            <p><b>Наружные блоки (ККБ)</b></p>
            <ul>
              <li>TSA 024 S4N41 T</li>
              <li>TSA 036 S4N41 T</li>
              <li>TSA 036 S4N41 M</li>
              <li>TSA 048 S4N41 M</li>
              <li>TSA 060 S4N41 M</li>
            </ul>
            <a href="" class="btn btn-accent">Подробнее</a>
          </div>
        </div>
        <div class="catalog__grid__item">
          <div class="first">
            <p>Увлажнители воздуха</p>
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/catalog/8.png" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="">
          </div>
          <div class="second">
            <p><b>Увлажнители воздуха</b></p>
            <ul>
              <li>HCW B 3-12A</li>
              <li>HCW B 3-17A</li>
            </ul>
            <a href="" class="btn btn-accent">Подробнее</a>
          </div>
        </div>
        <div class="catalog__grid__item">
          <div class="first">
            <p>Уф. стерилизаторы воздуха</p>
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/catalog/9.png" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="">
          </div>
          <div class="second">
            <p><b>Уф. стерилизаторы воздуха</b></p>
            <ul>
              <li>UVC-41 W-S</li>
              <li>UVC-41 W-D</li>
            </ul>
            <a href="" class="btn btn-accent">Подробнее</a>
          </div>
        </div>
      </div>
      <button class="btn btn-accent btn-center" data-toggle="modal" data-target="#callback">Оставить заявку</button>
    </div>
  </section>

  <section class="proposal">
    <div class="container">
      <h3>Что мы можем вам предложить</h3>
      <div class="row">
        <div class="col-lg-6">
          <a href="#">
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/proposal/1.jpg" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="Бытовые системы «ВО», кондиционирования и вентиляции">
          </a>
        </div>
        <div class="col-lg-6">
          <a href="#">
            <b>
              Бытовые системы «ВО»,<br>кондиционирования и вентиляции
            </b>
          </a>
          <p>
            Наиболее комфортными климатическими системы для коттеджа являются комплексные климатические системы на базе воздушного отопления. Позволяют решить сразу ряд задач, (среди прочего) отопление, кондиционирование, очистка воздуха, а так же систему вентиляции.
          </p>
          <a href="" class="btn btn-accent">Подробнее</a>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <a href="#">
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/proposal/2.jpg" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="Коммерческие системы «ВО», кондиционирования и вентиляции">
          </a>
        </div>
        <div class="col-lg-6">
          <a href="#">
            <b>
              Коммерческие системы «ВО», кондиционирования и вентиляции
            </b>
          </a>
          <p>
            Моноблочные климатические установки с газовым нагревом выгодно отличаются (ценой, простотой монтажа) от систем чиллер-фанкойл (с газовой котельной). Оборудование располагается снаружи здания, для установки руфтопа строительство газовой котельной внутри здания не требуется.
          </p>
          <a href="" class="btn btn-accent">Подробнее</a>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <a href="#">
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/proposal/3.jpg" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="Геотермальные системы отопления, кондиционирования, вентиляции и «ГВС» ">
          </a>
        </div>
        <div class="col-lg-6">
          <a href="#">
            <b>
              Геотермальные системы отопления, кондиционирования, вентиляции и «ГВС» 
            </b>
          </a>
          <p>
            В том случае,- если подключение сетевого газа не возможно, а электрические мощности ограничены, возможна установка геотермальных систем отопления (с закрытым водяным контуром). Такая система способна работать с высокими показателями эффективности и возможна к установки практически повсеместно.
          </p>
          <a href="" class="btn btn-accent">Подробнее</a>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <a href="#">
            <img class="lazy" data-src="<?=get_template_directory_uri()?>/img/proposal/4.jpg" src="<?=get_template_directory_uri()?>/img/grey.jpg" alt="Проектирование воздушного отопления, кондиционирования и вентиляции ">
          </a>
        </div>
        <div class="col-lg-6">
          <a href="#">
            <b>
              Проектирование воздушного отопления, кондиционирования и вентиляции 
            </b>
          </a>
          <p>
            Значение монтажной схемы, наличие (профессионального проекта) сложно переоценить. Еще до начала монтажных работ заказчик должен увидеть состав системы, размеры и расположение воздуховодов. Наличие проекта позволяет предупредить возможные ошибки, предупредить непредвиденные расходы.
          </p>
          <a href="" class="btn btn-accent">Подробнее</a>
        </div>
      </div>

    </div>
  </section>

  <section class="contact">
    <div class="container">
      <h5>Контакты</h5>
      <div class="row">
        <div class="col-md-7">
          <div class="map">
            <!-- insert yandex.map from scripts.min.js -->
          </div>
        </div>
        <div class="col-md-5">
          <h5>
            Контакты
          </h5>
          <p>
            Телефон: <a href="tel:89385047763">+7 (938) 504-77-63</a>
          </p>
          <p>
            Email: <a href="mailto:">fullcom@mail.ru</a>
          </p>
          <p>
            Адрес: г. Краснодар, ст. Елизаветинская,<br> ул. Северная 182
          </p>
        </div>
      </div>
    </div>
  </section>

  <form action="/" method="post" class="callback__form bottom-form">
    <div class="container">
      <p><b>
        Бесплатный расчёт
      </b></p>
      <p>
        Закажите бесплатный расчёт вашего объекта 
      </p>
      <div class="form__field">
        <label for="name2"></label>
        <input type="text" id="name2" name="user" value="" placeholder="Имя" required pattern="^[А-Яа-яЁё\s]+$" maxlength="100">
        <span class="form__error">Ваше имя на русском языке</span>
      </div>
      <div class="form__field">
        <label for="phone2"></label>
        <input type="tel" id="phone2" name="phone" class="phone_mask" value="" placeholder="Телефон" required pattern="[\+]\d{1}\s[\(]\d{3}[\)]\s\d{3}[\-]\d{2}[\-]\d{2}" minlength="18" maxlength="18">
        <span class="form__error">Пример +7 (912) 345-67-89</span>
      </div>
      <div class="form__field">
        <div class="robot">
          <div class="robot__check">
            <svg viewBox="0 0 60 60">
                <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
            </svg>
          </div>
          <span>Соглашаюсь с <a href="">политикой конфиденциальности.</a></span>
        </div>
      </div>
      <div class="form__field">
        <button type="submit" class="callback__form__button" disabled>Заказать бесплатный расчёт</button>
      </div>
    </div>
  </form>

<?get_footer()?>