<?php
/**
 *
 * @package Total
 */
 ?>

<div id="ht-home-slider-section">
	<div id="ht-bx-slider">
	<?php

	for ($i=1; $i < 4; $i++) {  
		$total_slider_page_id = get_theme_mod( 'total_slider_page'.$i );

		if($total_slider_page_id){
			if(ICL_LANGUAGE_CODE !== 'en') {
				$args = array(
					'page_id' => apply_filters('wpml_object_id', absint($total_slider_page_id), 'page', TRUE)
				);
			} else {
				$args = array(
					'page_id' => absint($total_slider_page_id)
				);
			}

			$query = new WP_Query($args);
			if( $query->have_posts() ):
				while($query->have_posts()) : $query->the_post();

				if(has_post_thumbnail()){
					$total_slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
					echo '<div class="ht-slide ht-slide--cover" style="background-image: url(' . esc_url($total_slider_image[0]) . ')">';
					echo '<img src="' . esc_url($total_slider_image[0]) . '" alt="' . esc_html(get_the_title()) . '" />';
				} else {
					if($i > 1){
						echo '<div class="ht-slide" style="display: none;">';
					} else {
						echo '<div class="ht-slide">';
					}
				}
				?>

					<div class="ht-slide-caption">
						<div class="ht-slide-caption-inner">
							<div class="ht-slide-cap-title animated fadeInDown">
								<span><?php echo get_the_title(); ?></span>
							</div>

							<div class="ht-slide-cap-desc animated fadeInDown">
								<?php echo get_the_content_with_formatting(); ?>
							</div>
						</div>
					</div>
				</div>
				<?php
				endwhile;
			endif;
		}
	} ?>
	</div>
</div>