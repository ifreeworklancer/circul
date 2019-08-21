<?php

namespace kirillbdev\WCUkrShipping\Classes;

if ( ! defined('ABSPATH')) {
  exit;
}

class AssetsLoader
{
  public function __construct()
  {
    add_action('admin_enqueue_scripts', [ $this, 'loadAdminAssets' ]);
  }

  public function loadAdminAssets()
  {
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_style( 'wp-color-picker' );

    wp_enqueue_style(
      'wc_ukr_shipping_admin_css',
      WC_UKR_SHIPPING_PLUGIN_URL . 'assets/css/admin.min.css',
      [],
      filemtime(WC_UKR_SHIPPING_PLUGIN_DIR . 'assets/css/admin.min.css')
    );
  }
}