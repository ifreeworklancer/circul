<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<section class="card">
    <div class="container">
        <h1 class="visually-hidden">
            Detailed information about product
        </h1>
        <!-- Prev b Next button -->
        <?php echo '<ul class="card__controls">';

        // 'product_cat' will make sure to return next/prev from current category
        $previous = previous_post_link('<li class="card__control card__control--back">%link</li>', __('[:ru]Предыдущий[:en]Back[:]') . '<svg class="card__icon" viewbox="0 0 8 14"><use xlink:href="#back"></use></svg>', TRUE, ' ', 'product_cat');
        $next = next_post_link('<li class="card__control card__control--next">%link</li>', __('[:ru]Следующий[:en]Next[:]') . '<svg class="card__icon" viewbox="0 0 8 14"><use xlink:href="#back"></use></svg>', TRUE, ' ', 'product_cat');

        echo $previous;
        echo $next;

        echo '</ul>';
        ?>
        <?php
        /**
         * Hook: woocommerce_before_single_product_summary.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        do_action('woocommerce_before_single_product_summary');
        ?>

        <div class="card__info info">
            <div class="info__product">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action('woocommerce_single_product_summary');
                ?>
                <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 */
                do_action('woocommerce_after_single_product_summary');
                ?>
            </div>
        </div>


    </div>
</section>

<?php do_action('woocommerce_after_single_product'); ?>
