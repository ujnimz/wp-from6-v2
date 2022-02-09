<?php
/**
 * The main template file single-work.php
 *
 * @link https:from6.com
 *
 * @package WordPress
 * @subpackage Fromsix
 * @since 1.0
 * @version 1.0
 */
get_header(); 

// Single Work Block
if( have_posts() ):
	while( have_posts() ): the_post();
		get_template_part( 'template-parts/block-single-work' );
	endwhile; 
endif;

// Related Works Block
$works_miscellaneous = get_field('works_miscellaneous', 'option');	
if ( $works_miscellaneous ) : 
	if ( $works_miscellaneous['related_works'] ) :
	get_template_part( 'template-parts/block-related-works' );
	endif;
endif;

// Footer CTA Block
$works_miscellaneous = get_field('works_miscellaneous', 'option');	
if ( $works_miscellaneous ) : 
	if ( $works_miscellaneous['single_work_cta'] ) :
		get_template_part( 'template-parts/work-footer-cta' );
	endif;
endif;

get_footer();
