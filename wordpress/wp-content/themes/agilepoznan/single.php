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

	// Include the single post content template.
	get_template_part( 'template-parts/content', 'single' );


endwhile;
?>


<?php get_footer(); ?>
