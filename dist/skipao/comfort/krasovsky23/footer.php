<?$options = get_option( 'krasovsky23_settings' )?>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-sm-6 col-lg-3">
        <a href="/" class="navbar-brand">
          <img src="<?=get_template_directory_uri()?>/img/logo.svg" alt="<?=get_bloginfo('name')?>">
        </a>
      </div>
      <div class="col-6 col-sm-7 col-lg-7">
        <?php 
          wp_nav_menu(array(
            'theme_location'  => 'footer_menu1',
            'container'       => '',
            'container_id'    => 'menu', 
            'container_class' => 'none', // css-класс блока
            'menu_class'      => '',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'		  => new krasovsky23_Walker_Nav_Menu()
          )); 
        ?>
        <?php 
          wp_nav_menu(array(
            'theme_location'  => 'footer_menu2',
            'container'       => '',
            'container_id'    => 'menu', 
            'container_class' => 'none', // css-класс блока
            'menu_class'      => '',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'		  => new krasovsky23_Walker_Nav_Menu()
          )); 
        ?>
      </div>
      <div class="col-6 col-sm-5 col-lg-2">
        <p>
          <a href="tel:<?=preg_replace('/\s/', '', $options['phone'])?>"><?=$options['phone']?></a>
        </p>
        <p>
          <a href="mailto:<?=$options['email']?>"><?=$options['email']?></a>
        </p>
        <p>
          Адрес: <?=$options['adress']?>
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="callback" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="modal-body">
            <p class="title">Оставить заявку</p>
            <form action="/" class="callback__form" method="post">
              <div class="form__field">
                <label for="name3"></label>
                <input type="text" id="name3" name="user" value="" placeholder="Имя" required pattern="^[А-Яа-яЁё\s]+$" maxlength="100">
                <span class="form__error">Ваше имя на русском языке</span>
              </div>
              <div class="form__field">
                <label for="phone3"></label>
                <input type="tel" id="phone3" name="phone" class="phone_mask" value="" placeholder="Телефон" required pattern="[\+]\d{1}\s[\(]\d{3}[\)]\s\d{3}[\-]\d{2}[\-]\d{2}" minlength="18" maxlength="18">
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
            </form>
          </div>
       </div>
    </div>
 </div>

<?wp_footer()?>