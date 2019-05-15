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

}

add_action('after_setup_theme', 'theme_setup');

//Enqueue scripts

function theme_scripts()
{
    wp_enqueue_script('app1', get_theme_file_uri('js/menu-operation.js'), null, '', true);
    wp_enqueue_script('app2', get_theme_file_uri('jQuery/jquery-3.3.1.min.js'), null, '', true);
    wp_enqueue_script('app4', get_theme_file_uri('jQuery/slick/slick.min.js'), null, '', true);
    wp_enqueue_script('app5', get_theme_file_uri('js/jquery-init.js'), null, '', true);
    wp_enqueue_script('app6', get_theme_file_uri('js/intersection-init.js'), null, '', true);
    wp_enqueue_script('app7', get_theme_file_uri('js/accordeon-footer-mobile.js'), null, '', true);
    wp_enqueue_script('app9', get_theme_file_uri('js/selection.js'), null, '', true);
    wp_enqueue_script('app10', get_theme_file_uri('js/maps.js'), null, '', true);
    wp_enqueue_script('app11', get_theme_file_uri('js/modal.js'), null, '', true);
}

add_action('wp_enqueue_scripts', 'theme_scripts');


// Enqueue styles
function theme_styles()
{
    wp_enqueue_style('theme-app1', get_theme_file_uri('css/style.css'), null, null);
    wp_enqueue_style('theme-app2', get_theme_file_uri('css/normalize.min.css'), null, null);
    wp_enqueue_style('theme-app3', get_theme_file_uri('jQuery/slick/slick.css'), null, null);
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
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
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


add_filter ( 'woocommerce_account_menu_items', 'remove_my_account_links' );
function remove_my_account_links( $menu_links ){
//    unset( $menu_links['edit-address'] ); // Addresses
    unset( $menu_links['dashboard'] ); // Remove Dashboard
    //unset( $menu_links['payment-methods'] ); // Remove Payment Methods
    //unset( $menu_links['orders'] ); // Remove Orders
    //unset( $menu_links['downloads'] ); // Disable Downloads
    //unset( $menu_links['edit-account'] ); // Remove Account details tab
    //unset( $menu_links['customer-logout'] ); // Remove Logout link
    return $menu_links;
}
