<?php
/**
 *
 * @package Total
 */

if(get_theme_mod('total_featured_section_disable') != 'on' ){ ?>
<section id="ht-featured-post-section" class="ht-section">
	<div class="ht-container">
	<?php
	$total_featured_title = get_theme_mod('total_featured_title');
	if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
		$total_featured_title = get_theme_mod('total_featured_title_2');
	}
	$total_featured_sub_title = get_theme_mod('total_featured_sub_title');
	if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
		$total_featured_sub_title = get_theme_mod('total_featured_sub_title_2');
	}
	?>
		<?php 
		if($total_featured_title || $total_featured_sub_title){
			?>
			<div class="ht-section-title-tagline">
			<?php
			if($total_featured_title){ ?>
			<h2 class="ht-section-title">
				<?php echo ($total_featured_title); ?>
			</h2>
			<?php } ?>

			<?php if($total_featured_sub_title){ ?>
			<div class="ht-section-tagline"><?php echo ($total_featured_sub_title); ?></div>
			<?php } ?>
			</div>
		<?php } ?>

		<div class="ht-featured-post-wrap ht-clearfix">
			<?php 
			for( $i = 1; $i < 4; $i++ ){
				$total_featured_page_id = get_theme_mod('total_featured_page'.$i); 
				$total_featured_page_icon = get_theme_mod('total_featured_page_icon'.$i);
			
			if($total_featured_page_id){
				if(ICL_LANGUAGE_CODE !== 'en') {
					$args = array(
						'page_id' => apply_filters('wpml_object_id', absint($total_featured_page_id), 'page', TRUE)
					);
				} else {
					$args = array(
						'page_id' => absint($total_featured_page_id)
					);
				}
				$query = new WP_Query($args);
				if( $query->have_posts() ):
					while($query->have_posts()) : $query->the_post();
				?>
					<div class="ht-featured-post">
						<?php if(has_post_thumbnail()){ ?>
							<div class="ht-featured-icon ht-featured-icon--thumbnail"><?php echo get_the_post_thumbnail(null, 'featured-thumb'); ?></div>
						<?php } else { ?>
							<div class="ht-featured-icon"><i class="<?php echo esc_attr($total_featured_page_icon); ?>"></i></div>
						<?php } ?>
						<div class="watch">
							<h5><?php the_title(); ?></h5>
							<div class="ht-featured-excerpt">
							<?php
							if(has_excerpt()){
								echo get_the_excerpt();
							}else{
								echo total_excerpt( get_the_content(), 130);
							}?>
							</div>
						</div>
						<div class="ht-featured-link">
							<a href="<?php echo esc_url(get_permalink()); ?>"><?php _e( 'Read More', 'total' ); ?></a>
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
</section>
<?php }