<?php
/*
 * Template Name: Front Page
 *
 * The main template file page-front-page.php
 *
 * @link https:from6.com
 *
 * @package WordPress
 * @subpackage Fromsix
 * @since 1.0
 * @version 1.0
 */
get_header();

$text_colors = get_field('text_colors', 'option');	
if( $text_colors ) :
	$text_primary_color = $text_colors['text_primary_color'];
	$text_secondary_color = $text_colors['text_secondary_color'];
	$body_copy_color = $text_colors['body_copy_color'];
endif;

$background_colors = get_field('background_colors', 'option');	
if( $background_colors ) :
	$button_background_color = $background_colors['button_background_color'];
endif;

$typography = get_field('typography', 'option');	
if( $typography ) :
	$main_heading_font_weight = $typography['main_heading_font_weight'];
	$body_copy_font_weight = $typography['body_copy_font_weight'];
	//$footer_font_weight = $typography['footer_font_weight'];
	$button_font_weight = $typography['button_font_weight'];
endif;


?>
	<!-- Intro Start -->
	<main id="from6-home" class="jumbotron bg-orange">
		<div class="container" style="background-color: transparent;">
			<div class="row">
				<div class="col-12 jumbotron" data-aos="fade-up">
					<?php 
					if( get_field('slider_revolution') ) : 
						echo do_shortcode( ' '. the_field('slider_revolution_shortcode') .' ' ); 
					endif;
					if( get_field('text_slider') ) : ?>
						<ul id="text-slide" class="intro-text bree700">
							<li><h1><?php the_field('line_1'); ?><span><?php the_field('line_2'); ?></span></h1></li>
						</ul>
					<?php endif; ?>
					<!-- Scroll down indicator -->
					<div class="indicator">
						<div class="l-section-top">
						  <div class="c-scrolldown">
							<div class="c-line-w"></div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- Intro End -->
<?php

	// check if the flexible content home_blocks field has rows of data
	if( have_rows('home_blocks') ) :
		// loop through the rows of data
    while ( have_rows('home_blocks') ) : the_row();

			// 1. Works Section Start
      if( get_row_layout() == 'works_block' ) :
      ?>
      	<!-- Works Section Start -->
				<section class="bg-white">
					<div class="container">
						<h2 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php the_sub_field('title_line_1'); ?><span class="<?php echo $text_secondary_color; ?>"><?php the_sub_field('title_line_2'); ?></span></h2>
						<?php
							$posts = get_sub_field('select_works');

							if( $posts ) : $post_count = 0; ?>
    					<div id="works" class="row" data-aos="fade-up">
								<div class="col-12 col-md-8">
									<div id="carousel-works" class="carousel slide carousel-fade" data-ride="carousel">
										<div class="carousel-inner" role="listbox">
			    						<?php foreach( $posts as $post): $post_count++; $class = ($post_count == 1) ? 'active' : ''; ?>
				        				<?php setup_postdata($post); ?>
				        					<div class="carousel-item <?php echo $class; ?>">
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<div class="view">
																<img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true); ?>" class="img-fluid">
															</div>
															<div class="carousel-caption">
																<h5 class="bree400"><?php the_title(); ?></h5>
																<p class="rustico"><?php the_field('work_subtitle'); ?></p>
															</div>
														</a>
													</div>
			    						<?php endforeach; ?>
			    					</div>
			    					<!-- Carousel Nav -->
			    					<div class="carousel-control text-xs-center">
											<a class="from6-icon icon-next" href="#carousel-works" role="button" data-slide="prev">Previous</a>&nbsp;&nbsp;
											<a class="from6-icon icon-previous" href="#carousel-works" role="button" data-slide="next">Next</a>
										</div>
			    				</div>
    						</div>
    					</div>
    				<?php wp_reset_postdata(); ?>
						<?php endif; ?>

						<?php if ( get_sub_field('button_text') ) : ?>
						<div class="view-more-wrapper" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
							<a class="view-more <?php echo $button_font_weight.' '.$button_background_color; ?>" href="<?php esc_url( the_sub_field('button_link') ); ?>" title=""><?php the_sub_field('button_text'); ?></a>
						</div>
						<?php endif; ?>

					</div>
				</section>
				<!-- Works Section End -->
      <?php

      // 2. Services Section Start
    	elseif ( get_row_layout() == 'services_block' ) :
    	?>
    		<!-- Services Section Start -->
				<section class="home-services bg-white">
					<div class="container">
						<h2 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php the_sub_field('title_line_1'); ?><span class="<?php echo $text_secondary_color; ?>"><?php the_sub_field('title_line_2'); ?></span></h2>
							<div id="home-services" class="row bree300" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
							<?php
								if ( have_rows('services_left') ) : // services_left if start
								?>
									<div class="col-12 col-md-4">
										<div id="accordion">
										<?php
											$service_count = 1;
    									while ( have_rows('services_left') ) : the_row();	
											?>
											  <div class="card">
													<div class="card-header" id="heading<?php echo $service_count ?>">
													  <h5 class="mb-0 pb-0">
														<button class="btn btn-link collapsed card-title <?php echo $body_copy_color.' '.$body_copy_font_weight; ?>" data-toggle="collapse" data-target="#collapse<?php echo $service_count ?>" aria-expanded="false" aria-controls="collapse<?php echo $service_count ?>">
														  <?php the_sub_field('service'); ?>
														</button>
													  </h5>
													</div>

													<div id="collapse<?php echo $service_count ?>" class="collapse" aria-labelledby="heading<?php echo $service_count ?>" data-parent="#accordion">
													  <div class="card-body">
														<p class="<?php echo $body_copy_color.' '.$body_copy_font_weight; ?>"><?php the_sub_field('service_description'); ?></p>
													  </div>
													</div>
											  </div>
											<?php
											$service_count++;
											endwhile;
										?>
								</div>
							</div>
							<?php	
								endif; // services_left if end
								if ( have_rows('services_right') ) : // services_right if start
								?>
									<div class="col-12 col-md-4">
										<div id="accordion">
										<?php
											//$service_count = 1;
    									while ( have_rows('services_right') ) : the_row();	
											?>
											  <div class="card">
													<div class="card-header" id="heading<?php echo $service_count ?>">
													  <h5 class="mb-0 pb-0">
														<button class="btn btn-link collapsed card-title <?php echo $body_copy_color.' '.$body_copy_font_weight; ?>" data-toggle="collapse" data-target="#collapse<?php echo $service_count ?>" aria-expanded="false" aria-controls="collapse<?php echo $service_count ?>">
														  <?php the_sub_field('service'); ?>
														</button>
													  </h5>
													</div>

													<div id="collapse<?php echo $service_count ?>" class="collapse" aria-labelledby="heading<?php echo $service_count ?>" data-parent="#accordion">
													  <div class="card-body">
														<p class="<?php echo $body_copy_color.' '.$body_copy_font_weight; ?>"><?php the_sub_field('service_description'); ?></p>
													  </div>
													</div>
											  </div>
											<?php
											$service_count++;
											endwhile;
										?>
										</div>
									</div>
							<?php
							endif; // services_right if end
						?>
						</div>

						<?php if ( get_sub_field('button_text') ) : ?>
						<div class="view-more-wrapper" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
							<a class="view-more <?php echo $button_font_weight.' '.$button_background_color; ?>" href="<?php esc_url( the_sub_field('button_link') ); ?>" title=""><?php the_sub_field('button_text'); ?></a>
						</div>
						<?php endif; ?>

					</div>
				</section>
	<!-- Services Section End -->
    	<?php
      endif;
    endwhile; // End home_blocks while
?>
	
	
<?php
	// check if the flexible content home_blocks field has rows of data
	if( have_rows('home_blocks') ):
		// loop through the rows of data
    while ( have_rows('home_blocks') ) : the_row();
			// 3. Testimonials Section Start
      if( get_row_layout() == 'testimonial_block' ):
      ?>	
			<!-- Testimonials Section Start -->
			<section class="bg-white" style="position: relative;">
				<div class="container">
					<h2 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php the_sub_field('title_line_1'); ?><span class="<?php echo $text_secondary_color; ?>"><?php the_sub_field('title_line_2'); ?></span></h2>
					<?php	
						$testimonial_args = array( 'orderby' => 'rand', 'post_type' => 'testimonial', 'posts_per_page' => 6 );
						$testimonial_query = new WP_Query( $testimonial_args );
						$post_count = 0;
							if ( $testimonial_query->have_posts() ) : ?>
								<div id="testimonials" class="row bree300" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
									<div class="col-12 col-md-8">
										<!-- Testimonials carousel -->
										<div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel">
											<div class="carousel-inner" role="listbox">
												<?php
													while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); $post_count++; $class = ($post_count == 1) ? 'active' : ''; ?>
														<div id="post-<?php the_ID(); ?>" class="carousel-item <?php echo $class ?>">
															<div class="carousel-content">
																<h3 class="<?php echo $body_copy_color; ?>"><?php the_field('testimonial'); ?></h3>
																<p class="<?php echo $body_copy_color; ?>"><?php the_field('testimonial_author'); ?> - <?php the_field('testimonial_author_designation'); ?></p>
															</div>
														</div>
														<?php 
													endwhile;
												wp_reset_postdata(); ?>
											</div>

										<div class="carousel-control text-xs-center">
											<a class="from6-icon icon-next" href="#carousel-testimonials" role="button" data-slide="prev">Previous</a>&nbsp;&nbsp;
											<a class="from6-icon icon-previous" href="#carousel-testimonials" role="button" data-slide="next">Next</a>
										</div>

										</div>
										<!-- /. Testimonials carousel -->
									</div>
								</div>
							<?php endif; ?>
				</div>
			</section>
			<!-- Testimonials Section End -->
			<?php
		endif;
	endwhile;
endif;
?>

<?php else: // if no layout found ?>
	<section class="home-services bg-white">
		<div class="container">
			<div class="alert alert-warning" role="alert">
  			<?php _e( 'Sorry, no layouts found! Please add layouts.' ); ?>
			</div>
		</div>
	</section>

<?php endif; // End home_blocks if ?>

<?php get_footer();