<?php
/**
 * The main template file index.php
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https:from6.com
 *
 * @package WordPress
 * @subpackage Fromsix
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!-- Header Text Section Start -->
	<section class="page" data-aos="fade-up">
		<div class="container">
			<main>
				<h1 class="bree700"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></h1>
				<h2 class="rustico"><?php esc_html( the_field('sub_title', get_option('page_for_posts') ) ); ?></h2>

				<div class="content row">
					<div class="col-12 col-md-12">
						<div class="editor-content bree300">
							<?php esc_html( the_field('page_description', get_option('page_for_posts') ) ); ?>
						</div>
					</div>
				</div>
			</main>
		</div>
	</section>
	<!-- Header Text Section End -->
	
	<!-- Header Image Start -->
	<section class="page" data-aos="fade-up">
		<div class="container-fluid">
			<div class="content row">
				<div class="col-12 col-md-12">
					<div class="image from6-image">
						<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); ?>
						<img class="img-fluid" src="<?php echo esc_url( $img[0] ); ?>" alt="From6 Blog">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Header Image End -->
	
	<!-- Blog Section Start -->
	<section class="page">
		<div class="container">
			<main id="blog-list" class="blog-layout"> 
			<?php
				if( have_posts() ):
					while( have_posts() ): the_post();
						/* Include the Post-Format-specific template for the content.
						* If you want to overload this in a child theme then include a file
						* called content-___.php (where ___ is the Post Format name) and    that will be used instead.
						*/
						get_template_part( 'template-parts/blog-item' );
					endwhile; 
				endif; 
			?>
			</main>
		</div>
	</section>

<?php

if ( is_front_page() ) :
    get_footer( 'home' );
else:
    get_footer();
endif;
