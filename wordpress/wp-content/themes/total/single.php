<?php
/**
 * The template for displaying all single posts.
 *
 * @package Total
 */

get_header(); ?>

<?php
if ( has_post_format( 'image' ) && has_post_thumbnail()) {
	echo '<header class="ht-main-header bg-thumbnail" style="background-image: url(' . get_the_post_thumbnail_url(null, 'header-image') . ');">';
} else {
	echo '<header class="ht-main-header">';
}
?>

	<div class="ht-container">
		<div class="make-bg">
			<?php the_title( '<h1 class="ht-main-title">', '</h1>' ); ?>
			<?php do_action( 'total_breadcrumbs' ); ?>
		</div>
	</div>
</header><!-- .entry-header -->

<div class="ht-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>


			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div>

<?php get_footer(); 