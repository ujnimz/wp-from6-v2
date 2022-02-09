<?php
$text_colors = get_field('text_colors', 'option');	
if( $text_colors ) :
	$text_primary_color = $text_colors['text_primary_color'];
endif;

$typography = get_field('typography', 'option');	
if( $typography ) :
	$main_heading_font_weight = $typography['main_heading_font_weight'];
endif; ?>
<!-- Related Blog Posts Start -->
<section class="page last-section">
	<div class="container">
		<?php
		$blog_miscellaneous = get_field('blog_miscellaneous', 'option');	
		if ( $blog_miscellaneous ) : 
			if ( $blog_miscellaneous['related_posts_title'] ) : ?>
				<h5 class="<?php echo $text_primary_color.' '.$main_heading_font_weight; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php echo esc_html( $blog_miscellaneous['related_posts_title'] ); ?></h5>
				<?php 
			endif;
		endif;

		$related = new WP_Query(
			array(
				'category__in'   => wp_get_post_categories( $post->ID ),
				'posts_per_page' => 2,
				'post__not_in'   => array( $post->ID )
			)
		);

		if( $related->have_posts() ) : ?>
			<div class="more-blog-posts row">
			<?php
				while( $related->have_posts() ) :
					$related->the_post(); 
					?>
						<div class="col-12 col-md-6" data-aos="flip-down" data-aos-anchor-placement="top-bottom">
							<a class="blog-list" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="blog-list-image from6-image">
									<img class="img-fluid" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true); ?>">
								</div>
								<div class="blog-list-caption bree400">
									<h6><?php the_title(); ?></h6>
								</div>
							</a>
						</div>
					<?php
				endwhile;
			wp_reset_postdata(); ?>
			</div>
		<?php 
		endif; ?>
	</div>
</section>
<!-- Related Blog Posts End -->