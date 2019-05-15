<?php

get_header();

?>
    <section class="whishlist">
        <div class="container">
            <div class="whishlist__wrapper">
                <h1 class="whishlist__heading">
                    My whishlist
                </h1>
                <a href="#" class="whishlist__back">
                    <svg class="cart__icon whishlist__icon" viewbox="0 0 8 14">
                        <use xlink:href="#back"></use>
                    </svg>
                    Back to shopping
                </a>
            </div>
            <div class="orders__no-orders whishlist__no-items">
                <p class="orders__message">
                    There are currently no items in your whishlist
                </p>
                <div class="success__info orders__info">
                    <a href="#" class="btn cart__btn cart__btn--continue success__btn orders__continue">
                        Go shopping
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
                            Delivery & payment
                        </label>
                        <div class="options__content options__content--payment orders__details">
                            <dl class="options__payment">
                                <dt class="options__type">
                                    Credit card:
                                </dt>
                                <dd class="options__descriptor">
                                    You can pay via your visa/mastercard online right after making order.
                                </dd>
                                <dt class="options__type">
                                    Paypal:
                                </dt>
                                <dd class="options__descriptor">
                                    You can use your paypal account to pay for your online order too.
                                </dd>
                            </dl>
                        </div>
                        <input type="checkbox" class="options__trigger options__trigger--guarantee cart__trigger" id="guarantee" name="options">
                        <label for="guarantee">
                            Guarantees & returns
                        </label>
                        <div class="options__content options__content--guarantee cart__details">
                            <p class="options__descriptor options__descriptor--guarantee">
                                Complimentary ground shipping and returns.
                            </p>
                            <p class="options__descriptor options__descriptor--guarantee">
                                Complimentary express shipping with orders over $500.
                            </p>
                            <p class="options__descriptor options__descriptor--guarantee">
                                Overnight and same day delivery (Manhattan only for same day): $35.
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
