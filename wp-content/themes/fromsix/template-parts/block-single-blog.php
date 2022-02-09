<?php
$text_colors = get_field('text_colors', 'option');	
if( $text_colors ) :
	$text_primary_color = $text_colors['text_primary_color'];
	$subtitle_color = $text_colors['subtitle_color'];
	$body_copy_color = $text_colors['body_copy_color'];
endif;

$typography = get_field('typography', 'option');	
if( $typography ) :
	$main_heading_font_weight = $typography['main_heading_font_weight'];
	$body_copy_font_weight = $typography['body_copy_font_weight'];
endif; 	?>
<!-- Blog Single Start -->
<section class="page" data-aos="fade-up">
	<div class="container">
		<article id="post-<?php the_ID(); ?>">
			<h1 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>"><?php the_title(); ?></h1>
			<div class="meta-info bree300">
				<span class="post-date-time">Posted on <time datetime="<?php the_time('c') ?>"><?php the_time('F j, Y') ?></time></span>
				<span class="post-author-name">By <?php the_author_posts_link(); ?></span>
			</div>

			<div class="content row">
				<div class="col-12 col-md-12">
					<div class="image from6-image"><img class="img-fluid" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true); ?>"></div>
				</div>
			</div>			

			<div class="content row">
				<div class="col-12 col-md-12">
					<div class="editor-content <?php echo $body_copy_color.' '.$body_copy_font_weight; ?>">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
	<!-- Blog Single End -->

<?php
$blog_miscellaneous = get_field('blog_miscellaneous', 'option');	
if ( $blog_miscellaneous ) : 
	if ( $blog_miscellaneous['social_share_on_posts'] ) :?>
		<!-- Social Share Start -->
		<section class="page" data-aos="fade-up">
			<div class="container">
				<div class="row">
					
					<div class="col-12">
						<div class="blog-social-share">
							<p class="<?php echo $body_copy_color.' '.$body_copy_font_weight; ?>"><?php echo esc_html( $blog_miscellaneous['social_share_title'] ); ?></p>
							<ul class="from6-social">
								<li><a class="from6-icon icon-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">Share on Facebook</a></li>
								<li><a class="from6-icon icon-twitter" href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank">Share on Twitter</a></li>
								<li><a class="from6-icon icon-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php the_field('post_excerpt'); ?>&source=">Share on LinkedIn</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!-- Social Share End -->
		<?php
	endif;
endif;