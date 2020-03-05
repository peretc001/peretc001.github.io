<?php 
   $options = get_option( 'skipao_settings' );
?>
      <div class="footer" id="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-4 order-1 order-md-2">
                  <a href="/" class="logo">
                     <img src="<?php echo $options['logo_footer']; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                  </a>
                  <div temscope itemtype="http://schema.org/Organization">
                     <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="icon adres"><span itemprop="addressLocality"><?php echo $options['city']; ?></span><br><span itemprop="streetAddress"><?php echo $options['adress']; ?></span></p>
                     <p><a itemprop="telephone" class="icon phone" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a></p>
                     <p class="last"><a href="https://api.whatsapp.com/send?phone=<?php echo $options['whatsapp']; ?>&text=Добрый%20день.%20Меня%20интересует%20сплит-система.%20Свяжитесь%20со%20мной" class="whatsapp" target="_blank">Написать в whatsapp</a></p>
                  </div>
               </div>
               <div class="col-md-4 menu order-2 order-md-1">
                  <h4>Меню:</h4>
                  <ul>
                     <li class="nav-item prom">
                        <a href="/brands/">
                           Бренды
                        </a>
                     </li>
                     <li class="nav-item prom">
                        <a href="/polupromyshlennye/">
                           Полупромышленные
                        </a>
                     </li>
                     <li class="nav-item sale">
                        <a href="/sale/">
                           Акции
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="/uslugi/">Услуги</a>
                     </li>
                     <li class="nav-item">
                        <a href="/oplata/">Оплата и доставка</a>
                     </li>
                     <li class="nav-item">
                        <a href="/about/">О компанни</a>
                     </li>
                     <li class="nav-item">
                        <a href="/contact/">Контакты</a>
                     </li>
                  </ul>

               </div>

               <div class="col-md-4 order-3">
                  <div class="right">
                     <div class="right_head">
                        <p>Принимаем к оплате:</p>
                        <div class="bank">
                           <div class="bank__img"><img src="<?php echo get_template_directory_uri(); ?>/img/footer/visa.png" alt=""></div>
                           <div class="bank__img"><img src="<?php echo get_template_directory_uri(); ?>/img/footer/mastercard.png" alt=""></div>
                           <div class="bank__img"><img src="<?php echo get_template_directory_uri(); ?>/img/footer/mir.png" alt=""></div>
                        </div>
                     </div>
                     
                     <div class="right_body">
                        <p>Мы в социальных сетях:</p>
                        <div class="social">
                           <a href="<?php echo $options['insta']; ?>" class="instagram" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/instagram.svg"></a>
                           <a href="<?php echo $options['vk']; ?>" class="vk" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/vk.svg"></a>
                        </div>
                     </div>

                     <a href="https://skipao.ru/" target="_blank" class="author">
                        Разработка: СКИ ПАО
                     </a>
                     <meta name="author" content='Красовский Игорь' href="https://krasovsky23.ru" />
                  </div>
               </div>
            </div>
         </div>
      </div>
   
      <section class="copyright">
         <p><span>© 2019.</span> <?php echo get_bloginfo('name'); ?> - сплит-системы</p>
      </section>
   
   </main>



   <!-- Modal Cart -->
   <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="callbackTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <span class="name">Заказать звонок</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
               <span class="title"></span>
               <div class="price">
                  <span class="model"></span>
                  <div class="total"></div>
               </div>
               <form action="/" class="callback__form" method="post">
               <div class="form-row">
                  <input type="hidden" name="data-name" value="">
                  <input type="hidden" name="data-title" value="">
                  <input type="hidden" name="data-model" value="">
                  <input type="hidden" name="data-price" value="">
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

                  <button type="submit" class="btn callback__form__button" disabled>Заказать</button>
               </div>
               </form>
            </div>
            <div class="request_callback__footer">Заявка принята!!!</div>
         </div>
      </div>
   </div>
   
   <div class="toTop">
		<img src="<?php echo get_template_directory_uri(); ?>/img/toTop.svg" alt="">
   </div>
   
   <?php wp_footer() ?>