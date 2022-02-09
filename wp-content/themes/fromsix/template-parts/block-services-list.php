<?php if( have_rows('services') ): 
$text_colors = get_field('text_colors', 'option');	
if( $text_colors ) :
	$body_copy_color = $text_colors['body_copy_color'];
endif;

$typography = get_field('typography', 'option');	
if( $typography ) :
	$body_copy_font_weight = $typography['body_copy_font_weight'];
endif;
?>
	<!-- Services Section Start -->
	<section class="page">
		<div class="container">
			<div class="content row">
				<?php while( have_rows('services') ): the_row(); ?>
				<div class="col-12 col-md-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
					<div class="services">
						<h6 class="services-title bree400"><?php the_sub_field('service_title'); ?></h6>
						<?php if( have_rows('service_item') ): ?>
						<ul class="services-list <?php echo $body_copy_color.' '.$body_copy_font_weight ?>">
							<?php while( have_rows('service_item') ): the_row(); ?>
							<li><?php the_sub_field('item'); ?></li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<!-- Our Team Section End -->
<?php endif;