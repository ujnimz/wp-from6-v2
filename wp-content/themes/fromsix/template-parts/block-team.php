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
<!-- Our Team Section Start -->
<section class="page">
	<div class="container">
		<?php
			// Team header start
			$team_header = get_field('team_header');
			if ($team_header) : ?>
				<h1 class="<?php echo $main_heading_font_weight.' '.$text_primary_color; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php echo esc_html( $team_header['title'] ); ?></h1>
				<h2 class="rustico <?php echo $subtitle_color; ?>" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><?php echo esc_html( $team_header['subtitle'] ); ?></h2>
		
				<div class="content row" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
					<div class="col-12 col-md-12">
						<div class="editor-content <?php echo $body_copy_color.' '.$body_copy_font_weight; ?>">
							<?php echo $team_header['description']; ?>
						</div>
					</div>
				</div>
		
				<div class="content row" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
					<div class="col-12 col-md-12">
						<div class="image from6-image"><img class="img-fluid" src="<?php echo esc_url( $team_header['team_image']['url'] ); ?>" alt="<?php echo esc_html( $team_header['team_image']['alt'] ); ?>"></div>
					</div>
				</div>
			<?php 
			endif;

			// Partners block start
			if ( have_rows( 'partners_team' ) ) : 
				while ( have_rows( 'partners_team' ) ) : the_row(); 
		 		$partners_cols = get_sub_field( 'columns' ); ?>
				<!-- Partners -->
				<div class="content row" data-aos="fade-up">
				<?php 
					if( have_rows( have_rows( 'partner' ) ) ): 
						while ( have_rows( 'partner' ) ) : the_row(); ?>
							<div class="col-12 col-md-<?php echo $partners_cols;	?>">
								<div class="partner">
									<?php $partner_image = get_sub_field( 'image' ); ?>
									<div class="team-image from6-image"><img class="img-fluid" src="<?php echo esc_url( $partner_image['url'] ); ?>" alt="<?php echo esc_html( $partner_image['alt'] ); ?>"></div>
									<div class="team-details">
										<p class="bree400"><?php the_sub_field('name'); ?></p>
										<p class="bree300 small"><?php the_sub_field('designation'); ?></p>
									</div>
								</div>
							</div>
							<?php 
						endwhile;
					else : ?>
							<div class="alert alert-warning" role="alert">
								<?php _e( 'Sorry, no partners found!' ); ?>
							</div>
						<?php
					endif; ?>
				</div>
				<?php 
				endwhile;
			endif; 

			// Full team block start
			if ( have_rows( 'full_team' ) ) : 
				while ( have_rows( 'full_team' ) ) : the_row(); ?>
				<!-- All Team -->
				<div class="content row" data-aos="fade-up">
				<?php 
					if( have_rows( have_rows( 'team_member' ) ) ): 
						while ( have_rows( 'team_member' ) ) : the_row(); ?>
							<div class="col-6 col-md-3" data-aos="zoom-in" data-aos-anchor-placement="bottom-bottom">
								<div class="team-member">
									<?php $member_image = get_sub_field( 'image' ); ?>
									<div class="team-image from6-image"><img class="img-fluid" src="<?php echo esc_url( $member_image['url'] ); ?>" alt="<?php echo esc_html( $member_image['alt'] ); ?>"></div>
									<div class="team-overlay">
										<div class="team-overlay-details">
											<p class="bree400"><?php the_sub_field('name'); ?></p>
											<p class="bree300 small"><?php the_sub_field('designation'); ?></p>
										</div>
									</div>
								</div>
							</div>
							<?php
						endwhile;
					else : ?>
							<div class="alert alert-warning" role="alert">
								<?php _e( 'Sorry, no team members found!' ); ?>
							</div>
						<?php
					endif; ?>	
			</div>
		<?php
		endwhile;
	endif; ?>	
	</div>
</section>
<!-- Our Team Section End -->