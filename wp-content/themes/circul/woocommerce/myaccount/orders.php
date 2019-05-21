<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see    https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_account_orders', $has_orders); ?>

<?php if ($has_orders) : ?>


    <?php foreach ($customer_orders->orders as $customer_order) :
        $order = wc_get_order($customer_order);
        $order_date = $order->get_date_created();
        $item_count = $order->get_item_count();
        $items = $order->get_items();
        ?>

        <div class="order-item">
            <div class="order-item-header">
                <h3 class="order-item-header__title">
                    <?= __('[:ru]Заказ:[:en]Order:[:]'); ?> <span> #<?= $order->get_id(); ?></span>
                </h3>
            </div>
            <?php foreach ($items as $item) : ?>
                <div class="order-item-body">
                    <ul class="orders__list">
                        <li class="orders__item">
                            <div class="orders__frame">
                                <picture>
                                    <img src="<?= get_the_post_thumbnail_url($item['product_id']); ?>"
                                         alt="Image of previously ordered item" class="orders__img">
                                </picture>
                            </div>
                            <table class="orders__info">
                                <tr class="orders__row orders__row--number">
                                    <td class="orders__key">
                                        <?= __('[:ru]Номер заказа:[:en]Order number:[:]'); ?>
                                    </td>
                                    <td class="orders__value">
                                        #<?= $item['order_id']; ?>
                                    </td>
                                </tr>
                                <tr class="orders__row orders__row--date">
                                    <td class="orders__key">
                                        <?= __('[:ru]Дата заказа:[:en]Order date:[:]'); ?>
                                    </td>
                                    <td class="orders__value">
                                        <?= $order_date->date('d.m.Y'); ?>
                                    </td>
                                </tr>
                            </table>
                            <div class="orders__product">
                                <h2 class="orders__name">
                                    <?= $item['name'] ?>
                                </h2>
                                <p class="orders__desctiptor orders__desctiptor--qty">
                                    <?= __('[:ru]Количество:[:en]Quantity:[:]'); ?>
                                    <span><?= $item['quantity'] ?></span>
                                </p>
                                <p class="orders__desctiptor orders__desctiptor--size">
                                    <?= __('[:ru]Размер:[:en]Size:[:]'); ?>
                                    <span><?= $item->get_meta('pa_size'); ?></span>
                                </p>
                                <p class="orders__total">
                                    <?= __('[:ru]Промежуточный итог[:en]Sub-total[:]'); ?>
                                    <span class="orders__total-value">
                      <span class="currency orders__currency">
                        &#8364;
                      </span>
                     <?= $item['subtotal'] ?>
                    </span>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
            <div class="order-item-footer">
                <div class="order-item-footer-row orders-shipping-total">
                    <?= __('[:ru]Сумма доставки:[:en]Shipping-total:[:]'); ?> &#8364; <span><?= $customer_order->data['shipping_total']; ?></span>
                </div>
                <div class="order-item-footer-row orders-total-price">
                    <?= __('[:ru]Всего:[:en]Total:[:]'); ?>  &#8364; <span><?= $customer_order->data['total']; ?></span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php do_action('woocommerce_before_account_orders_pagination'); ?>

    <?php if (1 < $customer_orders->max_num_pages) : ?>
        <div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
            <?php if (1 !== $current_page) : ?>
                <a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button"
                   href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page - 1)); ?>"><?php _e('Previous', 'woocommerce'); ?></a>
            <?php endif; ?>

            <?php if (intval($customer_orders->max_num_pages) !== $current_page) : ?>
                <a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button"
                   href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page + 1)); ?>"><?php _e('Next', 'woocommerce'); ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

<?php else : ?>
    <div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
        <a class="woocommerce-Button button"
           href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
            <?php _e('Go shop', 'woocommerce'); ?>
        </a>
        <?php _e('No order has been made yet.', 'woocommerce'); ?>
    </div>
<?php endif; ?>

<?php do_action('woocommerce_after_account_orders', $has_orders); ?>
