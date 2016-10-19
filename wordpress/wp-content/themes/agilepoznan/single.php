<?php
get_header(); ?>

<?php
while ( have_posts() ) : the_post();
	if ( is_singular( 'post' ) ) {
		// Previous/next post navigation.
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
				'<span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
				'<span class="post-title">%title</span>',
		) );
	}

	$meeting["date"] = simple_fields_value("data")["date_time_format"];
	$meeting["place"] = simple_fields_value("miejsce");
	$meeting["address1"] = simple_fields_value("adres1");
	$meeting["address2"] = simple_fields_value("adres2");
	$meeting["speaker"] = simple_fields_value("imienazwisko");
	$meeting["company"] = simple_fields_value("firma");
	$meeting["avatar"] = simple_fields_value("avatar")["image_src"]["thumbnail"];
	$meeting["title"] = get_the_title();
	$meeting["excerpt"] = get_the_excerpt();
	$meeting["permalink"] = get_permalink();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<div class="container">
			<?php the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<?php if ( $meeting['speaker'] ): ?>
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
			<?php the_content(); ?>
		</div>
	</div>
</article>
<?php
	// Include the single post content template.
	//get_template_part( 'template-parts/content', 'single' );


endwhile;
?>


<?php get_footer(); ?>
