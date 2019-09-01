<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<section class="checkout checkout--step2">
	<div class="container">
		<h1 class="checkout__heading">
		<?php esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?>
		</h1>

		<div class="checkout__action checkout__action--delivery">

			<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

				<div class="row">
					<div class="checkout-col-50">
						<h2 class="checkout__subheading"><?php esc_html_e( 'Billing details', 'woocommerce' ); ?></h2>

						<?php if ( $checkout->get_checkout_fields() ) : ?>
							<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
							<?php do_action( 'woocommerce_checkout_billing' ); ?>
							<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
						<?php endif; ?>

					</div>

					<div class="checkout-col-50">
						<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
						<h2 class="checkout__subheading">
							<?php esc_html_e( 'Your order', 'woocommerce' ); ?>
						</h2>
						<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

							<?php do_action( 'woocommerce_checkout_order_review' ); ?>
						<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
					</div>
				</div>

			</form>
			
			<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

		</div>
	</div>
</section>