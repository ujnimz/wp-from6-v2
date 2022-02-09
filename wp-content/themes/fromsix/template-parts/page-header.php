<?php
	$page_header = get_field('page_header');
	if ($page_header) : 

	$text_colors = get_field('text_colors', 'option');	
	if( $text_colors ) :
		$text_primary_color = $text_colors['text_primary_color'];
		$subtitle_color = $text_colors['subtitle_color'];
		$body_copy_color = $text_colors['body_copy_color'];
	endif;

	$typography = get_field('typography', 'option');	
	if( $typography ) :
		$main_heading_font_weight = $typography['main_heading_font_weight'];
		$body_copy_font_weight = $typography['body_copy_font_weight'];
	endif; 	?>
	<!-- Our Story Section Start -->
	<section class="page">
		<div class="container" data-aos="fade-up">
			<main>
				<h1 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>"><?php the_title(); ?></h1>
				<h2 class="rustico <?php echo $subtitle_color; ?>"><?php echo esc_html( $page_header['subtitle'] ); ?></h2>

				<div class="content row">
					<div class="col-12 col-md-12">
						<div class="editor-content <?php echo $body_copy_color.' '.$body_copy_font_weight; ?>">
							<?php echo $page_header['page_description']; ?>
						</div>
					</div>
				</div>
			</main>
		</div>
	</section>
	<!-- Our Story Section End -->
<?php if ( has_post_thumbnail() ) : ?>
	<!-- Header Image Start -->
	<section class="page">
		<div class="container-fluid" data-aos="fade-up">

			<div class="content row">
				<div class="col-12 col-md-12">
					<div class="image from6-image"><img class="img-fluid" src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>" alt="<?php echo esc_html( get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true) ); ?>"></div>
				</div>
			</div>
			
		</div>
	</section>
	<!-- Header Image End -->
<?php	endif;
endif;