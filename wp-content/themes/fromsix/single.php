<?php
/**
 * The main template file single.php
 *
 * @link https:from6.com
 *
 * @package WordPress
 * @subpackage Fromsix
 * @since 1.0
 * @version 1.0
 */
get_header();

// Blog posts
if( have_posts() ):
	while( have_posts() ): the_post();
		get_template_part( 'template-parts/block-single-blog' );
	endwhile; 
endif;

// Related Posts Block
$blog_miscellaneous = get_field('blog_miscellaneous', 'option');	
if ( $blog_miscellaneous ) : 
	if ( $blog_miscellaneous['related_posts'] ) :
	get_template_part( 'template-parts/block-related-posts' );
	endif;
endif;

get_footer();