<?php
/*
 * Template Name: Contact Page
 */

get_header();

$text_colors = get_field('text_colors', 'option');	
if( $text_colors ) :
	$text_primary_color = esc_attr( $text_colors['text_primary_color'] );
	$text_secondary_color = esc_attr( $text_colors['text_secondary_color'] );
	$body_copy_color = esc_attr( $text_colors['body_copy_color'] );
	$contact_color = esc_attr( $text_colors['contact_color'] );
endif;

$typography = get_field('typography', 'option');	
if( $typography ) :
	$main_heading_font_weight = esc_attr( $typography['main_heading_font_weight'] );
	$body_copy_font_weight = esc_attr( $typography['body_copy_font_weight'] );
	$contacts_font_weight = esc_attr( $typography['contacts_font_weight'] );
endif;
?>
<!-- Contact Us Section Start -->
<section class="page">
	<div class="container">
		<h2 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>" data-aos="fade-up"><?php esc_html( the_field('title_1') ); ?><span class="<?php echo $text_secondary_color; ?>"><?php esc_html( the_field('title_2') ); ?></span></h2>

		<?php if( get_field('page_description') ) : ?>
		<div class="content row">
			<div class="col-12 col-md-12">
				<div class="editor-content <?php echo $body_copy_font_weight.' '.$body_copy_color; ?>">
					<?php echo esc_textarea( the_field('page_description') ); ?>
				</div>
			</div>
		</div>
		<?php endif;
		
		if( have_rows('country') ): ?>
		<div id="contact-us" class="content row">
			<?php while( have_rows('country') ): the_row(); ?>
			<div class="col-12 col-md-6" data-aos="fade-up">
				<h4 class="bree700"><?php esc_html( the_sub_field('country_name') ); ?></h4>
				<div class="contact-details">
					<?php 
					if (have_rows('contacts')) :
						while (have_rows('contacts')) : the_row(); 
							if ( get_row_layout() == 'telephone' ) : ?>
								<div class="contact-wrapper">
									<span class="from6-icon icon-phone-black"></span>
									<a class="contact <?php echo $contacts_font_weight.' '.$contact_color; ?>" href="tel:+<?php esc_html( the_sub_field('country_code') ); ?><?php echo preg_replace('/\s+/', '', get_sub_field('telephone_number') ); ?>" title="Telephone">(+<?php esc_html( the_sub_field('country_code') ); ?>) <?php esc_html( the_sub_field('telephone_number') ); ?></a>
								</div>
							<?php
							elseif ( get_row_layout() == 'email' ) : ?>
								<div class="contact-wrapper">
									<span class="from6-icon icon-email-black"></span>
									<a class="contact <?php echo $contacts_font_weight.' '.$contact_color; ?>" href="mailto:<?php esc_html( the_sub_field('email_address') ); ?>" title="Email"><?php esc_html( the_sub_field('email_address') ); ?></a>
								</div>
								<?php
							endif;
						endwhile;
					endif; ?>
				</div>	
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
<!-- Contact Us Section End -->

	
	<!-- Map Section Start -->
	<section class="page">
		<div class="container-fluid">
			<div class="content row">
				
				<div class="col-12 col-md-12 no-padding" data-aos="fade-up">
					<div class="map">
    					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7157.459708790727!2d50.53423810601819!3d26.237965895180842!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6b81e648d4294982!2sFROM6+Communications!5e0!3m2!1sru!2sua!4v1534285237685" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen=""></iframe>
					</div>
				</div>
					
			</div>
		</div>
	</section>
	<!-- Map Section End -->

<?php get_footer();