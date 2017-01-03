<?php
get_header(); ?>

	<div class="main-content">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<!--<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>-->
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', 'meeting' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>