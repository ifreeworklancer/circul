<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

if (!$product_attributes) {
    return;
}
?>
<div class="info__options options">
  <input type="checkbox" class="options__trigger options__trigger--details" id="details" name="options" checked>
  <label for="details">
      <?= __('[:ru]Подробности[:en]Details[:]'); ?>
  </label>
  <div class="options__content options__content--details">
    <ul class="options__list">
        <?php foreach ($product_attributes as $product_attribute_key => $product_attribute) : ?>
          <li class="options__item">
              <?= wp_kses_post($product_attribute['label']); ?>:<?= wp_kses_post($product_attribute['value']); ?>
          </li>
        <?php endforeach; ?>
    </ul>
  </div>

  <input type="checkbox" class="options__trigger options__trigger--payment cart__trigger"
         id="payment" name="options">

  <?php $delivery = get_post(705); ?>
  <label for="payment">
      <?php _e($delivery->post_title); ?>
  </label>
  <div class="options__content options__content--payment cart__details">
      <?php apply_filters('the_content', $delivery->post_content); ?>
  </div>
  <input type="checkbox" class="options__trigger options__trigger--size" id="size" name="options">
  <label for="size">
      <?= __('[:ru]Размеры[:ua]Size guide[:]'); ?>
  </label>
  <div class="options__content options__content--size">
    <table class="options__size guide">
      <tr class="guide__headings">
        <th>
          US
        </th>
        <th>
          UK
        </th>
        <th>
          EU
        </th>
        <th>
          CM
        </th>
      </tr>
      <tr class="guide__row">
        <td>
          7,5
        </td>
        <td>
          6,5
        </td>
        <td>
          38
        </td>
        <td>
          25,5
        </td>
      </tr>
      <tr class="guide__row">
        <td>
          8
        </td>
        <td>
          7
        </td>
        <td>
          39
        </td>
        <td>
          26
        </td>
      </tr>
      <tr class="guide__row">
        <td>
          8,5
        </td>
        <td>
          7,5
        </td>
        <td>
          40
        </td>
        <td>
          26,5
        </td>
      </tr>
      <tr class="guide__row">
        <td>
          9,5
        </td>
        <td>
          8,5
        </td>
        <td>
          41
        </td>
        <td>
          27,3
        </td>
      </tr>
      <tr class="guide__row">
        <td>
          10
        </td>
        <td>
          9
        </td>
        <td>
          42
        </td>
        <td>
          28
        </td>
      </tr>
      <tr class="guide__row">
        <td>
          10,5
        </td>
        <td>
          9,5
        </td>
        <td>
          43
        </td>
        <td>
          28,6
        </td>
      </tr>
      <tr class="guide__row">
        <td>
          11,5
        </td>
        <td>
          10,5
        </td>
        <td>
          44
        </td>
        <td>
          29,5
        </td>
      </tr>
      <tr class="guide__row">
        <td>
          12
        </td>
        <td>
          11
        </td>
        <td>
          45
        </td>
        <td>
          30
        </td>
      </tr>
      <tr class="guide__row">
        <td>
          13
        </td>
        <td>
          12
        </td>
        <td>
          46
        </td>
        <td>
          30,8
        </td>
      </tr>
      <tr class="guide__row">
        <td>
          14
        </td>
        <td>
          13
        </td>
        <td>
          47
        </td>
        <td>
          31,5
        </td>
      </tr>
    </table>
  </div>
  <input type="checkbox" class="options__trigger options__trigger--guarantee cart__trigger"
         id="guarantee" name="options">
  <label for="guarantee">
      <?= __('[:ru]Гарантии и возвраты[:ua]Guarantees & returns[:]'); ?>
  </label>
  <div class="options__content options__content--guarantee cart__details">
      <?php the_field('guarantees', 10); ?>
  </div>
</div>
