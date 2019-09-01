'use strict';

(function ($) {
  let $shippingBox = $('#nova_poshta_shipping_fields'),
      currentCountry;

  let setLoadingState = function () {
    $shippingBox.addClass('wcus-state-loading');
  };

  let unsetLoadingState = function () {
    $shippingBox.removeClass('wcus-state-loading');
  };

  // $('.woocommerce-shipping-fields').css('display', 'none');

  let loadNPAreas = function () {
    let $areas = $('#nova_poshta_shipping_area');

    setLoadingState();

    $.ajax({
      method: 'GET',
      url: WCUkrShipping.homeUrl + '/wp-json/wc_ukr_shipping/v1/novaposhta/area',
      dataType: 'json',
      success: function (json) {
        unsetLoadingState();

        if (json.result === true) {
          let html = '';

          for (let i = 0; i < json.data.length; i++) {
            let area = json.data[i];
            html += `<option value="${area['ref']}">${area['description']}</option>`;
          }

          $areas.html($areas.html() + html);
        }
        else {
          alert(json.data);
        }
      }
    });

  };

  let selectShipping = function () {
    // let currentShipping = $('.shipping_method').length > 1 ?
    //   $('.shipping_method:checked').val() :
    //   $('.shipping_method').val();

    if (currentCountry === 'UA') {
      $('#nova_poshta_shipping_fields').css('display', 'block');
      $('.woocommerce-shipping-fields').css('display', 'none');
    }
    else {
      $('#nova_poshta_shipping_fields').css('display', 'none');
      $('.woocommerce-shipping-fields').css('display', 'block');
    }
  };

  $(function() {
    // $('#nova_poshta_shipping_fields').css('display', 'none');

    $(document.body).bind('update_checkout', function (event, args) {
      setLoadingState();
    });

    $(document.body).bind('updated_checkout', function (event, args) {
      currentCountry = $('#billing_country').length ? $('#billing_country').val() : WCUkrShipping.currentCountry;
      selectShipping();
      unsetLoadingState();
    });

    loadNPAreas();

    $('#nova_poshta_shipping_area').on('change', function () {
      let $city = $('#nova_poshta_shipping_city'),
          $warehouse = $('#nova_poshta_shipping_warehouse');

      setLoadingState();

      $.ajax({
        method: 'GET',
        url: WCUkrShipping.homeUrl + '/wp-json/wc_ukr_shipping/v1/novaposhta/cities/' + this.value,
        dataType: 'json',
        success: function (json) {
          unsetLoadingState();

          if (json.result === true) {
            $warehouse.html('<option value="">Выберите отделение</option>');

            let html = '<option value="">Выберите город</option>';

            for (let i = 0; i < json.data.length; i++) {
              let city = json.data[i],
                  cityName = WCUkrShipping.lang === 'ru' ?
                    city['description_ru'] :
                    city['description'];

              html += `<option value="${city['ref']}">${cityName}</option>`;
            }

            $city.html(html);
          }
          else {
            alert(json.data);
          }
        }
      });
    });

    $('#nova_poshta_shipping_city').on('change', function () {
      let $warehouse = $('#nova_poshta_shipping_warehouse');

      setLoadingState();

      $.ajax({
        method: 'GET',
        url: WCUkrShipping.homeUrl + '/wp-json/wc_ukr_shipping/v1/novaposhta/warehouses/' + this.value,
        dataType: 'json',
        success: function (json) {
          unsetLoadingState();

          if (json.result === true) {
            let html = '<option value="">Выберите отделение</option>';

            for (let i = 0; i < json.data.length; i++) {
              let warehouse = json.data[i],
                warehouseName = WCUkrShipping.lang === 'ru' ?
                  warehouse['description_ru'] :
                  warehouse['description'];

              html += `<option value="${warehouse['ref']}">${warehouseName}</option>`;
            }

            $warehouse.html(html);
          }
          else {
            alert(json.data);
          }
        }
      });
    });

    let $customAddressCheckbox = document.getElementById('np_custom_address');

    let showCustomAddress = function () {

      if ($customAddressCheckbox.checked) {
        $('#nova-poshta-shipping-info').slideUp(400);
        $('#np_custom_address_block').slideDown(400);
      }
      else {
        $('#nova-poshta-shipping-info').slideDown(400);
        $('#np_custom_address_block').slideUp(400);
      }

    };

    if ($customAddressCheckbox) {
      showCustomAddress();
      $customAddressCheckbox.onclick = showCustomAddress;
    }

    if (typeof $.fn.select2 === 'function') {
      $('.wc-ukr-shipping-select').select2();
    }
  });

})(jQuery);