<!-- Modal -->
<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body">
          <form action="/" class="callback__form" method="post">
            <p><b>Заказать консультацию</b></p>
            <p>Оставьте свои контакты - мы свяжемся с вами в ближайшее время</p>
            <div class="form-row">
              <input type="text" name="user" class="form-control" placeholder="Имя" required>
            </div>
            <div class="form-row">
              <input type="tel" name="phone" class="form-control tel" placeholder="Телефон" required>
            </div>
            <div class="form-row">
              <textarea name="msg" rows="5" placeholder="Комментарий"></textarea>
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
            <button type="submit" class="btn callback__form__button" disabled>Отправить</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal select -->
  <div class="modal fade" id="selectForm" tabindex="-1" role="dialog" aria-labelledby="selectFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body">
          <form action="/" class="callback__form" method="post">
            <p><b>Расчет стоимости</b></p>
            <p>Хотите получить гарантированную скидку на деревянные окна?</p>
            <p>Просто ответьте на 4 вопроса </p>
            <input type="hidden" name="form" value="Расчет стоимости">
            <div class="dropdown">
              <button class="dropdown-toggle" type="button" id="profil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Профиль?
              </button>
              <input type="hidden" name="profil" value="">
              <div class="dropdown-menu" aria-labelledby="profil">
                <a class="dropdown-item" href="#">Дерево</a>
                <a class="dropdown-item" href="#">Дерево алюминий</a>
                <a class="dropdown-item" href="#">Ещё думаем</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropdown-toggle" type="button" id="wood" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Какое дерево?
              </button>
              <input type="hidden" name="wood" value="">
              <div class="dropdown-menu" aria-labelledby="wood">
                <a class="dropdown-item" href="#">Сосна</a>
                <a class="dropdown-item" href="#">Лиственница</a>
                <a class="dropdown-item" href="#">Дуб</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropdown-toggle" type="button" id="where" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Окна куда?
              </button>
              <input type="hidden" name="where" value="">
              <div class="dropdown-menu" aria-labelledby="where">
                <a class="dropdown-item" href="#">Дом</a>
                <a class="dropdown-item" href="#">Квартира</a>
                <a class="dropdown-item" href="#">Другое</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropdown-toggle" type="button" id="time" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Когда нужны Окна?
              </button>
              <input type="hidden" name="time" value="">
              <div class="dropdown-menu" aria-labelledby="time">
                <a class="dropdown-item" href="#">Сейчас</a>
                <a class="dropdown-item" href="#">Через 2 месяца</a>
                <a class="dropdown-item" href="#">В этом году</a>
              </div>
            </div>
            <hr>
            <div class="form-row">
              <input type="text" name="user" class="form-control" placeholder="Имя" required>
            </div>
            <div class="form-row">
              <input type="tel" name="phone" class="form-control tel" placeholder="Телефон" required>
            </div>
            <div class="form-row">
              <input type="email" name="email" class="form-control" placeholder="E-mail" required>
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
            <button type="submit" class="btn callback__form__button" disabled>Рассчитать</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <section class="copyright">
    <p><span>© 2015-<?php echo date('Y'); ?>. </span> <?php echo get_bloginfo('name'); ?> - <?php echo get_bloginfo('description'); ?></p>
    <a href="https://krasovsky23.ru" target="_blank" class="author">
      Разработка: { КИ }
    </a>
  </section>
  <?php wp_footer() ?>