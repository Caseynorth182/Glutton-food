<?php
/*
 Template name: Для главной
 */

get_header();
//
$shop_page_url = get_permalink(6);

?>


<!-- Content -->
<div id="content" class="bg-dark dark">

    <!-- Section - Main -->
    <section class="section section-main section-main-4 bg-extra-dark">

        <!-- Content -->
        <div class="section-main-content padded container">
            <div class="row">
                <div class="col-md-5">
                    <h1 class="display-1">Best food in the city!</h1>
                    <h4 class="text-muted mb-5">Taste it now with our online order!</h4>
                    <a href="<?php echo $shop_page_url;?>" class="btn btn-outline-primary btn-lg animated" data-animation="fadeInUp" data-animation-delay="400"><span>
		                   В Меню
	                    </span></a>
                </div>
            </div>
        </div>

        <!-- Image -->
        <div class="section-main-image">
            <div class="bg-image bg-parallax"><img src="http://assets.suelo.pl/soup/img/photos/hero-dark.jpg" alt=""></div>
        </div>

    </section>

    <!-- Section - Featured Products -->
    <section class="section right">

        <div class="container">
            <h1 class="mb-6">Featured Products</h1>
            <div class="row">
                <?php
                $query = new WP_Query([
                    'posts_per_page' => 3,
                    'post_type' => 'product',
                    'tax_query' => [
                        [
                            'taxonomy' => 'product_cat',
                            'field'    => 'id',
                            'terms'    => 24
                        ]
                    ]
                ]);

                if($query->have_posts()):
                    while($query->have_posts()):
                        $query->the_post();
                        $price = get_post_meta(get_the_ID(),'_regular_price', true)

                        ?>
                        <div class="col-md-4">
                            <!-- Card -->
                            <div class="card">
                                <div class="card-image">
                                    <?php
                                    the_post_thumbnail('full', [
                                        'class' => 'card-image__img'
                                    ]); ?>

                                </div>
                                <div class="card-body">
                                    <h5 class="mb-1"><?php the_title();?></h5>
                                    <span class="text-muted text-sm"><?php the_excerpt();?></span>
                                    <div class="row align-items-center mt-4">
                                        <div class="col-sm-6">
	                                <span class="text-md mr-4">
		                                <span class="text-muted">
			                               от
		                                </span>
		                                <span data-product-base-price>
			                               <?php echo $price;?> РУБ
		                                </span>
	                                </span>
                                        </div>
                                        <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-primary btn-sm" data-action="open-cart-modal" data-id="1"><span>Add to cart</span></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <div class="text-center mt-5">
                <a href="menu-grid-collapse.html" class="btn btn-primary"><span>View Our Menu</span></a>
            </div>
        </div>

    </section>

    <!-- Section - Menu -->
    <?php
    $category = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'exclude'  => [22,15,24]
    ]);


    ?>
    <section class="section cover protrude">

        <div class="menu-sample-carousel carousel inner-controls" data-slick='{
                "dots": true,
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "infinite": true,
                "responsive": [
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 1
                        }
                    },
                    {
                        "breakpoint": 690,
                        "settings": {
                            "slidesToShow": 1,
                            "slidesToScroll": 1
                        }
                    }
                ]
            }'>

            <?php
            foreach ($category as $cat) :

                ?>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="<?php echo $shop_page_url;?>">
                        <img  src="<?php do_action('product_thumb', $cat);?>" alt="" class="image">
                        <h3 class="title"><?php echo $cat->name?></h3>
                    </a>
                </div>
            <?php
            endforeach;
            ?>
        </div>

    </section>
    <?php

    ?>

    <!-- Section - About -->
    <section class="section section-bg-edge">

        <div class="image right col-md-6 offset-md-6">
            <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/bg-food3.png" alt=""></div>
        </div>

        <div class="container">
            <div class="col-lg-5 col-md-9">
                <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                <h1>The best food in London!</h1>
                <p class="lead text-muted mb-5">Donec a eros metus. Vivamus volutpat leo dictum risus ullamcorper condimentum. Cras sollicitudin varius condimentum. Praesent a dolor sem....</p>
                <div class="blockquotes">
                    <!-- Blockquote -->
                    <blockquote class="blockquote light animated" data-animation="fadeInLeft">
                        <div class="blockquote-content">
                            <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                            <p>It’ was amazing feeling for my belly!</p>
                        </div>
                        <footer>
                            <img src="http://assets.suelo.pl/soup/img/avatars/avatar02.jpg" alt="">
                            <span class="name">Mark Johnson<span class="text-muted">, Google</span></span>
                        </footer>
                    </blockquote>
                    <!-- Blockquote -->
                    <blockquote class="blockquote animated" data-animation="fadeInRight" data-animation-delay="300">
                        <div class="blockquote-content dark">
                            <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                            <p>Great food and great atmosphere!</p>
                        </div>
                        <footer>
                            <img src="http://assets.suelo.pl/soup/img/avatars/avatar01.jpg" alt="">
                            <span class="name">Kate Hudson<span class="text-muted">, LinkedIn</span></span>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>

    </section>

    <!-- Section - Steps -->
    <section class="section section-extended right">

        <div class="container bg-extra-dark">
            <div class="row">
                <div class="col-md-4">
                    <!-- Step -->
                    <div class="feature feature-1 mb-md-0">
                        <div class="feature-icon icon icon-primary"><i class="ti ti-shopping-cart"></i></div>
                        <div class="feature-content">
                            <h4 class="mb-2"><a href="menu-list-collapse.html">Pick a dish</a></h4>
                            <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Step -->
                    <div class="feature feature-1 mb-md-0">
                        <div class="feature-icon icon icon-primary"><i class="ti ti-wallet"></i></div>
                        <div class="feature-content">
                            <h4 class="mb-2">Make a payment</h4>
                            <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Step -->
                    <div class="feature feature-1 mb-md-0">
                        <div class="feature-icon icon icon-primary"><i class="ti ti-package"></i></div>
                        <div class="feature-content">
                            <h4 class="mb-2">Recieve your food!</h4>
                            <p class="text-muted mb-3">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Section -->
    <section class="section section-lg">

        <!-- BG Image -->
        <div class="bg-image bg-parallax animated dark-overlay"><img src="http://assets.suelo.pl/soup/img/photos/bg-food2.jpg" alt=""></div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-center order-md-2 mb-5 mb-md-0">
                    <button class="btn-play" data-toggle="video-modal" data-target="#modalVideo" data-video="https://www.youtube.com/embed/uVju5--RqtY"></button>
                </div>
                <div class="col-md-6">
                    <h1 class="display-2">Check our <strong>promo</strong> video!</h1>
                    <h4 class="text-muted mb-5">Taste it now with our online order!</h4>
                    <a href="page-offers.html" class="btn btn-outline-primary btn-lg"><span>Order now</span></a>
                </div>
            </div>
        </div>

    </section>

    <?php get_footer(); ?>
