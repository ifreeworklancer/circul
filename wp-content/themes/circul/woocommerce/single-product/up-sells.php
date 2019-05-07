<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if ($upsells) : ?>
    <section class="advice">
        <div class="container">
            <h2 class="visually-hidden">
                Items which you may also like
            </h2>
            <input type="checkbox" class="options__trigger options__trigger--advice advice__trigger" id="more"
                   name="options" checked>
            <label for="more">
                <?php esc_html_e('You may also like&hellip;', 'woocommerce'); ?>
            </label>
            <div class="options__content options__content--advice advice__content">
                <ul class="advice__list">

                    <?php $count = 0; ?>

                    <?php foreach ($upsells as $upsell) : $count++ ?>
                        <?php
                        $post_object = get_post($upsell->get_id());

                        setup_postdata($GLOBALS['post'] =& $post_object);

                        global $product;


                        // Ensure visibility.
                        if (empty($product) || !$product->is_visible()) {
                            return;
                        } ?>
                        <li class="advice__item advice__item--<?= $count; ?>">
                            <a href="<?php the_permalink(); ?>" class="advice__link">
                                <div class="advice__frame">
                                    <picture>
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                             alt="Photo of an item you may also like" class="advice__img">
                                    </picture>
                                </div>
                            </a>
                            <dl class="advice__info">
                                <dt class="advice__name">
                                    <?php the_title(); ?>
                                    <input type="checkbox" class="advice__fav" name="advice-like" id="more-fav1">
                                    <label for="more-fav1" class="advice__like">
                                        Add to favourites
                                        <svg class="advice__icon" width="20" height="20" viewbox="0 0 497 470">
                                            <use xlink:href="#fav"></use>
                                        </svg>
                                    </label>
                                </dt>
                                <dd class="advice__price">
                                    <?php echo $product->get_price_html(); ?>
                                </dd>
                            </dl>
                        </li>

                    <?php endforeach; ?>

                    <?php woocommerce_product_loop_end(); ?>

                </ul>
            </div>
        </div>
    </section>


<?php endif;

wp_reset_postdata();
