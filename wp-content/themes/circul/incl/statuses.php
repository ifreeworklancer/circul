<?php

/**
 * Change WC order statuses
 *
 * @param $wc_statuses_arr
 * @return mixed
 */
function handle_order_statuses($wc_statuses_arr)
{
    $wc_statuses_arr['wc-pending'] = 'Согласование';
    $wc_statuses_arr['wc-canceled'] = 'Отказ';
    $wc_statuses_arr['wc-processing'] = 'Заказ в работе';
    $wc_statuses_arr['wc-on-hold'] = 'Не дозвонились';
    $wc_statuses_arr['wc-completed'] = 'Выдан';

    if (isset($wc_statuses_arr['wc-refunded'])) {
        unset($wc_statuses_arr['wc-refunded']);
    }

    if (isset($wc_statuses_arr['wc-failed'])) {
        unset($wc_statuses_arr['wc-failed']);
    }

    return $wc_statuses_arr;
}

add_filter('wc_order_statuses', 'handle_order_statuses');

/**
 * Register new statuses
 */
function register_new_statuses()
{
    register_post_status('wc-order-paid', array(
        'label' => 'Заказ оплачен',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Заказ оплачен <span class="count">(%s)</span>',
            'Заказ оплачен <span class="count">(%s)</span>')
    ));

    register_post_status('wc-order-in-progress', array(
        'label' => 'Заказ в работе',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Заказ в работе <span class="count">(%s)</span>',
            'Заказ в работе <span class="count">(%s)</span>')
    ));

    register_post_status('wc-order-in-shop', array(
        'label' => 'Заказ в магазине',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Заказ в магазине <span class="count">(%s)</span>',
            'Заказ в магазине <span class="count">(%s)</span>')
    ));

    register_post_status('wc-order-np', array(
        'label' => 'Заказ Н/П',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Заказ Н/П <span class="count">(%s)</span>',
            'Заказ Н/П <span class="count">(%s)</span>')
    ));

    register_post_status('wc-sent-np', array(
        'label' => 'Отправлен Н/П',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Отправлен Н/П <span class="count">(%s)</span>',
            'Отправлен Н/П <span class="count">(%s)</span>')
    ));

    register_post_status('wc-sent', array(
        'label' => 'Отправлен',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Отправлен <span class="count">(%s)</span>',
            'Отправлен <span class="count">(%s)</span>')
    ));

    register_post_status('wc-issued', array(
        'label' => 'Выдан',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Выдан <span class="count">(%s)</span>',
            'Выдан <span class="count">(%s)</span>')
    ));
}

add_action('init', 'register_new_statuses');

/**
 * Add new statuses to WC
 *
 * @param $wc_statuses_arr
 * @return array
 */
function add_statuses($wc_statuses_arr)
{
    $new_statuses_arr = array();

    foreach ($wc_statuses_arr as $id => $label) {
        $new_statuses_arr[$id] = $label;

        if ('wc-completed' === $id) {
            $new_statuses_arr['wc-order-np'] = 'Заказ Н/П';
            $new_statuses_arr['wc-sent-np'] = 'Отправлен Н/П';
            $new_statuses_arr['wc-sent'] = 'Отправлен';
            $new_statuses_arr['wp-order-paid'] = 'Заказ оплачен';
            $new_statuses_arr['wp-order-in-progress'] = 'Заказ в работе';
            $new_statuses_arr['wp-order-in-shop'] = 'Заказ в магазине';
            $new_statuses_arr['wc-issued'] = 'Выдан';
        }
    }

    return $new_statuses_arr;
}

add_filter('wc_order_statuses', 'add_statuses');