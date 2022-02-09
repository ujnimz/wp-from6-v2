<?php
	$text_colors = get_field('text_colors', 'option');	
	if( $text_colors ) :
		$text_primary_color = $text_colors['text_primary_color'];
		$text_secondary_color = $text_colors['text_secondary_color'];
		$button_font_weight = $text_colors['button_font_weight'];
	endif;

	$background_colors = get_field('background_colors', 'option');	
	if( $background_colors ) :
		$button_background_color = $background_colors['button_background_color'];
	endif;

	$typography = get_field('typography', 'option');	
	if( $typography ) :
		$main_heading_font_weight = $typography['main_heading_font_weight'];
		$button_font_weight = $typography['button_font_weight'];
	endif;

	$works_miscellaneous = get_field('works_miscellaneous', 'option');	
	?>
	<!-- Last Section Start -->
	<section class="last-section">
		<div class="container">
			<h2 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php echo $works_miscellaneous['cta_title_1']; ?><span class="<?php echo $text_secondary_color; ?>"><?php echo $works_miscellaneous['cta_title_2']; ?></span></h2>
			<?php if( $works_miscellaneous['cta_button_text'] && $works_miscellaneous['cta_button_link'] ) : ?>
			<div class="view-more-wrapper" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
				<a class="view-more <?php echo $button_font_weight.' '.$button_background_color; ?>" href="<?php echo $works_miscellaneous['cta_button_link']; ?>" title="<?php echo $works_miscellaneous['cta_button_text']; ?>"><?php echo $works_miscellaneous['cta_button_text']; ?></a>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<!-- Last Section End -->