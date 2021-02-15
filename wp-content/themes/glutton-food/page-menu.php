<?php

/*
 * Template name: Магазин
 */
get_header();
?>
<!-- Content -->
<div id="content">

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Menu Grid</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-10 offset-md-1" role="tablist">
                    <!-- Menu Category / Burgers -->

                    <?php
                    $category= get_terms([
                        'taxonomy' =>  'product_cat',
                        'hide_empty' => false,
                        'exclude'  => [22,15,24]
                    ]);

                    foreach($category as $cat):

                        ?>
                        <div id="" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuBurgersContent" data-toggle="collapse" aria-expanded="true">

                                <img src="<?php do_action('product_thumb', $cat);?>"
                                     alt=""
                                     class="bg-image">

                                <h2 class="title"><?php echo $cat->name;?></h2>
                            </div>

                            <div id="menuBurgersContent" class="menu-category-content collapse collapse-toggle">
                                <!--menu-category-title collapse-toggle collapsed-->
                                <div class="p-4">
                                    <div class="row gutters-sm">
                                        <div class="menu_collapse">

                                            <?php
                                            $query = new WP_Query([
                                                'post_type' => 'product',
                                                'tax_query' => [
                                                    [
                                                        'taxonomy' => 'product_cat',
                                                        'field'    => 'id',
                                                        'terms'    => $cat->term_id
                                                    ]
                                                ]
                                            ]);

                                            while($query->have_posts()):
                                                $query->the_post();
                                                $price = get_post_meta(get_the_ID(),'_regular_price', true);
                                                ?>

                                                <!-- Menu Item -->
                                                <div class="menu-item menu-grid-item">
                                                    <!--<img class="mb-4" src="http://assets.suelo.pl/soup/img/products/product-burger.jpg" alt="">-->
                                                    <?php the_post_thumbnail('full',[
                                                        'class' => 'menu-item__img'
                                                    ]);?>
                                                    <div class="mb-0"><?php the_title();?></div>
                                                    <span class="text-muted text-sm"><?php the_excerpt();?></span>
                                                    <div class="row align-items-center mt-4">
                                                        <div class="col-sm-6">
													<span class="text-md mr-4">
														<span class="text-muted">
															Цена
														</span>
														<span data-product-base-price>
															<?php echo $price;?>
														</span>
													</span>
                                                        </div>
                                                        <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                            <?php
                                                            global $product;
                                                            $id = $product->id;
                                                            ?>
                                      <button href="?add-to-cart=<?php echo $id; ?>" rel="nofollow" data-product-id="<?php echo $id ?>" class="btn btn-primary add_to_cart_button ajax_add_to_cart product_type_simple adding_to_cart" data-product_id="<?php echo $id;?>">В корзину</button>


                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            endwhile;
                                            wp_reset_postdata();
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>

                </div>
            </div>
        </div>
    </div>

    <?php
    get_footer();
    ?>
