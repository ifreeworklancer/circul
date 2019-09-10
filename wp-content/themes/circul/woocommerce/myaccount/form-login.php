<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

<div class="modal__wrapper modal__wrapper--registration" data-modal="sign-in">
    <div class="modal__container">
        <div class="modal__item modal__item--sign">
            <div class="modal__content modal__content--sign">
                <h2 class="modal__title">
                    Sign in
                </h2>
                <?php endif; ?>

                <form class="modal__form modal__form--sign" method="post">

                    <?php do_action('woocommerce_login_form_start'); ?>

                    <input type="text" class="modal__input modal__input--email" name="username"
                           id="username" autocomplete="username"
                           placeholder="E-mail address"
                           value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                    <input class="modal__input modal__input--pass" type="password" name="password"
                           placeholder="Password"
                           id="password" autocomplete="current-password"/>

                    <?php do_action('woocommerce_login_form'); ?>


                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme"
                           type="checkbox" id="rememberme" value="forever" checked
                           style="position: absolute; left: -999999px;"/>

                    <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                    <button type="submit" class="btn modal__selection modal__selection modal__selection--passive"
                            name="login"
                            value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
                    <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="modal__forgotten"
                       data-link="modal__item--forgotten"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>

                    <?php do_action('woocommerce_login_form_end'); ?>

                </form>

                <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

            </div>

            <div class="modal__content modal__content--sign modal__content--signup">
                <h2 class="modal__title">
                    Create account
                </h2>
                <form method="post"
                      class="modal__form modal__form--sign" <?php do_action('woocommerce_register_form_tag'); ?> >

                    <?php do_action('woocommerce_register_form_start'); ?>

                    <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

                        <input type="text" class="modal__input modal__input--name" name="username"
                               id="reg_username" autocomplete="username"
                               placeholder="Name"
                               value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>

                    <?php endif; ?>

                    <input type="email" class="modal__input modal__input--email" name="email"
                           id="reg_email" autocomplete="email"
                           placeholder="E-mail"
                           value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>

                    <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                        <input type="password" class="modal__input modal__input--password"
                               placeholder="Password"
                               name="password" id="reg_password" autocomplete="new-password"/>

                    <?php else : ?>

                        <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

                    <?php endif; ?>

                    <?php do_action('woocommerce_register_form'); ?>

                    <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                    <button type="submit" class="btn modal__selection modal__selection modal__selection--passive"
                            name="register"
                            value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>

                    <?php do_action('woocommerce_register_form_end'); ?>

                </form>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>
