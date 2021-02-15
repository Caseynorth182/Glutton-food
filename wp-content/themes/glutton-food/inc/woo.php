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

 add_action('woocommerce_before_thankyou', 'checkout_start');
 function checkout_start() {
     //получаем ID данного заказа
     $order_key= $_GET['key'] ? wc_get_order_id_by_order_key($_GET['key']) : false;
     //получаем обертку для обьекта заказа по ID
     $order = wc_get_order($order_key);
     //получили массив с полными данными о заказе
     $data = $order->get_data();

     $name = $data['billing']['first_name'];
     $sername = $data['billing']['last_name'];
 	$full_name = $name . " ". $sername;
    /* echo '<pre>';
     echo print_r($full_name);
     echo '<pre>';*/
     ?>
      <h1>Cпасибо за ваш заказ ,<?php echo $full_name;?></h1>
    <?php
 }



//THANKYOU
add_filter (  'woocommerce_thankyou_order_received_text' , 'title_change'  ) ;
function title_change($title) {
	return ' Спасибо за Ваш заказик, дорогой &#x1F44D';
}
//стандарто через эот хук передается ID заказа, так что передаем параметр что бы его изменить
add_action('woocommerce_thankyou','woocust_redirect_thx',5,1);
function woocust_redirect_thx($key){
	//из ID заказа нужно получить объект
	$order = wc_get_order($key);

    //ДЕЛАЕМ РЕДИРЕКТ если не получилось
	$url = home_url();
	if ( $order->has_status( 'failed' ) ) {
		wp_redirect( $url );
		die();
	}
	/*echo '<pre>';
     echo print_r($order);
     echo '<pre>';*/

}


//WOOCOMMERCE hooks
//single product
//remove breadcrumb
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);


remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price_slogan',21);
function woocommerce_template_single_price_slogan() {
	echo '<h3 class="price_slogan">Цена &#9749;</h3>';
}