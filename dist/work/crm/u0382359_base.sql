-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Май 27 2019 г., 09:30
-- Версия сервера: 5.7.23-24
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u0382359_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `company_code` varchar(12) DEFAULT NULL,
  `company_region` text,
  `company_adres` text,
  `company_about` text,
  `company_date` date NOT NULL DEFAULT '0000-00-00',
  `company_time` time NOT NULL DEFAULT '00:00:00',
  `company_manager` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_code`, `company_region`, `company_adres`, `company_about`, `company_date`, `company_time`, `company_manager`) VALUES
(1, 'ООО \"Какая-то компания\"', '1101010', 'Ставропольский край', 'Воронеж, ул. Северная, 324', 'АРЛЦврдыатдылват \"орадывора\" лдвырадыва \"вап', '2019-03-29', '20:00:00', 'Иванов Иван'),
(2, 'ООО \"Рога и копыта\"', '2308182222', 'Воронежская область', 'Воронеж, ул. Красная 123', 'Крутая компания', '0000-00-00', '00:00:00', 'Сидоров Сергей'),
(3, 'Лукойл', '', 'Москва', '', '', '2019-04-11', '10:00:00', 'Сидоров Сергей'),
(5, 'Сургутнефтегаз', '666666666', 'Тюменская область', 'ул. Газовая 2', 'Газ есть, нефти нет', '2019-04-08', '09:00:00', 'Сидоров Сергей'),
(6, 'Газпром', '', 'Москва', 'Воронеж', '', '2019-05-10', '11:00:00', 'Сидоров Сергей'),
(7, 'Роснефть', '999999999', 'Краснодарский край (Кубань)', 'Шоссе Нефтяников, 666', '', '2019-05-17', '09:00:00', 'Сидоров Сергей'),
(8, 'Компания Сидорова', '123312', 'Воронежская область', 'воадлыовдлваыав', '', '2019-04-03', '00:00:00', ''),
(9, 'Северный олень', '', 'Саха (Республика Саха (Якутия))', '', '', '0000-00-00', '00:00:00', 'Иванов Иван'),
(11, 'МТС', '000', 'Москва', '', '', '2019-04-10', '00:00:00', ''),
(12, 'Компания Петрова', '', '', '', '', '2019-04-03', '09:30:00', 'Петров Стас'),
(13, 'Компания Сидорова2', '', 'Самарская область', '', '', '0000-00-00', '00:00:00', 'Сидоров Сергей'),
(14, 'Компания Сидорова3', '', 'Воронежская область', '', '', '2019-04-03', '00:00:00', 'Сидоров Сергей'),
(15, 'Компания Петрова3', '999', 'Самарская область', '', '', '2019-04-10', '08:30:00', 'Петров Стас'),
(16, 'Компания Иванова2', '1111', 'Адыгея (Республика Адыгея)', '', '', '2019-04-08', '20:30:00', 'Иванов Иван'),
(18, 'Магнит', '', 'Краснодарский край (Кубань)', '', 'Продукты', '2019-04-09', '20:00:00', 'Сидоров Сергей'),
(20, 'ООО ИКЦ \"Альянс\"', '6829056327', 'Тамбовская область', 'г.Тамбов, ул. 3-я Линия, д.18, оф.220', 'Услуги аутсорсинга в области ПБ и ОТ', '0000-00-00', '00:00:00', 'Директор'),
(21, 'Организация без ИНН', '65890', 'Тамбовская область', 'г.Тамбов, ул. 3-я Линия, д.18, оф.220', '', '0000-00-00', '00:00:00', 'Сидоров Сергей'),
(24, 'Проверочная компания', '2308182299', 'Краснодарский край (Кубань)', 'Краснодар ул Тургенева', '123', '0000-00-00', '00:00:00', 'Сидоров Сергей'),
(30, 'астель', '4763', 'Липецкая область', 'липецк, космонавтов, 96', '', '2019-03-12', '00:00:00', 'Сидоров Сергей'),
(31, 'аракул', '123456789101', 'Белгородская область', 'белгород, ул. васильева, 15', '', '0000-00-00', '00:00:00', 'Петров Стас'),
(33, 'вапвап', '1111111100', '', '', '', '0000-00-00', '00:00:00', 'Сидоров Сергей');

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `contact_name` text NOT NULL,
  `contact_job` text NOT NULL,
  `contact_phone` text NOT NULL,
  `contact_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `company_id`, `contact_name`, `contact_job`, `contact_phone`, `contact_email`) VALUES
(25, 1, 'Иванов иван иванович', 'Димитрии из потира поковочном сократила платком остатков ', '8761845484', ''),
(28, 8, 'Lorem ipsum', 'dolor', '8-123-456-78-90', ''),
(29, 5, 'Сургут Нефтегазович', 'Директор', '8-800-000-00-00', ''),
(30, 11, 'Мобильный Теле Системович', 'директор', '8-0-9-0', ''),
(31, 2, 'Рогов Копыт Иванович', 'важак', '8-123-999-88-77', ''),
(34, 28, 'апипаиававм', 'авмвамавм', '546546546', '');

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `event`
--

INSERT INTO `event` (`id`, `company_id`, `event_date`, `event_msg`) VALUES
(48, 1, '2019-03-29', 'Договорились на пятницу'),
(49, 1, '2019-03-30', 'Набрать'),
(50, 1, '2019-03-30', 'Сегодня выставил счет, завтра оплатят'),
(54, 7, '2019-03-29', 'Сегодня созванивались, договорились что я отправлю коммерческое предложение и завтра позвоню, должен рассмотреть и оплатить'),
(55, 15, '2019-04-02', 'cvbvcbvb'),
(57, 3, '2019-03-04', 'Созвонился с директором, назначил встречу на 1.04.2019'),
(58, 18, '2019-04-01', 'Галицкий сказал что продал долю, не звонить больше'),
(59, 8, '2019-03-12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic nihil eligendi iste?'),
(60, 5, '2019-04-01', 'Обещали налить чуть нефти и дать по газам'),
(61, 11, '2019-04-04', 'Вы еще не воспользовались нашей услугой, а мы уже сняли с вас деньги!\r\nМТС - на шаг впереди!'),
(62, 2, '2019-04-01', 'Директор сказал рога пообломает'),
(63, 10, '2018-12-31', 'Доставляем сборные грузы, но это не точно'),
(64, 15, '2019-04-03', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic nihil eligendi iste?'),
(65, 12, '2019-04-01', 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. '),
(66, 12, '2019-04-02', 'Дорогу над ведущими буквенных парадигматическая там подпоясал, вскоре от всех, если деревни что маленькая, снова то путь строчка. Агенство на берегу, безопасную?'),
(68, 16, '2019-04-03', 'чясчсчясчя'),
(69, 10, '2019-04-07', 'Может и вовсе не доставим'),
(70, 3, '2019-04-10', 'вмвыамвымвмвымвымы'),
(71, 8, '2019-04-29', 'hkfhkjfg\r\n'),
(72, 17, '2019-05-19', '');

-- --------------------------------------------------------

--
-- Структура таблицы `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manager`
--

INSERT INTO `manager` (`id`, `login`, `password`, `name`, `role`, `img`) VALUES
(1, 'admin', '1', 'Сидоров Сергей', 'admin', ''),
(2, 'petr', '2', 'Петров Стас', 'manager', ''),
(3, 'ivan', '3', 'Иванов Иван', 'manager', ''),
(4, 'guest', '4', 'Гость', 'guest', ''),
(5, 'director', '1', 'Директор', 'manager', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT для таблицы `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
