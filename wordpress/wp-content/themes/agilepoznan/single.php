<?php
get_header(); ?>

<?php
while ( have_posts() ) : the_post();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	get_template_part( 'template-parts/content', get_post_format() );
	?>
</article>
<?php
endwhile;
?>

<?php get_footer(); ?>
