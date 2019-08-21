<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<li class="catalog__item">
    <?= do_shortcode('[ti_wishlists_addtowishlist]') ?>

    <a href="<?php the_permalink(); ?>" class="catalog__link">
        <div class="catalog__frame">
            <picture>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                     alt="Photo of an item you may also like" class="advice__img">
            </picture>
        </div>
    </a>
    <dl class="catalog__info">
        <dt class="catalog__name">
            <?php the_title(); ?>
        </dt>
        <dd class="catalog__price">
            <?php echo $product->get_price(); ?>
        </dd>
    </dl>
    <a href="<?php the_permalink(); ?>" class="catalog__more">
        <?= __('[:ru]Узнать больше[:en]Read more[:]')?>
    </a>
</li>
