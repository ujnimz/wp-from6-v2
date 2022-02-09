<?php
$typography = get_field('typography', 'option');	
if( $typography ) :
	$footer_font_weight = $typography['footer_font_weight'];
endif;

$text_colors = get_field('text_colors', 'option');	
if( $text_colors ) :
	$footer_text_color = $text_colors['footer_text_color'];
endif;
?>

<!-- Footer Start -->
	<footer class="footer bg-white">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 order-1 order-md-0">
        			<p class="<?php echo esc_html( $footer_font_weight.' '.$footer_text_color ); ?>"><?php print( htmlspecialchars_decode( get_field('copyright_text', 'option') ) ); ?></p>
				</div>
				<div class="col-12 col-md-6 order-0 order-md-1">
					<?php
						$social_links = get_field('social_links', 'option');
						if ( !empty($social_links) ) :
					?>
					<ul class="from6-social float-left float-md-right">
						<?php if( $social_links['facebook_url'] ) : ?>
                    		<li><a class="from6-icon icon-facebook" href="<?php print( esc_url( $social_links['facebook_url'] ) ); ?>" title="Facebook" target="_blank">Facebook</a></li>
						<?php endif; if( $social_links['twitter_url'] ) : ?>
                    		<li><a class="from6-icon icon-twitter" href="<?php print( esc_url( $social_links['twitter_url'] ) ); ?>" title="Twitter" target="_blank">Twitter</a></li>
						<?php endif; if( $social_links['instagram_url'] ) : ?>
							<li><a class="from6-icon icon-instagram" href="<?php print( esc_url( $social_links['instagram_url'] ) ); ?>" title="Twitter" target="_blank">Twitter</a></li>
						<?php endif; if( $social_links['linkedin_url'] ) : ?>
						<li><a class="from6-icon icon-linkedin" href="<?php print( esc_url( $social_links['linkedin_url'] ) ); ?>" title="LinkedIn" target="_blank">LinkedIn</a></li>
						<?php endif; ?>
					</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
    </footer>
	<!-- Footer End -->
	
	<?php
		$social_links = get_field('mobile_footer', 'option');
		if ( !empty($social_links) ) :
	?>
	<!-- Mobile Only Fixed Footer Start -->
	<div id="mobile-footer" class="d-xl-none d-lg-none bg-orange">
		<div class="row no-gutters shortcut-container">
			<?php if( $social_links['mobile_footer_tel'] ) : ?>
				<div class="col"><a class="from6-icon icon-phone" href="tel:<?php print( esc_html( $social_links['mobile_footer_tel'] ) ); ?>">Call</a></div>
			<?php endif; if( $social_links['mobile_footer_email'] ) : ?>
				<div class="col"><a class="from6-icon icon-email" href="mailto:<?php print( sanitize_email( $social_links['mobile_footer_email'] ) ); ?>">Email</a></div>
			<?php endif; if( $social_links['mobile_footer_map'] ) : ?>
          		<div class="col"><a class="from6-icon icon-map" href="<?php print( esc_url( $social_links['mobile_footer_map'] ) ); ?>" target="_blank">Map</a></div>
			<?php endif; ?>
          <!--<div class="col"><a class="from6-icon icon-clock" href="#">Time</a></div>-->
        </div>
	</div>
	<!-- Mobile Only Fixed Footer End -->
	<?php endif; ?>

</div>	

<div id="preloader">
	<div id="status">
		<div class="spinner">
		  <div class="dot1"></div>
		  <div class="dot2"></div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>