<?php

get_header();

?>
    <section class="whishlist">
        <div class="container">
            <div class="whishlist__wrapper">
                <h1 class="whishlist__heading">
                    <?= __('[:ru]Мой список пожеланий[:en]My wishlist[:]'); ?>
                </h1>
                <a href="<?= get_the_permalink(9);?>" class="whishlist__back">
                    <svg class="cart__icon whishlist__icon" viewbox="0 0 8 14">
                        <use xlink:href="#back"></use>
                    </svg>
                    <?= __('[:ru]Вернуться к покупкам[:en]Back to shopping[:]'); ?>
                </a>
            </div>
            <div class="orders__no-orders whishlist__no-items">
                <p class="orders__message">
                    <?= __('[:ru]В вашем списке желаний нет[:en]There are currently no items in your wishlist[:]'); ?>
                </p>
                <div class="success__info orders__info">
                    <a href="#" class="btn cart__btn cart__btn--continue success__btn orders__continue">
                        <?= __('[:ru]В магазин[:en]Go shopping[:]'); ?>
                    </a>
                    <ul class="cart__payment payment orders__payment">
                        <li class="payment__item">
                            <svg class="payment__icon" viewBox="0 0 104 62">
                                <use xlink:href="#master"></use>
                            </svg>
                        </li>
                        <li class="payment__item">
                            <svg class="payment__icon" viewBox="0 0 104 62">
                                <use xlink:href="#visa"></use>
                            </svg>
                        </li>
                        <li class="payment__item">
                            <svg class="payment__icon" viewBox="0 0 104 62">
                                <use xlink:href="#paypal"></use>
                            </svg>
                        </li>
                    </ul>
                    <div class="info__options options orders__options whishlist__options">
                        <input type="checkbox" class="options__trigger options__trigger--payment orders__trigger" id="payment" name="options">
                        <label for="payment">
                            <?= __('[:ru]Доставка и оплата[:en]Delivery & payment[:]'); ?>
                        </label>
                        <div class="options__content options__content--payment orders__details">
                            <dl class="options__payment">
                                <dt class="options__type">
                                    <?= __('[:ru]Кредитная карта:[:en]Credit card:[:]'); ?>
                                </dt>
                                <dd class="options__descriptor">
                                    <?= __('[:ru]Вы можете оплатить через свою визу / мастер-карту онлайн сразу после оформления заказа.[:en]You can pay via your visa/mastercard online right after making order.[:]'); ?>
                                </dd>
                                <dt class="options__type">
                                    Paypal:
                                </dt>
                                <dd class="options__descriptor">
                                    <?= __('[:ru]Вы также можете использовать свою учетную запись PayPal для оплаты вашего онлайн-заказа.[:en]You can use your paypal account to pay for your online order too.[:]'); ?>
                                </dd>
                            </dl>
                        </div>
                        <input type="checkbox" class="options__trigger options__trigger--guarantee cart__trigger" id="guarantee" name="options">
                        <label for="guarantee">
                            <?= __('[:ru]Гарантии и возвраты[:en]Guarantees & returns[:]'); ?>
                        </label>
                        <div class="options__content options__content--guarantee cart__details">
                            <p class="options__descriptor options__descriptor--guarantee">
                                <?= __('[:ru]Бесплатная наземная доставка и возврат.[:en]Complimentary ground shipping and returns.[:]'); ?>
                            </p>
                            <p class="options__descriptor options__descriptor--guarantee">
                                <?= __('[:ru]Бесплатная экспресс-доставка при заказе свыше 500 долларов.[:en]Complimentary express shipping with orders over $500.[:]'); ?>
                            </p>
                            <p class="options__descriptor options__descriptor--guarantee">
                                <?= __('[:ru]Ночь и доставка в тот же день (Манхэттен только в тот же день): 35 долларов США.[:en]Overnight and same day delivery (Manhattan only for same day): $35.[:]'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo do_shortcode('[ti_wishlistsview]'); ?>
        </div>
    </section>

<?php
include('template-parts/follow.php');
get_footer();
