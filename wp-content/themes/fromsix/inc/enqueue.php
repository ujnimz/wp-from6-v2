<?php
/**
 * The main template file enqueue.php
 *
 * This is a custom WordPress theme developed by Ujith Nimantha
 * Developed for From6 Communications W.L.L. - Kingdom of Bahrain.
 * HTML Design and development by Ujith Nimantha
 * 2018
 * @link https://from6.com/
 *
 * @package WordPress (Version 4.9.8)
 * @subpackage fromsix
 * @since 1.0
 * @version 1.0
 */

// Admin CSS
function from6_load_admin_scripts( $hook ) {
  wp_register_style( 'from6-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'from6-admin' );
}

add_action( 'admin_enqueue_scripts', 'from6_load_admin_scripts' );

// Public  Scripts
function fromsix_load_scripts() {
	// css
	wp_enqueue_style( 'fromsix-bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css', array(), '4.1.3' );
	wp_enqueue_style( 'fromsix-en-fonts-css', get_template_directory_uri() . '/assets/css/en-fonts.css', array(), '1.0' );
	wp_enqueue_style( 'fromsix-style-nav-css', get_template_directory_uri() . '/assets/css/style-nav.css', array(), '1.0' );
	wp_enqueue_style( 'fromsix-icons-css', get_template_directory_uri() . '/assets/css/icons.css', array(), '1.0' );
	wp_enqueue_style( 'fromsix-base-css', get_template_directory_uri() . '/assets/css/base.css', array(), '1.0' );
	wp_enqueue_style( 'fromsix-aos-css', get_template_directory_uri() . '/assets/css/aos/aos.css', array(), '1.0' );
	
	// header query
	// wp_enqueue_script( 'fromsix-modernizr-js', get_template_directory_uri() . '/js/modernizr.js', array(), '1.0' );
	
	// footer query
	wp_enqueue_script( 'fromsix-jquery-js-321', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js', array(), '3.2.1' );
	//wp_enqueue_script( 'fromsix-jquery-js', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.11.2', 'true' );
	wp_enqueue_script( 'fromsix-bootstrap-popper-js', get_template_directory_uri() . '/assets/js/bootstrap/popper.min.js', array(), '4.1.3', 'true' );
	wp_enqueue_script( 'fromsix-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js', array(), '4.1.3', 'true' );
	if( is_front_page() ) :
		wp_enqueue_script( 'fromsix-bcswipe-js', get_template_directory_uri() . '/assets/js/jquery.bcSwipe.min.js', array(), '1.0', 'true' );
	endif;
	wp_enqueue_script( 'fromsix-modernizr-custom-js', get_template_directory_uri() . '/assets/js/modernizr.custom.js', array(), '1.0', 'true' );
	wp_enqueue_script( 'fromsix-classie-js', get_template_directory_uri() . '/assets/js/classie.js', array(), '1.0', 'true' );
	wp_enqueue_script( 'fromsix-borderMenu-js', get_template_directory_uri() . '/assets/js/borderMenu.js', array(), '1.0', 'true' );
	//wp_enqueue_script( 'fromsix-text-ticker-js', get_template_directory_uri() . '/assets/js/text-ticker.js', array(), '1.0', 'true' );
	//wp_enqueue_script( 'fromsix-vidbg-min-js', get_template_directory_uri() . '/assets/js/vidbg.min.js', array(), '1.0', 'true' );
	//if ( is_page_template('page-works.php') ) :
    wp_enqueue_script('isotope-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), '1.0', 'true');
  //endif;
	wp_enqueue_script( 'fromsix-aos-js', get_template_directory_uri() . '/assets/js/aos/aos.js', array(), '1.0', 'true' );
}

add_action( 'wp_enqueue_scripts', 'fromsix_load_scripts' );

// isotope js for Works grid
function isotope_script_footer(){ 
	if ( is_page_template('page-works.php') ) :	?>
	<script>
		AOS.init(); /* INITIALIZE AOS */
	
		/* Loading Page */
		$(window).on('load', function() { // makes sure the whole site is loaded 
	  		$('#status').fadeOut(); // will first fade out the loading animation 
	  		$('#preloader').delay(400).fadeOut('slow'); // will fade out the white DIV that covers the website. 
	  		$('body').delay(400).css({'overflow':'visible'});
		});
		/* isotope */
		$('.grid').isotope({
			itemSelector: '.grid-item',
		});
		// filter items on button click
		$('.filter-button-group').on( 'click', 'li', function() {
			var filterValue = $(this).attr('data-filter');
			console.log(filterValue);
			$('.grid').isotope({ filter: filterValue });
			$('.filter-button-group li').removeClass('active-work');
			$(this).addClass('active-work');
		});
	</script>
	<?php endif; 
	if( is_front_page() ) : ?>
		<script>
		jQuery(document).ready(function() {	
			AOS.init(); /* INITIALIZE AOS Animations */

			// Bootstrap Slider Mobile Swipe
			$('.carousel').bcSwipe({ threshold: 50 });

			// Page loading
			$(window).on('load', function() { // makes sure the whole site is loaded 
		  		$('#status').fadeOut(2000); // will first fade out the loading animation 
		  		$('#preloader').delay(2000).fadeOut(2000); // will fade out the white DIV that covers the website. 
		  		$('body').delay(2000).css({'overflow':'visible'});
			});
	
			// Bootstrap slider settings
			$('.carousel').carousel({
		    	interval: 3000,
		    	cycle: true,
		    	pause: "null"
			});

			/* // Intro Text Effect
			$('#text-fade').list_ticker({
				speed:4000,
				effect:'fade'
			});
			$('#text-slide').list_ticker({
				speed:4000,
				effect:'slide'
			});	*/

			$('#text-slide').delay(3000).fadeIn(2000);
	
			// Scroll effects
			$(window).scroll(function() {
				var windowHeight = $(window).height() - 50;

				if ( $(this).scrollTop()>200 ) {
					$('.indicator').hide(1000);
					$('.intro-text').fadeOut(500);
				 }
				else {
				    $('.indicator').show(1000);
					$('.intro-text').fadeIn(500);
				 }
				
				if ( $(this).scrollTop() > windowHeight ) {
					$('#bt-menu-trigger').removeClass('white-trigger');
					$('#bt-menu').addClass('mo-bg-white');
				} else {
					$('#bt-menu-trigger').addClass('white-trigger');
					$('#bt-menu').removeClass('mo-bg-white');
				}
			});	
		});
		</script>
	<?php elseif ( !is_page_template('page-works.php') ) : ?>
		<script>
		jQuery(document).ready(function() {
			AOS.init(); /* INITIALIZE AOS */
	
			/* Loading Page */
			$(window).on('load', function() { // makes sure the whole site is loaded 
		  		$('#status').fadeOut(); // will first fade out the loading animation 
		  		$('#preloader').delay(400).fadeOut('slow'); // will fade out the white DIV that covers the website. 
		  		$('body').delay(400).css({'overflow':'visible'});
			});

			// Scroll effects
			$(window).scroll(function() {
				var windowHeight = $(window).height() - 50;

				if ( $(this).scrollTop()>200 ) {
					$('.indicator').hide(1000);
				 }
				else {
				    $('.indicator').show(1000);
				 }
			});
		});
		</script>
	<?php endif;
} 

add_action('wp_footer', 'isotope_script_footer', 20);



// Admin  Scripts
function fromsix_load_admin_scripts( $hook ) {
	if( 'toplevel_page_fromsix_options' != $hook ) {
		return;
	}
	wp_register_style( 'fromsix_admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'fromsix_admin' );
}

add_action( 'admin_enqueue_scripts', 'fromsix_load_admin_scripts' );