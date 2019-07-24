<?php get_header(); ?>
   <section class="header" id="header" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/header/header.jpg')">
   <div class="container">
         <h1>Центр переговоров <span>и оказания юридических услуг</span></h1>
         <div class="row">
            <div class="col-sm-6 col-md-3 header__card">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/header/hand-shake.svg" alt="">
               <p>
                  Досудебное урегулирование. <span>Разрешение конфликтов</span>
               </p>
            </div>
            <div class="col-sm-6 col-md-3 header__card">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/header/auction.svg" alt="">
               <p>
                  Юридическая помощь гражданам. <span>Ведение дел в судах</span>
               </p>
            </div>
            <div class="col-sm-6 col-md-3 header__card">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/header/family.svg" alt="">
               <p>
                  Бракоразводный процесс. <span>Споры с детьми, раздел имущества.</span>
               </p>
            </div>
            <div class="col-sm-6 col-md-3 header__card">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/header/house.svg" alt="">
               <p>
                  Споры с недвижимостью. <span>Земельные споры. Помощь дольщикам.</span>
               </p>
            </div>
         </div>
         <div class="consultation">
            <form action="/thankyou.php" class="form_consult" method="post">
               <p>Бесплатная юридическая консультация <span>Перезваниваем в течении 5 минут</span></p>
               <div class="consultation__input">
                  <input type="hidden" name="human" value="human">
                  <input type="text" name="name" class="form-control" value="" placeholder="Имя">
                  <input type="tel" name="phone" class="form-control tel" value="" placeholder="Телефон" required>
                  <button type="submit" class="btn btn-dark">Получить</button>
               </div>
            </form>
            <div class="request_callback">Заявка принята!!!</div>
         </div>
      </div>
   </section>

   <section class="about" id="services">
      <div class="container">
         <h2>Защита ваших интересов</h2>
         <p class="text-center">Профессиональное урегулирование споров и конфликтов на досудебной, судебной стадии и на стадии исполнения решения суда</p>
         <div class="about__column">
            <div class="about__column__item">
               <p>1</p>
               <p><strong>Работаем на результат</strong> Делаем все возможное для урегулирования споров до суда</p>
            </div>
            <div class="about__column__item">
               <p>2</p>
               <p><strong>Работаем под ключ</strong> Полное сопровождение под ключ до результата</p>
            </div>
            <div class="about__column__item">
               <p>3</p>
               <p><strong>Профессионалы с большим опытом</strong> Юристы, адвокаты, медиаторы, переговорщики, психологи</p>
            </div>
            <div class="about__column__item">
               <p>4</p>
               <p><strong>Конфиденциальность</strong> Гарантируем полную конфиденциальной ваших данных</p>
            </div>
         </div>
      </div>
   </section>

   <section class="feauters" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/feauters.jpg')">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <p>Опыт работы</p> 
               <p>с 2004 года</p>
            </div>
            <div class="col-md-4">
               <p>Довольных клиентов</p>
               <p>более 300 в год</p>
            </div>
            <div class="col-md-4">
               <p>Мировых соглашений</p>
               <p>более 200 в год</p>
            </div>
         </div>
      </div>
   </section>

   <section class="why">
      <div class="container">
         <h3><span>6 причин</span> обратится к нам</h3>
         <div class="row">
            
            <div class="col-sm-6 col-md-4">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/why/002-safety-box.svg" alt="">
               <p>Конфиденциальность</p>
               <p>Гарантируем полную анонимность полученной информации о клиенте, имуществе и хоте работ</p>
            </div>

            <div class="col-sm-6 col-md-4">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/why/003-graphic.svg" alt="">
               <p>Оцениваем перспективы заранее</p>
               <p>Беремся только за те дела, в результатах которых мы уверенны</p>
            </div>

            <div class="col-sm-6 col-md-4">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/why/004-trophy.svg" alt="">
               <p>Работа до положительного результата</p>
               <p>Оплата наших услуг производится только после ожидаемого результата.</p>
            </div>

            <div class="col-sm-6 col-md-4">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/why/005-wallet.svg" alt="">
               <p>Фиксированная стоимость</p>
               <p>Вы получаете фиксированную стоимость услуг, прописанную в договоре.</p>
            </div>
            
            <div class="col-sm-6 col-md-4">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/why/006-suitcase.svg" alt="">
               <p>Работаем под ключ</p>
               <p>Осуществляем полный комплекс услуг: от сбора документов до контроля исполнения решения суда</p>
            </div>

            <div class="col-sm-6 col-md-4">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/why/001-balance.svg" alt="">
               <p>Работа в правовом поле</p>
               <p>Все методы урегулирования споров абсолютно законны и не вызывают нареканий у одной из сторон</p>
            </div>

            <div class="col-12">
               <button class="btn btn-outline-accent" data-toggle="modal" data-target="#callback">Заказать консультацию</button>
            </div>
         </div>
      </div>
   </section>
	
<?php get_footer(); ?>
		