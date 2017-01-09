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
	$is_meeting = !empty($meeting["date"]) && in_category("spotkania");
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="list-item-container">
        <div class="container">
            <div class="clearfix">
                <div class="speakers">
                    <?php if ( $is_meeting ): ?>
                        <?php for($i = 0; $i < count($meeting["speaker"]); $i++) {
                            $speaker = $meeting["speaker"][$i];
                            $company = $meeting["company"][$i];
                            $avatar = $meeting["avatar"][$i];
                        ?>
                            <div class="speaker">
                                <div class="speaker-avatar">
                                    <img src="<?php echo $avatar["image_src"]["thumbnail"][0]; ?>" alt="<?php echo $speaker; ?>">
                                </div>
                                <div class="speaker-details">
                                    <p>
                                        <span class="speaker-name"><?php echo $speaker; ?></span>
                                        <span class="speaker-company"><?php echo $company; ?></span>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    <?php else: ?>
                        <div class="speaker">
                            <div class="speaker-avatar">
                                <?php echo get_avatar( get_the_author_meta( 'user_email' ), 150 ); ?>
                            </div>
                            <div class="speaker-details">
                                <p><span class="speaker-name"><?php echo get_the_author(); ?></span></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="presentation">
                    <p class="presentation-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
                    <?php if ( $is_meeting ): ?>
                        <p class="presentation-date"><?php echo $meeting["date"]; ?></p>
                    <?php else: ?>
                        <p class="presentation-date"><?php echo get_the_date(); ?></p>
                    <?php endif; ?>
                    <div class="presentation-excerpt"><?php echo get_the_excerpt(); ?></div>
                    <p class="presentation-read-more"><a href="<?php echo get_permalink(); ?>">Czytaj dalej</a></p>
                </div>
            </div>
        </div>
    </div>
</article>
