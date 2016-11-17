<?php
get_header(); ?>

<div class="main-content">
		<?php
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			/*if ( comments_open() || get_comments_number() ) {
				comments_template();
			}*/

		endwhile;
		?>


	<?php //get_sidebar( 'content-bottom' ); ?>

</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
