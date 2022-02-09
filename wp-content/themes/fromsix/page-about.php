<?php
/*
 * Template Name: About Page
 *
 * The main template file page-about.php
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

// Team block
if ( get_field('enable_team') ) : 
	get_template_part( 'template-parts/block-team' );
endif; 

// Clientle block
if ( get_field('enable_clientle') ) :
	get_template_part( 'template-parts/block-clientle' );
endif; 

// Page footer
if( get_field('enable_footer_cta') ):
	get_template_part( 'template-parts/page-footer-cta' ); 
endif;

get_footer();