<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div class="main-content">
	<section class="error-404 not-found">
		<header class="post-header">
			<div class="container">
				<h1 class="post-title">Ooops! Nie znaleziono tej strony.</h1>
			</div>
		</header>

		<div class="post-content">
			<div class="container thin">
				<p>Wygląda na to, że nic nie znaleziono pod tym adresem. Może wypróbujesz wyszukiwarkę?</p>

				<?php get_search_form(); ?>
			</div>
		</div>
	</section>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
