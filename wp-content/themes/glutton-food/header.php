<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap" rel="stylesheet">

    <?php wp_head();?>
</head>

<body class="no-margins">

<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">
    <!-- Header -->
    <header id="header" class="dark">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Logo -->
                    <div class="module module-logo dark">
	                    <?php the_custom_logo();?>
                    </div>
                </div>
                <div class="col-md-7">
                    <!-- Navigation -->

                    <nav class="module module-navigation left mr-4">
                        <?php
                        wp_nav_menu([
                            'theme_location'  => 'menu_header',
                            'container'       => false,
                            'menu_class'      => 'nav nav-main',
                            'menu_id'         => 'nav-main',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ]);
                        ?>


                    </nav>
                    <div class="module left">
                        <a href="<?php echo wc_get_checkout_url()?>" class="btn btn-outline-primary"><span>Оформление заказа</span></a>
                    </div>
                </div>

            </div>
        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="dark bg-dark">

        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>

        <div class="module module-logo">
            <?php the_custom_logo();?>
        </div>



    </header>
    <!-- Header / End -->

