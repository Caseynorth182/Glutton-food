<?php

//купон
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

//после покупки поля снова чистые
add_filter('woocommerce_checkout_get_value','__return_empty_string',10);

//
add_filter('woocommerce_billing_fields', 'chechout_field_custom');
 function chechout_field_custom($address_fields){

    //переопределяем название лейблов
     $address_fields['billing_city']['label'] = 'Город';
     $address_fields['billing_phone']['label'] = 'Телефончик';

    //меняем классы в полях
     $address_fields['billing_phone']['class'] = [
         0 => 'form-row-first'
     ];
     $address_fields['billing_email']['class'] =
         [
             'form-row-last'
         ];
     //удаление полей с массива
     unset(
         $address_fields['billing_company'],
         $address_fields['billing_country'],
         $address_fields['billing_postcode'],
         $address_fields['billing_state']);

     //пРОВЕРКА
     /*echo '<pre>';
     echo print_r($address_fields);
     echo '<pre>';*/

    return $address_fields;
};

 add_action('woocommerce_before_template_part', 'checkout_start');
 function checkout_start() {
     ?>
        <div class="container-check" >
    <?php
 }
 add_action('woocommerce_after_template_part', 'checkout_end');
function checkout_end() {
    ?>
    </div>
    <?php
}

//thankyou
do_action( 'woocommerce_before_template_part', 'thankyou_content_start' );
function thankyou_content_start(){
	?>
	<div class="row content-tanya">
	<div class="container">
  <div class="row">
<?php
}
do_action( 'woocommerce_after_template_part', 'thankyou_content_end' );
function thankyou_content_end(){
    ?>
	</div>
	</div>
	</div>
    <?php
}

