<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<section class="no-results not-found">
	<header class="post-header">
		<div class="container">
			<h1 class="post-title"><?php _e( 'Nothing Found', 'twentysixteen' ); ?></h1>
		</div>
	</header>

	<div class="post-content">
		<div class="container thin">
			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentysixteen' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
</section>
