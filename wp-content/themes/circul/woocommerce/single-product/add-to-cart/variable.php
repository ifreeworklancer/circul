<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined('ABSPATH') || exit;

global $product;

$attribute_keys = array_keys($attributes);
$variations_json = wp_json_encode($available_variations);
$variations_attr = function_exists('wc_esc_json') ? wc_esc_json($variations_json) : _wp_specialchars($variations_json, ENT_QUOTES, 'UTF-8', true);

do_action('woocommerce_before_add_to_cart_form'); ?>

    <ul class="info__social" data-title="<?= __('[:ru]Контакты:[:en]Contacts:[:]'); ?>">
        <li class="info__network info__network--instagram">
            <a href="<?= get_theme_mod('instagram');?>" class="info__link" aria-label="Our instagram">
                <svg class="info__logo" viewBox="0 0 33 32">
                    <use xlink:href="#instagram"></use>
                </svg>
            </a>
        </li>
        <li class="info__network info__network--telegram">
            <a href="<?= get_theme_mod('facebook');?>" class="info__link" aria-label="Our telegram">
                <svg class="info__logo" viewBox="0 0 37 29">
                    <use xlink:href="#telegram"></use>
                </svg>
            </a>
        </li>
        <li class="info__network info__network--facebook">
            <a href="tg://resolve?<?= get_theme_mod('telegram');?>" class="info__link" aria-label="Our facebook">
                <svg class="info__logo" width="36" height="32" viewBox="0 0 36 32">
                    <use xlink:href="#facebook"></use>
                </svg>
            </a>
        </li>
    </ul>

    <form class="info__order order"
          action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
          method="post" enctype='multipart/form-data' data-product_id="<?php echo absint($product->get_id()); ?>">
        <?php do_action('woocommerce_before_variations_form'); ?>

        <?php if (empty($available_variations) && false !== $available_variations) : ?>
            <p class="stock out-of-stock"><?php esc_html_e('This product is currently out of stock and unavailable.', 'woocommerce'); ?></p>
        <?php else : ?>
            <div class="order__size">
            <?php foreach ($attributes as $attribute_name => $options) : ?>
                <?php
                wc_dropdown_variation_attribute_options(array(
                    'options' => $options,
                    'attribute' => $attribute_name,
                    'product' => $product,
                    'class' => 'order__select',
                    'show_option_none' => __( '[:ru]Выбрать размер[:en]Choose size[:]')
                ));
                ?>
                <a class="order__link">
                    <?= __('[:ru]Размеры:[:en]Size guide[:]'); ?>
                </a>
            <?php endforeach; ?>
            </div>

            <div class="single_variation_wrap">
                <?php
                /**
                 * Hook: woocommerce_before_single_variation.
                 */
                do_action('woocommerce_before_single_variation');

                /**
                 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
                 *
                 * @since 2.4.0
                 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
                 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
                 */
                do_action('woocommerce_single_variation');

                /**
                 * Hook: woocommerce_after_single_variation.
                 */
                do_action('woocommerce_after_single_variation');
                ?>
            </div>
        <?php endif; ?>

        <?php do_action('woocommerce_after_variations_form'); ?>
    </form>

<?php
do_action('woocommerce_after_add_to_cart_form');
