<?php
/**
 *
 * @package Total
 */

if(get_theme_mod('total_team_section_disable') != 'on' ){ ?>
<section id="ht-team-section" class="ht-section">
	<div class="ht-container">
		<?php
		$total_team_title = get_theme_mod('total_team_title');
		if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
			$total_team_title = get_theme_mod('total_team_title_2');
		}
		$total_team_sub_title = get_theme_mod('total_team_sub_title');
		if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
			$total_team_sub_title = get_theme_mod('total_team_sub_title_2');
		}
		?>
		<?php if( $total_team_title || $total_team_sub_title ){ ?>
			<div class="ht-section-title-tagline">
				<?php if($total_team_title){ ?>
				<h2 class="ht-section-title"><?php echo ($total_team_title); ?></h2>
				<?php } ?>

				<?php if($total_team_sub_title){ ?>
				<div class="ht-section-tagline"><?php echo ($total_team_sub_title); ?></div>
				<?php } ?>
			</div>
		<?php } ?>

		<?php
		$total = 0;
		for( $i = 1; $i < 5; $i++ ) {
			$total_team_page_id = get_theme_mod('total_team_page' . $i);
			if($total_team_page_id){
				$total++;
			}
		}
		?>

		<div class="ht-team-member-wrap ht-team-member-wrap--<?= $total ?> ht-clearfix">
			<?php 
			for( $i = 1; $i < 5; $i++ ){
				$total_team_page_id = get_theme_mod('total_team_page'.$i); 
				$total_team_page_icon = get_theme_mod('total_team_page_icon'.$i);
			
				if($total_team_page_id){
					if(ICL_LANGUAGE_CODE !== 'en') {
						$args = array(
							'page_id' => apply_filters('wpml_object_id', absint($total_team_page_id), 'page', TRUE)
						);
					} else {
						$args = array(
							'page_id' => absint($total_team_page_id)
						);
					}
					$query = new WP_Query($args);
					if($query->have_posts()):
						while($query->have_posts()) : $query->the_post();
						$total_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'total-team-thumb');	
						$total_team_designation = get_theme_mod('total_team_designation'.$i);
						$total_team_facebook = get_theme_mod('total_team_facebook'.$i);
						$total_team_twitter = get_theme_mod('total_team_twitter'.$i);
						$total_team_google_plus = get_theme_mod('total_team_google_plus'.$i);
						$total_team_linkedin = get_theme_mod('total_team_linkedin'.$i);
						$total_team_instagram = get_theme_mod('total_team_instagram'.$i);
					?>

							<div class="ht-team-member">

								<div class="ht-team-member-image">
									<?php if( has_post_thumbnail() ){
										$image_url = $total_image[0];
									}else{
										$image_url = get_template_directory_uri().'/images/team-thumb.png';
									} ?>

									<img src="<?php echo esc_url($image_url);?>" alt="<?php the_title(); ?>" />
									<div class="ht-title-wrap">
									<h6><?php the_title(); ?></h6>
									</div>

									<div class="ht-team-member-excerpt">
										<div class="ht-team-member-excerpt-wrap">
										<div class="ht-team-member-span">
											<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

											<?php if($total_team_designation){ ?>
												<div class="ht-team-designation"><?php echo ($total_team_designation); ?></div>
											<?php }

											if(has_excerpt()){
												echo get_the_excerpt();
											}else{
												echo total_excerpt( get_the_content() , 100 );
											}
										?>
										<a href="<?php the_permalink(); ?>" class="ht-team-detail"><?php _e('Detail', 'total') ?></a>
										</div>
										</div>
									</div>
								</div>

							<?php if( $total_team_facebook || $total_team_twitter || $total_team_google_plus || $total_team_linkedin || $total_team_instagram ){ ?>
								<div class="ht-team-social-id">
									<?php if($total_team_facebook){ ?>
										<a target="_blank" href="<?php echo esc_url($total_team_facebook) ?>"><i class="fa fa-facebook"></i></a>
									<?php } ?>

									<?php if($total_team_twitter){ ?>
										<a target="_blank" href="<?php echo esc_url($total_team_twitter) ?>"><i class="fa fa-twitter"></i></a>
									<?php } ?>

									<?php if($total_team_google_plus){ ?>
										<a target="_blank" href="<?php echo esc_url($total_team_google_plus) ?>"><i class="fa fa-google-plus"></i></a>
									<?php } ?>

									<?php if($total_team_linkedin){ ?>
										<a target="_blank" href="<?php echo esc_url($total_team_linkedin) ?>"><i class="fa fa-linkedin"></i></a>
									<?php } ?>

									<?php if($total_team_instagram){ ?>
										<a target="_blank" href="<?php echo esc_url($total_team_instagram) ?>"><i class="fa fa-instagram"></i></a>
									<?php } ?>
								</div>
							<?php } ?>

							</div>
					
					<?php
					endwhile;
					endif;	
					wp_reset_postdata();
				}
			}
			?>
		</div>
	</div>
</section>
<?php }