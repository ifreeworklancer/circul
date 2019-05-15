<?php
/**
 * The Template for displaying add to wishlist product button.
 *
 * @version             1.9.2
 * @package           TInvWishlist\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
wp_enqueue_script( 'tinvwl' );
?>
<input type="checkbox" class="order__fav" name="order-like" id="add-to-fav">
<label for="add-to-fav" class="order__like">
    Add to favourites
	<?php do_action( 'tinv_wishlist_addtowishlist_button' ); ?>
	<?php do_action( 'tinv_wishlist_addtowishlist_dialogbox' ); ?>
    <svg class="order__icon" width="28" height="28" viewbox="0 0 497 470">
        <use xlink:href="#fav"></use>
    </svg>
    <div class="tinvwl-tooltip"><?php echo esc_html( tinv_get_option( 'add_to_wishlist' . ( $loop ? '_catalog' : '' ), 'text' ) ); ?></div>
</label>
