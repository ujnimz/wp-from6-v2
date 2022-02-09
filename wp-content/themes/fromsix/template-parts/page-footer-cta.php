<?php
	$footer_cta = get_field('footer_cta');
	if ($footer_cta) :

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
	?>
	<!-- Last Section Start -->
	<section class="last-section">
		<div class="container">
			<h2 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php echo $footer_cta['title_1']; ?><span class="<?php echo $text_secondary_color; ?>"><?php echo $footer_cta['title_2']; ?></span></h2>
			<?php if( $footer_cta['button_text'] && $footer_cta['button_link'] ) : ?>
			<div class="view-more-wrapper" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
				<a class="view-more <?php echo $button_font_weight.' '.$button_background_color; ?>" href="<?php echo $footer_cta['button_link']; ?>" title="<?php echo $footer_cta['button_text']; ?>"<?php if( $footer_cta['open_new_tab'] ) : ?> target="_blank"<?php endif; ?>><?php echo $footer_cta['button_text']; ?></a>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<!-- Last Section End -->
<?php	endif;