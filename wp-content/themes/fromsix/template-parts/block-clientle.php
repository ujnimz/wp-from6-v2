<?php
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
<!-- Client Logos Start -->
<section class="page">
	<div class="container">
		<?php
		$clientle_header = get_field('clientle_header');
		if ($clientle_header) : ?>
			<h1 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php echo esc_html( $clientle_header['title'] ); ?></h1>
			<h2 class="rustico <?php echo $subtitle_color; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php echo esc_html( $clientle_header['subtitle'] ); ?></h2>
			
			<div class="content row" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
				<div class="col-12 col-md-12">
					<div class="editor-content <?php echo $body_copy_color.' '.$body_copy_font_weight; ?>">
						<?php echo $clientle_header['description']; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		<?php
		if( have_rows( have_rows( 'upload_logos' ) ) ): ?>
		<div class="content row">
			<div class="col-12 col-md-12">
				<ul class="client-list">
					<?php
					while ( have_rows( 'upload_logos' ) ) : the_row();
						$logo_image = get_sub_field( 'logo' ); ?>
					<li class="client-list-item" data-aos="zoom-in" data-aos-anchor-placement="bottom-bottom"><img class="client-logo img-fluid" src="<?php echo esc_url( $logo_image['url'] ); ?>" alt=""></li>
					<?php 
					endwhile; ?>
				</ul>
			</div>
		</div>
		<?php
		endif; ?>
	</div>
</section>
<!-- Client Logos End -->