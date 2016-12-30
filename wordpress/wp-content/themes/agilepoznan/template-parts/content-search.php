<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<div class="container">
			<?php the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<?php if ( $is_meeting ): ?>
			<p class="post-author"><?php echo $meeting['speaker']; ?> - <?php echo $meeting['date']; ?></p>
			<?php else: ?>
			<p class="post-author"><?php echo get_the_author(); ?></p>
			<?php endif; ?>
		</div>
	</header>

	<?php if ( has_excerpt() ): ?>
		<div class="post-summary">
			<div class="container thin">
				<?php the_excerpt(); ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( has_post_thumbnail() ): ?>
		<div class="post-thumbnail">
			<div class="container">
				<?php the_post_thumbnail(); ?>
			</div>
		</div>
	<?php endif; ?>

</article>

