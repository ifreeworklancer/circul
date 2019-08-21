<?php

namespace kirillbdev\WCUkrShipping\Classes;

use kirillbdev\WCUkrShipping\Api\NovaPoshtaApi;

if ( ! defined('ABSPATH')) {
  exit;
}

final class WCUkrShipping
{
  private static $instance = null;

  private $activator;
  private $assetsLoader;
  private $optionsPage;
  private $rest;
  private $api;
  private $reporter;

  private function __construct()
  {
    $this->activator = new Activator();
    $this->assetsLoader = new AssetsLoader();
    $this->optionsPage = new OptionsPage();
    $this->rest = new NovaPoshtaRest();
    $this->api = new NovaPoshtaApi();
    $this->reporter = new Reporter();
  }

  private function __clone() { }
  private function __wakeup() { }

  public static function instance()
  {
    if ( ! self::$instance) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function __get($name)
  {
    return $this->$name;
  }
}