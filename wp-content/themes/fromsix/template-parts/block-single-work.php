
<?php
$text_colors = get_field('text_colors', 'option');	
if( $text_colors ) :
	$text_primary_color = $text_colors['text_primary_color'];
	$text_secondary_color = $text_colors['text_secondary_color'];
	$body_copy_color = $text_colors['body_copy_color'];
endif;

$typography = get_field('typography', 'option');	
if( $typography ) :
	$main_heading_font_weight = $typography['main_heading_font_weight'];
	$body_copy_font_weight = $typography['body_copy_font_weight'];
endif; 	?>
<!-- Single Work Text Start -->
<section id="post-<?php the_ID(); ?>" class="desktop-jumbotron" data-aos="fade-up">
	<div class="container">
		<div class="content row">
			<div class="col-12 desktop-jumbotron">
				<main class="single-work">
					<h2 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>" data-aos="fade-up"><?php the_field('work_title'); ?><span class="<?php echo $text_secondary_color; ?>"><?php the_field('work_subtitle'); ?></span></h2>
					<ul class="<?php echo $body_copy_font_weight; ?>">
					<?php
						$terms = get_the_terms($post->ID, 'work-category');
						//var_dump($terms);
						foreach($terms as $term) : ?>
							<li><?php echo $term->name; ?></li> 
						<?php endforeach; ?>	
					</ul>
					
					<div class="editor-content <?php echo $body_copy_color.' '.$body_copy_font_weight; ?>">
						<?php the_field('work_description'); ?>
					</div>
			
					<!-- Scroll down indicator -->
					<div class="d-none d-sm-block">
						<div class="indicator">
							<div class="l-section-top">
							  <div class="c-scrolldown">
								<div class="c-line-b"></div>
							  </div>
							</div>
						</div>
					</div>
				</main>
			</div>
		</div>
		
	</div>
</section>
<!-- Single Work Text End -->

<?php
if( have_rows('work_blocks') ): ?>
<!-- Single Work Section Start -->
<section class="page">
	<div class="container">	
		<!-- Work layout: List Start -->
		<div id="work-item-list" class="work-item-layout">
			<?php while ( have_rows('work_blocks') ) : the_row(); 
				 if( get_row_layout() == 'image' ): ?>
					<div class="row" data-aos="fade-up">
						<div class="col-12 col-md-12">
							<div class="single-work-item">
								<?php $image = get_sub_field('upload_image'); ?>
								<div class="from6-image"><img class="img-fluid" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_html( $image['alt'] ); ?>"></div>
								<?php if( get_sub_field('image_description') ) : ?>
									<div class="single-work-caption align-self-center <?php echo $body_copy_font_weight; ?>">
										<?php the_sub_field('image_description'); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>	
					</div>
				<?php 
				elseif( get_row_layout() == 'video' ): ?>
					<div class="row" data-aos="fade-up">
						<div class="col-12 col-md-12">
							<div class="single-work-item">
								<?php $image = get_sub_field('upload_image'); ?>
								<div class="videoWrapper">
									<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php esc_html( the_sub_field('youtube_video_id') ); ?>?controls=0&rel=0&autoplay=<?php $image = get_sub_field('auto_play'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
						</div>	
					</div>
				<?php 
				endif;
			endwhile; ?>
		</div>
		<!-- Work layout: List End -->
		
	</div>
</section>
<!-- Single Work Section End -->
<?php endif; ?>

<?php
$works_miscellaneous = get_field('works_miscellaneous', 'option');	
if ( $works_miscellaneous ) : 
	if ( $works_miscellaneous['social_share_on_works'] ) :?>
<!-- Social Share Start -->
<section class="page" data-aos="fade-up">
	<div class="container">
		<div class="row">
			
			<div class="col-12">
				<div class="blog-social-share">
					<p class="<?php echo $body_copy_color.' '.$body_copy_font_weight; ?>"><?php echo esc_html( $works_miscellaneous['social_share_title'] ); ?></p>
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