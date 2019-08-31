<?php

//Clear header
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

show_admin_bar(false);


//Theme setup

function theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    register_nav_menus(
        [
            'header_menu_women' => 'Меню хэдера(Женские)',
            'header_menu_men' => 'Меню хэдера(Мужские)',
            'first_footer_menu' => 'Первая колонка футера',
            'second_footer_menu' => 'Вторая колонка футера',
        ]
    );

}

add_action('after_setup_theme', 'theme_setup');

//Enqueue scripts

function theme_scripts()
{
    wp_dequeue_script('select2');
    wp_deregister_script('select2');
    wp_dequeue_script('selectWoo');
    wp_deregister_script('selectWoo');

    wp_enqueue_script('app2', get_theme_file_uri('jQuery/jquery-3.3.1.min.js'), null, '', true);
    wp_enqueue_script('app1', get_theme_file_uri('js/menu-operation.js'), null, '', true);
    wp_enqueue_script('app4', get_theme_file_uri('jQuery/slick/slick.min.js'), null, '', true);
    wp_enqueue_script('app13', get_theme_file_uri('jQuery/parallax/parally.min.js'), null, '', true);
    wp_enqueue_script('app5', get_theme_file_uri('js/jquery-init.js'), null, '', true);
    wp_enqueue_script('app6', get_theme_file_uri('js/intersection-init.js'), null, '', true);
    wp_enqueue_script('app7', get_theme_file_uri('js/accordeon-footer-mobile.js'), null, '', true);
    wp_enqueue_script('app9', get_theme_file_uri('js/selection.js'), null, '', true);
    wp_enqueue_script('app10', get_theme_file_uri('js/maps.js'), null, '', true);
    wp_enqueue_script('app11', get_theme_file_uri('js/modal.js'), null, '', true);
    wp_enqueue_script('app12', get_theme_file_uri('js/fix.js'), null, '', true);
    wp_enqueue_script('tinvwl');
}

add_action('wp_enqueue_scripts', 'theme_scripts');


// Enqueue styles
function theme_styles()
{
    wp_dequeue_style('select2');
    wp_deregister_style('select2');

    wp_enqueue_style('normalize', get_theme_file_uri('css/normalize.min.css'), null, null);
    wp_enqueue_style('default', get_theme_file_uri('style.css'), null, null);
    wp_enqueue_style('styles', get_theme_file_uri('css/style.css'), null, null);
    wp_enqueue_style('slick', get_theme_file_uri('jQuery/slick/slick.css'), null, null);
    wp_enqueue_style('fix', get_theme_file_uri('css/fix.css'), null, null);

}

add_action('wp_enqueue_scripts', 'theme_styles');


function theme_customize_register($wp_customize)
{
    $wp_customize->add_section('contacts', [
        'title' => 'Social links',
        'priority' => 30,
    ]);
    $wp_customize->add_setting('instagram');
    $wp_customize->add_control('instagram', [
        'section' => 'contacts',
        'label' => 'Instagram',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('facebook');
    $wp_customize->add_control('facebook', [
        'section' => 'contacts',
        'label' => 'Facebook',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('telegram');
    $wp_customize->add_control('telegram', [
        'section' => 'contacts',
        'label' => 'Telegram',
        'type' => 'text',
    ]);

}

add_action('customize_register', 'theme_customize_register');

// Post types
require_once('post-types/faq.php');

function dd($args)
{
    echo '<pre>';
    var_dump($args);
    echo '</pre>';

    die();
}

// Woocommerce support
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'woocommerce_support');

add_filter('woocommerce_catalog_orderby', 'some_catalalog_order');
function some_catalalog_order()
{
    return [
        'price' => __('Sort by price: low to high', 'woocommerce'),
        'price-desc' => __('Sort by price: high to low', 'woocommerce'),
    ];
}


function true_register_wp_sidebars()
{

    /* сайдбар */
    register_sidebar(
        array(
            'id' => 'true_side', // уникальный id
            'name' => 'Боковая колонка', // название сайдбара
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
            'before_widget' => '<div id="%1$s" class="side widget %2$s">',
            // по умолчанию виджеты выводятся <li>-списком
            'after_widget' => '</div>',
            'before_title' => '<p class="filter__title filter__title--item">', // по умолчанию заголовки виджетов в <h2>
            'after_title' => '</p>'
        )
    );
}

add_action('widgets_init', 'true_register_wp_sidebars');

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
add_action('woocommerce_after_main_content', 'woocommerce_upsell_display', 15);


/** Forms */
if (!function_exists('woocommerce_form_field')) {
    /**
     * Outputs a checkout/address form field.
     *
     * @param  string  $key  Key.
     * @param  mixed  $args  Arguments.
     * @param  string  $value  (default: null).
     * @return string
     */
    function woocommerce_form_field($key, $args, $value = null)
    {
        $defaults = array(
            'type' => 'text',
            'label' => '',
            'description' => '',
            'placeholder' => '',
            'maxlength' => false,
            'required' => false,
            'autocomplete' => false,
            'id' => $key,
            'class' => array(),
            'label_class' => array(),
            'input_class' => array(),
            'return' => false,
            'options' => array(),
            'custom_attributes' => array(),
            'validate' => array(),
            'default' => '',
            'autofocus' => '',
            'priority' => '',
        );
        $args = wp_parse_args($args, $defaults);
        $args = apply_filters('woocommerce_form_field_args', $args, $key, $value);
        if ($args['required']) {
            $args['class'][] = 'validate-required';
            $required = '';
        } else {
            $required = '';
        }
        if (is_string($args['label_class'])) {
            $args['label_class'] = array($args['label_class']);
        }
        if (is_null($value)) {
            $value = $args['default'];
        }

        // Custom attribute handling.
        $custom_attributes = array();
        $args['custom_attributes'] = array_filter((array) $args['custom_attributes'], 'strlen');
        if ($args['maxlength']) {
            $args['custom_attributes']['maxlength'] = absint($args['maxlength']);
        }
        if (!empty($args['autocomplete'])) {
            $args['custom_attributes']['autocomplete'] = $args['autocomplete'];
        }
        if (true === $args['autofocus']) {
            $args['custom_attributes']['autofocus'] = 'autofocus';
        }
        if ($args['description']) {
            $args['custom_attributes']['aria-describedby'] = $args['id'].'-description';
        }
        if (!empty($args['custom_attributes']) && is_array($args['custom_attributes'])) {
            foreach ($args['custom_attributes'] as $attribute => $attribute_value) {
                $custom_attributes[] = esc_attr($attribute).'="'.esc_attr($attribute_value).'"';
            }
        }
        if (!empty($args['validate'])) {
            foreach ($args['validate'] as $validate) {
                $args['class'][] = 'validate-'.$validate;
            }
        }
        $field = '';
        $label_id = $args['id'];
        $sort = $args['priority'] ? $args['priority'] : '';
        $field_container = '%3$s';
        switch ($args['type']) {
            case 'country':
                $countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

                if (1 === count($countries)) {

                    $field .= '<strong>'.current(array_values($countries)).'</strong>';

                    $field .= '<input type="hidden" name="'.esc_attr($key).'" id="'.esc_attr($args['id']).'" value="'.current(array_keys($countries)).'" '.implode(' ',
                            $custom_attributes).' class="country_to_state" readonly="readonly" />';

                } else {

                    $field = '<label class="label-select-country">'.esc_html__('Select a country&hellip;',
                            'woocommerce').'</label><select name="'.esc_attr($key).'" id="'.esc_attr($args['id']).'" class="country_to_state country_select '.esc_attr(implode(' ',
                            $args['input_class'])).'" '.implode(' ',
                            $custom_attributes).'><option value="">'.esc_html__('Select a country&hellip;',
                            'woocommerce').'</option>';

                    foreach ($countries as $ckey => $cvalue) {
                        $field .= '<option value="'.esc_attr($ckey).'" '.selected($value, $ckey,
                                false).'>'.$cvalue.'</option>';
                    }

                    $field .= '</select>';

                    $field .= '<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="'.esc_attr__('Update country',
                            'woocommerce').'">'.esc_html__('Update country', 'woocommerce').'</button></noscript>';

                }

                break;
                /* Get country this state field is representing */
                $for_country = isset($args['country']) ? $args['country'] : WC()->checkout->get_value('billing_state' === $key ? 'billing_country' : 'shipping_country');
                $states = WC()->countries->get_states($for_country);
                if (is_array($states) && empty($states)) {
                    $field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';
                    $field .= '<input type="hidden" class="hidden" name="'.esc_attr($key).'" id="'.esc_attr($args['id']).'" value="" '.implode(' ',
                            $custom_attributes).' placeholder="'.esc_attr($args['placeholder']).'" readonly="readonly" />';
                } elseif (!is_null($for_country) && is_array($states)) {
                    $field .= '<select name="'.esc_attr($key).'" id="'.esc_attr($args['id']).'" class="state_select '.esc_attr(implode(' ',
                            $args['input_class'])).'" '.implode(' ',
                            $custom_attributes).' data-placeholder="'.esc_attr($args['placeholder'] ? $args['placeholder'] : esc_html__('Select an option&hellip;',
                            'woocommerce')).'">
						<option value="">'.esc_html__('Select an option&hellip;', 'woocommerce').'</option>';
                    foreach ($states as $ckey => $cvalue) {
                        $field .= '<option value="'.esc_attr($ckey).'" '.selected($value, $ckey,
                                false).'>'.$cvalue.'</option>';
                    }
                    $field .= '</select>';
                } else {
                    $field .= '<input type="text" class="checkout__input'.esc_attr(implode(' ',
                            $args['input_class'])).'" value="'.esc_attr($value).'"  placeholder="'.$args['label'].$required.'" name="'.esc_attr($key).'" id="'.esc_attr($args['id']).'" '.implode(' ',
                            $custom_attributes).' />';
                }
                break;
            case 'textarea':
                $field .= '<textarea name="'.esc_attr($key).'" class="input-text '.esc_attr(implode(' ',
                        $args['input_class'])).'" id="'.esc_attr($args['id']).'" placeholder="'.esc_attr($args['placeholder']).'" '.(empty($args['custom_attributes']['rows']) ? ' rows="2"' : '').(empty($args['custom_attributes']['cols']) ? ' cols="5"' : '').implode(' ',
                        $custom_attributes).'>'.esc_textarea($value).'</textarea>';
                break;
            case 'checkbox':
                $field = '<label class="checkbox '.implode(' ', $args['label_class']).'" '.implode(' ',
                        $custom_attributes).'>
						<input type="'.esc_attr($args['type']).'" class="input-checkbox '.esc_attr(implode(' ',
                        $args['input_class'])).'" name="'.esc_attr($key).'" id="'.esc_attr($args['id']).'" value="1" '.checked($value,
                        1, false).' /> '.$args['label'].$required.'</label>';
                break;
            case 'text':
            case 'password':
            case 'datetime':
            case 'datetime-local':
            case 'date':
            case 'month':
            case 'time':
            case 'week':
            case 'number':
            case 'email':
            case 'url':
            case 'tel':
                $field .= '<input type="'.esc_attr($args['type']).'" class="checkout__input '.esc_attr(implode(' ',
                        $args['input_class'])).'" name="'.esc_attr($key).'" id="'.esc_attr($args['id']).'" placeholder="'.$args['label'].$required.'"  value="'.esc_attr($value).'" '.implode(' ',
                        $custom_attributes).' />';
                break;
            case 'select':
                $field = '';
                $options = '';
                if (!empty($args['options'])) {
                    foreach ($args['options'] as $option_key => $option_text) {
                        if ('' === $option_key) {
                            // If we have a blank option, select2 needs a placeholder.
                            if (empty($args['placeholder'])) {
                                $args['placeholder'] = $option_text ? $option_text : __('Choose an option',
                                    'woocommerce');
                            }
                            $custom_attributes[] = 'data-allow_clear="true"';
                        }
                        $options .= '<option value="'.esc_attr($option_key).'" '.selected($value, $option_key,
                                false).'>'.esc_attr($option_text).'</option>';
                    }
                    $field .= '<select name="'.esc_attr($key).'" id="'.esc_attr($args['id']).'" class="select '.esc_attr(implode(' ',
                            $args['input_class'])).'" '.implode(' ',
                            $custom_attributes).' data-placeholder="'.esc_attr($args['placeholder']).'">
							'.$options.'
						</select>';
                }
                break;
            case 'radio':
                $label_id .= '_'.current(array_keys($args['options']));
                if (!empty($args['options'])) {
                    foreach ($args['options'] as $option_key => $option_text) {
                        $field .= '<input type="radio" class="input-radio '.esc_attr(implode(' ',
                                $args['input_class'])).'" value="'.esc_attr($option_key).'" name="'.esc_attr($key).'" '.implode(' ',
                                $custom_attributes).' id="'.esc_attr($args['id']).'_'.esc_attr($option_key).'"'.checked($value,
                                $option_key, false).' />';
                        $field .= '<label for="'.esc_attr($args['id']).'_'.esc_attr($option_key).'" class="radio '.implode(' ',
                                $args['label_class']).'">'.$option_text.'</label>';
                    }
                }
                break;
        }
        if (!empty($field)) {
            $field_html = '';
            if ($args['label'] && 'checkbox' !== $args['type']) {
                $field_html .= '';
            }
            $field_html .= $field;

            $container_class = esc_attr(implode(' ', $args['class']));
            $container_id = esc_attr($args['id']).'_field';
            $field = sprintf($field_container, $container_class, $container_id, $field_html);
        }
        /**
         * Filter by type.
         */
        $field = apply_filters('woocommerce_form_field_'.$args['type'], $field, $key, $args, $value);
        /**
         * General filter on form fields.
         *
         * @since 3.4.0
         */
        $field = apply_filters('woocommerce_form_field', $field, $key, $args, $value);
        if ($args['return']) {
            return $field;
        } else {
            echo $field; // WPCS: XSS ok.
        }
    }
}


add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{
//    unset($fields['billing']['billing_country']);
//    unset($fields['billing']['billing_city']);
//    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_state']);
//    unset($fields['shipping']);

    return $fields;
}


add_filter('woocommerce_account_menu_items', 'remove_my_account_links');
function remove_my_account_links($menu_links)
{
//    unset( $menu_links['edit-address'] ); // Addresses
    unset($menu_links['dashboard']); // Remove Dashboard
    //unset( $menu_links['payment-methods'] ); // Remove Payment Methods
    //unset( $menu_links['orders'] ); // Remove Orders
    //unset( $menu_links['downloads'] ); // Disable Downloads
    //unset( $menu_links['edit-account'] ); // Remove Account details tab
    //unset( $menu_links['customer-logout'] ); // Remove Logout link
    return $menu_links;
}

// Add class menu item li and a
function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}

add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);
function add_menu_list_item_class($classes, $item, $args)
{
    if (property_exists($args, 'list_item_class')) {
        $classes[] = $args->list_item_class;
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);


/**
 * @snippet       Add next/prev buttons @ WooCommerce Single Product Page
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=20567
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.5.5
 */

add_action('woocommerce_before_single_product', 'bbloomer_prev_next_product');

//Add class for prev and next button single product
add_filter('previous_post_link', 'posts_link_attributes');
add_filter('next_post_link', 'posts_link_attributes');

function posts_link_attributes($output)
{
    $code = 'class="card__link"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}


function woocommerce_header_add_to_cart_fragment($fragments)
{
    ob_start();
    ?>
  <a class="cart-contents" href="/cart/" title="<?php _e('Перейти в корзину'); ?>">
    <span class="cart-ico"> <i class="fa fa-shopping-cart"></i></span>
    <span class="cart-txt">товаров: <strong><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count),
                WC()->cart->cart_contents_count); ?></strong><br> на сумму: <strong><?php echo WC()->cart->get_cart_total(); ?></strong></span>
  </a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}

//Вывод кратких данных из корзины
if (!function_exists('cart_link')) {
    function cart_link()
    {
        ?><a class="cart-contents" href="/cart/" title="<?php _e('Перейти в корзину'); ?>">
      <span class="cart-ico"> <i class="fa fa-shopping-cart"></i></span>
      <span class="cart-txt">товаров: <strong><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count),
                  WC()->cart->cart_contents_count); ?></strong><br> на сумму: <strong><?php echo WC()->cart->get_cart_total(); ?></strong></span>
      </a>
        <?php
    }
}


function name_item_in_cart_count()
{
    global $woocommerce;
    $product_ids = array();
    foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
        $product_ids[] = $values['product_id'];
    }
    $product_ids_unique = $product_ids;
    echo count($product_ids_unique);
}

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }

    return $title;

});