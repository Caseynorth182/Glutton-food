<?php
if(class_exists('WooCommerce')){
    require get_template_directory() . '/inc/woo.php';
}

add_action('wp_enqueue_scripts', 'glutton_script');
add_action( 'after_setup_theme', 'glutton_reg_menus' );

function glutton_script() {
    wp_enqueue_style('style', get_stylesheet_uri() );
    wp_enqueue_style('global', get_template_directory_uri(  ) . '/assets/css/core.css' , [], '1.0' , 'all');
    wp_enqueue_style('theme', get_template_directory_uri() . '/assets/css/theme-teal.css', [], '1.0', 'all');
    //scripts
    wp_enqueue_script('core', get_template_directory_uri(  ) . '/assets/js/core.js', [], '1.1' , true);
}

//подключение меню
function glutton_reg_menus(){
    register_nav_menu( 'menu_header', 'меню в шапке' );
    register_nav_menu( 'menu_footer', 'меню в футере' );

}


//подключение woo

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'title-tag' );
}


//картинки категорий
add_action('product_thumb','show_product_thumb');

function show_product_thumb($cat){
    $thumbnail_id = get_term_meta(  $cat->term_id, 'thumbnail_id', true );
    $image = wp_get_attachment_url( $thumbnail_id );
    echo $image;
}

//WOOCOMMERCE hooks




