<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$my_currency = get_woocommerce_currency_symbol( $currency ); 

?>

	<p class="cart__key cart__key--subtotal">
		Sub-total
		<span class="cart__value">
			<span class="currency cart__currency">
				<?php echo $my_currency; ?>
			</span>
			<?= WC()->cart->get_subtotal(); ?>
		</span>
	</p>
	<p class="cart__key cart__key--delivery">
		Delivery
		<span class="cart__value cart__value--empty">
			<span class="currency cart__currency">
				&#8364;
			</span>
			0
		</span>
	</p>
	<p class="cart__key cart__key--total">
		Total
		<span class="cart__value">
			<span class="currency cart__currency">
				<?php echo $my_currency; ?>
			</span>

			<?php global $woocommerce; ?>
			<?= $woocommerce->cart->total; ?>

		</span>
	</p>
	<a href="<?= get_site_url(); ?>/checkout" class="btn cart__btn cart__btn--checkout btn--active">
		Proceed to checkout
	</a>
	<a href="<?php get_site_url(); ?>shop/" class="btn cart__btn cart__btn--continue">
		Continue shopping
	</a>
	<ul class="cart__payment payment">
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
	<div class="info__options options cart__options">
		<input type="checkbox" class="options__trigger options__trigger--payment cart__trigger"
			id="payment" name="options">
		<label for="payment">
			Delivery & payment
		</label>
		<div class="options__content options__content--payment cart__details">

			<?php the_field('delivery'); ?>
			
		</div>
		<input type="checkbox" class="options__trigger options__trigger--guarantee cart__trigger"
			id="guarantee" name="options">
		<label for="guarantee">
			Guarantees & returns
		</label>
		<div class="options__content options__content--guarantee cart__details">

			<?php the_field('guarantees'); ?>

		</div>
	</div>

	<table cellspacing="0" class="shop_table shop_table_responsive">

		<tr class="cart-subtotal">
			<th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<tr class="shipping">
				<th><?php _e( 'Shipping', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
			</tr>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) :
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
					? sprintf( ' <small>' . __( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
					: '';

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<th><?php echo esc_html( $tax->label ) . $estimated_text; ?></th>
						<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></th>
					<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php _e( 'Total', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	</table>

	<div class="wc-proceed-to-checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>


