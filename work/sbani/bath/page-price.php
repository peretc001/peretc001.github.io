<?php
/*
Template Name: Прайс
*/
$options = get_option( 'sbani_settings' );

?>
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/header.php'); ?>
<body>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/nav.php'); ?>
	<div class="price">
		<div class="introHolder">
			<h4>Банное меню</h4>
		</div>
		<div class="row entrance">
			<div class="two-thirds column">
				<strong><?php echo $options['sb_price_text1']; ?></strong>
			</div>
			<div class="one-third column">
				<span><?php echo $options['sb_price1']; ?></span> р.
			</div>
		</div>
		<div class="row entrance">
			<div class="two-thirds column">
				<?php echo $options['sb_price_text2']; ?>
			</div>
			<div class="one-third column">
				<span><?php echo $options['sb_price2']; ?></span> р.
			</div>
		</div>
		<div class="row entrance">
			<div class="two-thirds column">
				<strong><?php echo $options['sb_price_text3']; ?></strong>
			</div>
			<div class="one-third column">
				<span><?php echo $options['sb_price3']; ?></span> р.
			</div>
		</div>
		<div class="row entrance_text">
			<p><u>Входной билет</u> включает в себя:</p>
		</div>
		<div class="row entrance_about">
			<div class="one-half column">
				<img src="/images/price/clock.svg">
				<p>Пребывание в комплексе до 5 часов</p>
			</div>
			<div class="one-half column">
				<img src="/images/price/lockers.svg">
				<p>Индивидуальный шкафчик</p>
			</div>
		</div>
		<div class="row entrance_about">
			<div class="one-half column">
				<img src="/images/price/flip-flops.svg">
				<p>Простынь, полотенце, тапочки (аренда)</p>
			</div>
			<div class="one-half column center">
				<img src="/images/price/pool.svg">
				<p>Зону отдыха, бассейны и общественные парные</p>
			</div>
		</div>
	</div>
	<div class="price par" id="par">
		<div class="introHolder">
			<h3>Большая и малая парные:</h3>
		</div>
		<div class="row">
			<div class="one-third column">
				<p><b>Суворовский стандарт (легкое)</p>
				<p><span>1500</span> р.</b></p>
				<ul>
					<li>Парение в 1 заход (до 20 мин.)</li>
					<li>Протяжка по-Суворовски</li>
					<li>Комплексный прогрев тела с обеих сторон</li>
					<li>Догрев сидя</li>
					<li>Детям до 12 лет <span>700</span> р.</li>
				</ul>
			</div>
			<div class="one-third column">
				<p><b>Взятие Измаила (классическое)</p>
				<p><span>2500</span> р.</b></p>
				<ul>
					<li>Парение в 2 захода (35 мин.)</li>
					<li>Протяжка по-Суворовски</li>
					<li>Глубокий прогрев тела с обеих сторон с догревом сидя в 2 полноценных захода в течении 3-5 минут между заходами</li>
				</ul>
			</div>
			<div class="one-third column">
				<p><b>Дуплет </p>
				<p><span>3500</span> р.</b></p>
				<ul>
					<li>Парение в 1,5 захода (30 мин.)</li>
					<li>Протяжка по-Суворовски</li>
					<li>Комплексный прогрев тела с обеих сторон в 4 руки в 1 полноценный заход, догрев спины</li>
					<li>Догрев сидя</li>
				</ul>
			</div>
			<div class="one-third column center">
				<p><b>Переход через Альпы</p>
				<p><span>4000</span> р.</b></p>
				<ul>
					<li>Парение в 3 захода (до 60 мин.)</li>
					<li>Протяжка по-Суворовски</li>
					<li>Комплексный прогрев тела с обеих сторон с догревом сидя в 2 захода с небольшим перерывом</li>
					<li>Ледовое обтирание с догревом спины</li>
					<li>Домики из веников для укрытия головы</li>
					<li>Отдых на качеле после второго захода 3-5 мин</li>
					<li>Легкий прогрев спины и ног в третьем заходе</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="price lip">
		<div class="introHolder">
			<h3>Липовый комплекс:</h3>
		</div>
		<div class="row">
			<div class="one-third column">
				<p><b>Березовый пар (Русский Дух)</p>
				<p><span>1200</span> р.</b></p>
				<ul>
					<li>в один заход, подача отваром березы, веники из березы</li>
					<li>время 15 минут</li>
				</ul>
			</div>
			<div class="one-third column">
				<p><b>Солдатское</p>
				<p><span>2300</span> р.</b></p>
				<ul>
					<li>парение в два захода, первый заход березовыми вениками,второй заход дубовыми вениками</li>
					<li>время 35 минут</li>
				</ul>
			</div>
			<div class="one-third column">
				<p><b>Офицерское</p>
				<p><span>2700</span> р.</b></p>
				<ul>
					<li>два захода под дубовый веник, медовый пилинг между заходами</li>
					<li>время 45 минут</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="one-half column">
				<p><b>Генеральское</p>
				<p><span>6500</span> р.</b></p>
				<ul>
					<li>три захода, дуб-береза, контрасты/догревы, четыре руки + фирменный стиль и авторская методика парения</li>
					<li>время до 1 часа 30 минут</li>
				</ul>
			</div>
			<div class="one-half column">
				<p><b>Коллективное (за 1 человека)</p>
				<p><span>500</span> р.</b></p>
				<ul>
					<li>без контакта с вениками, подача разными отварами</li>
					<li>время 15 минут</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="price piling">
		<div class="introHolder">
			<h3>ПИЛИНГИ И ОБТИРАНИЯ:</h3>
		</div>
		<div class="row top">
			<ul>
				<li class="left">Берёзовый рассвет</li> <li><span>1500</span> р.</li>
				<li class="left">Солевое обтирание морской солью</li> <li><span>500</span> р.</li>
				<li class="left">Медовое обтирание</li> <li><span>1500</span> р.</li>
			</ul>
			<p><u>Дополнительные услуги:</u></p>
		</div>
		<div class="row">
			<div class="one-half column">
				<ul>
					<li class="left">Парение на сене</li><li><span>500</span> р.</li>
					<li class="left">Парение на хвое (из 8 веников)</li><li><span>2400</span> р.</li>
					<li class="left">Парение хвойными вениками</li><li><span>600</span> р.</li>
					<li class="left">Холодное парение</li><li><span>300</span> р.</li>
					<li class="left">Качели</li><li><span>400</span> р.</li>
					<li class="left">Домик из веников</li><li><span>200</span> р.</li>
				</ul>
			</div>
			<div class="one-half column">
				<ul>
					<li class="left">Ледовое обтирание с догревом</li><li><span>500</span> р.</li>
					<li class="left">Шапка Деда Мороза</li><li><span>200</span> р.</li>
					<li class="left">Парение березовыми вениками</li><li><span>600</span> р.</li>
					<li class="left">Морозный веник под лицо</li><li><span>200</span> р.</li>
					<li class="left">Чан банника(с человека)</li><li><span>500</span> р.</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="price venik">
		<div class="introHolder">
			<h3>Продажа веников:</h3>
		</div>
		<div class="row">
			<div class="one-half column">
				<ul>
					<li class="left">Веник дубовый</li><li><span>250</span> р.</li>
					<li class="left">Веник кленовый</li><li><span>350</span> р.</li>
					<li class="left">Веник Канадский дуб</li><li><span>450</span> р.</li>
					<li class="left">Веник эвкалиптовый серебристый</li><li><span>500</span> р.</li>
					<li class="left">Веник эвкалиптовый стандартный</li><li><span>500</span> р.</li>
				</ul>
			</div>
			<div class="one-half column">
				<ul>
					<li class="left">Веник липовый</li><li><span>500</span> р.</li>
					<li class="left">Веник можжевеловый колючий</li><li><span>350</span> р.</li>
					<li class="left">Веник можжевеловый не колючий</li><li><span>350</span> р.</li>
					<li class="left">Веник пихтовый</li><li><span>450</span> р.</li>
					<li class="left">Веник березовый</li><li><span>350</span> р.</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="price arenda">
		<div class="introHolder">
			<h3>Аренда (дополнительно):</h3>
		</div>
		<div class="row top">
			<ul>
				<li class="left">Халат</li> <li><span>200</span> р.</li>
				<li class="left">Полотенце</li> <li><span>100</span> р.</li>
				<li class="left">Простынь</li> <li><span>50</span> р.</li>
			</ul>
		</div>
		<div class="row">
			<div class="one-half column">
				<p><u>Малая парная:</u></p>
				<ul>
					<li class="left"><b>с 13:00 до 17:00 (до 4-х человек)</b></li><li><span>1000</span> р./час</li>
					<li class="left">Каждый последующий человек</li><li><span>500</span> р./час</li>
					<li class="left"><b>с 17:00-23:00 (до 4-х человек)</b></li><li><span>1500</span> р./час</li>
					<li class="left">Каждый последующий человек</li><li><span>500</span> р./час</li>
				</ul>
			</div>
			<div class="one-half column">
				<p><u>VIP-зала:</u></p>
				<ul>
					<li class="left"><b>с 13:00 до 17:00 (до 4-х человек)</b></li><li><span>1000</span> р./час</li>
					<li class="left">Каждый последующий человек</li><li><span>500</span> р./час</li>
					<li class="left"><b>с 17:00-23:00 (до 4-х человек)</b></li><li><span>2000</span> р./час</li>
					<li class="left">Каждый последующий человек</li><li><span>500</span> р./час</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="price kompleks">
		<div class="introHolder">
			<h3>Комплексы:</h3>
			<p>При покупке данных программ скидки по картам не предусмотрены.<br>Бонус: входная плата не взымается.</p>
		</div>
		<div class="row">
			<div class="one-third column">
				<p><b>Суворовское наслаждение</p>
				<p><span>4350</span> р.</b></p>
				<ul>
					<li>Суворовский стандарт(1 парение)</li>
					<li>обливание</li>
					<li>морозный веник</li>
					<li>пенное купание</li>
					<li>чайная церемония</li>
					<li>время 15 минут</li>
				</ul>
			</div>
			<div class="one-third column">
				<p><b>Суворовский релакс</p>
				<p><span>5350</span> р.</b></p>
				<ul>
					<li>Суворовский стандарт(1 парение)</li>
					<li>обливание</li>
					<li>морозный веник</li>
					<li>медово – солевое растирание (пилинг)</li>
					<li>массаж с использованием разогретого масла</li>
					<li>чайная церемония</li>
				</ul>
			</div>
			<div class="one-third column">
				<p><b>Парение Генералиссимуса Суворова</p>
				<p><span>9200</span> р.</b></p>
				<ul>
					<li>Взятие Измаила(2 захода)</li>
					<li>обливание</li>
					<li>морозный веник</li>
					<li>медово – солевое растирание (пилинг)</li>
					<li>сено, домики</li>
					<li>холодное парение</li>
					<li>полный массаж с маслом</li>
					<li>чайная церемония (3 чая)</li>
				</ul>
			</div>
		</div>
		
		<div class="row">
			<div class="one-third column">
				<p><b>SPA-комплекс «Суворовский»</p>
				<p><span>5700</span> р.</b></p>
				<ul>
					<li>Полный уход за телом</li>
					<li>Полный уход за лицом</li>
					<li>Массаж тела</li>
					<li>Массаж головы</li>
					<li>время 2 часа 30 минут</li>
				</ul>
			</div>
			<div class="one-third column">
				<p><b>SPA программа для двоих «Марокканская Сказка»</p>
				<p><span>8950</span> р.</b></p>
				<ul>
					<li>Прогревание тела в хаммаме</li>
					<li>Пилинг-кессе с нанесением черного мыла (Роза и Ханское)</li>
					<li>Обертывание с маской для тела</li>
					<li>Расслабляющий массаж</li>
					<li>Чайная церемония</li>
					<li>время 2 часа 30 минут</li>
				</ul>
			</div>
			<div class="one-third column">
				<p><b>Шоколадное SPA</p>
				<p><span>9200</span> р.</b></p>
				<ul>
					<li>Распаривание тела в хаммаме</li>
					<li>Кофейный пилинг тела</li>
					<li>Шоколадное обертывание тела</li>
					<li>Чайная церемония</li>
					<li>время 1 час 30 минут</li>
				</ul>
			</div>
		</div>
		
		<div class="row">
			<div class="one-third column">
				<p><b>SPA программа «Дары Моря»</p>
				<p><span>4950</span> р.</b></p>
				<ul>
					<li>Распаривание в хаммаме</li>
					<li>Пилинг тела водорослево-солевой</li>
					<li>Обертывание листовой ламинарией</li>
					<li>Чайная церемония</li>
					<li>Тонизирующий массаж тела</li>
					<li>время 2 часа 30 минут</li>
				</ul>
			</div>
			<div class="one-third column">
				<p><b>Программа «Девичник»</p>
				<p><span>3300</span> р.</b></p>
				<ul>
					<li>Распаривание в парной</li>
					<li>Пилинг тела, парение (на выбор)</li>
					<li>Увлажнение всего тела</li>
					<li>Чайная церемония</li>
					<li>(2-6 чел.) 2-3 часа</li>
				</ul>
			</div>
			<div class="one-third column">
				<p><b>Комплексная программа для НЕЕ и для НЕГО,VIP</p>
				<p><span>14400</span> р.</b></p>
				<ul>
					<li>Распаривание в парной</li>
					<li>Скраб для тела (на выбор)</li>
					<li>Парение на сене</li>
					<li>Парение «Суворовский стандарт»</li>
					<li>Контрастное охлаждение (бассейн)</li>
					<li>Парение березовыми вениками</li>
					<li>Чайная церемония</li>
					<li>Релакс- массаж тела</li>
					<li>Морозный веник в ПОДАРОК!</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="price piling" id="spa">
		<div class="introHolder">
			<h3>SPA-МЕНЮ:</h3>
		</div>
		<div class="row">
			<div class="one-half column">
				<p><u>хаммам:</u></p>
				<ul>
					<li class="left">Марокканский уход за телом 90 мин.<br>(распаривание тела, сопровождающееся пилингом тела, обертыванием, релакс-массажем по телу с маслом, чай из горного разнотравья)</li><li><span>4500</span> р.</li>
					<li class="left">Турецкое омовение 60 мин.<br>(мыльный массаж с пилингом тела)</li><li><span>3900</span> р.</li>
					<li class="left">Пенное купание 30 мин.</li><li><span>1700</span> р.</li>
					<li class="left">Кофейный пилинг 20 мин.</li><li><span>1200</span> р.</li>
					<li class="left">Сахарный пилинг 20 мин. </li><li><span>1200</span> р.</li>
					<li class="left">Масляно-солевой пилинг 20 мин.</li><li><span>1000</span> р.</li>
					<li class="left">Водорослево-солевой пилинг 20 мин.</li><li><span>1000</span> р.</li>
				</ul>
			</div>
			<div class="one-half column">
				<p><u>массаж:</u></p>
				<ul>
					<li class="left">ДЖЕД- массаж 90 мин.<br>(древнеегипетский масляный массаж с использованием камней)</li><li><span>3000</span> р.</li>
					<li class="left">Шоколадный 60 мин.</li><li><span>2500</span> р.</li>
					<li class="left">Общий классический 60 мин.</li><li><span>2300</span> р.</li>
					<li class="left">Лимфодренажный 60 мин.</li><li><span>2300</span> р.</li>
					<li class="left">Спина(включая голову) 40 мин.</li><li><span>1500</span> р.</li>
					<li class="left">Ноги 30 мин.</li><li><span>1000</span> р.</li>
					<li class="left">Шейно-воротниковая зона (включая голову) 20 мин.</li><li><span>700</span> р.</li>
					<li class="left">Лицо 20 мин.</li><li><span>700</span> р.</li>
				</ul>
			</div>
		</div>
		
		<div class="row">
			<div class="one-half column">
				<p><u>уход по лицу:</u></p>
				<ul>
					<li class="left">Бриллиантовая программа 90 мин.</li><li><span>3000</span> р.</li>
					<li class="left">Карбокси-уход CO2  «Омоложение без инъекций» 60 мин.<br>(эффект лифтинга,осветление кожи, уменьшение отечности)</li><li><span>2800</span> р.</li>
					<li class="left">Безинъекционная биоревитализация 90 мин.</li><li><span>2800</span> р.</li>
					<li class="left">Чистка лица мануальная 90 мин.</li><li><span>2700</span> р.</li>
					<li class="left">Чистка лица атравматичная 60 мин.</li><li><span>2000</span> р.</li>
					<li class="left">Увлажняющий уход с альгинатной маской 60 мин. </li><li><span>1800</span> р.</li>
					<li class="left">Программа «Обновление» 40 мин.</li><li><span>1600</span> р.</li>
					<li class="left">Окрашивание бровей хной (с коррекцией) 30 мин.</li><li><span>800</span> р.</li>
					<li class="left">Коррекция бровей 20 мин.</li><li><span>400</span> р.</li>
					<li class="left">Ламинирование ресниц 90 мин.</li><li><span>2500</span> р.</li>
				</ul>
			</div>
			<div class="one-half column">
				<p><u>уход по телу:</u></p>
				<ul>
					<li class="left">Увлажнение всего тела</li><li><span>700</span> р.</li>
					<li class="left">Пилинг Ретиноловый 90 мин.</li><li><span>5000</span> р.</li>
					<li class="left">Пилинг Миндальный 60 мин.</li><li><span>1500</span> р.</li>
					<li class="left">Пилинг Фитиновый 60 мин.</li><li><span>1500</span> р.</li>
					<li class="left">Пилинг Гликолевый 60 мин.</li><li><span>1500</span> р.</li>
					<li class="left">Пилинг Янтарный 60 мин.</li><li><span>1500</span> р.</li>
					<li class="left">Пилинг Мультикислотный 60 мин.</li><li><span>1500</span> р.</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="price venik">
		<div class="introHolder">
			<h3>НОГТЕВОЙ СЕРВИС:</h3>
		</div>
		<div class="row">
			<div class="one-half column">
				<p><u>маникюр</u></p>
				<ul>
					<li class="left">Женский (с массажем кистей) 30 мин.</li><li><span>500</span> р.</li>
					<li class="left">Мужской (с массажем кистей) 30 мин.</li><li><span>800</span> р.</li>
					<li class="left">Маска — Парафин   15 мин.</li><li><span>500</span> р.</li>
				</ul>
			</div>
			<div class="one-half column">
				<p><u>педикюр</u></p>
				<ul>
					<li class="left">Женский (с массажем стоп) 50 мин.</li><li><span>1000</span> р.</li>
					<li class="left">Мужской (с массажем стоп) 50 мин.</li><li><span>1500</span> р.</li>
					<li class="left">Покрытие Гель — лак 20 мин.</li><li><span>500</span> р.</li>
					<li class="left">Маска – Парафин 15 мин.</li><li><span>300</span> р.</li>
					<li class="left">Снятие Гель-лака 20 мин. </li><li><span>300</span> р.</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="price piling" id="eat">
		<div class="introHolder">
			<h3>РЕСТОРАННОЕ МЕНЮ:</h3>
		</div>
		<div class="row">
			<div class="one-half column">
				<p><u>холодное:</u></p>
				<ul>
					<li class="left">Суворовский салат из языка 270 гр.</li><li><span>350</span> р.</li>
					<li class="left">Цезарь с курицей 200 гр.</li><li><span>320</span> р.</li>
					<li class="left">Помидоры с сыром и чесноком 250 гр.</li><li><span>300</span> р.</li>
					<li class="left">Овощной салат 200 гр.</li><li><span>290</span> р.</li>
				</ul>
				<p><u>супчики:</u></p>
				<ul>
					<li class="left">Уха их двух видов рыб 300 гр.</li><li><span>490</span> р.</li>
					<li class="left">Лапша куриная 300 гр.</li><li><span>230</span> р.</li>
				</ul>
				<p><u>рыбка:</u></p>
				<ul>
					<li class="left">Судак жаренный с луком и отварным картофелем  150/100 гр.</li><li><span>540</span> р.</li>
					<li class="left">Котлеты из щуки с пюре из картофеля  200/100 гр.</li><li><span>360</span> р.</li>
				</ul>
				<p><u>сковородочки:</u></p>
				<ul>
					<li class="left">Со свининой 250 гр.</li><li><span>380</span> р.</li>
					<li class="left">С индейкой 250 гр.</li><li><span>330</span> р.</li>
					<li class="left">Из овощей 250 гр.</li><li><span>260</span> р.</li>
					<li class="left">Куриное филе в сыре с овощами 300 гр.</li><li><span>430</span> р.</li>
					<li class="left">Картофель с грибами  250 гр.</li><li><span>220</span> р.</li>
				</ul>
				
			</div>
			<div class="one-half column">
				<p><u>горшочки:</u></p>
				<ul>
					<li class="left">Пельмени с индейкой 250 гр.</li><li><span>320</span> р.</li>
					<li class="left">Вареники с картофелем 250 гр.</li><li><span>250</span> р.</li>
					<li class="left">Каша овсяная с орехами и фруктами 150 гр.</li><li><span>300</span> р.</li>
				</ul>
				<p><u>блинчики:</u></p>
				<ul>
					<li class="left">С джемом 200 гр.</li><li><span>200</span> р.</li>
					<li class="left">Со сгущённым молоком 200 гр.</li><li><span>200</span> р.</li>
					<li class="left">Со сметаной 200 гр.</li><li><span>200</span> р.</li>
				</ul>
				<p><u>на скорую руку:</u></p>
				<ul>
					<li class="left">Пара бутербродов с ветчиной и сыром 220 гр.</li><li><span>250</span> р.</li>
					<li class="left">Яичница из 3-х яиц 140 гр.</li><li><span>150</span> р.</li>
					<li class="left">Омлет из 2-х яиц 200 гр.</li><li><span>150</span> р.</li>
					<li class="left">Омлет + помидор 250 гр. </li><li><span>200</span> р.</li>
					<li class="left">Омлет + сыр 250 гр.</li><li><span>200</span> р.</li>
					<li class="left">Омлет + ветчина 250 гр.</li><li><span>200</span> р.</li>
				</ul>
				
			</div>
		</div>
	</div>
	
	<div class="price venik">
		<div class="introHolder">
			<h3>БАРНОЕ МЕНЮ:</h3>
		</div>
		<div class="row">
			<div class="one-half column">
				<p><u>напитки горячие:</u></p>
				<ul>
					<li class="left">Чай из шиповника 250 мл</li><li><span>150</span> р.</li>
					<li class="left">Чай из горного разнотравья 600 мл.</li><li><span>350</span> р.</li>
					<li class="left">Чай имбирный 600 мл.</li><li><span>350</span> р.</li>
					<li class="left">Чай мелиссовый 600 мл.</li><li><span>350</span> р.</li>
					<li class="left">Чай облепиховый 600 мл.</li><li><span>350</span> р.</li>
					<li class="left">Чай фруктовый 600 мл.</li><li><span>350</span> р.</li>
					<li class="left">Чай черный 600 мл.</li><li><span>350</span> р.</li>
					<li class="left">Чай зеленый 600 мл.</li><li><span>350</span> р.</li>
					<li class="left">Каркаде классический 600 мл.</li><li><span>350</span> р.</li>
					<li class="left">Настой медовый с травами 600 мл.</li><li><span>350</span> р.</li>
				</ul>
				<p><u>к чаю:</u></p>
				<ul>
					<li class="left">Бублики 75 гр.</li><li><span>50</span> р.</li>
					<li class="left">Курага 50 гр.</li><li><span>120</span> р.</li>
					<li class="left">Лимон 50 гр.</li><li><span>60</span> р.</li>
					<li class="left">Мед 50 гр.</li><li><span>120</span> р.</li>
					<li class="left">Смесь орехов и сухофруктов 50 гр.</li><li><span>150</span> р.</li>
					<li class="left">Финики 50 гр.</li><li><span>100</span> р.</li>
					<li class="left">Конфеты в ассортименте 28 гр.</li><li><span>100</span> р.</li>
					<li class="left">Печенье (с протеином) 70 гр.</li><li><span>110</span> р.</li>
				</ul>
			</div>
			<div class="one-half column">
				<p><u>напитки холодные:</u></p>
				<ul>
					<li class="left">Квас классический 330 мл.</li><li><span>150</span> р.</li>
					<li class="left">Квас классический 500 мл.</li><li><span>220</span> р.</li>
					<li class="left">Квас солодовый 330 мл.</li><li><span>150</span> р.</li>
					<li class="left">Квас солодовый 500 мл.</li><li><span>220</span> р.</li>
					<li class="left">Морс клюквенный 250 мл.</li><li><span>150</span> р.</li>
					<li class="left">Компот вишневый 250 мл.</li><li><span>150</span> р.</li>
					<li class="left">Сок в стекле в ассортименте 250 мл.</li><li><span>150</span> р.</li>
					<li class="left">Кола классическая 250 мл.</li><li><span>150</span> р.</li>
					<li class="left">Ахсау (негазированная) 500 мл.</li><li><span>100</span> р.</li>
					<li class="left">Нарзан (газированная) 500 мл.</li><li><span>150</span> р.</li>
					<li class="left">Смирновская (газированная) 500 мл.</li><li><span>100</span> р.</li>
					<li class="left">Ессентуки №4 (газированная) 500 мл.</li><li><span>100</span> р.</li>
					<li class="left">Ессентуки №17 (газированная) 500 мл.</li><li><span>100</span> р.</li>
					<li class="left">Боржоми (газированная) 500 мл.</li><li><span>200</span> р.</li>
				</ul>
				<p><u>варенье:</u></p>
				<ul>
					<li class="left">Варенье из разных сортов 50 гр.<br>клубника, малина, фейхоа, крыжовник, айва, инжир, черная смородина, кизил с косточкой и без косточки</li><li><span>120</span> р.</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="price piling" id="tea">
		<div class="introHolder">
			<h3>ЧАЙНАЯ ЦЕРЕМОНИЯ:</h3>
		</div>
		<div class="row">
			<div class="one-half column">
				<p><u>в китайской чайной комнате:</u></p>
				<ul>
					<li class="left">1 человек, 1 сорт чая</li><li><span>500</span> р.</li>
					<li class="left">3 человека, 1 сорт чая</li><li><span>1500</span> р.</li>
					<li class="left">5 человек, 3 сорта чая</li><li><span>3000</span> р.</li>
					<li class="left">7 человек, 5 сортов чая </li><li><span>5000</span> р.</li>
				</ul>
			</div>
			<div class="one-half column">
				<p><u>КОФЕЙНАЯ КАРТА:</u></p>
				<ul>
					<li class="left">Кофе по-восточному 60 мл.</li><li><span>120</span> р.</li>
					<li class="left">Эспрессо 60 мл.</li><li><span>130</span> р.</li>
					<li class="left">Двойной эспрессо 120 мл.</li><li><span>150</span> р.</li>
					<li class="left">Американо 120 мл.</li><li><span>150</span> р.</li>
					<li class="left">Капучино 150 мл.</li><li><span>200</span> р.</li>
					<li class="left">Латте 250 мл.</li><li><span>250</span> р.</li>
					<li class="left">Кофе фрапе   250 мл.</li><li><span>200</span> р.</li>
					<li class="left">Молоко 50 мл.</li><li><span>50</span> р.</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="price venik">
		<div class="introHolder">
			<h3>МАГАЗИН:</h3>
		</div>
		<div class="row">
			<div class="one-half column">
				<ul>
					<li class="left">Халат банный СБ (разм. 50)</li><li><span>3750</span> р.</li>
					<li class="left">Килт СБ</li><li><span>2500</span> р.</li>
					<li class="left">Шапка войлочная СБ</li><li><span>2000</span> р.</li>
					<li class="left">Мочалка одноразовая</li><li><span>100</span> р.</li>
					<li class="left">Тапочки одноразовые</li><li><span>300</span> р.</li>
					<li class="left">Мыло одноразовое</li><li><span>50</span> р.</li>
					<li class="left">Шампунь-гель одноразовый</li><li><span>50</span> р.</li>
					<li class="left">Хвойный нектар</li><li><span>950</span> р.</li>
					<li class="left">Скраб соляной «Дар Востока»</li><li><span>630</span> р.</li>
					<li class="left">Скраб соляной «Дух Сибири»</li><li><span>600</span> р.</li>
					<li class="left">Кессе «Турецкое»</li><li><span>700</span> р.</li>
					<li class="left">Мыло «Турецкое»</li><li><span>380</span> р.</li>
					<li class="left">Мыло «Аллепское»</li><li><span>350</span> р.</li>
					<li class="left">Мыло «Дегтярное»</li><li><span>240</span> р.</li>
				</ul>
			</div>
			<div class="one-half column">
				<ul>
					<li class="left">Мыло «Кастилья»</li><li><span>290</span> р.</li>
					<li class="left">Мыло «Кофейное зернышко»</li><li><span>240</span> р.</li>
					<li class="left">Мыло «МММ» (молоко, мед, мак)</li><li><span>240</span> р.</li>
					<li class="left">Мыло «Поля Анвила»</li><li><span>300</span> р.</li>
					<li class="left">Мыло «Пряное утро»</li><li><span>260</span> р.</li>
					<li class="left">Мыло «Тайны Магриба»</li><li><span>240</span> р.</li>
					<li class="left">Мыло взбитое «Башня белого золота»</li><li><span>300</span> р.</li>
					<li class="left">Мыло взбитое «Ретро»</li><li><span>300</span> р.</li>
					<li class="left">Мыло соляное «Мессер»</li><li><span>300</span> р.</li>
					<li class="left">Мыло соляное «Секунда»</li><li><span>330</span> р.</li>
					<li class="left">Мыло хвойное «Ветер меж холмов»</li><li><span>270</span> р.</li>
					<li class="left">Мыло шелковое «Альдмерис»</li><li><span>270</span> р.</li>
					<li class="left">Мыло шелковое «Атмора»</li><li><span>270</span> р.</li>
					<li class="left">Мыло шоколадное «Хаммерфелл»</li><li><span>240</span> р.</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="price pravila">
		<div class="introHolder">
			<h3>НАШИ ПРАВИЛА</h3>
		</div>
		<div class="row">
			<div class="one-half column">
				<p><u>рекомендовано:</u></p>
				<ul>
					<li>Пребывать на территории Суворовских бань в плавках, купальниках</li>
					<li>Сообщать о своем визите заблаговременно</li>
					<li>Находиться в парных только в сопровождении банщика</li>
					<li>Обязательно уведомить специалиста о медицинских противопоказаниях</li>
				</ul>
			</div>
			<div class="one-half column">
				<p><u>запрещено:</u></p>
				<ul>
					<li>Находиться в состоянии алкогольного опьянения на территории Суворовских бань</li>
					<li>Подходить к печам в парных общего пользования</li>
					<li>Прыгать, нырять и падать в бассейн</li>
					<li>Приносить с собой любые продукты питания и напитки</li>
					<li>Самостоятельно проводить парение своими вениками и без участия Суворовских банщиков</li>
				</ul>
			</div>
		</div>
	</div>

<?php include ($_SERVER['DOCUMENT_ROOT'] .'/wp-content/themes/bath/inc/footer.php'); ?>