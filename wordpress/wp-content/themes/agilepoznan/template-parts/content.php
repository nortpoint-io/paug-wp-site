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
	$meeting["speaker"] = simple_fields_values("imienazwisko");
	$meeting["company"] = simple_fields_values("firma");
	$meeting["avatar"] = simple_fields_values("avatar");
	$meeting["bio"] = simple_fields_values("bio");
	$is_meeting = !empty($meeting["date"]) && in_category("spotkania");
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<div class="container">
			<?php the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<?php if ( $is_meeting ): ?>
			<p class="post-author">
				<?php
					$first = true;
					foreach ($meeting['speaker'] as $speaker) {
						if (!$first) echo ", ";
						$first = false;
						echo $speaker;
					}
				?>
				- <?php echo $meeting['date']; ?></p>
			<?php else: ?>
			<p class="post-author"><?php echo get_the_author(); ?> - <?php echo get_the_date(); ?></p>
			<?php endif; ?>
		</div>
	</header>
	<?php
	if ( is_singular( 'post' ) ) {
		// Previous/next post navigation.
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">Następny</span> ' .
				'<span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">Poprzedni</span> ' .
				'<span class="post-title">%title</span>',
		) );
	}
	?>

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
	<?php if ( is_singular( 'post' ) ):?>
		<?php if ( ( get_the_author_meta( 'description' ) && !$is_meeting)) { ?>
			<div class="gray-container">
				<div class="container">
					<div class="clearfix">
						<div class="speaker">
							<div class="speaker-avatar">
								<?php
								echo get_avatar( get_the_author_meta( 'user_email' ), 150 );
								?>
							</div>
							<div class="speaker-details">
								<p>
									<span class="speaker-name"><?php echo get_the_author(); ?></span>
								</p>
							</div>
						</div>
						<div class="presentation">
							<p class="presentation-title">Bio</p>
							<div class="presentation-excerpt">
								<?php echo get_the_author_meta( 'description' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		} else {
			for($i = 0; $i < count($meeting["speaker"]); $i++) {
				$bio = $meeting["bio"][$i];
				$speaker = $meeting["speaker"][$i];
				$company = $meeting["company"][$i];
				$avatar = $meeting["avatar"][$i];

				if ($bio) { ?>
					<div class="gray-container">
						<div class="container">
							<div class="clearfix">
								<div class="speaker">
									<div class="speaker-avatar">
										<img src="<?php echo $avatar["image_src"]["thumbnail"][0]; ?>" alt="">
									</div>
									<div class="speaker-details">
										<p>
											<span class="speaker-name"><?php echo $speaker; ?></span>
											<span class="speaker-company"><?php echo $company; ?></span>
										</p>
									</div>
								</div>
								<div class="presentation">
									<p class="presentation-title">Bio</p>
									<div class="presentation-excerpt">
										<?php echo $bio; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
			}
		}

		// Previous/next post navigation.
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">Następny</span> ' .
				'<span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">Poprzedni</span> ' .
				'<span class="post-title">%title</span>',
		) );
	 endif; ?>

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
