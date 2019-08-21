=== WC Nova Poshta Shipping - Плагин доставки Украинской службой Нова Пошта для WooCommerce ===
Contributors: kirillbdev
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Donate link: https://privatbank.ua/sendmoney?payment=059d0ef56f79edea7152d1cfab20229af8daf735
Tags: novaposhta, nova poshta, новая почта, нова пошта, delivery, доставка, shipping, woocommerce
Requires PHP: 5.6
Tested up to: 5.2.2
Stable tag: 1.3.0

Простой и удобный плагин для подключения доставки популярной службой "Нова Пошта" на ваш сайт WooCommerce.

== Description ==

**Простой и удобный плагин для подключения доставки популярной службой "Нова Пошта" на ваш сайт WooCommerce.**

Просто установите плагин на сайт, загрузите список актуальных отделений и пользуйтесь =)

[Сайт плагина](https://kirillbdev.pro/plugins/wc-ukr-shipping/?ref=repository)

== Видео установки и настройки ==

https://www.youtube.com/watch?v=A8pd7hP8bLs

== Преимущества ==

* Простая и быстрая установка.
* Поддержка самой свежей версии Woo Commerce.
* Работа с учетом Зон доставки. Плагин работает только в зоне доставки "Украина" (UA).
* Возможность указания произвольного адреса доставки.
* Регулярные обновления и улучшения с учетом пожеланий пользователей.

== Известные вопросы ==

* Плагин использует WP Rest Api и не будет корректно работать, если на вашем сайте эта функция отключена.
* Плагин использует API Новой Почты для получения свежей информации о населенных пунктах, городах и отделениях, которые покрывает служба.

== Installation ==

= Minimum Requirements =

* PHP 7.2 or greater is recommended
* MySQL 5.6 or greater is recommended

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install of WooCommerce, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type “WC Ukr Shipping” and click Search Plugins. Once you’ve found it you can view details about it such as the point release, rating and description. Most importantly of course, you can install it by simply clicking “Install Now”.

= Manual installation =

The manual installation method involves downloading this plugin and uploading it to your webserver via your favourite FTP application. The WordPress codex contains instructions on how to do this here.

= Updating =

Automatic updates should work like a charm; as always though, ensure you backup your site just in case.

== Changelog ==

= Version 1.3.0 / (26.07.2019) =
* Русифицированы георгафические области при выборе русского языка в настройках.
* Введен базовый модуль репортов для отправки анонимной статистики (работает только, если включена соответствующая настройка в опциях плагина).
* Страница настроек плагина была перенесена и теперь стала подпунктом меню Woo Commerce.

= Version 1.2.0 / (24.06.2019) =
* Исправлена ошибка, когда при выборе другого способа доставки, не выводился блок "Доставка по другому адресу" (Shipping Fields).
* Теперь плагин работает даже если вы скрыли или удалили поле страна (billing_country), используя сторонний плагин или код.
Стоит заметить, что плагин все также работает только с зоной UA.
* Теперь каждое строковое поле, которое нельзя изменить через страницу настроек (например, "выберите область"), выводится через функцию __().
Данное изменение позволяет вам изменить эти поля с помощью одного из известных плагинов локализации, например WPML.

= Version 1.1.2 / (19.06.2019) =
* Исправлена ошибка, когда пропадала область доставки при изменении заказа из админ-панели.

= Version 1.1.1 / (19.06.2019) =
* Исправлена ошибка запросов на несуществующие REST точки из front-end, если сайт находится не в корневом каталоге сервера (спасибо пользователю @myideasforsite).
* Добавлена опция сокрытия блока адресной доставки.
* Добавлена сортировка отделений по номерам во front-end (выполните миграцию в настройках, затем обновите информацию об отделениях).

= Version 1.1.0 / (16.06.2019) =
* Добавлена порционная загзука городов и отделений, для снятия ограничений по оперативной памяти хостинга.
Теперь плагин работает даже на хостингах с 64МБ ОЗУ.
* Создан абсолютно новый интерфейс настроек плагина. Все опции теперь вынесены в одну удобную форму.
Настройки теперь расположены по адресу yoursite.com/wp-admin/admin.php?page=wc_ukr_shipping_options
* Добавлен функционал миграций версий для безопасного обновления структур данных плагина до актуальной версии.
Функционал доступен на странице настроек.
* Теперь вам нужен API ключ для обновления данных Новой Почты. Настройка также находится по адресу yoursite.com/wp-admin/admin.php?page=wc_ukr_shipping_options
* Добавлена опция выбора языка, на котором будут подтягиватся данные о городах и отделениях Новой Почты.
Для работы настройки вам понадобится мигрировать данные до актуальной версии и обновить данные об отделениях Новой Почты. Все опции доступны на странице настроек.
* Добавлена опция выбора цвета спинера загрузки во front-end
* Добавлена опция смены названия метода во front-end, а также опция смены названия для поля "Адресная доставка"

= Version 1.0.2 / (07.06.2019) =
* Исправлена ошибка некорректной кодировки для таблиц плагина
* Добавлен WP Rest Api
* Исправление 500 ошибки сервера у некоторых пользователей на странице оформления заказа

= Version 1.0.1 / (07.06.2019) =
* Исправлена ошибка, когда скрипты плагина подтягивались на все страницы сайта.
* Добавлена проверка на внутренние ошибки сервера при выборе адреса доставки с выводом их на экран.
* Добавлено версионирование скриптов.

= Version 1.0.0 / (03.06.2019) =
* Initial