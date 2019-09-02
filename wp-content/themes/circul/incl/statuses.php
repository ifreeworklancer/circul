<?php

//заказ сделан
//согласование
//не дозвонились
//отказ
//заказ Н/П
//заказ оплачен
//заказ в работе
//заказ в магазине
//отправлен
//отправлен Н/П
//выдан

function handle_order_statuses($wc_statuses_arr)
{
//    var_dump($wc_statuses_arr);
    $wc_statuses_arr['wc-pending'] = 'Согласование';
    $wc_statuses_arr['wc-canceled'] = 'Отказ';
    $wc_statuses_arr['wc-processing'] = 'Заказ в работе';
    $wc_statuses_arr['wc-on-hold'] = 'Не дозвонились';
    $wc_statuses_arr['wc-completed'] = 'Выдан';

//    if (isset($wc_statuses_arr['wc-processing'])) {
//        unset($wc_statuses_arr['wc-processing']);
//    }
//    // Refunded
//    if (isset($wc_statuses_arr['wc-refunded'])) {
//        unset($wc_statuses_arr['wc-refunded']);
//    }
//    // On Hold
//    if (isset($wc_statuses_arr['wc-on-hold'])) {
//        unset($wc_statuses_arr['wc-on-hold']);
//    }


    return $wc_statuses_arr;
}

add_filter('wc_order_statuses', 'handle_order_statuses');

function register_new_statuses()
{
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
        'label_count' => _n_noop('Заказ Н/П <span class="count">(%s)</span>',
            'Заказ Н/П <span class="count">(%s)</span>')
    ));

    register_post_status('wc-sent', array(
        'label' => 'Заказ Н/П',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Заказ Н/П <span class="count">(%s)</span>',
            'Заказ Н/П <span class="count">(%s)</span>')
    ));
}

add_action('init', 'register_new_statuses');

function add_statuses($wc_statuses_arr)
{
    $new_statuses_arr = array();

    foreach ($wc_statuses_arr as $id => $label) {
        $new_statuses_arr[$id] = $label;

        if ('wc-completed' === $id) {
            $new_statuses_arr['wc-order-np'] = 'Заказ Н/П';
        }
    }

    return $new_statuses_arr;
}

add_filter('wc_order_statuses', 'add_statuses');