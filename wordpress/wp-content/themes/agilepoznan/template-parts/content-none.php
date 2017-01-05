<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<section class="no-results not-found">
	<header class="post-header">
		<div class="container">
			<h1 class="post-title">Nie znaleziono nic</h1>
		</div>
	</header>

	<div class="post-content">
		<div class="container thin">
			<p>Przepraszamy, ale nie znaleziono nic. Spróbuj wyszukać używając słów kluczowych.</p>
			<?php get_search_form(); ?>
		</div>
	</div>
</section>
