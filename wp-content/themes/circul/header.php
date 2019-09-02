<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part('template-parts/svgs'); ?>

<header class="header">
  <h1 class="visually-hidden">
    Circul shop main page
  </h1>
  <div class="container">
    <a href="<?= site_url(); ?>" class="header__logo">
      <svg class="header__logo-icon" viewbox="0 0 88 16">
        <use xlink:href="#logo"></use>
      </svg>
    </a>
    <nav class="header__nav nav">
      <ul class="nav__list">
        <li class="nav__item nav__item--menu">
          <a class="nav__link nav__link--menu">
              <?= __('[:ru]Переключить меню[:en]Toggle menu[:]'); ?>
            <svg class="nav__icon nav__icon--menu" width="16" height="12" viewbox="0 0 16 12">
              <use xlink:href="#burger"></use>
            </svg>
          </a>
          <div class="nav__submenu submenu">
            <div class="submenu__header">
              <h2 class="submenu__title">
                  <?= __('[:ru]Меню[:en]Menu[:]'); ?>
              </h2>
              <button class="submenu__btn" type="button">
                  <?= __('[:ru]Закрыть Меню[:en]Close menu[:]'); ?>
              </button>
            </div>

            <div class="submenu__content submenu__content--top">
              <ul class="submenu__list submenu__list--topLvl">
                <li class="submenu__item">
                  <a class="submenu__link submenu__link--trigger">
                    <picture>
                      <img src="<?= get_theme_file_uri('img/submenu__img--1@1x.jpg') ?>"
                           alt="Illustration for women catalog" class="submenu__img">
                    </picture>
                    <span class="submenu__category"><?= __('[:ru]женская[:en]women[:]'); ?></span>
                  </a>
                </li>
                <li class="submenu__item">
                  <a class="submenu__link submenu__link--trigger">
                    <picture>
                      <img src="<?= get_theme_file_uri('img/submenu__img--2@1x.jpg') ?>"
                           alt="Illustration for men catalog" class="submenu__img">
                    </picture>
                    <span class="submenu__category"><?= __('[:ru]мужская[:en]men[:]'); ?></span>
                  </a>
                </li>
                <li class="submenu__item">
                  <a class="submenu__link" href="<?php the_permalink(69); ?>">
                    <picture>
                      <img src="<?= get_theme_file_uri('img/submenu__img--3@1x.jpg') ?>"
                           alt="Illustration for about us link" class="submenu__img">
                    </picture>
                    <span class="submenu__category"><?= __('[:ru]о нас[:en]about us[:]'); ?></span>
                  </a>
                </li>
                <li class="submenu__item">
                  <a class="submenu__link" href="<?= get_post_type_archive_link('faq') ?>">
                    <picture>
                      <img src="<?= get_theme_file_uri('img/submenu__img--4@1x.jpg') ?>"
                           alt="Illustration for FAQ link" class="submenu__img">
                    </picture>
                    <span class="submenu__category">FAQ</span>
                  </a>
                </li>
              </ul>
            </div>
              <?php wp_nav_menu([
                  'theme_location' => 'header_menu_women',
                  'container' => 'div',
                  'container_class' => 'submenu__content submenu__content--low submenu__content--women submenu__content--hidden',
                  'menu_class' => 'submenu__list submenu__list--lowLvl low-lvl',
                  'items_wrap' => '
                        <button class="submenu__back" type="button">
                            <svg class="submenu__icon" width="6" height="12" viewbox="0 0 8 14">
                                <use xlink:href="#back"></use>
                            </svg>'
                      .__('[:en]Back[:ru]Назад[:]')
                      .'</button>
                        <ul class="%2$s">%3$s</ul>',
                  'list_item_class' => 'low-lvl__item',
                  'link_class' => 'low-lvl__link'
              ]) ?>

              <?php wp_nav_menu([
                  'theme_location' => 'header_menu_men',
                  'container' => 'div',
                  'container_class' => 'submenu__content submenu__content--low submenu__content--men submenu__content--hidden',
                  'menu_class' => 'submenu__list submenu__list--lowLvl low-lvl',
                  'items_wrap' => '<button class="submenu__back" type="button">
                            <svg class="submenu__icon" width="6" height="12" viewbox="0 0 8 14">
                                <use xlink:href="#back"></use>
                            </svg>'
                      .__('[:en]Back[:ru]Назад[:]')
                      .'</button><ul class="%2$s">%3$s</ul>',
                  'list_item_class' => 'low-lvl__item',
                  'link_class' => 'low-lvl__link'
              ]) ?>
            <div class="submenu__content submenu__content--low submenu__content--men submenu__content--hidden">
              <button class="submenu__back" type="button">
                <svg class="submenu__icon" width="6" height="12" viewbox="0 0 8 14">
                  <use xlink:href="#back"></use>
                </svg>
                  <?= __('[:en]Back[:ru]Назад[:]') ?>
              </button>
              <ul class="submenu__list submenu__list--lowLvl low-lvl">
                <li class="low-lvl__item">
                  <a href="<?= get_category_link(16) ?>" class="low-lvl__link">
                      <?= __('[:ru]Все[:en]All[:]'); ?>
                  </a>
                </li>
                  <?php
                  $prod_cat_args = array(
                      'taxonomy' => 'product_cat',
                      'hide_empty' => false, // скрывать категории без товаров или нет
                      'parent' => 16
                  );
                  $woo_categories = get_categories($prod_cat_args);
                  if (!is_null($woo_categories)) :
                      foreach ($woo_categories as $woo_cat) :
                          $woo_cat_id = $woo_cat->term_id;
                          $woo_cat_name = $woo_cat->name;
                          $image = get_field('image_for_category_menu', 'product_cat_'.$woo_cat_id)
                          ?>
                        <li class="low-lvl__item">
                          <a href="<?php the_permalink() ?>" class="low-lvl__link">
                              <?= $woo_cat_name; ?>
                          </a>
                          <picture>
                            <img class="low-lvl__img" src="<?= $image['url']; ?>">
                          </picture>
                        </li>
                      <?php endforeach; endif; ?>
              </ul>
            </div>
            <div class="submenu__content submenu__content--low submenu__content--lang submenu__content--hidden">
              <button class="submenu__back" type="button">
                <svg class="submenu__icon" width="6" height="12" viewbox="0 0 8 14">
                  <use xlink:href="#back"></use>
                </svg>
                  <?= __('[:ru]Назвад[:en]Back[:]'); ?>
              </button>
              <ul class="submenu__list submenu__list--lowLvl low-lvl">
                <li class="low-lvl__item">
                  <a href="#" class="low-lvl__link">
                      <?= __('[:ru]Английский[:en]English[:]'); ?>
                  </a>
                </li>
                <li class="low-lvl__item">
                  <a href="#" class="low-lvl__link">
                      <?= __('[:ru]Русский[:en]Russian[:]'); ?>
                  </a>
                </li>
              </ul>
            </div>
            <div class="submenu__footer subfooter">
              <ul class="subfooter__list">
                <li class="subfooter__item">
                  <a href="#" class="subfooter__link submenu__link--trigger">
                    English
                  </a>
                </li>
                <li class="subfooter__item">
                  <?php if (!is_user_logged_in()) : ?>
                  <a href="/login" class="subfooter__link">
                    <?php _e('[:en]Sign in[:ru]Войти[:]') ?>
                  </a>
                  <?php else : ?>
                    <a href="/my-account" class="subfooter__link">
                      <?php _e('[:en]Account[:ru]Аккаунт[:]') ?>
                    </a>
                  <?php endif; ?>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="nav__item nav__item--search nav__item--tablet-plus">
          <a href="<?php the_permalink(43) ?>" class="nav__link nav__link--search">
              <?= __('[:ru]Магазины[:en]Stores[:]'); ?>
            <svg class="nav__icon nav__icon--search" width="16" height="16">
              <use xlink:href="#geo"></use>
            </svg>
          </a>
        </li>
        <li class="nav__item nav__item--tablet-plus nav__item--men nav__item--trigger">
          <a class="nav__link nav__link--men">
              <?= __('[:ru]Мужская[:en]Men[:]'); ?>
          </a>
        </li>
        <li class="nav__item nav__item--tablet-plus nav__item--women nav__item--trigger">
          <a class="nav__link nav__link--women">
              <?= __('[:ru]Женская[:en]Women[:]'); ?>
          </a>
        </li>
        <li class="nav__item nav__item--about nav__item--tablet-plus">
          <a href="<?php the_permalink(69) ?>" class="nav__link">
              <?= __('[:ru]О нас[:en]About us[:]'); ?>
          </a>
        </li>
      </ul>
    </nav>
    <div class="header__nav-shop nav-shop">
      <ul class="nav-shop__list">
        <li class="nav-shop__item nav-shop__item--whishlist">
          <a href="<?php the_permalink(201) ?>" class="nav-shop__link nav-shop__link--fav">
              <?= get_the_title(201) ?>
            <svg class="nav-shop__icon nav-shop__icon--fav" width="16" height="16" viewbox="0 0 497 470">
              <use xlink:href="#fav"></use>
            </svg>
          </a>
        </li>
        <li class="nav-shop__item nav-shop__item--bag nav-shop__item--bagMob menu-item cart-punkt">
          <a class="nav-shop__link nav-shop__link--cart">
            <div class="bags-icon-mob">
                <?= __('[:ru]Корзина[:en]Bag[:]'); ?>
              <span class="nav-shop__counter nav-shop__counter--bag nav-shop__counter--bagMob"><?php name_item_in_cart_count(); ?></span>
              <span class="nav-shop__counter nav-shop__counter--bag">(<?php name_item_in_cart_count(); ?>)</span>
              <svg class="nav-shop__icon nav-shop__icon--cart" width="12" height="16" viewbox="0 0 12 16">
                <use xlink:href="#cart"></use>
              </svg>

            </div>
          </a>
          <div class="bag bag--widget">
            <div class="container">
              <button class="bag__close">
                  <?= __('[:ru]Закрыть боковую корзину[:en]Close side bag[:]'); ?>
              </button>
              <h2 class="bag__heading">
                  <?= __('[:ru]корзина[:en]shopping bag[:]'); ?>
                <span class="bag__counter">(<?php name_item_in_cart_count(); ?>)</span>
              </h2>
                <?php the_widget('WC_Widget_Cart', 'title='); ?>
            </div>
          </div>
        </li>
        <li class="nav-shop__item nav-shop__item--faq nav-shop__item--tablet-plus">
          <a href="<?= get_post_type_archive_link('faq') ?>" class="nav-shop__link">
            FAQ
          </a>
        </li>
        <li class="nav-shop__item nav-shop__item--sign nav-shop__item--tablet-plus">
          <a href="<?php the_permalink(12) ?>" class="nav-shop__link">
              <?= get_the_title(12) ?>
          </a>
        </li>
        <li class="nav-shop__item nav-item currency-selector">
            <?= do_shortcode('[multicurrency]') ?>
        </li>
      </ul>
    </div>
  </div>


</header>

<main>

  <div class="main-container">
