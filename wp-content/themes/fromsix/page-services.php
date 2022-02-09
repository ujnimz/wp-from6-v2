<?php
/*
 * Template Name: Services Page
 *
 * The main template file page-services.php
 *
 * @link https:from6.com
 *
 * @package WordPress
 * @subpackage Fromsix
 * @since 1.0
 * @version 1.0
 */
get_header(); 

// Page header
if( get_field('enable_header') ):
	$header_template = get_field('header_style');
	get_template_part( 'template-parts/'.$header_template );
endif; 
	
// Services block
if ( get_field('enable_services') ) : 
	get_template_part( 'template-parts/block-services-list' );
endif; 

// Page footer
if( get_field('enable_footer_cta') ):
	get_template_part( 'template-parts/page-footer-cta' ); 
endif;

get_footer();