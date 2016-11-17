<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<?php
	$meeting["date"] = simple_fields_value("data")["date_time_format"];
	$meeting["speaker"] = simple_fields_value("imienazwisko");
	$meeting["company"] = simple_fields_value("firma");
	$meeting["avatar"] = simple_fields_value("avatar")["image_src"]["thumbnail"];
	$meeting["bio"] = simple_fields_value("bio");
	$is_meeting = !empty($meeting["date"]) && in_category("spotkania");
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

	<div class="post-content">
		<div class="container thin">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
		</div>
	</div>
<!--
	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer> -->
</article>
