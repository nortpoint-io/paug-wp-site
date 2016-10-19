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
	$meeting["speaker"] = simple_fields_value("imienazwisko");
	$meeting["company"] = simple_fields_value("firma");
	$meeting["avatar"] = simple_fields_value("avatar")["image_src"]["thumbnail"];
	$meeting["bio"] = simple_fields_value("bio");
	$is_meeting = !empty($meeting["date"]) && in_category("spotkania");
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<div class="container">
			<?php the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<?php if ( $is_meeting ): ?>
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
	<?php if ( ( get_the_author_meta( 'description' ) && !$is_meeting) || ($meeting['bio'] && $is_meeting) ): ?>
	<div class="gray-container">
		<div class="container">
			<div class="clearfix">
				<div class="speaker">
					<div class="speaker-avatar">
						<?php if ( $is_meeting ): ?>
							<img src="<?php echo $meeting["avatar"][0]; ?>" alt="">
						<?php else: ?>
							<?php
							echo get_avatar( get_the_author_meta( 'user_email' ), 200 );
							?>
						<?php endif; ?>
					</div>
					<div class="speaker-details">
						<p>
							<?php if ( $is_meeting ): ?>
								<span class="speaker-name"><?php echo $meeting["speaker"]; ?></span>
								<span class="speaker-company"><?php echo $meeting["company"]; ?></span>
							<?php else: ?>
								<span class="speaker-name"><?php echo get_the_author(); ?></span>
							<?php endif; ?>
						</p>
					</div>
				</div>
				<div class="presentation">
					<p class="presentation-title">Bio</p>
					<div class="presentation-excerpt">
						<?php if ( $is_meeting ): ?>
							<?php echo $meeting["bio"]; ?>
						<?php else: ?>
							<?php echo get_the_author_meta( 'description' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</article>
<?php
endwhile;
?>

<?php get_footer(); ?>
