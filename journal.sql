-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2022 г., 19:52
-- Версия сервера: 5.7.39
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `journal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_kk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_kk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `annotation_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `annotation_kk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `annotation_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `documentFile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documentShortFile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkFile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewFile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plagiatFile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plagiatPoint` int(11) DEFAULT '0',
  `doi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` smallint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `autor_id`, `parent_id`, `title_ru`, `title_kk`, `title_en`, `keywords_ru`, `keywords_kk`, `keywords_en`, `annotation_ru`, `annotation_kk`, `annotation_en`, `category_id`, `comment`, `documentFile`, `documentShortFile`, `checkFile`, `reviewFile`, `plagiatFile`, `plagiatPoint`, `doi`, `date_create`, `date_update`, `status`) VALUES
(1, 1, 1, 'Виджет мультиязычности в YII2 без использования базы данных.', 'kkkВиджет мультиязычности в YII2 без использования базы данных.', 'eeeeВиджет мультиязычности в YII2 без использования базы данных.', 'Виджет мультиязычности в YII2 без использования базы данных.', 'Виджет мультиязычности в YII2 без использования базы данных.', 'Виджет мультиязычности в YII2 без использования базы данных.', 'Виджет мультиязычности в YII2 без использования базы данных. Виджет мультиязычности в YII2 без использования базы данных.', 'Виджет мультиязычности в YII2 без использования базы данных. Виджет мультиязычности в YII2 без использования базы данных.', 'Виджет мультиязычности в YII2 без использования базы данных. Виджет мультиязычности в YII2 без использования базы данных.', 3, '2133 321  312 Виджет мультиязычности в YII2 без использования базы данных.', '', NULL, '', NULL, NULL, 0, NULL, '2022-12-18 13:40:43', '2022-12-18 11:06:04', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1671363396);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/authors/*', 2, NULL, NULL, NULL, 1671363315, 1671363315),
('/cabinet/*', 2, NULL, NULL, NULL, 1671363298, 1671363298),
('admin', 1, NULL, NULL, NULL, 1671363387, 1671363387),
('adminAccess', 2, NULL, NULL, NULL, 1671363330, 1671363330);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('adminAccess', '/authors/*'),
('adminAccess', '/cabinet/*'),
('admin', 'adminAccess');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `sort`, `type`) VALUES
(1, 'Новости', 0, 0, 1),
(2, 'Новости факультета', 0, 0, 1),
(3, 'Новости кафедры', 0, 0, 1),
(4, 'Новости 2', 0, 0, 1),
(5, 'Новости 3', 0, 0, 1),
(6, 'Новости 4', 0, 0, 1),
(7, 'Новости 5', 0, 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `journals`
--

CREATE TABLE `journals` (
  `id` int(11) NOT NULL,
  `title_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_kk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(2) NOT NULL,
  `poster` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `journals`
--

INSERT INTO `journals` (`id`, `title_ru`, `title_kk`, `title_en`, `status`, `poster`, `date_create`, `date_update`) VALUES
(1, 'mmet', 'mmet kz', 'mmet en', 0, '', '2022-12-18 14:52:58', '2022-12-18 11:52:58');

-- --------------------------------------------------------

--
-- Структура таблицы `journal_category`
--

CREATE TABLE `journal_category` (
  `id` int(11) NOT NULL,
  `title_ru` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_kk` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0',
  `journal_id` int(11) NOT NULL,
  `sort` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `journal_category`
--

INSERT INTO `journal_category` (`id`, `title_ru`, `title_kk`, `title_en`, `status`, `journal_id`, `sort`) VALUES
(1, 'Проблемы высшей школы', 'kkkПроблемы высшей школы', 'eeПроблемы высшей школы', 0, 1, 1),
(2, 'Машиностроение. Металлургия', 'kkkМашиностроение. Металлургия', 'eeМашиностроение. Металлургия', 0, 1, 2),
(3, 'Геотехнологии. Безопасность жизнедеятельности', 'Геотехнологии. Безопасность жизнедеятельности', 'Геотехнологии. Безопасность жизнедеятельности', 0, 1, 3),
(4, 'Строительство. Транспорт', 'Строительство. Транспорт', 'Строительство. Транспорт', 0, 1, 4),
(5, 'Экономика', 'Экономика', 'Экономика', 0, 1, 5),
(6, 'Научные сообщения', 'Научные сообщения', 'Научные сообщения', 0, 1, 6),
(7, 'Энергетика, автоматика, ИКТ', 'Энергетика, автоматика, ИКТ', 'Энергетика, автоматика, ИКТ', 0, 1, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `journal_number`
--

CREATE TABLE `journal_number` (
  `id` int(11) NOT NULL,
  `title_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_kz` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(3) NOT NULL DEFAULT '0',
  `number` smallint(2) DEFAULT NULL,
  `journalFile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posterFile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `journal_number`
--

INSERT INTO `journal_number` (`id`, `title_ru`, `title_kz`, `title_en`, `status`, `number`, `journalFile`, `posterFile`, `date_create`, `date_update`) VALUES
(1, 'tu', 'tu', 'tu', 0, NULL, NULL, NULL, '2022-12-18 11:39:51', '2022-12-18 08:39:51');

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `code`, `name`) VALUES
(1, 'kz', 'Kazakh'),
(2, 'ru', 'Русский'),
(3, 'en', 'English');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `lft`, `rgt`, `depth`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, 0, 0, 0, 'root', NULL, NULL, NULL, NULL),
(2, 0, 0, 1, 'Университет', 1, '', NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1634534340),
('m140506_102106_rbac_init', 1634534361),
('m140602_111327_create_menu_table', 1634534342),
('m160312_050000_create_user', 1634534343),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1634534361),
('m180523_151638_rbac_updates_indexes_without_prefix', 1634534361),
('m200409_110543_rbac_update_mssql_trigger', 1634534362),
('m211004_034258_create_table_status', 1634534485),
('m211008_041928_create_table_language', 1634534485),
('m211008_041936_create_table_category', 1634534485);

-- --------------------------------------------------------

--
-- Структура таблицы `mymenu`
--

CREATE TABLE `mymenu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mymenu`
--

INSERT INTO `mymenu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, 'Университет', 0, NULL, 2, NULL),
(2, 'Миссия университета', 1, NULL, 2, NULL),
(3, 'Абитуриенту', 1, '', 3, ''),
(4, 'Первокурснику', 0, '', 4, ''),
(5, 'Студенту', 0, '', 5, ''),
(6, 'Сотруднику', 0, '', 6, ''),
(7, 'Блоги', 0, '', 8, ''),
(8, 'Главная', 0, NULL, 1, NULL),
(9, 'Наука', 0, NULL, 7, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `language_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `img`, `create_date`, `update_date`, `language_id`, `post_id`, `type`) VALUES
(1, 'Уважаемые студенты!', 'Конкурс проводится с целью пропаганды достижений и опыта лучших инженеров страны и популяризации профессии инженера.\r\n\r\nС условиями Конкурса можно ознакомиться на сайте по ссылке https://neark.kz/nacionalnaja-inzhenernaja-akademija-re-3-2-2-2/ и по телефону: 8(727) 292-51-90.\r\n\r\nК участию в Конкурсе допускаются лица, имеющие высшее инженерное образование и высокий уровень компетенции, занятые инженерной работой на предприятиях, в организациях и учреждениях различных форм собственности, независимо от их возраста, должности, наличия ученого звания и степени, и располагающие значимыми результатами инженерных разработок.\r\n\r\nКандидатуры на участие в Конкурсе выдвигаются в конкурсную комиссию областными исполнительными органами, руководством региональных общественных организаций, научно-технических обществ и других общественных объединений.\r\n\r\nИнформация о сроках подачи заявок и условиях проведения Конкурса размещается на официальном сайте Национальной инженерной академии РК и публикуется в средствах массовой информации 12 апреля ежегодно.\r\n\r\nРассмотрение документов проводится в соответствии с требованиями, установленными настоящим Положением. Процедура отбора включает проведение экспертной оценки конкурсантов Комиссией. Участнику может быть отказано в участии в Конкурсе в случае несоответствия его указанным требованиям или представления недостоверной информации.\r\n\r\nРезультаты Конкурса подводятся на итоговом заседании Комиссии ежегодно в IV квартале и оформляются протоколом, содержащим список победителей.\r\n\r\nПобедители Конкурса награждаются дипломами и памятной медалью «ЛУЧШИЙ ИНЖЕНЕР ГОДА».', '1.jpg', '2021-10-21 15:52:30', '2021-10-25 05:32:04', 1, 1, 0),
(2, 'Национальная инженерная академия Республики Казахстан объявляет Республиканский конкурс «Лучший инженер 2021 года»', 'Национальная инженерная академия Республики Казахстан объявляет Республиканский конкурс «Лучший инженер 2021 года»Национальная инженерная академия Республики Казахстан объявляет Республиканский конкурс «Лучший инженер 2021 года»Национальная инженерная академия Республики Казахстан объявляет Республиканский конкурс «Лучший инженер 2021 года»Национальная инженерная академия Республики Казахстан объявляет Республиканский конкурс «Лучший инженер 2021 года»', '2.png', '2021-10-21 15:52:30', '2022-04-11 09:49:51', 2, 2, 0),
(3, 'category_ids', '<pre>category_ids</pre>', '2.png', '2021-10-28 07:04:21', '2022-04-07 05:11:01', 2, 19, 0),
(4, 'Новая новость', '<p>Текс</p>', NULL, '2021-10-28 07:08:56', '2021-10-28 01:08:56', 2, 20, 0),
(5, 'Управление по вопросам молодежной политики Карагандинской области запускает проект по формированию финансовой грамотности среди молодежи.', 'Управление по вопросам молодежной политики Карагандинской области&nbsp; запускает проект по формированию финансовой грамотности среди молодежи. Целью проекта является повышение финансовой грамотности молодежи, развитие базовых навыков управления финансами. В процессе обучения участники: сформируют навыки планирования бюджета и набора компетенций, которые образуют&nbsp;\r\nУправление по вопросам молодежной политики Карагандинской области&nbsp; запускает проект по формированию финансовой грамотности среди молодежи. Целью проекта является повышение финансовой грамотности молодежи, развитие базовых навыков управления финансами. В процессе обучения участники: сформируют навыки планирования бюджета и набора компетенций, которые образуют&nbsp;\r\nУправление по вопросам молодежной политики Карагандинской области&nbsp; запускает проект по формированию финансовой грамотности среди молодежи. Целью проекта является повышение финансовой грамотности молодежи, развитие базовых навыков управления финансами. В процессе обучения участники: сформируют навыки планирования бюджета и набора компетенций, которые образуют&nbsp;\r\nУправление по вопросам молодежной политики Карагандинской области&nbsp; запускает проект по формированию финансовой грамотности среди молодежи. Целью проекта является повышение финансовой грамотности молодежи, развитие базовых навыков управления финансами. В процессе обучения участники: сформируют навыки планирования бюджета и набора компетенций, которые образуют&nbsp;\r\nУправление по вопросам молодежной политики Карагандинской области&nbsp; запускает проект по формированию финансовой грамотности среди молодежи. Целью проекта является повышение финансовой грамотности молодежи, развитие базовых навыков управления финансами. В процессе обучения участники: сформируют навыки планирования бюджета и набора компетенций, которые образуют&nbsp;\r\nУправление по вопросам молодежной политики Карагандинской области&nbsp; запускает проект по формированию финансовой грамотности среди молодежи. Целью проекта является повышение финансовой грамотности молодежи, развитие базовых навыков управления финансами. В процессе обучения участники: сформируют навыки планирования бюджета и набора компетенций, которые образуют&nbsp;\r\nУправление по вопросам молодежной политики Карагандинской области&nbsp; запускает проект по формированию финансовой грамотности среди молодежи. Целью проекта является повышение финансовой грамотности молодежи, развитие базовых навыков управления финансами. В процессе обучения участники: сформируют навыки планирования бюджета и набора компетенций, которые образуют&nbsp;\r\n', NULL, '2021-10-28 07:13:59', '2022-04-07 09:19:19', 2, 21, 0),
(6, 'Тестовая страница', '<p><img src=\"http://ktu/uploads/pages/%D0%A2%D1%83%D1%81%D1%83%D0%BF%D0%B1%D0%B5%D0%BA%D0%BE%D0%B2%20%D0%90%D0%B1%D0%B0%D0%B9%D0%B4%D0%BE%D0%BB%D0%B4%D0%B0%20%D0%A1%D0%B0%D0%B9%D0%BF%D0%B0%D1%88%D0%B5%D0%B2%D0%B8%D1%87.jpg\" alt=\"\" width=\"294\" height=\"391\"></p>', NULL, '2021-10-30 17:01:49', '2021-11-04 05:07:54', 2, 22, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `author_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `type`, `status_id`, `author_id`, `parent_id`, `sort`, `date_create`, `date_update`) VALUES
(1, 1, 1, 1, NULL, 0, '2022-04-07 03:49:57', '0000-00-00 00:00:00'),
(2, 1, 1, 1, NULL, 0, '2022-04-07 03:49:57', '0000-00-00 00:00:00'),
(19, 1, 1, 1, NULL, 0, '2022-04-07 03:49:57', '0000-00-00 00:00:00'),
(20, 1, 1, 1, NULL, 0, '2022-04-07 03:49:57', '0000-00-00 00:00:00'),
(21, 1, 1, 1, NULL, 0, '2022-04-07 03:49:57', '0000-00-00 00:00:00'),
(22, 1, 1, 1, NULL, 0, '2022-04-07 03:49:57', '2022-04-07 05:09:53');

-- --------------------------------------------------------

--
-- Структура таблицы `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_category`
--

INSERT INTO `post_category` (`id`, `post_id`, `category_id`, `sort`) VALUES
(1, 19, 2, 0),
(2, 19, 3, 0),
(3, 20, 1, 0),
(4, 21, 1, 0),
(5, 22, 1, 0),
(6, 2, 1, 0),
(7, 2, 5, 0),
(8, 1, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Опубликовано'),
(2, 'В ожидании');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'NywaV9fTPL4pdpxIAW6mDU3BSzMeh9jE', '$2y$13$hY4nZVwlAKv1VFCfGUUjtOID4E6pmLDvrwJOhyW7dYpAHEBEy5Mjm', NULL, 'admin@admin.kz', 10, 1629365099, 1629365099),
(5, 'expert1', '-VsOHGsvrv0Y7YmWlEIfW_q14Dw54qiF', '$2y$13$RXfUr/bCLBHt.msQUDVkfOHGfE/rJVH.0ajM7DTqnX7VbptSGXN1O', NULL, 'expert1@kstu.kz', 10, 1631858960, 1631858960);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `journal_category`
--
ALTER TABLE `journal_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_id` (`journal_id`);

--
-- Индексы таблицы `journal_number`
--
ALTER TABLE `journal_number`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `mymenu`
--
ALTER TABLE `mymenu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `journal_category`
--
ALTER TABLE `journal_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `journal_number`
--
ALTER TABLE `journal_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `mymenu`
--
ALTER TABLE `mymenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `journal_category`
--
ALTER TABLE `journal_category`
  ADD CONSTRAINT `journal_category_ibfk_1` FOREIGN KEY (`journal_id`) REFERENCES `journal_number` (`id`);

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`);

--
-- Ограничения внешнего ключа таблицы `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
