<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/inc/JsonDB.class.php';
$db = new JsonDB( $_SERVER['DOCUMENT_ROOT'] . '/portfolio/' );
// $db->createTable('portfolio');
// $db->insert('portfolio', array(
// 	'id' => 1, 
// 	'title' => 'ПОЛИКАРБОНАТА.НЕТ интернет-магазин',
//    'description' => 'Зацени инетрент-магазин, который я сделал для компании по продаже сотового поликарбоната',
//    'themes' => 'Интернет-магазин',
//    'work' => 'Сайт под ключ',
// 	'tech' => 'Skeleton, PHP + MySql',
// 	'url' => 'http://polikarbonata.net/',
// 	'about' => 'Задача разработать интернет-магазин с корзиной, оформлением заказа, уведомлением клиентов и менеджеров о новом заказе, оплата через Яндекс.Кассу и тд',
//    'img' => 'polikarbonat',
//    'video' => '',
// ), true);
// $db->insert('portfolio', array(
//    'id' => 2, 
//    'title' => 'ДЭМИ, интернет-магазин детской мебели',
//    'description' => 'Зацени инетрент-магазин, который я сделал для компании ДЭМИ по продаже детской мебели',
//    'themes' => 'Интернет-магазин',
//    'work' => 'Сайт под ключ',
//    'tech' => 'Skeleton, SweetAlert, PHP + MySql',
//    'url' => 'http://partadami.ru/',
//    'about' => 'Задача разработать интернет-магазин с корзиной, оформлением заказа, уведомлением клиентов и менеджеров о новом заказе, оплата через Яндекс.Кассу и тд',
//    'img' => 'partadami',
//    'video' => '',
// ), true);
// $db->insert('portfolio', array(
//    'id' => 3, 
//    'title' => 'OK-HALL, дизайн проекты',
//    'description' => 'Зацени как landing page я сделал для компании OK-HALL по созданию дизайн интерьеров',
//    'themes' => 'Landing page',
//    'work' => 'Landing page',
//    'tech' => 'Woprdpress, Owl carousel, Bootstrap4',
//    'url' => 'http://ok-hall.ru/',
//    'about' => 'Разработать Landing page страницу с возможностью редактирования через админку Wordpress (ниже видео). Вроде офигенно получилось',
//    'img' => 'ok-hall',
//    'video' => '2p9TNUCg35Q',
// ), true);
// $db->insert('portfolio', array(
//    'id' => 4, 
//    'title' => 'Система учета клиентов CRM',
//    'description' => 'Зацени какую крутую CRM я разработал для учета клиентов, добавление, удаление, поиск, фильтры, круче некуда, Bitrix и Amo сосут',
//    'themes' => 'Система учета',
//    'work' => 'CRM',
//    'tech' => 'Bootstrap4, ListJS, PHP, MySql (SafeMySql)',
//    'url' => 'http://base.autoprkt.ru/',
//    'about' => 'Стояла задача разработать систему учета клиентов, ну че сказать, взял да разработал. (<b>Логин</b> admin <b>Пароль</b> 1)',
//    'img' => 'crm',
//    'video' => 'WONa1wDeA6U',
// ), true);
// $db->insert('portfolio', array(
//    'id' => 5, 
//    'title' => 'Сайт начинающего инвестора',
//    'description' => 'Зацени какой информационный сайт я разработал на Wordpress для начинающего инветора',
//    'themes' => 'Информационный',
//    'work' => 'Сайт под ключ',
//    'tech' => 'Woprdpress, Bootstrap4, Walker navMenu, Walker category',
//    'url' => 'https://goodservice.su/',
//    'about' => 'Создать информационный сайт на Wordpress, самое сложное это эти дебильные Рубрики с выводом подрубрик, я запарился, но получилось через Walker, круто, заказчик доволен',
//    'img' => 'goodservice',
//    'video' => '',
// ), true);
// $db->insert('portfolio', array(
//    'id' => 6, 
//    'title' => 'РДМ, ООО',
//    'description' => 'Зацени какой крутой landing page я разработал для строительной компании РДМ',
//    'themes' => 'Landing page',
//    'work' => 'Сайт под ключ',
//    'tech' => 'Woprdpress, Bootstrap4',
//    'url' => 'https://remontdomov-msk.ru/',
//    'about' => 'Разработать Landing page страницу с возможностью редактирования через админку Wordpress (ниже видео) + блок новости',
//    'img' => 'remontdomov-msk',
//    'video' => 'mIgQ_xS0CcA',
// ), true);
// $db->insert('portfolio', array(
//    'id' => 7, 
//    'title' => 'Qlab',
//    'description' => 'Зацени какой личный кабинет я сверстал для компании Qlab',
//    'themes' => 'Система учета',
//    'work' => 'Верстка',
//    'tech' => 'HTML5, CSS3, Grid, Bootstrap4',
//    'url' => 'https://peretc001.github.io/dist/templates/qlab/',
//    'about' => 'Сверстать личный кабинет по дизайну заказчика в Figma',
//    'img' => 'qlab',
//    'video' => '',
// ), true);



//$result = $db->select('portfolio', 'id', 6);
// $result = $db -> selectAll('portfolio');
// var_dump('<pre>');
// var_dump($result);

//    echo $result[0]['title'];

//$db -> delete ( 'portfolio', 'id', 7 );
//$db -> update('portfolio', 'id', 6, array('themes' => 'Landing page'));


?>