<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
    <div class="order__buttons">
        <button type="submit" class="btn order__btn"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        <input type="checkbox" class="order__fav" name="order-like" id="add-to-fav">
        <label for="add-to-fav" class="order__like">
            Add to favourites
            <svg class="order__icon" width="28" height="28" viewbox="0 0 497 470">
                <use xlink:href="#fav"></use>
            </svg>
        </label>
    </div>


	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
