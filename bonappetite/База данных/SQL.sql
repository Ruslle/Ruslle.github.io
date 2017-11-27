-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 22 2016 г., 22:56
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_bonus_list`
--

CREATE TABLE IF NOT EXISTS `db_bonus_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_bonus_list`
--

INSERT INTO `db_bonus_list` (`id`, `user`, `user_id`, `sum`, `date_add`, `date_del`) VALUES
(1, 'DimanZO', 1, 21, 1361984210, 1362070610);

-- --------------------------------------------------------

--
-- Структура таблицы `db_conabrul`
--

CREATE TABLE IF NOT EXISTS `db_conabrul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rules` text NOT NULL,
  `about` text NOT NULL,
  `contacts` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_conabrul`
--

INSERT INTO `db_conabrul` (`id`, `rules`, `about`, `contacts`) VALUES
(1, '<p>Проверка правил</p>', '<p>О проекте</p>', '');

-- --------------------------------------------------------

--
-- Структура таблицы `db_config`
--

CREATE TABLE IF NOT EXISTS `db_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `min_pay` double NOT NULL DEFAULT '15',
  `ser_per_wmr` int(11) NOT NULL DEFAULT '1000',
  `percent_swap` int(11) NOT NULL DEFAULT '0',
  `percent_sell` int(2) NOT NULL DEFAULT '10',
  `items_per_coin` int(11) NOT NULL DEFAULT '7',
  `a_in_h` int(11) NOT NULL DEFAULT '0',
  `b_in_h` int(11) NOT NULL DEFAULT '0',
  `c_in_h` int(11) NOT NULL DEFAULT '0',
  `d_in_h` int(11) NOT NULL DEFAULT '0',
  `e_in_h` int(11) NOT NULL DEFAULT '0',
  `amount_a_t` int(11) NOT NULL DEFAULT '0',
  `amount_b_t` int(11) NOT NULL DEFAULT '0',
  `amount_c_t` int(11) NOT NULL DEFAULT '0',
  `amount_d_t` int(11) NOT NULL DEFAULT '0',
  `amount_e_t` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_config`
--

INSERT INTO `db_config` (`id`, `admin`, `pass`, `min_pay`, `ser_per_wmr`, `percent_swap`, `percent_sell`, `items_per_coin`, `a_in_h`, `b_in_h`, `c_in_h`, `d_in_h`, `e_in_h`, `amount_a_t`, `amount_b_t`, `amount_c_t`, `amount_d_t`, `amount_e_t`) VALUES
(1, 'admin', 'admin', 20, 10000, 50, 50, 10, 1001, 2001, 3001, 4001, 5001, 1001, 2001, 3001, 4001, 5001);

-- --------------------------------------------------------

--
-- Структура таблицы `db_insert_money`
--

CREATE TABLE IF NOT EXISTS `db_insert_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `money` double NOT NULL DEFAULT '0',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `db_insert_money`
--

INSERT INTO `db_insert_money` (`id`, `user`, `user_id`, `money`, `serebro`, `date_add`, `date_del`) VALUES
(2, 'wer', 1, 234, 234234, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `db_knb`
--

CREATE TABLE IF NOT EXISTS `db_knb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `sum` int(11) NOT NULL DEFAULT '0',
  `bet_type` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_lottery`
--

CREATE TABLE IF NOT EXISTS `db_lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `db_lottery`
--

INSERT INTO `db_lottery` (`id`, `user_id`, `user`, `date_add`) VALUES
(1, 1, 'DimanZO', 1362792639),
(2, 1, 'DimanZO', 1362792644),
(3, 1, 'DimanZO', 1362792646);

-- --------------------------------------------------------

--
-- Структура таблицы `db_lottery_winners`
--

CREATE TABLE IF NOT EXISTS `db_lottery_winners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_a` varchar(10) NOT NULL,
  `bil_a` int(11) NOT NULL DEFAULT '0',
  `user_b` varchar(10) NOT NULL,
  `bil_b` int(11) NOT NULL DEFAULT '0',
  `user_c` varchar(10) NOT NULL,
  `bil_c` int(11) NOT NULL DEFAULT '0',
  `bank` float NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_lottery_winners`
--

INSERT INTO `db_lottery_winners` (`id`, `user_a`, `bil_a`, `user_b`, `bil_b`, `user_c`, `bil_c`, `bank`, `date_add`) VALUES
(1, 'DimanZO', 10, 'DimanZO', 3, 'DimanZO', 5, 1000, 1362791263);

-- --------------------------------------------------------

--
-- Структура таблицы `db_news`
--

CREATE TABLE IF NOT EXISTS `db_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `news` text NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `db_news`
--

INSERT INTO `db_news` (`id`, `title`, `news`, `date_add`) VALUES
(1, 'Проверка 1', 'ут текст новости пля', 234234234),
(2, 'Проверка 2ddd', '<p>sdasdasdasd</p>', 4444444),
(3, 'Проверка админки', '<p>ы</p>', 1355934497);

-- --------------------------------------------------------

--
-- Структура таблицы `db_payeer_insert`
--

CREATE TABLE IF NOT EXISTS `db_payeer_insert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `db_payeer_insert`
--

INSERT INTO `db_payeer_insert` (`id`, `user_id`, `user`, `sum`, `date_add`, `status`) VALUES
(2, 1, 'Frist', 100, 1456169720, 0),
(3, 1, 'Frist', 100, 1456169771, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `db_payment`
--

CREATE TABLE IF NOT EXISTS `db_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purse` varchar(20) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `chek` int(11) NOT NULL DEFAULT '0',
  `pay_sys` varchar(100) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `db_payment`
--

INSERT INTO `db_payment` (`id`, `user`, `user_id`, `purse`, `sum`, `serebro`, `status`, `chek`, `pay_sys`, `date_add`, `date_del`) VALUES
(1, 'DimanZO', 1, 'R408944291389', 20, 200000, 2, 0, '0', 1366996782, 1368292782),
(2, 'DimanZO', 1, 'R408944291389', 20, 200000, 2, 0, '0', 1366997016, 1368293016),
(3, 'DimanZO', 1, '+380668603988', 5, 50000, 0, 0, 'QIWI деньги', 1367413274, 1368709274);

-- --------------------------------------------------------

--
-- Структура таблицы `db_pay_systems`
--

CREATE TABLE IF NOT EXISTS `db_pay_systems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `DimanZO_char` varchar(3) NOT NULL,
  `comment` text NOT NULL,
  `min_pay` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `db_pay_systems`
--

INSERT INTO `db_pay_systems` (`id`, `title`, `DimanZO_char`, `comment`, `min_pay`) VALUES
(1, 'WebMoney', 'R', 'Платежная система WebMoney. Одна из самых популярных систем рунета. Комиссия при переводе составляет не более 0.8% от суммы перевода.', 10),
(2, 'YandexMoney', 'Y', 'Платежная система от русского поисковика Yandex', 5),
(3, 'QIWI деньги', '+', 'Платежная система QIWI пожалуй самая безопасная, так как все платежы проходят с помощью мобильного телефона.', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `db_recovery`
--

CREATE TABLE IF NOT EXISTS `db_recovery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `db_recovery`
--

INSERT INTO `db_recovery` (`id`, `email`, `ip`, `date_add`, `date_del`) VALUES
(1, 'zunder.si@', 1270, 1354649123, 1354650023),
(2, 'zunder.si@', 1270, 1354649212, 1354650112),
(3, 'zunder.si@', 1270, 1354649215, 1354650115),
(4, 'zunder.si@', 1270, 1354649247, 1354650147),
(5, 'zunder.si@', 1270, 1354649249, 1354650149),
(6, 'zunder.si@', 1270, 1354649271, 1354650171),
(7, 'zunder.si@', 1270, 1354649279, 1354650179),
(8, 'zunder.si@mail.ru', 2130706433, 1354649367, 1354650267);

-- --------------------------------------------------------

--
-- Структура таблицы `db_regkey`
--

CREATE TABLE IF NOT EXISTS `db_regkey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referer_name` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_sell_items`
--

CREATE TABLE IF NOT EXISTS `db_sell_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a_s` int(11) NOT NULL DEFAULT '0',
  `b_s` int(11) NOT NULL DEFAULT '0',
  `c_s` int(11) NOT NULL DEFAULT '0',
  `d_s` int(11) NOT NULL DEFAULT '0',
  `e_s` int(11) NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `all_sell` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `db_sell_items`
--

INSERT INTO `db_sell_items` (`id`, `user`, `user_id`, `a_s`, `b_s`, `c_s`, `d_s`, `e_s`, `amount`, `all_sell`, `date_add`, `date_del`) VALUES
(4, 'Rufus', 1, 1155571, 5774969, 3464404, 27422879, 1154705, 3542957.09, 38972528, 1356019881, 1357315881),
(5, 'Rufus', 1, 6454, 11059, 13821, 14741, 13819, 5989.4, 59894, 1357534947, 1358830947),
(6, 'DimanZO', 1, 6891893, 0, 0, 0, 0, 689189.3, 6891893, 1360766615, 1362062615),
(7, 'DimanZO', 1, 405005, 0, 0, 0, 4496455, 490146, 4901460, 1360928458, 1362224458),
(8, 'DimanZO', 1, 1399398, 0, 0, 0, 15536440, 1693583.8, 16935838, 1361487664, 1362783664),
(9, 'DimanZO', 1, 9491367, 0, 0, 0, 105375349, 11486671.6, 114866716, 1365280409, 1366576409);

-- --------------------------------------------------------

--
-- Структура таблицы `db_sender`
--

CREATE TABLE IF NOT EXISTS `db_sender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mess` text NOT NULL,
  `page` int(5) NOT NULL DEFAULT '0',
  `sended` int(7) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `db_sender`
--

INSERT INTO `db_sender` (`id`, `name`, `mess`, `page`, `sended`, `status`, `date_add`) VALUES
(2, 'Проверка текста', 'Проверка текста Проверка текста', 1, 4, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats`
--

CREATE TABLE IF NOT EXISTS `db_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `all_users` int(11) NOT NULL DEFAULT '0',
  `all_payments` double NOT NULL DEFAULT '0',
  `all_insert` double NOT NULL DEFAULT '0',
  `donations` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_stats`
--

INSERT INTO `db_stats` (`id`, `all_users`, `all_payments`, `all_insert`, `donations`) VALUES
(1, 68339, 1254.454, 155.55, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_btree`
--

CREATE TABLE IF NOT EXISTS `db_stats_btree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `tree_name` varchar(10) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=79 ;

--
-- Дамп данных таблицы `db_stats_btree`
--

INSERT INTO `db_stats_btree` (`id`, `user_id`, `user`, `tree_name`, `amount`, `date_add`, `date_del`) VALUES
(24, 1, 'Rufus', 'Лайм', 1001, 1357531527, 1358827527),
(25, 1, 'Rufus', 'Лайм', 1001, 1357531529, 1358827529),
(26, 1, 'Rufus', 'Лайм', 1001, 1357531531, 1358827531),
(27, 1, 'Rufus', 'Лайм', 1001, 1357531532, 1358827532),
(28, 1, 'Rufus', 'Лайм', 1001, 1357531532, 1358827532),
(29, 1, 'Rufus', 'Вишня', 2001, 1357531534, 1358827534),
(30, 1, 'Rufus', 'Вишня', 2001, 1357531535, 1358827535),
(31, 1, 'Rufus', 'Клубника', 3001, 1357531537, 1358827537),
(32, 1, 'Rufus', 'Киви', 4001, 1357531539, 1358827539),
(33, 1, 'Rufus', 'Киви', 4001, 1357531540, 1358827540),
(34, 1, 'Rufus', 'Киви', 4001, 1357531541, 1358827541),
(35, 1, 'Rufus', 'Вишня', 2001, 1357531545, 1358827545),
(36, 1, 'Rufus', 'Вишня', 2001, 1357531546, 1358827546),
(37, 1, 'Rufus', 'Клубника', 3001, 1357531548, 1358827548),
(38, 1, 'Rufus', 'Лайм', 1001, 1357531550, 1358827550),
(39, 1, 'Rufus', 'Вишня', 2001, 1357531551, 1358827551),
(40, 1, 'Rufus', 'Клубника', 3001, 1357531553, 1358827553),
(41, 1, 'Rufus', 'Клубника', 3001, 1357531555, 1358827555),
(42, 1, 'Rufus', 'Апельсин', 5001, 1357531634, 1358827634),
(43, 1, 'Rufus', 'Апельсин', 5001, 1357531656, 1358827656),
(44, 1, 'DimanZO', 'Апельсин', 5001, 1360766624, 1362062624),
(45, 1, 'DimanZO', 'Апельсин', 5001, 1360766625, 1362062625),
(46, 1, 'DimanZO', 'Апельсин', 5001, 1360766627, 1362062627),
(47, 1, 'DimanZO', 'Апельсин', 5001, 1360766629, 1362062629),
(48, 1, 'DimanZO', 'Апельсин', 5001, 1360766630, 1362062630),
(49, 1, 'DimanZO', 'Апельсин', 5001, 1360766632, 1362062632),
(50, 1, 'DimanZO', 'Апельсин', 5001, 1360766634, 1362062634),
(51, 1, 'DimanZO', 'Апельсин', 5001, 1360766635, 1362062635),
(52, 1, 'DimanZO', 'Апельсин', 5001, 1360766636, 1362062636),
(53, 1, 'DimanZO', 'Апельсин', 5001, 1360766638, 1362062638),
(54, 1, 'DimanZO', 'Апельсин', 5001, 1360766639, 1362062639),
(55, 1, 'DimanZO', 'Апельсин', 5001, 1360766640, 1362062640),
(56, 1, 'DimanZO', 'Апельсин', 5001, 1360766641, 1362062641),
(57, 1, 'DimanZO', 'Апельсин', 5001, 1360766642, 1362062642),
(58, 1, 'DimanZO', 'Апельсин', 5001, 1360766643, 1362062643),
(59, 1, 'DimanZO', 'Апельсин', 5001, 1360766645, 1362062645),
(60, 1, 'DimanZO', 'Апельсин', 5001, 1360766646, 1362062646),
(61, 1, 'DimanZO', 'Апельсин', 5001, 1360766647, 1362062647),
(62, 1, 'DimanZO', 'Апельсин', 5001, 1360766648, 1362062648),
(63, 1, 'DimanZO', 'Апельсин', 5001, 1360766649, 1362062649),
(64, 1, 'DimanZO', 'Апельсин', 5001, 1365280423, 1366576423),
(65, 1, 'DimanZO', 'Лайм', 1001, 1365280424, 1366576424),
(66, 1, 'DimanZO', 'Лайм', 1001, 1365280425, 1366576425),
(67, 1, 'DimanZO', 'Лайм', 1001, 1365280425, 1366576425),
(68, 1, 'DimanZO', 'Лайм', 1001, 1365280425, 1366576425),
(69, 1, 'DimanZO', 'Лайм', 1001, 1365280426, 1366576426),
(70, 1, 'DimanZO', 'Лайм', 1001, 1365280426, 1366576426),
(71, 1, 'DimanZO', 'Лайм', 1001, 1365280426, 1366576426),
(72, 1, 'DimanZO', 'Лайм', 1001, 1365280427, 1366576427),
(73, 1, 'DimanZO', 'Лайм', 1001, 1365280427, 1366576427),
(74, 1, 'DimanZO', 'Лайм', 1001, 1365280427, 1366576427),
(75, 1, 'DimanZO', 'Лайм', 1001, 1365280428, 1366576428),
(76, 1, 'Frist', 'Лайм', 0, 1456156706, 1457452706),
(77, 1, 'Frist', 'Лайм', 0, 1456156711, 1457452711),
(78, 1, 'Frist', 'Лайм', 0, 1456156714, 1457452714);

-- --------------------------------------------------------

--
-- Структура таблицы `db_swap_ser`
--

CREATE TABLE IF NOT EXISTS `db_swap_ser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `amount_b` double NOT NULL DEFAULT '0',
  `amount_p` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `db_swap_ser`
--

INSERT INTO `db_swap_ser` (`id`, `user_id`, `user`, `amount_b`, `amount_p`, `date_add`, `date_del`) VALUES
(4, 1, 'Rufus', 1025640, 924000, 1356019859, 1357315859),
(5, 1, 'Rufus', 4791, 3194, 1357534969, 1358830969);

-- --------------------------------------------------------

--
-- Структура таблицы `db_users_a`
--

CREATE TABLE IF NOT EXISTS `db_users_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `referer` varchar(10) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referals` int(11) NOT NULL DEFAULT '0',
  `date_reg` int(11) NOT NULL DEFAULT '0',
  `date_login` int(11) NOT NULL DEFAULT '0',
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_users_a`
--

INSERT INTO `db_users_a` (`id`, `user`, `email`, `pass`, `referer`, `referer_id`, `referals`, `date_reg`, `date_login`, `ip`, `banned`) VALUES
(1, 'DimanZO', 'dimanzo@list.ru', 'dimanzo', 'DimanZO', 1, 1, 1367313062, 1456167080, 2130706433, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `db_users_b`
--

CREATE TABLE IF NOT EXISTS `db_users_b` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `money_b` double NOT NULL DEFAULT '0',
  `money_p` double NOT NULL DEFAULT '0',
  `a_t` int(11) NOT NULL DEFAULT '0',
  `b_t` int(11) NOT NULL DEFAULT '0',
  `c_t` int(11) NOT NULL DEFAULT '0',
  `d_t` int(11) NOT NULL DEFAULT '0',
  `e_t` int(11) NOT NULL DEFAULT '0',
  `a_b` int(11) NOT NULL DEFAULT '0',
  `b_b` int(11) NOT NULL DEFAULT '0',
  `c_b` int(11) NOT NULL DEFAULT '0',
  `d_b` int(11) NOT NULL DEFAULT '0',
  `e_b` int(11) NOT NULL DEFAULT '0',
  `all_time_a` int(11) NOT NULL DEFAULT '0',
  `all_time_b` int(11) NOT NULL DEFAULT '0',
  `all_time_c` int(11) NOT NULL DEFAULT '0',
  `all_time_d` int(11) NOT NULL DEFAULT '0',
  `all_time_e` int(11) NOT NULL DEFAULT '0',
  `last_sbor` int(11) NOT NULL DEFAULT '0',
  `from_referals` double NOT NULL DEFAULT '0',
  `to_referer` double NOT NULL DEFAULT '0',
  `payment_sum` double NOT NULL DEFAULT '0',
  `insert_sum` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_users_b`
--

INSERT INTO `db_users_b` (`id`, `user`, `money_b`, `money_p`, `a_t`, `b_t`, `c_t`, `d_t`, `e_t`, `a_b`, `b_b`, `c_b`, `d_b`, `e_b`, `all_time_a`, `all_time_b`, `all_time_c`, `all_time_d`, `all_time_e`, `last_sbor`, `from_referals`, `to_referer`, `payment_sum`, `insert_sum`) VALUES
(1, 'DimanZO', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1456167505, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
