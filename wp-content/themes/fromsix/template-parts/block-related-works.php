<?php
$text_colors = get_field('text_colors', 'option');	
if( $text_colors ) :
	$text_primary_color = $text_colors['text_primary_color'];
endif;

$typography = get_field('typography', 'option');	
if( $typography ) :
	$main_heading_font_weight = $typography['main_heading_font_weight'];
endif; ?>
<!-- Related Works Start -->
<section class="page">
		<div class="container">
			<?php
			$works_miscellaneous = get_field('works_miscellaneous', 'option');	
			if ( $works_miscellaneous ) : 
				if ( $works_miscellaneous['related_works_title'] ) : ?>
					<h5 class="<?php echo $text_primary_color.' '.$main_heading_font_weight; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php echo esc_html( $works_miscellaneous['related_works_title'] ); ?></h5>
					<?php 
				endif;
			endif;

			$number_of_categories = 3;
			$work_args = array(
				'post_type' => 'work',
				'category__in'   => wp_get_post_categories( $post->ID ),
				'posts_per_page' => 2,
				'post__not_in'   => array( $post->ID )
			);

			$work_query = new WP_Query( $work_args );
			if ( $work_query->have_posts() ) : ?>
				<!-- Work Grid Start -->
				<div id="work-grid" data-aos="fade-up">
					<div class="work-grid row" style="padding-right: 15px; padding-left: 15px;">
					<?php
						while ( $work_query->have_posts() ) : $work_query->the_post(); ?>
							<div id="post-<?php the_ID(); ?>" class="works-list col-12 col-md-6">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<div class="works-list-inner">
										<div class="works-list-image"><img class="img-fluid" src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true); ?>"></div>
										<div class="works-list-caption">
											<h6 class="bree400"><?php the_title(); ?></h6>
											<p class="bree300"><?php the_field('work_subtitle'); ?></p>
												<ul class="bree300">
													<?php
													$terms = get_the_terms($post->ID, 'work-category'); $i = 1;
													foreach($terms as $term) : ?>
														<li><?php echo $term->name; if ($i++ == $number_of_categories) break; ?></li> 
													<?php endforeach; ?>	
												</ul>
										</div>
									</div>
								</a>
							</div>
						<?php 
						endwhile;
					wp_reset_postdata(); ?>
					</div>
				</div>
				<!-- Work Grid End -->
			<?php 
			else: ?>
				<div class="alert alert-warning" role="alert">
					<?php _e( 'Sorry, no posts found! Please add posts.' ); ?>
				</div>
			<?php	
			endif; ?>
		</div>
	</section>
<!-- Related Works End -->