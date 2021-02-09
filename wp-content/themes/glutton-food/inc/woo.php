<?php

//купон
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

//после покупки поля снова чистые
add_filter('woocommerce_checkout_get_value','__return_empty_string',10);

//
add_filter('woocommerce_billing_fields', 'chechout_field_custom');
 function chechout_field_custom($address_fields){


    //меняем классы в полях

     $address_fields['billing_phone']['label'] = 'Телефончик';
     $address_fields['billing_phone']['class'] = [
         0 => 'form-row-first'
     ];
     $address_fields['billing_email']['class'] =
         [
             'form-row-last'
         ];
     //удаление полей с массива
     unset($address_fields['billing_company'],$address_fields['billing_country']);

     //пРОВЕРКА
    /* echo '<pre>';
     echo print_r($address_fields);
     echo '<pre>';*/



    return $address_fields;
};