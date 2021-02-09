<?php
    get_header();
?>


	<!-- Content -->
	<div id="content">

		<!-- Page Title -->
		<div class="page-title bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-4">
						<h1 class="mb-0">Наше вкусное меню</h1>
						<h4 class="text-muted mb-0">собери себе сам</h4>
					</div>
				</div>
			</div>
		</div>

		<!-- Page Content -->
		<div class="page-content">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-10 offset-md-1" role="tablist">
						<?php
							if(have_posts()):
							/*$category = get_term*/

								$tax_name = 'product_cat'; # название таксономии
                                $query_id = get_queried_object_id();
                                $categories = get_terms($tax_name, [
                                       /* 'parent' => $query_id,*/
	                                    'hide_empty'  => false,
	                                    'field' => 'id=>slug',
                                ]); # получаем все термины таксономии
								$query = new WP_Query([
										'post_type'      => 'product',
										'posts_per_page' => -1,
										'tax_query' => [
												[
														'taxonomy' => 'product_cat',
														'field'    => 'slug',
														'term'      => 'garnir'
												]
										]
								]);
								var_dump($query);


							?>

		                            <div class="menu-category">
			                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuBurgersContent" data-toggle="collapse" aria-expanded="true">
				                            <div class="bg-image"><img src="assets/img/screens/fish_soup.jpg" alt=""></div>
				                            <h2 class="title"><?php ?></h2>
			                            </div>
			                            <div id="menuBurgersContent" class="menu-category-content collapse show">
				                            <div class="p-4">
					                            <div class="row gutters-sm">
						                            <div class="col-lg-4 col-6">
							                            <!-- Menu Item -->
							                          <?php
/*		                                                    foreach($posts as $post):
			                                                    setup_postdata($post);
						                               */?><!--
							                            <div class="menu-item menu-grid-item">
								                            <img class="mb-4" src="assets/img/screens/thumb/borsch.jpg" alt="">
								                            <?php
/*						                                the_post_thumbnail([284,199]);
								                            */?>
								                            <h6 class="mb-0"><?php /*the_title();*/?></h6>
								                            <span class="text-muted text-sm"><?php /*get_the_excerpt();*/?></span>
								                            <div class="row align-items-center mt-4">
									                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">От</span> &#8381; <span data-product-base-price>9.00</span></span>
									                            </div>
									                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="1"><span>Добавить в Корзину</span></button></div>
								                            </div>
							                            </div>
							                            --><?php
/*						                                endforeach;
							                                wp_reset_postdata();
							                            */?>
						                            </div>

					                            </div>
				                            </div>
			                            </div>
		                            </div>
<!--


									<?php

									else :

									echo " постов нет ";
									endif;
								?>
					</div>
				</div>
			</div>
		</div>
<?php get_footer()?>
