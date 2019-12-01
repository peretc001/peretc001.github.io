<?php $options = get_option( 'skipao_settings' ); ?>
<div class="footer" id="footer">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <div class="map">
                  <div class="map_wrap"></div>
               </div>
            </div>
            <div class="col-md-6">
               <a href="/" class="navbar-brand">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-white.svg" alt="">
                  <p>
                     <?php echo get_bloginfo('name'); ?>
                     <span><?php echo get_bloginfo('description'); ?></span>
                  </p>
               </a>
               <div temscope itemtype="http://schema.org/Organization">
                  <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="icon adres"><span itemprop="addressLocality"><?php echo $options['city']; ?></span>, <span itemprop="streetAddress"><?php echo $options['adress']; ?></span></p>
                  <p><a itemprop="telephone" class="icon phone" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a></p>
                  <br>
                  <p><a href="https://api.whatsapp.com/send?phone=<?php echo $options['whatsapp']; ?>" class="icon whatsapp" target="_blank">Написать в whatsapp</a></p>
                  <p><a href="<?php echo $options['insta']; ?>" class="icon instagram" target="_blank">Наш инстаграм</a></p>
               </div>
               <a href="https://skipao.ru/" target="_blank" class="author">
                  Разработка: СКИ ПАО
               </a>
            </div>
         </div>
      </div>
   </div>

   <section class="copyright">
      <p>© <?php echo date('Y'); ?>. <?php echo get_bloginfo('name'); ?> - <?php echo get_bloginfo('description'); ?></p>
   </section>


   <!-- Modal -->
   <div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="callbackTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
               <p class="name">Получить консультацию</p>
               <span class="title"></span>
               <form action="/" class="callback__form" method="post">
               <div class="form-row">
                  <input type="hidden" name="data-name" value="">
                  <input type="hidden" name="data-title" value="">
                  <input type="text" name="name" class="form-control" placeholder="Имя">
                  <input type="tel" name="phone" class="form-control tel" placeholder="Телефон" required>
                  
                  <div class="robot">
                     <div class="robot__check">
                        <svg viewBox="0 0 60 60">
                           <line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
                           <line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
                        </svg>
                     </div>
                     <span>Согласен с условиями <a href="#" data-toggle="modal" data-target="#policy">Политики конфиденциальности</a></span>
                  </div>

                  <button type="submit" class="btn callback__form__button" disabled>Отправить</button>
               </div>
               </form>
            </div>
            <div class="request_callback__footer">Заявка принята!!!</div>
         </div>
      </div>
   </div>

   <!-- Policy -->
   <div class="modal fade" id="policy" tabindex="-1" role="dialog" aria-labelledby="callbackTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content policy">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
               <h5>Политика конфиденциальности</h5>
               
               <p>Предоставляя свои персональные данные Посетитель даёт согласие на обработку, хранение и использование своих персональных данных на основании ФЗ № 152-ФЗ «О персональных данных» от 27.07.2006 г. в следующих целях:</p>
               <ul>
                  <li>- Регистрации Пользователя на сайте</li>
                  <li>- Осуществление клиентской поддержки</li>
                  <li>- Получения Пользователем информации о маркетинговых событиях</li>
                  <li>- Выполнение Администрацией сайта обязательств перед Посетителем</li>
                  <li>- Проведения аудита и прочих внутренних исследований с целью повышения качества предоставляемых услуг.</li>
               </ul>
               <p>Под персональными данными подразумевается любая информация личного характера, позволяющая установить личность Посетителя такая как:</p>
               <ul>
                  <li>- Фамилия, Имя, Отчество</li>
                  <li>- Контактный телефон</li>
                  <li>- Адрес электронной почты</li>
               </ul>
               <p>Персональные данные Посетителей хранятся исключительно на электронных носителях и обрабатываются с использованием автоматизированных систем, за исключением случаев, когда неавтоматизированная обработка персональных данных необходима в связи с исполнением требований законодательства.</p>
               <p>Администрация сайта обязуется не передавать полученные персональные данные третьим лицам, за исключением следующих случаев:</p>
               <p>По запросам уполномоченных органов государственной власти РФ только по основаниям и в порядке, установленным законодательством РФ</p>
               <p>Администрация сайта оставляет за собой право вносить изменения в одностороннем порядке в настоящие правила, при условии, что изменения не противоречат действующему законодательству РФ.</p>
               <p>Изменения условий настоящих правил вступают в силу после их публикации на Сайте</p>
            </div>
         </div>
      </div>
   </div>

   <div class="toTop">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/caret-square-up.svg" alt="">
   </div>
   
   <?php wp_footer() ?>