<?php
get_header(); ?>

<?php
$first_meeting = array();
$second_meeting = array();
$meetings_category = 'spotkania';
$query = new WP_Query( array( 'category_name' => $meetings_category ) );
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
		$query->the_post();

        if ( count(simple_fields_value("data")) > 0 ) {
            if ( !count($first_meeting) ) {
                $first_meeting["date"] = simple_fields_value("data")["date_format"];
                $first_meeting["time"] = date("H:i", simple_fields_value("data")["date_unixtime"]);
                $first_meeting["place"] = simple_fields_value("miejsce");
                $first_meeting["address1"] = simple_fields_value("adres1");
                $first_meeting["address2"] = simple_fields_value("adres2");
                $first_meeting["speaker"] = simple_fields_value("imienazwisko");
                $first_meeting["company"] = simple_fields_value("firma");
                // http://simple-fields.com/documentation/field-types/file/
                $first_meeting["avatar"] = simple_fields_value("avatar")["image_src"]["thumbnail"];
                $first_meeting["title"] = get_the_title();
                $first_meeting["excerpt"] = get_the_excerpt();
                $first_meeting["permalink"] = get_permalink();
            } else if ( !count($second_meeting) ) {
                $second_meeting["date"] = simple_fields_value("data")["date_format"];
                $second_meeting["time"] = date("H:i", simple_fields_value("data")["date_unixtime"]);
                $second_meeting["place"] = simple_fields_value("miejsce");
                $second_meeting["address1"] = simple_fields_value("adres1");
                $second_meeting["address2"] = simple_fields_value("adres2");
                $second_meeting["speaker"] = simple_fields_value("imienazwisko");
                $second_meeting["company"] = simple_fields_value("firma");
                $second_meeting["avatar"] = simple_fields_value("avatar")["image_src"]["thumbnail"];
                $second_meeting["title"] = get_the_title();
                $second_meeting["excerpt"] = get_the_excerpt();
                $second_meeting["permalink"] = get_permalink();
            } else {
                break;
            }
        }
	}
	/* Restore original Post Data */
	wp_reset_postdata();
}
?>

<div class="cover-container container thin">
    <img src="<?php bloginfo('template_directory') ?>/img/paug_logo_text.png" alt="Agile Poznań" class="hidden-xs"/>
    <?php
    if ( count($first_meeting) ):
    ?>
        <div class="next-meeting-data">
            <p class="next-meeting-date">
                <span class="date"><?php echo $first_meeting["date"] ?></span> <?php echo $first_meeting["time"] ?>
            </p>
            <p class="next-meeting-place"><?php echo $first_meeting["place"] ?></p>
            <p class="next-meeting-place"><?php echo $first_meeting["address1"] ?></p>
            <p class="next-meeting-place"><?php echo $first_meeting["address2"] ?></p>
        </div>
    <?php
    endif;
    ?>

    <a href="https://www.meetup.com/Poznan-Agile-User-Group/" class="button button-light">Join our next meeting</a>
</div>

<div class="white-container">
    <div class="container clearfix">
        <h1>About PAUG</h1>
        <h2>What is it all about</h2>
        <img src="<?php bloginfo('template_directory') ?>/img/paug_logo_small.png" class="about-logo" alt="Agile Poznań"/>

        <p class="about-description">Poznań Agile User Group is dedicated to Lean & Agile Software Project and Development Management for a local Lean & Agile community in a city of Poznań, Poland.</p>
        <p>Feel free to join our next meeting or get in touch with us through LinkedIn group.</p>
    </div>
    <div class="container">
        <a href="https://www.linkedin.com/groups/4406793" class="button">Join LinkedIn Group</a>
    </div>
</div>
<?php
if ( count($first_meeting) ):
?>
<div class="border"></div>
<div class="white-container">
    <div class="container">
        <h1>Next meetup</h1>
        <h2>Check next meetup line-up and topic</h2>

        <div class="clearfix">
            <div class="speaker">
                <div class="speaker-avatar">
                    <img src="<?php echo $first_meeting["avatar"][0]; ?>" alt="">
                </div>
                <div class="speaker-details">
                    <p>
                        <span class="speaker-name"><?php echo $first_meeting["speaker"]; ?></span>
                        <span class="speaker-company"><?php echo $first_meeting["company"]; ?></span>
                    </p>
                </div>
            </div>
            <div class="presentation">
                <p class="presentation-title"><a href="<?php echo $first_meeting["permalink"]; ?>"><?php echo $first_meeting["title"]; ?></a></p>
                <p class="presentation-date"><?php echo $first_meeting["date"]; ?> <?php echo $first_meeting["time"]; ?></p>
                <div class="presentation-excerpt"><?php echo $first_meeting["excerpt"]; ?></div>
                <p class="presentation-read-more"><a href="<?php echo $first_meeting["permalink"]; ?>">Read more</a></p>
            </div>
        </div>
        <a href="https://www.meetup.com/Poznan-Agile-User-Group/" class="button">Join our next meeting</a>
    </div>
</div>
<?php
endif;
?>
<?php
if ( count($second_meeting) ):
?>
<div class="gray-container">
    <div class="container">
        <h1>Archive</h1>
        <h2>View materials from our previous meetings</h2>

        <div class="clearfix">
            <div class="speaker">
                <div class="speaker-avatar">
                    <img src="<?php echo $second_meeting["avatar"][0]; ?>" alt="">
                </div>
                <div class="speaker-details">
                    <p>
                        <span class="speaker-name"><?php echo $second_meeting["speaker"]; ?></span>
                        <span class="speaker-company"><?php echo $second_meeting["company"]; ?></span>
                    </p>
                </div>
            </div>
            <div class="presentation">
                <p class="presentation-title"><a href="<?php echo $second_meeting["permalink"]; ?>"><?php echo $second_meeting["title"]; ?></a></p>
                <p class="presentation-date"><?php echo $second_meeting["date"]; ?> <?php echo $second_meeting["time"]; ?></p>
                <div class="presentation-excerpt"><?php echo $second_meeting["excerpt"]; ?></div>
                <p class="presentation-read-more"><a href="<?php echo $first_meeting["permalink"]; ?>">Read more</a></p>
            </div>
        </div>
        <a href="<?php echo esc_url( get_category_link( get_cat_ID( $meetings_category ) ) ); ?>" class="button">View our archive</a>
    </div>
</div>
<?php
endif;
?>
<?php get_footer(); ?>
