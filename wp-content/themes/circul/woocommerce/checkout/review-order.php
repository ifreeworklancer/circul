<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>




<p class="cart__key cart__key--subtotal">
	Total
	<span class="cart__value">
		<span class="currency cart__currency">
			<?php echo $my_currency; ?>
		</span>
		<?= WC()->cart->get_subtotal(); ?>
	</span>
</p>
<p class="cart__key cart__key--total">
	Total
	<span class="cart__value">
		<span class="currency cart__currency">
			&#8364;
		</span>
		151
	</span>
</p>
<a href="#" class="btn cart__btn cart__btn--checkout btn--active">
	Proceed to checkout
</a>
<a href="#" class="btn cart__btn cart__btn--continue">
	Continue shopping
</a>




		<?php
			do_action( 'woocommerce_review_order_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<p class="product-name">
							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
						</p>
						<p class="product-total">
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
						</p>

						<p class="cart__key cart__key--total">
							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
							<span class="cart__value">
								<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
							</span>
						</p>
					</div>
					<?php
				}
			}

			do_action( 'woocommerce_review_order_after_cart_contents' );
		?>


		
		<p class="cart__key cart__key--subtotal">
			Total
			<span class="cart__value">
				<span class="currency cart__currency">
					<?php echo $my_currency; ?>
				</span>
				<?= WC()->cart->get_subtotal(); ?>
			</span>
		</p>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<p><?php wc_cart_totals_coupon_label( $coupon ); ?></p>
				<p><?php wc_cart_totals_coupon_html( $coupon ); ?></p>
			</div>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="fee">
				<p><?php echo esc_html( $fee->name ); ?></p>
				<p><?php wc_cart_totals_fee_html( $fee ); ?></p>
			</div>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<div class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<p><?php echo esc_html( $tax->label ); ?></p>
						<p><?php echo wp_kses_post( $tax->formatted_amount ); ?></p>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="tax-total">
					<p><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></p>
					<p><?php wc_cart_totals_taxes_total_html(); ?></p>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<div class="order-total">
			<p><?php _e( 'Total', 'woocommerce' ); ?></p>
			<p><?php wc_cart_totals_order_total_html(); ?></p>
		</div>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
