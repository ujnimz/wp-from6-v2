<!-- Works Section Start -->
	<section class="page">
		<div class="container">
		<?php
			$terms = get_terms('work-category'); // Get all terms of a taxonomy
				if ( $terms && !is_wp_error( $terms ) ) :	?>
					<!-- Work layout filter Start -->
					<div class="work-filter filters filter-button-group bree400" data-aos="fade-up">
						<ul>
							<li class="active-work" data-filter="*"><?php the_field('work_filter_all_text'); ?></li>
							<?php foreach ( $terms as $term ) : ?>
								<li data-filter=".<?php echo $term->slug ?>"><?php echo $term->name; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<!-- Work layout filter End -->
					<?php 
				endif; ?>


	<?php 
		$number_of_works = get_field('number_of_works');
		$number_of_categories = get_field('number_of_categories');
		$work_args = array( 'post_type' => 'work', 'posts_per_page' => $number_of_works );
		$work_query = new WP_Query( $work_args );
			if ( $work_query->have_posts() ) : ?>
				<!-- Work Grid Start -->
				<div id="work-grid" data-aos="fade-up">
					<div class="work-grid grid row">
					<?php
						while ( $work_query->have_posts() ) : $work_query->the_post();	?>
							<div id="post-<?php the_ID(); ?>" class="works-list col-12 col-md-6<?php foreach($terms as $term) : echo ' '.$term->slug; endforeach; ?> grid-item">
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
			<?php else:  ?>
				<div class="alert alert-warning" role="alert">
					<?php _e( 'Sorry, no posts found! Please add posts.' ); ?>
				</div>
			<?php	endif; ?>
		</div>
	</section>
<!-- Work Section End -->