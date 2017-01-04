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
	$meeting["speaker"] = simple_fields_value("imienazwisko");
	$meeting["company"] = simple_fields_value("firma");
	$meeting["avatar"] = simple_fields_value("avatar")["image_src"]["thumbnail"];
	$is_meeting = !empty($meeting["date"]) && in_category("spotkania");
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="list-item-container">
        <div class="container">
            <div class="clearfix">
            <div class="speaker">
                <div class="speaker-avatar">
                    <?php if ( $is_meeting ): ?>
                        <img src="<?php echo $meeting["avatar"][0]; ?>" alt="<?php echo $meeting["speaker"]; ?>">
                    <?php else:
                        echo get_avatar( get_the_author_meta( 'user_email' ), 200 );
                    endif; ?>
                </div>
                <div class="speaker-details">
                    <?php if ( $is_meeting ): ?>
                    <p>
                        <span class="speaker-name"><?php echo $meeting["speaker"]; ?></span>
                        <span class="speaker-company"><?php echo $meeting["company"]; ?></span>
                    </p>
                    <?php else: ?>
                    <p>
                        <span class="speaker-name"><?php echo get_the_author(); ?></span>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="presentation">
                <p class="presentation-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
                <?php if ( $is_meeting ): ?>
                    <p class="presentation-date"><?php echo $meeting["date"]; ?></p>
                <?php else: ?>
                    <p class="presentation-date"><?php echo get_the_date(); ?></p>
                <?php endif; ?>
                <div class="presentation-excerpt"><?php echo get_the_excerpt(); ?></div>
                <p class="presentation-read-more"><a href="<?php echo get_permalink(); ?>">Read more</a></p>
            </div>
        </div>
        </div>
    </div>
</article>
