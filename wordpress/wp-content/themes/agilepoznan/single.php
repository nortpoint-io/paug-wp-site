<?php
get_header(); ?>

<?php
while ( have_posts() ) : the_post();
?>
<div class="main-content">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		get_template_part( 'template-parts/content', get_post_format() );
		?>
	</article>
</div>
<?php
endwhile;
?>

<?php get_footer(); ?>
