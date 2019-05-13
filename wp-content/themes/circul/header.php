<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <title>Circul main</title>-->
    <style>
        /* Inline svg dimensions to avoid page breaking when no styles applied */
        .header__logo-icon {
            width: 8.8em;
            height: 1.6em;
        }

        .cart__icon {
            margin-right: 1.2em;
            width: 0.6em;
            height: 1.2em;
        }

        .payment__icon {
            max-width: 11em;
        }

        .bag {
            --offset-top: 5em;
            position: absolute;
            top: var(--offset-top);
            right: 0;
            width: 100vw;
            pointer-events: none;
        }

        .bag > .container {
            --padding-top: 2.4em;
            --padding-bottom: 3.6em;
            position: relative;
            display: flex;
            flex-direction: column;
            padding-top: var(--padding-top);
            padding-bottom: var(--padding-bottom);
            height: calc(100vh - var(--offset-top));
            overflow: scroll;
            scrollbar-width: thin;
            background-color: #fff;
            transform: translateX(100%);
            transition-duration: 0.4s;
            pointer-events: none;
        }
    </style>
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
                        Toggle menu
                        <svg class="nav__icon nav__icon--menu" width="16" height="12" viewbox="0 0 16 12">
                            <use xlink:href="#burger"></use>
                        </svg>
                    </a>
                    <div class="nav__submenu submenu">
                        <div class="submenu__header">
                            <h2 class="submenu__title">
                                Menu
                            </h2>
                            <button class="submenu__btn" type="button">
                                Close menu
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
                                        <span class="submenu__category">women</span>
                                    </a>
                                </li>
                                <li class="submenu__item">
                                    <a class="submenu__link submenu__link--trigger">
                                        <picture>
                                            <img src="<?= get_theme_file_uri('img/submenu__img--2@1x.jpg') ?>"
                                                 alt="Illustration for men catalog" class="submenu__img">
                                        </picture>
                                        <span class="submenu__category">men</span>
                                    </a>
                                </li>
                                <li class="submenu__item">
                                    <a href="about.html" class="submenu__link">
                                        <picture>
                                            <img src="<?= get_theme_file_uri('img/submenu__img--3@1x.jpg') ?>"
                                                 alt="Illustration for about us link" class="submenu__img">
                                        </picture>
                                        <span class="submenu__category">about us</span>
                                    </a>
                                </li>
                                <li class="submenu__item">
                                    <a href="faq.html" class="submenu__link">
                                        <picture>
                                            <img src="<?= get_theme_file_uri('img/submenu__img--4@1x.jpg') ?>"
                                                 alt="Illustration for FAQ link" class="submenu__img">
                                        </picture>
                                        <span class="submenu__category">faq</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="submenu__content submenu__content--low submenu__content--women submenu__content--hidden">
                            <button class="submenu__back" type="button">
                                <svg class="submenu__icon" width="6" height="12" viewbox="0 0 8 14">
                                    <use xlink:href="#back"></use>
                                </svg>
                                Back
                            </button>
                            <ul class="submenu__list submenu__list--lowLvl low-lvl">
                                <li class="low-lvl__item">
                                    <a href="catalog.html" class="low-lvl__link">
                                        All
                                    </a>
                                </li>
                                <li class="low-lvl__item">
                                    <a href="catalog.html" class="low-lvl__link">
                                        Shoes
                                    </a>
                                    <picture>
                                        <img class="low-lvl__img"
                                             src="<?= get_theme_file_uri('img/low-lvl__img--women@1x.jpg') ?>"
                                             alt="Photo of Circul product for women">
                                    </picture>
                                </li>
                            </ul>
                        </div>
                        <div class="submenu__content submenu__content--low submenu__content--men submenu__content--hidden">
                            <button class="submenu__back" type="button">
                                <svg class="submenu__icon" width="6" height="12" viewbox="0 0 8 14">
                                    <use xlink:href="#back"></use>
                                </svg>
                                Back
                            </button>
                            <ul class="submenu__list submenu__list--lowLvl low-lvl">
                                <li class="low-lvl__item">
                                    <a href="catalog.html" class="low-lvl__link">
                                        All
                                    </a>
                                </li>
                                <li class="low-lvl__item">
                                    <a href="catalog.html" class="low-lvl__link">
                                        Shoes
                                    </a>
                                    <picture>
                                        <img class="low-lvl__img"
                                             src="<?= get_theme_file_uri('img/low-lvl__img--men@1x.jpg') ?>"
                                             alt="Photo of Circul product for men">
                                    </picture>
                                </li>
                            </ul>
                        </div>
                        <div class="submenu__content submenu__content--low submenu__content--lang submenu__content--hidden">
                            <button class="submenu__back" type="button">
                                <svg class="submenu__icon" width="6" height="12" viewbox="0 0 8 14">
                                    <use xlink:href="#back"></use>
                                </svg>
                                Back
                            </button>
                            <ul class="submenu__list submenu__list--lowLvl low-lvl">
                                <li class="low-lvl__item">
                                    <a href="#" class="low-lvl__link">
                                        English
                                    </a>
                                </li>
                                <li class="low-lvl__item">
                                    <a href="#" class="low-lvl__link">
                                        Russian
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
                                    <a href="#" class="subfooter__link">
                                        Sign in
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav__item nav__item--search nav__item--tablet-plus">
                    <a href="<?= get_the_permalink('43')?>" class="nav__link nav__link--search">
                        Stores
                        <svg class="nav__icon nav__icon--search" width="14" height="14" viewbox="0 0 14 14">
                            <use xlink:href="#search"></use>
                        </svg>
                    </a>
                </li>
                <li class="nav__item nav__item--tablet-plus nav__item--men nav__item--trigger">
                    <a class="nav__link nav__link--men">
                        Men
                    </a>
                </li>
                <li class="nav__item nav__item--tablet-plus nav__item--women nav__item--trigger">
                    <a class="nav__link nav__link--women">
                        Women
                    </a>
                </li>
                <li class="nav__item nav__item--about nav__item--tablet-plus">
                    <a href="<?= get_the_permalink('69')?>" class="nav__link">
                        About us
                    </a>
                </li>
            </ul>
        </nav>
        <div class="header__nav-shop nav-shop">
            <ul class="nav-shop__list">
                <li class="nav-shop__item nav-shop__item--whishlist">
                    <a href="whishlist.html" class="nav-shop__link nav-shop__link--fav">
                        Whishlist
                        <span class="nav-shop__counter nav-shop__counter--wish">(99)</span>
                        <svg class="nav-shop__icon nav-shop__icon--fav" width="16" height="16" viewbox="0 0 497 470">
                            <use xlink:href="#fav"></use>
                        </svg>
                    </a>
                </li>
                <li class="nav-shop__item nav-shop__item--bag">
                    <a class="nav-shop__link nav-shop__link--cart">
                        Bag
                        <span class="nav-shop__counter nav-shop__counter--bag">(99)</span>
                        <svg class="nav-shop__icon nav-shop__icon--cart" width="12" height="16" viewbox="0 0 12 16">
                            <use xlink:href="#cart"></use>
                        </svg>
                    </a>
                    <div class="bag">
                        <div class="container">
                            <button class="bag__close">
                                Close side bag
                            </button>
                            <h2 class="bag__heading">
                                shopping bag
                                <span class="bag__counter">(1)</span>
                            </h2>
                            <ul class="bag__list">
                                <li class="bag__item">
                                    <dl class="bag__details">
                                        <dt class="bag__name">
                                            Celebration derby
                                        </dt>
                                        <dd class="bag__price">
                                            <span class="currency bag__currency">&#8364;</span>
                                            151
                                        </dd>
                                    </dl>
                                    <div class="bag__wrapper">
                                        <p class="bag__key bag__key--quantity">
                                            Quantity:
                                            <button class="bag__decrement">
                                                Decrease quantity by 1
                                            </button>
                                            <span class="bag__value">1</span>
                                            <button class="bag__increment">
                                                Increase quantity by 1
                                            </button>
                                        </p>
                                        <p class="bag__key bag__key--size">
                                            Size:
                                            <span class="bag__value">1</span>
                                        </p>
                                        <button class="bag__remove">
                                            Remove
                                        </button>
                                    </div>
                                    <div class="bag__frame">
                                        <picture>
                                            <img src="<?= get_theme_file_uri('img/catalog__item--1@1x.png') ?>"
                                                 alt="Photo of selected item to order" class="bag__img">
                                        </picture>
                                    </div>
                                </li>
                            </ul>
                            <dl class="bag__subtotal">
                                <dt class="bag__descriptor">
                                    Sub-total
                                </dt>
                                <dd class="bag__sum">
                                    <span class="currency bag__currency">&#8364;</span>
                                    151
                                </dd>
                            </dl>
                            <a href="#" class="bag__btn bag__btn--checkout">
                                Proceed to checkout
                            </a>
                            <a href="#" class="bag__btn bag__btn--continue">
                                Continue shopping
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-shop__item nav-shop__item--faq nav-shop__item--tablet-plus">
                    <a href="/faq" class="nav-shop__link">
                        FAQ
                    </a>
                </li>
                <li class="nav-shop__item nav-shop__item--sign nav-shop__item--tablet-plus">
                    <a href="cabinet.html" class="nav-shop__link">
                        My account
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<main>

    <div class="main-container">
