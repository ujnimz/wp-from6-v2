<?php
if( $wp_query->current_post % 2 ) :	$order = 0; else: $order = 1; endif;

$text_colors = get_field('text_colors', 'option');	
if( $text_colors ) :
	$text_primary_color = $text_colors['text_primary_color'];
	$body_copy_color = $text_colors['body_copy_color'];
endif;

$typography = get_field('typography', 'option');	
if( $typography ) :
	$main_heading_font_weight = $typography['main_heading_font_weight'];
	$body_copy_font_weight = $typography['body_copy_font_weight'];
endif;
 ?>
<!-- Blog Aside Start -->
<article id="post-<?php the_ID(); ?>" class="content row" data-aos="fade-up">
	<div class="col-12 col-lg-8 order-lg-<?php echo $order; ?>">
		<div class="blog-image from6-image"><a href="<?php the_permalink(); ?>" title=""><img class="img-fluid" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt=""></a></div>
	</div>

	<div class="col-12 col-lg-4 d-flex order-lg-0">
		<div class="blog-item align-self-center bree300">
			<h6 class="blog-title <?php echo $main_heading_font_weight.' '.$text_primary_color; ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
			
			<div class="editor-content <?php echo $body_copy_color.' '.$body_copy_font_weight; ?>">
				<?php the_field('post_excerpt'); ?>
			</div>

			<ul class="small">
				<?php foreach((get_the_category()) as $category) { echo '<li>' . $category->cat_name . '</li>'; } ?>
			</ul>
			<span class="blog-date"><?php the_date('Y/m/d'); ?></span>
			<div class="view-blog-item-wrapper">
				<a class="view-blog-item" href="<?php the_permalink(); ?>" title=""><?php the_field('button_text', get_option('page_for_posts')); ?> &#8594;</a>
			</div>
		</div>
	</div>	
</article>
<!-- Blog Aside End -->
