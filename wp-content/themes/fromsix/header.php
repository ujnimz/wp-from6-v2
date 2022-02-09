<?php
/**
 * The main template file header.php
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

$typography = get_field('typography', 'option');	
if( $typography ) :
	$main_menu_font_weight = $typography['main_menu_font_weight'];
endif;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<!-- Required meta tags -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
$favicon = get_field('favicon', 'option');
	if( !empty($favicon) ): ?>
<link rel="shortcut icon" href="<?php echo esc_url( $favicon['url'] ); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo esc_url( $favicon['url'] ); ?>" type="image/x-icon">
<?php endif; ?>
<?php wp_head(); ?>
	
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

</head>
<body class="full-page">
<div class="container-fluid no-padding">
	<!-- Header Start -->
	<header>
		<?php
			$website_logo = get_field('website_logo', 'option');
			if( !empty($website_logo) ):
		?>
			<a class="navbar-brand from6-logo" href="<?php echo site_url(); ?>" title="home"><img src="<?php echo esc_url( $website_logo['url'] ); ?>" alt="<?php echo $website_logo['alt']; ?>"></a>
		<?php
			endif;
		?>
	<nav id="bt-menu" class="bt-menu">
		<a href="#" id="bt-menu-trigger" class="bt-menu-trigger <?php if ( is_front_page() ) : echo 'white-trigger'; endif; ?>"><span>Menu</span></a>
		<?php
			wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'ul', 'menu_class' => $main_menu_font_weight ) );
		?>
	</nav>
		
	</header>
	<!-- Header End -->