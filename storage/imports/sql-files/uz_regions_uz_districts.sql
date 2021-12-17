-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 25 2020 г., 04:54
-- Версия сервера: 10.3.14-MariaDB
-- Версия PHP: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `elektron_ijs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `uz_districts`
--

CREATE TABLE IF NOT EXISTS `uz_districts` (
  `id` int(10) unsigned NOT NULL,
  `areaid` int(10) unsigned DEFAULT NULL,
  `regionid` int(10) unsigned DEFAULT NULL,
  `areacode` int(10) unsigned DEFAULT NULL,
  `areatype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameRu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameUz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admincenterRu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admincenterUz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isdeleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `uz_districts`
--

INSERT INTO `uz_districts` (`id`, `areaid`, `regionid`, `areacode`, `areatype`, `nameRu`, `nameUz`, `admincenterRu`, `admincenterUz`, `isdeleted`) VALUES
(1, 1703200, 1703, 200, NULL, 'Районы Андижанской области', 'Andijon viloyatining tumanlari', NULL, NULL, 0),
(2, 1703400, 1703, 400, NULL, 'Города областного подчинения Андижанской области', 'Andijon v-tining vil-t ahamiyatiga ega shaharlari', NULL, NULL, 0),
(3, 1706200, 1706, 200, NULL, 'Районы Бухарской области', 'Buxoro viloyatining tumanlari', NULL, NULL, 0),
(4, 1706400, 1706, 400, NULL, 'Города областного подчинения Бухарской области', 'Buxoro viloyatining viloyat ahamiyatiga ega shahar', NULL, NULL, 0),
(5, 1708200, 1708, 200, NULL, 'Районы Джизакской области', 'Jizzax viloyatining tumanlari', NULL, NULL, 0),
(6, 1708400, 1708, 400, NULL, 'Города областного подчинения Джизакской области', 'Jizzax viloyatining viloyat ahamiyatiga ega shahar', NULL, NULL, 0),
(7, 1710200, 1710, 200, NULL, 'Районы Кашкадарьинской области', 'Qashqadaryo viloyatining tumanlari', NULL, NULL, 0),
(8, 1703203, 1703, 203, NULL, 'Андижанский район', 'Andijon tumani', 'гп Куйган - яр', 'Kuyganyor shaharchasi', 0),
(9, 1703206, 1703, 206, NULL, 'Балыкчинский район', 'Baliqchi tumani', 'гп Баликчи', 'Baliqchi shaharchasi', 0),
(10, 1703209, 1703, 209, NULL, 'Бозский район', 'Bo`z tumani', 'гп Боз', 'Bo`z shaharchasi', 0),
(11, 1703210, 1703, 210, NULL, 'Булакбашинский район', 'Buloqboshi tumani', 'гп Булокбоши', 'Buloqboshi shaharchasi', 0),
(12, 1703211, 1703, 211, NULL, 'Джалалкудукский район', 'Jalolquduq tumani', 'г.Ахунбабаев', 'Oxunboboyev sh.', 0),
(13, 1703214, 1703, 214, NULL, 'Избасканский район', 'Izboskan tumani', 'г.Пайтуг', 'Paytug sh.', 0),
(14, 1703217, 1703, 217, NULL, 'Улугноpский район', 'Ulug`nor tumani', 'гп Ок-олтин', 'Oq oltin shaharchasi', 0),
(15, 1703220, 1703, 220, NULL, 'Кургантепинский район', 'Qo`rg`ontepa tumani', 'г.Кургантепа', 'Qo`rg`ontepa sh.', 0),
(16, 1703224, 1703, 224, NULL, 'Асакинский район', 'Asaka tumani', 'г.Асака', 'Asaka sh.', 0),
(17, 1703227, 1703, 227, NULL, 'Мархаматский район', 'Marxamat tumani', 'г.Мархамат', 'Marxamat sh.', 0),
(18, 1703230, 1703, 230, NULL, 'Шахриханский район', 'Shaxrixon tumani', 'г.Шахрихан', 'Shaxrixon sh.', 0),
(19, 1703232, 1703, 232, NULL, 'Пахтаабадский район', 'Paxtaobod tumani', 'г.Пахтаабад', 'Paxtaobod sh.', 0),
(20, 1703236, 1703, 236, NULL, 'Ходжаабадский район', 'Xo`jaobod tumani', 'г.Ходжаабад', 'Xo`jaobod sh.', 0),
(21, 1703401, 1703, 401, NULL, 'Андижан', 'Andijon', NULL, NULL, 0),
(22, 1706204, 1706, 204, NULL, 'Алатский район', 'Olot tumani', 'г.Алат', 'Olot sh.', 0),
(23, 1706207, 1706, 207, NULL, 'Бухарский район', 'Buxoro tumani', 'г. Галлаасия', 'Gala Osiyo shaharchasi', 0),
(24, 1706212, 1706, 212, NULL, 'Вабкентский район', 'Vobkent tumani', 'г. Вабкент', 'Vobkent sh.', 0),
(25, 1706219, 1706, 219, NULL, 'Каганский район', 'Kogon tumani', 'г. Каган', 'Kogon sh.', 0),
(26, 1706230, 1706, 230, NULL, 'Каракульский район', 'Qorako`l tumani', 'г. Каракуль', 'Qorako`l sh.', 0),
(27, 1706232, 1706, 232, NULL, 'Караулбазарский район', 'Qorovulbozor tumani', 'г. Каpаулбазаp', 'Qorovulbozor sh.', 0),
(28, 1706240, 1706, 240, NULL, 'Пешкунский район', 'Peshku tumani', 'гп Янгибозор', 'Yangibozor shaharchasi', 0),
(29, 1706242, 1706, 242, NULL, 'Ромитанский район', 'Romitan tumani', 'г. Ромитан', 'Romitan sh.', 0),
(30, 1706246, 1706, 246, NULL, 'Жондоpский район', 'Jondor tumani', 'гп Жондор', 'Jondor shaharchasi', 0),
(31, 1706258, 1706, 258, NULL, 'Шафирканский район', 'Shofirkon tumani', 'г. Шафиркан', 'Shofirkon sh.', 0),
(32, 1706401, 1706, 401, NULL, 'Бухара', 'Buxoro shahar', NULL, NULL, 0),
(33, 1706403, 1706, 403, NULL, 'Каган', 'Kogon', NULL, NULL, 0),
(34, 1708201, 1708, 201, NULL, 'Арнасайский район', 'Arnasoy tumani', 'гп Голиблаp', 'G`oliblar shaharchasi', 0),
(35, 1708204, 1708, 204, NULL, 'Бахмальский район', 'Baxmal tumani', 'гп Усмат', 'O`smat shaharchasi', 0),
(36, 1708209, 1708, 209, NULL, 'Галляаральский район', 'G`allaorol tumani', 'г. Галляарал', 'G`allaorol sh.', 0),
(37, 1708212, 1708, 212, NULL, 'Шароф Рашидовский район', 'Sharof Rashidov tumani', 'гп Уч-тепа', 'Uchtepa shaharchasi', 0),
(38, 1708215, 1708, 215, NULL, 'Дустликский район', 'Do`stlik tumani', 'г. Дустлик', 'Do`stlik sh.', 0),
(39, 1708218, 1708, 218, NULL, 'Зааминский район', 'Zomin tumani', 'гп Заамин', 'Zomin shaharchasi', 0),
(40, 1708220, 1708, 220, NULL, 'Зарбдарский район', 'Zarbdor tumani', 'гп Зарбдар', 'Zarbdor shaharchasi', 0),
(41, 1708223, 1708, 223, NULL, 'Мирзачульский район', 'Mirzacho`l tumani', 'г. Гагарин', 'Gagarin sh.', 0),
(42, 1708228, 1708, 228, NULL, 'Пахтакорский район', 'Paxtakor tumani', 'г. Пахтакор', 'Paxtakor sh.', 0),
(43, 1708235, 1708, 235, NULL, 'Фаришский район', 'Forish tumani', 'гп Янгикишлак', 'Yangiqishloq shaharchasi', 0),
(44, 1708237, 1708, 237, NULL, 'Янгиободский район', 'Yangiobod tumani', 'нп Баландчакир', 'Balandchaqir a.p.', 0),
(45, 1708401, 1708, 401, NULL, 'Джизак', 'Jizzax', NULL, NULL, 0),
(46, 1710207, 1710, 207, NULL, 'Гузарский район', 'G`uzor tumani', 'г. Гузар', 'G`uzor sh.', 0),
(47, 1710212, 1710, 212, NULL, 'Дехканабадский район', 'Dehqonobod tumani', 'гп Корашина', 'Karashina shaharchasi', 0),
(48, 1710220, 1710, 220, NULL, 'Камашинский район', 'Qamashi tumani', 'г. Камаши', 'Qamashi sh.', 0),
(49, 1710224, 1710, 224, NULL, 'Каршинский район', 'Qarshi tumani', 'г. Бешкент', 'Beshkent sh.', 0),
(50, 1710229, 1710, 229, NULL, 'Касанский район', 'Koson tumani', 'г. Касан', 'Koson sh.', 0),
(51, 1710232, 1710, 232, NULL, 'Китабский район', 'Kitob tumani', 'г. Китаб', 'Kitob sh.', 0),
(52, 1710233, 1710, 233, NULL, 'Миришкорский район', 'Mirishkor tumani', 'гп Янги Миришкор', 'Yangi Mirishkor shaharchasi', 0),
(53, 1710234, 1710, 234, NULL, 'Мубарекский район', 'Muborak tumani', 'г. Мубарек', 'Muborak sh.', 0),
(54, 1710400, 1710, 400, NULL, 'Города областного подч. Кашкадарьинской области', 'Qashqadaryo viloyatining viloyat ahamiyatiga ega s', NULL, NULL, 0),
(55, 1712200, 1712, 200, NULL, 'Районы Навоийской области', 'Navoiy viloyatining tumanlari', NULL, NULL, 0),
(56, 1712400, 1712, 400, NULL, 'Города областного подчинения Навоийской области', 'Navoiy viloyatining viloyat ahamiyatiga ega shahar', NULL, NULL, 0),
(57, 1714200, 1714, 200, NULL, 'Районы Наманганской области', 'Namangan viloyatining tumanlari', NULL, NULL, 0),
(58, 1714400, 1714, 400, NULL, 'Города областного подчинения Наманганской области', 'Namangan viloyatining viloyat ahamiyatiga ega shah', NULL, NULL, 0),
(59, 1718200, 1718, 200, NULL, 'Районы Самаркандской области', 'Samarqand viloyatinung tumanlari', NULL, NULL, 0),
(60, 1718400, 1718, 400, NULL, 'Города областного подчинения Самаркандской области', 'Samarqand viloyatining viloyat ahamiyatiga ega sha', NULL, NULL, 0),
(61, 1722200, 1722, 200, NULL, 'Районы Сурхандарьинской области', 'Surxandaryo viloyatining tumanlari', NULL, NULL, 0),
(62, 1710237, 1710, 237, NULL, 'Касбинский район', 'Kasbi tumani', 'гп Муглон', 'Mug`lon shaharchasi', 0),
(63, 1710242, 1710, 242, NULL, 'Чиракчинский район', 'Chiroqchi tumani', 'г. Чиракчи', 'Chiroqchi sh.', 0),
(64, 1710245, 1710, 245, NULL, 'Шахрисабзский район', 'Shahrisabz tumani', 'г. Шахрисабз', 'Shahrisabz sh.', 0),
(65, 1710250, 1710, 250, NULL, 'Яккабагский район', 'Yakkabog` tumani', 'г. Яккабаг', 'Yakkabog` sh.', 0),
(66, 1710401, 1710, 401, NULL, 'Карши', 'Qarshi', NULL, NULL, 0),
(67, 1712211, 1712, 211, NULL, 'Канимехский район', 'Konimex tumani', 'гп Канимех', 'Konimex shaharchasi', 0),
(68, 1712216, 1712, 216, NULL, 'Кызылтепинский район', 'Qiziltepa tumani', 'г. Кызылтепа', 'Qiziltepa sh.', 0),
(69, 1712230, 1712, 230, NULL, 'Навбахорский район', 'Navbahor tumani', 'нп Бешрабад', 'Beshrabot a.p.', 0),
(70, 1712234, 1712, 234, NULL, 'Карманинский район', 'Karmana tumani', 'гп Кармана', 'Karmana shaharchasi', 0),
(71, 1712238, 1712, 238, NULL, 'Нуратинский район', 'Nurota tumani', 'г. Нурата', 'Nurota sh.', 0),
(72, 1712248, 1712, 248, NULL, 'Учкудукский район', 'Uchquduq tumani', 'г. Учкудук', 'Uchquduq sh.', 0),
(73, 1712251, 1712, 251, NULL, 'Хатырчинский район', 'Xatirchi tumani', 'г. Янгирабод', 'Yangirabod sh.', 0),
(74, 1712401, 1712, 401, NULL, 'Навои', 'Navoiy', NULL, NULL, 0),
(75, 1712408, 1712, 408, NULL, 'Заpафшан', 'Zarafshon', NULL, NULL, 0),
(76, 1714204, 1714, 204, NULL, 'Мингбулакский pайон', 'Mingbuloq tumani', 'гп Джумашуй', 'Jo`masho`y shaharchasi', 0),
(77, 1714207, 1714, 207, NULL, 'Касансайский район', 'Kosonsoy tumani', 'г. Касансай', 'Kosonsoy sh.', 0),
(78, 1714212, 1714, 212, NULL, 'Наманганский район', 'Namangan tumani', 'гп Ташбулак', 'Toshbuloq shaharchasi', 0),
(79, 1714216, 1714, 216, NULL, 'Нарынский район', 'Norin tumani', 'г. Хаккулабад', 'Xaqqulobod sh.', 0),
(80, 1714219, 1714, 219, NULL, 'Папский район', 'Pop tumani', 'г. Пап', 'Pop sh.', 0),
(81, 1714224, 1714, 224, NULL, 'Туракурганский район', 'To`raqo`rg`on tumani', 'г. Туракурган', 'To`raqo`rg`on sh.', 0),
(82, 1714229, 1714, 229, NULL, 'Уйчинский район', 'Uychi tumani', 'гп Уйчи', 'Uychi shaharchasi', 0),
(83, 1714234, 1714, 234, NULL, 'Учкурганский район', 'Uchqo`rg`on tumani', 'г. Учкурган', 'Uchqo`rg`on sh.', 0),
(84, 1714236, 1714, 236, NULL, 'Чартакский район', 'Chortoq tumani', 'г. Чартак', 'Chortoq sh.', 0),
(85, 1714237, 1714, 237, NULL, 'Чустский район', 'Chust tumani', 'г. Чуст', 'Chust sh.', 0),
(86, 1714401, 1714, 401, NULL, 'Наманган', 'Namangan', NULL, NULL, 0),
(87, 1718203, 1718, 203, NULL, 'Акдарьинский район', 'Oqdaryo tumani', 'гп Лаиш', 'Loyish shaharchasi', 0),
(88, 1718206, 1718, 206, NULL, 'Булунгурский район', 'Bulung`ur tumani', 'г. Булунгур', 'Bulung`ur sh.', 0),
(89, 1718209, 1718, 209, NULL, 'Джамбайский район', 'Jomboy tumani', 'г. Джамбай', 'Jomboy sh.', 0),
(90, 1718212, 1718, 212, NULL, 'Иштыханский район', 'Ishtixon tumani', 'г. Иштыхан', 'Ishtixon sh.', 0),
(91, 1718215, 1718, 215, NULL, 'Каттакурганский район', 'Kattaqo`rg`on tumani', 'гп Пайшанба', 'Payshanba shaharchasi', 0),
(92, 1718216, 1718, 216, NULL, 'Кошрабадский район', 'Qo`shrabot tumani', 'гп Кушрабад', 'Qo`shrabot shaharchasi', 0),
(93, 1718218, 1718, 218, NULL, 'Нарпайский район', 'Narpay tumani', 'г. Акташ', 'Oqtosh sh.', 0),
(94, 1718224, 1718, 224, NULL, 'Пайарыкский район', 'Payariq tumani', 'г.Пайаpык', 'Payariq sh.', 0),
(95, 1718227, 1718, 227, NULL, 'Пастдаргомский район', 'Pastdarg`om tumani', 'г. Джума', 'Juma sh.', 0),
(96, 1718230, 1718, 230, NULL, 'Пахтачийский район', 'Paxtachi tumani', 'гп Зиатдин', 'Ziyovuddin shaharchasi', 0),
(97, 1718233, 1718, 233, NULL, 'Самаркандский район', 'Samarqand tumani', 'гп Гулабад', 'Gulobod shaharchasi', 0),
(98, 1718235, 1718, 235, NULL, 'Нурабадский район', 'Nurobod tumani', 'г. Нурабад', 'Nurobod sh.', 0),
(99, 1718236, 1718, 236, NULL, 'Ургутский район', 'Urgut tumani', 'г. Ургут', 'Urgut sh.', 0),
(100, 1718238, 1718, 238, NULL, 'Тайлякский район', 'Tayloq tumani', 'гп Тайлок', 'Toyloq shaharchasi', 0),
(101, 1718401, 1718, 401, NULL, 'Самарканд', 'Samarqand', NULL, NULL, 0),
(102, 1718406, 1718, 406, NULL, 'Каттакурган', 'Kattaqo`rg`on', NULL, NULL, 0),
(103, 1722201, 1722, 201, NULL, 'Алтынсайский район', 'Oltinsoy tumani', 'гп Корлик', '?орли?  ша?арчаси', 0),
(104, 1722202, 1722, 202, NULL, 'Ангорский район', 'Angor tumani', 'гп Ангор', 'Angor shaharchasi', 0),
(105, 1722204, 1722, 204, NULL, 'Байсунский район', 'Boysun tumani', 'г. Байсун', 'Boysun sh.', 0),
(106, 1722210, 1722, 210, NULL, 'Денауский район', 'Denov tumani', 'г. Денау', 'Denov sh.', 0),
(107, 1722400, 1722, 400, NULL, 'Города областного подч. Сурхандарьинской области', 'Surxondaryo viloyatining viloyat ahamiyatiga ega s', NULL, NULL, 0),
(108, 1724200, 1724, 200, NULL, 'Районы Сырдарьинской области', 'Sirdaryo viloyatining tumanlari', NULL, NULL, 0),
(109, 1724400, 1724, 400, NULL, 'Города областного подчинения Сырдарьинской области', 'Sirdaryo viloyatining viloyat ahamiyatiga ega shah', NULL, NULL, 0),
(110, 1726260, 1726, 260, NULL, 'Районы города Ташкента', 'Toshkent shahrining tumanlari', NULL, NULL, 0),
(111, 1726262, 1726, 262, NULL, 'Учтепинский район', 'Uchtepa tumani', NULL, NULL, 0),
(112, 1726264, 1726, 264, NULL, 'Бектемирский район', 'Bektemir tumani', NULL, NULL, 0),
(113, 1726266, 1726, 266, NULL, 'Юнусабадский район', 'Yunusobod tumani', NULL, NULL, 0),
(114, 1726269, 1726, 269, NULL, 'Мирзо-Улугбекский район', 'Mirzo Ulug`bek tumani', NULL, NULL, 0),
(115, 1726273, 1726, 273, NULL, 'Мирабадский район', 'Mirobod tumani', NULL, NULL, 0),
(116, 1726277, 1726, 277, NULL, 'Шайхантахурский район', 'Shayxontoxur tumani', NULL, NULL, 0),
(117, 1726280, 1726, 280, NULL, 'Алмазарский район', 'Olmazor tumani', NULL, NULL, 0),
(118, 1726283, 1726, 283, NULL, 'Сергелийский район', 'Sirg`ali tumani', NULL, NULL, 0),
(119, 1726287, 1726, 287, NULL, 'Яккасарайский район', 'Yakkasaroy tumani', NULL, NULL, 0),
(120, 1726290, 1726, 290, NULL, 'Яшнободский район', 'Yashnobod tumani', NULL, NULL, 0),
(121, 1726294, 1726, 294, NULL, 'Чиланзарский район', 'Chilonzor tumani', NULL, NULL, 0),
(122, 1727200, 1727, 200, NULL, 'Районы Ташкентской области', 'Toshkent viloyatining tumanlari', NULL, NULL, 0),
(123, 1727400, 1727, 400, NULL, 'Города областного подчинения Ташкентской области', 'Toshkent viloyatining viloyat ahamiyatiga ega shah', NULL, NULL, 0),
(124, 1730200, 1730, 200, NULL, 'Районы Ферганской области', 'Farg`ona viloyatining tumanlari', NULL, NULL, 0),
(125, 1722214, 1722, 214, NULL, 'Кумкурганский район', 'Qumqo`rg`on tumani', 'г. Кумкурган', 'Qumqo`rg`on sh.', 0),
(126, 1722215, 1722, 215, NULL, 'Кизирикский район', 'Qiziriq tumani', 'гп Сарик', 'Sariq shaharchasi', 0),
(127, 1722217, 1722, 217, NULL, 'Сариасийский район', 'Sariosiyo tumani', 'гп Сариасия', 'Sariosiyo shaharchasi', 0),
(128, 1722220, 1722, 220, NULL, 'Термезский район', 'Termiz tumani', 'гп Учкизил', 'Uchqizil shaharchasi', 0),
(129, 1722221, 1722, 221, NULL, 'Узунский район', 'Uzun tumani', 'гп Узун', 'Uzun shaharchasi', 0),
(130, 1722223, 1722, 223, NULL, 'Шерабадский район', 'Sherobod tumani', 'г. Шерабад', 'Sherobod sh.', 0),
(131, 1722226, 1722, 226, NULL, 'Шурчинский район', 'Sho`rchi tumani', 'г. Шурчи', 'Sho`rchi sh.', 0),
(132, 1722401, 1722, 401, NULL, 'Термез', 'Termiz', NULL, NULL, 0),
(133, 1724206, 1724, 206, NULL, 'Акалтынский район', 'Oqoltin tumani', 'гп Сардоба', 'Sardoba shaharchasi', 0),
(134, 1724212, 1724, 212, NULL, 'Баяутский район', 'Boyovut tumani', 'гп Баяут', 'Boyovut shaharchasi', 0),
(135, 1724220, 1724, 220, NULL, 'Гулистанский район', 'Guliston tumani', 'гп Дехканабад', 'Dehqonobod shaharchasi', 0),
(136, 1724226, 1724, 226, NULL, 'Сардобский район', 'Sardoba tumani', 'гп Пахтаабад', 'Paxtaobod shaharchasi', 0),
(137, 1724228, 1724, 228, NULL, 'Мирзаабадский район', 'Mirzaobod tumani', 'гп Навруз', 'Navro`z shaharchasi', 0),
(138, 1724231, 1724, 231, NULL, 'Сырдарьинский район', 'Sirdaryo tumani', 'г. Сырдарья', 'Sirdaryo sh.', 0),
(139, 1724235, 1724, 235, NULL, 'Хавастский район', 'Xavast tumani', 'гп Хаваст', 'Hovos shaharchasi', 0),
(140, 1724401, 1724, 401, NULL, 'Гулистан', 'Guliston', NULL, NULL, 0),
(141, 1724410, 1724, 410, NULL, 'Шиpин', 'Shirin', NULL, NULL, 0),
(142, 1724413, 1724, 413, NULL, 'Янгиеp', 'Yangiyer', NULL, NULL, 0),
(143, 1727206, 1727, 206, NULL, 'Аккурганский район', 'Oqqo`rg`on tumani', 'г. Аккурган', 'Oqqo`rg`on sh.', 0),
(144, 1727212, 1727, 212, NULL, 'Ахангаранский район', 'Ohangaron tumani', 'г. Ахангаран', 'Ohangaron sh.', 0),
(145, 1727220, 1727, 220, NULL, 'Бекабадский район', 'Bekobod tumani', 'гп Зафар', 'Zafar shaharchasi', 0),
(146, 1727224, 1727, 224, NULL, 'Бостанлыкский район', 'Bo`stonliq tumani', 'г. Газалкент', 'G`azalkent sh.', 0),
(147, 1727228, 1727, 228, NULL, 'Букинский район', 'Bo`ka tumani', 'г. Бука', 'Bo`ka sh.', 0),
(148, 1727233, 1727, 233, NULL, 'Куйичирчикский район', 'Qiyichirchiq tumani', 'г. Дустобод', 'Do`stobod sh.', 0),
(149, 1727237, 1727, 237, NULL, 'Зангиатинский район', 'Zangiota tumani', 'г.Келес', 'Keles sh.', 0),
(150, 1727248, 1727, 248, NULL, 'Кибрайский район', 'Qibray tumani', 'гп Кибрай', 'Qibray shaharchasi', 0),
(151, 1727249, 1727, 249, NULL, 'Паркентский район', 'Parkent tumani', 'г. Паркент', 'Parkent sh.', 0),
(152, 1727250, 1727, 250, NULL, 'Пскентский район', 'Pskent tumani', 'г. Пскент', 'Pskent sh.', 0),
(153, 1727253, 1727, 253, NULL, 'Уртачирчикский район', 'O`rtachirchiq tumani', 'г. Тойтепа', 'To`ytepa sh.', 0),
(154, 1727256, 1727, 256, NULL, 'Чиназский район', 'Chinoz tumani', 'г. Чиназ', 'Chinoz sh.', 0),
(155, 1727259, 1727, 259, NULL, 'Янгиюльский район', 'Yangiyo`l tumani', 'г.Янгиюль', 'Yangiyo`l sh.', 0),
(156, 1727404, 1727, 404, NULL, 'Алмалык', 'Olmaliq', NULL, NULL, 0),
(157, 1727407, 1727, 407, NULL, 'Ангрен', 'Angren', NULL, NULL, 0),
(158, 1727413, 1727, 413, NULL, 'Бекабад', 'Bekobod', NULL, NULL, 0),
(159, 1727419, 1727, 419, NULL, 'Чиpчик', 'Chirchiq', NULL, NULL, 0),
(160, 1730203, 1730, 203, NULL, 'Алтыарыкский район', 'Oltiariq tumani', 'гп Алтыарык', 'Oltiariq shaharchasi', 0),
(161, 1730206, 1730, 206, NULL, 'Куштепинский район', 'Qo`shtepa tumani', 'нп Лангар', 'Langar a.p.', 0),
(162, 1730209, 1730, 209, NULL, 'Багдадский район', 'Bog`dod tumani', 'гп Багдад', 'Bog`dod shaharchasi', 0),
(163, 1730212, 1730, 212, NULL, 'Бувайдинский район', 'Buvayda tumani', 'гп Ибрат', 'Ibrat shaharchasi', 0),
(164, 1730215, 1730, 215, NULL, 'Бешарыкский район', 'Beshariq tumani', 'г. Бешарык', 'Beshariq sh.', 0),
(165, 1730400, 1730, 400, NULL, 'Города областного подчинения Ферганской области', 'Farg`ona viloyatining viloyat ahamiyatiga ega shah', NULL, NULL, 0),
(166, 1733200, 1733, 200, NULL, 'Районы Хорезмской области', 'Xorazm viloyatining tumanlari', NULL, NULL, 0),
(167, 1733400, 1733, 400, NULL, 'Города областного подчинения Хорезмской области', 'Xorazm viloyatining viloyat ahamiyatiga ega shahar', NULL, NULL, 0),
(168, 1735200, 1735, 200, NULL, 'Районы Республики Каракалпакстан', 'Qoraqalpog`iston Respublikasining tumanlari', NULL, NULL, 0),
(169, 1735400, 1735, 400, NULL, 'Гоpода pеспуб-го подч. Республики Каpакалпакстан', 'Qoraqalpog`iston Respublikasi ahamiyatiga ega shah', NULL, NULL, 0),
(170, 1735204, 1735, 204, NULL, 'Амударьинский район', 'Amudaryo tumani', 'г. Мангит', 'Mang`it sh.', 0),
(171, 1735207, 1735, 207, NULL, 'Берунийский район', 'Beruniy tumani', 'г. Беруни', 'Beruniy sh.', 0),
(172, 1735211, 1735, 211, NULL, 'Караузякский район', 'Qorao`zak tumani', 'гп Караузяк', 'Qorao`zak shaharchasi', 0),
(173, 1735212, 1735, 212, NULL, 'Кегейлийский район', 'Kegeyli tumani', 'гп Кегейли', 'Kegeyli shaharchasi', 0),
(174, 1735215, 1735, 215, NULL, 'Кунградский район', 'Qo`ng`irot tumani', 'г. Кунград', 'Qo`ng`irot sh.', 0),
(175, 1735218, 1735, 218, NULL, 'Канлыкульский район', 'Qanliko`l tumani', 'гп Канлыкуль', 'Qanliko`l shaharchasi', 0),
(176, 1735222, 1735, 222, NULL, 'Муйнакский район', 'Mo`ynoq tumani', 'г. Муйнак', 'Mo`ynoq sh.', 0),
(177, 1735225, 1735, 225, NULL, 'Нукусский район', 'Nukus tumani', 'гп Акмангит', 'Oqmang`it shaharchasi', 0),
(178, 1735230, 1735, 230, NULL, 'Тахтакупырский район', 'Taxtako`pir tumani', 'гп Тахтакупыр', 'Taxtako`pir shaharchasi', 0),
(179, 1735233, 1735, 233, NULL, 'Турткульский район', 'To`rtko`l tumani', 'г. Турткуль', 'To`rtko`l sh.', 0),
(180, 1735236, 1735, 236, NULL, 'Ходжейлийский район', 'Xo`jayli tumani', 'г. Ходжейли', 'Xo`jayli sh.', 0),
(181, 1735240, 1735, 240, NULL, 'Чимбайский район', 'Chimboy tumani', 'г. Чимбай', 'Chimboy sh.', 0),
(182, 1735243, 1735, 243, NULL, 'Шуманайский район', 'Shumanay tumani', 'г. Шуманай', 'Shumanay sh.', 0),
(183, 1735250, 1735, 250, NULL, 'Элликкалинский район', 'Ellikkala tumani', 'г. Бустан', 'Bo`ston sh.', 0),
(184, 1703202, 1703, 202, NULL, 'Алтынкульский район', 'Oltinko`l tumani', 'нп Алтынкуль', 'Oltinko`l a.p.', 0),
(185, 1706215, 1706, 215, NULL, 'Гиждуванский район', 'G`ijduvon tumani', 'г. Гиждуван', 'G`ijduvon sh.', 0),
(186, 1708225, 1708, 225, NULL, 'Зафарабадский район', 'Zafarobod tumani', 'гп Зафарабад', 'Zafarobod shaharchasi', 0),
(187, 1710235, 1710, 235, NULL, 'Нишанский район', 'Nishon tumani', 'г. Янги-Нишан', 'Yangi Nishon sh.', 0),
(188, 1712244, 1712, 244, NULL, 'Тамдынский район', 'Tomdi tumani', 'гп Томдибулок', 'Tomdibuloq shaharchasi', 0),
(189, 1714242, 1714, 242, NULL, 'Янгикурганский район', 'Yangiqo`rg`on tumani', 'гп Янгикурган', 'Yangiqo`rg`on shaharchasi', 0),
(190, 1722207, 1722, 207, NULL, 'Музрабадский район', 'Muzrabot tumani', 'гп Халкабад', 'Xalqobod shaharchasi', 0),
(191, 1722212, 1722, 212, NULL, 'Джаркурганский район', 'Jarqo`rg`on tumani', 'г. Джаркурган', 'Jarqo`rg`on sh.', 0),
(192, 1724216, 1724, 216, NULL, 'Сайхунабадский район', 'Sayxunobod tumani', 'гп Сайхун', 'Sayxun shaharcha', 0),
(193, 1727239, 1727, 239, NULL, 'Юкоричирчикский район', 'Yuqorichirchiq tumani', 'гп Янгибазар', 'Yangibozor shaharchasi', 0),
(194, 1730221, 1730, 221, NULL, 'Учкуприкский район', 'Uchko`prik tumani', 'гп Учкуприк', 'Uchko`prik shaharchasi', 0),
(195, 1730224, 1730, 224, NULL, 'Риштанский район', 'Rishton tumani', 'г. Риштан', 'Rishton sh.', 0),
(196, 1730226, 1730, 226, NULL, 'Сохский район', 'So`x tumani', 'гп Равон', 'Ravon shaharchasi', 0),
(197, 1730227, 1730, 227, NULL, 'Ташлакский район', 'Toshloq tumani', 'гп Ташлак', 'Toshloq shaharchasi', 0),
(198, 1730230, 1730, 230, NULL, 'Узбекистанский район', 'O`zbekiston tumani', 'г. Яйпан', 'Yaypan sh.', 0),
(199, 1730233, 1730, 233, NULL, 'Ферганский район', 'Farg`ona tumani', 'гп Чимен', 'Chimyon shaharchasi', 0),
(200, 1730238, 1730, 238, NULL, 'Фуркатский район', 'Furqat tumani', 'гп Навбахор', 'Navbahor shaharchasi', 0),
(201, 1730242, 1730, 242, NULL, 'Язъяванский район', 'Yozyovon tumani', 'гп Язъяван', 'Yozyovon shaharchasi', 0),
(202, 1730401, 1730, 401, NULL, 'Фергана', 'Farg`ona', NULL, NULL, 0),
(203, 1730405, 1730, 405, NULL, 'Коканд', 'Qo`qon', NULL, NULL, 0),
(204, 1730408, 1730, 408, NULL, 'Кувасай', 'Quvasoy', NULL, NULL, 0),
(205, 1730412, 1730, 412, NULL, 'Маpгилан', 'Marg`ilon', NULL, NULL, 0),
(206, 1733204, 1733, 204, NULL, 'Багатский район', 'Bog`ot tumani', 'гп Багат', 'Bog`ot shaharchasi', 0),
(207, 1733208, 1733, 208, NULL, 'Гурленский район', 'Gurlan tumani', 'гп Гурлен', 'Gurlan shaharchasi', 0),
(208, 1733212, 1733, 212, NULL, 'Кошкупырский район', 'Qo`shko`pir tumani', 'гп Кошкупыр', 'Qo`shko`pir shaharchasi', 0),
(209, 1733217, 1733, 217, NULL, 'Ургенчский район', 'Urganch tumani', 'нп Караул', 'Qoroul a.p.', 0),
(210, 1733220, 1733, 220, NULL, 'Хазараспский район', 'Xazorasp tumani', 'гп Хазарасп', 'Xazorasp shaharchasi', 0),
(211, 1733223, 1733, 223, NULL, 'Ханкинский район', 'Xonqa tumani', 'гп Ханка', 'Xonqa shaharchasi', 0),
(212, 1733226, 1733, 226, NULL, 'Хивинский район', 'Xiva tumani', 'г. Хива', 'Xiva sh.', 0),
(213, 1733230, 1733, 230, NULL, 'Шаватский район', 'Shovot tumani', 'гп Шават', 'Shovot shaharchasi', 0),
(214, 1733233, 1733, 233, NULL, 'Янгиарыкский район', 'Yangiariq tumani', 'гп Янгиарык', 'Yangiariq shaharchasi', 0),
(215, 1733236, 1733, 236, NULL, 'Янгибазарский район', 'Yangibozor tumani', 'гп Янгибазар', 'Yangibozor shaharchasi', 0),
(216, 1733401, 1733, 401, NULL, 'Ургенч', 'Urganch', NULL, NULL, 0),
(217, 1730218, 1730, 218, NULL, 'Кувинский район', 'Quva tumani', 'г. Кува', 'Quva sh.', 0),
(218, 1730236, 1730, 236, NULL, 'Дангаринский район', 'Dang`ara tumani', 'гп Дангара', 'Dang`ara shaharchasi', 0),
(219, 1703408, 1703, 408, NULL, 'Ханабад', 'Xonobod', NULL, NULL, 0),
(220, 1735401, 1735, 401, NULL, 'Нукус', 'Nukus', NULL, NULL, 0),
(222, 1727415, 1727, 415, NULL, 'г.Ахангаран', 'г.Ахангаран', NULL, NULL, 0),
(223, 1727424, 1727, 424, NULL, 'г.Янгиюль', 'г.Янгиюль', NULL, NULL, 0),
(224, 1727265, 1727, 265, NULL, 'Ташкентский район', 'Ташкентский район', NULL, NULL, 0),
(225, 1727401, 1727, 401, NULL, 'г.Нурафшан', 'г.Нурафшан', NULL, NULL, 0),
(226, 1710405, 1710, 405, NULL, 'город Шахрисабз', 'город Шахрисабз', NULL, NULL, 0),
(227, 1733406, 1733, 406, NULL, 'город Хива', 'город Хива', NULL, NULL, 0),
(228, 1735228, 1735, 228, NULL, 'Тахиаташский район', 'Тахиаташский район', NULL, NULL, 0),
(229, 1735209, 1735, 209, NULL, 'Бозатауский район', 'Bo''zatov tumani', NULL, NULL, 0),
(230, 1722203, 1722, 203, NULL, 'Бандихонский район', 'Bandixon tumani', NULL, NULL, NULL),
(231, 1733221, 1733, 221, NULL, 'Тупроккалинский район', 'Tuproqqal''a tumani', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `uz_regions`
--

CREATE TABLE IF NOT EXISTS `uz_regions` (
  `id` int(10) unsigned NOT NULL,
  `regionid` int(10) unsigned DEFAULT NULL,
  `regioncode` int(10) unsigned DEFAULT NULL,
  `regioncode2` int(10) unsigned DEFAULT NULL,
  `nameRu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameUz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codelat` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codecyr` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admincenterRu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admincenterUz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isdeleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `uz_regions`
--

INSERT INTO `uz_regions` (`id`, `regionid`, `regioncode`, `regioncode2`, `nameRu`, `nameUz`, `codelat`, `codecyr`, `admincenterRu`, `admincenterUz`, `isdeleted`) VALUES
(1, 1726, 1726, NULL, 'г. Ташкент', 'Toshkent shahri', 'TN', 'ТН', NULL, NULL, 0),
(2, 1735, 1735, 23, 'Республика Каракалпакстан', 'Qoraqalpog`iston Respublikasi', 'QQ', 'КК', 'г. Hукус', 'Nukus sh.', 0),
(3, 1703, 1703, 17, 'Андижанская область', 'Andijon viloyati', 'AN', 'АН', 'г. Андижан', 'Andijon sh.', 0),
(4, 1706, 1706, 20, 'Бухарская область', 'Buxoro viloyati', 'BX', 'БХ', 'г. Бухара', 'Buxoro sh.', 0),
(5, 1708, 1708, 13, 'Джизакская область', 'Jizzax viloyati', 'JZ', 'ДД', 'г. Джизак', 'Jizzax sh.', 0),
(6, 1710, 1710, 18, 'Кашкадарьинская область', 'Qashqadaryo viloyati', 'QF', 'КФ', 'г. Карши', 'Qarshi sh.', 0),
(7, 1712, 1712, 21, 'Навоийская область', 'Navoiy viloyati', 'NV', 'НВ', 'г. Навои', 'Navoiy sh.', 0),
(8, 1714, 1714, 16, 'Наманганская область', 'Namangan viloyati', 'NA', 'НА', 'г. Наманган', 'Namangan sh.', 0),
(9, 1718, 1718, 14, 'Самаркандская область', 'Samarqand viloyati', 'SN', 'СН', 'г. Самарканд', 'Samarqand sh.', 0),
(10, 1722, 1722, 19, 'Сурхандарьинская область', 'Surxandaryo viloyati', 'SD', 'СД', 'г. Термез', 'Termiz sh.', 0),
(11, 1724, 1724, 12, 'Сырдарьинская область', 'Sirdaryo viloyati', 'SI', 'СИ', 'г. Гулистан', 'Guliston sh.', 0),
(12, 1727, 1727, 11, 'Ташкентская область', 'Toshkent viloyati', 'TSH', 'ТШ', 'г. Ташкент', 'Toshkent sh.', 0),
(13, 1730, 1730, 15, 'Ферганская область', 'Farg`ona viloyati', 'FE', 'ФЕ', 'г. Фергана', 'Farg`ona sh.', 0),
(14, 1733, 1733, 22, 'Хорезмская область', 'Xorazm viloyati', 'XZ', 'ХЗ', 'г. Ургенч', 'Urganch sh.', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `uz_districts`
--
ALTER TABLE `uz_districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uz_districts_areaid_unique` (`areaid`),
  ADD KEY `uz_districts_regionid_foreign` (`regionid`);

--
-- Индексы таблицы `uz_regions`
--
ALTER TABLE `uz_regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uz_regions_regionid_unique` (`regionid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `uz_districts`
--
ALTER TABLE `uz_districts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT для таблицы `uz_regions`
--
ALTER TABLE `uz_regions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `uz_districts`
--
ALTER TABLE `uz_districts`
  ADD CONSTRAINT `uz_districts_regionid_foreign` FOREIGN KEY (`regionid`) REFERENCES `uz_regions` (`regionid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
