<?php
/**
 *
 * @package Total
 */

if(get_theme_mod('total_service_section_disable') != 'on' ){ ?>
<section id="ht-service-post-section" class="ht-section">
	<?php $total_service_left_bg = get_theme_mod('total_service_left_bg');
	if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
		$total_service_left_bg = get_theme_mod('total_service_left_bg_2');
	} ?>

	<div class="ht-service-left-bg" style="background-image: url('<?= $total_service_left_bg ?>')"></div>

	<div class="ht-container">
		<div class="ht-service-posts ht-clearfix">
			<?php
			$total_service_title = get_theme_mod('total_service_title');
			if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
				$total_service_title = get_theme_mod('total_service_title_2');
			}
			$total_service_sub_title = get_theme_mod('total_service_sub_title');
			if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
				$total_service_sub_title = get_theme_mod('total_service_sub_title_2');
			}
			?>
			<?php 
			if($total_service_title || $total_service_sub_title){
			?>
				<div class="ht-section-title-tagline">
				<?php if($total_service_title){ ?>
				<h2 class="ht-section-title"><?php echo ($total_service_title); ?></h2>
				<?php } ?>

				<?php if($total_service_sub_title){ ?>
				<div class="ht-section-tagline"><?php echo ($total_service_sub_title); ?></div>
				<?php } ?>
				</div>
			<?php } ?>

			<div class="ht-service-post-wrap">
				<?php 
				for( $i = 1; $i < 7; $i++ ){
					$total_service_page_id = get_theme_mod('total_service_page'.$i); 
					$total_service_page_icon = get_theme_mod('total_service_page_icon'.$i);
				
					if($total_service_page_id){
						if(ICL_LANGUAGE_CODE !== 'en') {
							$args = array(
								'page_id' => apply_filters('wpml_object_id', absint($total_service_page_id), 'page', TRUE)
							);
						} else {
							$args = array(
								'page_id' => absint($total_service_page_id)
							);
						}
						$query = new WP_Query($args);
						if($query->have_posts()):
							while($query->have_posts()) : $query->the_post();
						?>
							<div class="ht-service-post ht-clearfix">
								<div class="ht-service-icon"><i class="<?php echo esc_attr($total_service_page_icon); ?>"></i></div>
								<div class="ht-service-excerpt">
									<h5><?php the_title(); ?></h5>
									<div class="ht-service-text">
									<?php 
										if(has_excerpt()){
											echo get_the_excerpt();
										}else{
											echo total_excerpt( get_the_content(), 100);
										}
									 ?>
									 <br/>
									 <a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'total' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
									 </div>
								</div>
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
	</div>
</section>
<?php }