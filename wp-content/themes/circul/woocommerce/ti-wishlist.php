<?php
/**
 * The Template for displaying wishlist if a current user is owner.
 *
 * @version             1.12.0
 * @package           TInvWishlist\Template
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
wp_enqueue_script('tinvwl');
?>
<?php
$wl_paged = get_query_var('wl_paged');
$form_url = tinv_url_wishlist($wishlist['share_key'], $wl_paged, true);
?>

<form action="<?php echo esc_url($form_url); ?>" method="post" autocomplete="off">
    <?php do_action('tinvwl_before_wishlist_table', $wishlist); ?>
    <ul class="whishlist__list">
        <?php do_action('tinvwl_wishlist_contents_before'); ?>

        <?php

        global $product, $post;
        // store global product data.
        $_product_tmp = $product;
        // store global post data.
        $_post_tmp = $post;

        foreach ($products as $wl_product) {

            // override global product data.
            $product = apply_filters('tinvwl_wishlist_item', $wl_product['data']);
            // override global post data.
            $post = get_post($product->get_id());

            unset($wl_product['data']);
            if ($wl_product['quantity'] > 0 && apply_filters('tinvwl_wishlist_item_visible', true, $wl_product, $product)) {
                $product_url = apply_filters('tinvwl_wishlist_item_url', $product->get_permalink(), $wl_product, $product);
                do_action('tinvwl_wishlist_row_before', $wl_product, $product);
                ?>
                <li class="whishlist__item">
                    <div class="whishlist__frame">
                        <?php
                        $thumbnail = get_the_post_thumbnail_url($product->ID);

                        if (!$product->is_visible()) {
                            echo $thumbnail; // WPCS: xss ok.
                        } else {
                            printf('<picture><img src="%s" class="whishlist__img" alt=""></picture>', $thumbnail, esc_url($product_url)); // WPCS: xss ok.

                        }
                        ?>
                    </div>
                    <dl class="whishlist__description">
                        <dt class="whishlist__name"><?php echo $product->get_title(); ?></dt>
                        <dd class="whishlist__price"><?php echo apply_filters('tinvwl_wishlist_item_price', $product->get_price_html(), $wl_product, $product); ?></dd>
                    </dl>
                    <div class="whishlist__buttons">
                        <?php if (isset($wishlist_table_row['add_to_cart']) && $wishlist_table_row['add_to_cart']) { ?>
                            <?php
                            if (apply_filters('tinvwl_wishlist_item_action_add_to_cart', $wishlist_table_row['add_to_cart'], $wl_product, $product)) {
                                ?>
                                <button class="btn whishlist__add" name="tinvwl-add-to-cart"
                                        value="<?php echo esc_attr($wl_product['ID']); ?>">
                                    <?= __('[:ru]Добавить в корзину[:en]Add to bag[:]'); ?>
                                </button>
                            <?php } ?>
                        <?php } ?>
                        <button type="submit" class="btn whishlist__cancel" name="tinvwl-remove"
                                value="<?php echo esc_attr($wl_product['ID']); ?>">
                            <?= __('[:ru]Удалить из желаемого[:en]Cancel wish[:]'); ?>
                        </button>
                    </div>
                </li>
                <?php
                do_action('tinvwl_wishlist_row_after', $wl_product, $product);
            } // End if().
        } // End foreach().
        // restore global product data.
        $product = $_product_tmp;
        // restore global post data.
        $post = $_post_tmp;
        ?>
        <?php do_action('tinvwl_wishlist_contents_after'); ?>
        <?php wp_nonce_field('tinvwl_wishlist_owner', 'wishlist_nonce'); ?>
    </ul>
</form>
<?php do_action('tinvwl_after_wishlist', $wishlist); ?>
<div class="tinv-lists-nav tinv-wishlist-clear">
    <?php do_action('tinvwl_pagenation_wishlist', $wishlist); ?>
</div>
