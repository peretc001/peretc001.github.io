<!-- Modal -->
<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          <div class="modal-body">
              <p>Заказать консультацию</p>
              <form action="/" class="callback__form" method="post">
                <input type="hidden" name="recipient" class="recipient" value="">
                <div class="form-row">
                  <input type="tel" name="phone" class="form-control tel" placeholder="Телефон" required>
                  <button type="submit" class="btn callback__form__button" disabled>Отправить</button>
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