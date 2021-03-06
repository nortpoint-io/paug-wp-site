<?php
get_header(); ?>

	<div class="main-content">

		<?php if ( have_posts() ) : ?>
<!--
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>-->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'index' /*get_post_format()*/ );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => 'Poprzednia strona' /*__( 'Previous page', 'twentysixteen' )*/,
				'next_text'          =>  'Następna strona' /*__( 'Next page', 'twentysixteen' )*/,
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . 'Strona' /*__( 'Page', 'twentysixteen' )*/ . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
