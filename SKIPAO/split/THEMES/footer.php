<?php 
   $options = get_option( 'skipao_settings' );
?>
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
                     <img src="<?php echo $options['logo_footer']; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                  </a>
                  <div temscope itemtype="http://schema.org/Organization">
                     <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="icon adres"><span itemprop="addressLocality"><?php echo $options['city']; ?></span>, <span itemprop="streetAddress"><?php echo $options['adress']; ?></span></p>
                     <p><a itemprop="telephone" class="icon phone" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a></p>
                     <br>
                     <p><a href="https://api.whatsapp.com/send?phone=<?php echo $options['whatsapp']; ?>&text=Добрый%20день.%20Меня%20интересует%20сплит-система.%20Свяжитесь%20со%20мной" class="icon whatsapp" target="_blank">Написать в whatsapp</a></p>
                     <p><a href="<?php echo $options['insta']; ?>" class="icon instagram" target="_blank">Наш Инстаграм</a></p>
                     <p><a href="<?php echo $options['vk']; ?>" class="icon vk" target="_blank">Наш Вконтактке</a></p>
                  </div>
                  <a href="https://skipao.ru/" target="_blank" class="author">
                     Разработка: СКИ ПАО
                  </a>
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