<?php

namespace kirillbdev\WCUkrShipping\Classes;

if ( ! defined('ABSPATH')) {
  exit;
}

class OptionsPage
{
  public function __construct()
  {
    add_action('admin_menu', [ $this, 'registerOptionsPage' ], 99);
    add_action('rest_api_init', [ $this, 'initRest' ]);
  }

  public function registerOptionsPage()
  {
    add_submenu_page(
      'woocommerce',
      'Настройки - WC Ukr Shipping',
      'WC Ukr Shipping',
      'manage_options',
      'wc_ukr_shipping_options',
      [ $this, 'html' ]
    );
  }

  public function html()
  {
    echo View::render('settings');
  }

  public function initRest()
  {
    register_rest_route( 'wc-ukr-shipping/v1', 'settings', [
      'methods' => 'POST',
      'callback' => [ $this, 'saveSettings' ],
      'permission_callback' => function (\WP_REST_Request $request) {
        return current_user_can('manage_options');
      }
    ]);

    register_rest_route( 'wc-ukr-shipping/v1', 'db/areas/load', [
      'methods' => 'POST',
      'callback' => [ $this, 'loadAreas' ],
      'permission_callback' => function (\WP_REST_Request $request) {
        return current_user_can('manage_options');
      }
    ]);

    register_rest_route( 'wc-ukr-shipping/v1', 'db/cities/load', [
      'methods' => 'POST',
      'callback' => [ $this, 'loadCities' ],
      'permission_callback' => function (\WP_REST_Request $request) {
        return current_user_can('manage_options');
      }
    ]);

    register_rest_route( 'wc-ukr-shipping/v1', 'db/warehouses/load', [
      'methods' => 'POST',
      'callback' => [ $this, 'loadWarehouses' ],
      'permission_callback' => function (\WP_REST_Request $request) {
        return current_user_can('manage_options');
      }
    ]);

    register_rest_route( 'wc-ukr-shipping/v1', 'events/donate', [
      'methods' => 'POST',
      'callback' => [ $this, 'sendDonateReport' ],
      'permission_callback' => function (\WP_REST_Request $request) {
        return current_user_can('manage_options');
      }
    ]);
  }

  public function saveSettings(\WP_REST_Request $request)
  {
    $errors = $this->validate($request);

    if ($errors !== false) {
      return [
        'success' => false,
        'data' => [
          'errors' => $errors
        ]
      ];
    }

    foreach ($_POST['wc_ukr_shipping'] as $key => $value) {
      update_option('wc_ukr_shipping_' . $key, sanitize_text_field($value));
    }

    if ( ! isset($_POST['wc_ukr_shipping']['address_shipping'])) {
      update_option('wc_ukr_shipping_address_shipping', 0);
    }

    if ( ! isset($_POST['wc_ukr_shipping']['send_statistic'])) {
      update_option('wc_ukr_shipping_send_statistic', 0);
    }

    // Flush WooCommerce Shipping Cache
    delete_option('_transient_shipping-transient-version');

    return [
      'success' => true,
      'data' => [
        'api_key' => get_option('wc_ukr_shipping_np_api_key', ''),
        'message' => 'Настройки успешно сохранены'
      ]
    ];
  }

  public function sendDonateReport(\WP_REST_Request $request)
  {
    wc_ukr_shipping()->reporter->sendDonateClickAction();
  }

  public function loadAreas()
  {
    $result = wc_ukr_shipping()->api->getAreas();

    if ($result['success']) {
      $this->saveAreasToDb($result['data']);

      return [
        'success' => true,
        'data' => []
      ];
    }

    return [
      'success' => false,
      'data' => [
        'errors' => $result['errors']
      ]
    ];
  }

  public function loadCities()
  {
    $result = wc_ukr_shipping()->api->getCities((int)$_POST['page']);

    if ($result['success']) {
      $this->saveCitiesToDb($result['data'], (int)$_POST['page']);

      return [
        'success' => true,
        'data' => [
          'loaded' => count($result['data']) === 0
        ]
      ];
    }

    return [
      'success' => false,
      'data' => [
        'errors' => $result['errors']
      ]
    ];
  }

  public function loadWarehouses()
  {
    $result = wc_ukr_shipping()->api->getWarehouses((int)$_POST['page']);

    if ($result['success']) {
      $this->saveWarehousesToDb($result['data'], (int)$_POST['page']);

      return [
        'success' => true,
        'data' => [
          'loaded' => count($result['data']) === 0
        ]
      ];
    }

    return [
      'success' => false,
      'data' => [
        'errors' => $result['errors']
      ]
    ];
  }

  private function validate(\WP_REST_Request $request)
  {
    $errors = [];

    if ( ! isset($_POST['wc_ukr_shipping']['np_method_title']) || strlen($_POST['wc_ukr_shipping']['np_method_title']) === 0) {
      $errors['wc_ukr_shipping_np_method_title'] = 'Заполните поле';
    }

    if ( ! isset($_POST['wc_ukr_shipping']['np_address_title']) || strlen($_POST['wc_ukr_shipping']['np_address_title']) === 0) {
      $errors['wc_ukr_shipping_np_address_title'] = 'Заполните поле';
    }

    return $errors ? $errors : false;
  }

  private function saveAreasToDb($areas)
  {
    global $wpdb;

    $wpdb->query("TRUNCATE wc_ukr_shipping_np_areas");

    foreach ($areas as $area) {
      $wpdb->query("
        INSERT INTO wc_ukr_shipping_np_areas (ref, description)
        VALUES ('{$area['Ref']}', '" . esc_attr($area['Description']) . "')
      ");
    }
  }

  private function saveCitiesToDb($cities, $page)
  {
    global $wpdb;

    if ($page === 1) {
      $wpdb->query("TRUNCATE wc_ukr_shipping_np_cities");
    }

    foreach ($cities as $city) {
      $wpdb->query("
        INSERT INTO wc_ukr_shipping_np_cities (ref, description, description_ru, area_ref)
        VALUES ('{$city['Ref']}', '" . esc_attr($city['Description']) . "', '" . esc_attr($city['DescriptionRu']) . "', '{$city['Area']}')
      ");
    }
  }

  private function saveWarehousesToDb($warehouses, $page)
  {
    global $wpdb;

    if ($page === 1) {
      $wpdb->query("TRUNCATE wc_ukr_shipping_np_warehouses");
    }

    foreach ($warehouses as $warehouse) {
      $wpdb->query("
        INSERT INTO wc_ukr_shipping_np_warehouses (ref, description, description_ru, city_ref, number)
        VALUES ('{$warehouse['Ref']}', '" . esc_attr($warehouse['Description']) . "', '" . esc_attr($warehouse['DescriptionRu']) . "', '{$warehouse['CityRef']}', '" . (int)$warehouse['Number'] . "')
      ");
    }
  }
}