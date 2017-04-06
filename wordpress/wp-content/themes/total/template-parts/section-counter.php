<?php
/**
 *
 * @package Total
 */

if(get_theme_mod('total_counter_section_disable') != 'on' ){ ?>
	<?php $total_counter_bg = get_theme_mod('total_counter_bg');
	if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
		$total_counter_bg = get_theme_mod('total_counter_bg_2');
	} ?>
<section id="ht-counter-section" data-stellar-background-ratio="0.5" style="background-image: url('<?= $total_counter_bg ?>');">
    <div class="ht-counter-section ht-section">
    	<div class="ht-container">
			<div class="ht-container-inner">
				<?php
				$total_counter_title = get_theme_mod('total_counter_title');
				if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
					$total_counter_title = get_theme_mod('total_counter_title_2');
				}
				$total_counter_sub_title = get_theme_mod('total_counter_sub_title');
				if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
					$total_counter_sub_title = get_theme_mod('total_counter_sub_title_2');
				}
				?>
				<?php
				if($total_counter_title || $total_counter_sub_title){
				?>
					<div class="ht-section-title-tagline">
						<?php if($total_counter_title){ ?>
						<h2 class="ht-section-title"><?php echo ($total_counter_title); ?></h2>
						<?php } ?>

						<?php if($total_counter_sub_title){ ?>
						<div class="ht-section-tagline"><?php echo ($total_counter_sub_title); ?></div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
    
    		<div class="ht-team-counter-wrap ht-clearfix">
    			<?php 
    			for( $i = 1; $i < 5; $i++ ){
    				$total_counter_title = get_theme_mod('total_counter_title'.$i); 
    				$total_counter_count = get_theme_mod('total_counter_count'.$i);
    				$total_counter_icon = get_theme_mod('total_counter_icon'.$i);
					if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE !== 'en'){
						$total_counter_title = get_theme_mod('total_counter_title_2'.$i);
						$total_counter_count = get_theme_mod('total_counter_count_2'.$i);
						$total_counter_icon = get_theme_mod('total_counter_icon_2'.$i);
					}
    				if($total_counter_count){
    					?>
    					<div class="ht-counter">
    						<div class="ht-counter-icon">
    							<i class="<?php echo esc_attr($total_counter_icon); ?>"></i>
    						</div>
    
    						<div class="ht-counter-count odometer odometer<?php echo $i; ?>" data-count="<?php echo absint($total_counter_count); ?>">
    							99
    						</div>
    
    						<h6 class="ht-counter-title">
    							<?php echo ($total_counter_title); ?>
    						</h6>
    					</div>
    					<?php
    				}
    			}
    			?>
    		</div>
    	</div>
    </div>
</section>
<?php }