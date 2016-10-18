<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <link href="https://fonts.googleapis.com/css?family=Cardo|Josefin+Sans" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$first_meeting = array();
$query = new WP_Query( array( 'category_name' => 'spotkania' ) );
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
		$query->the_post();

        if ( count(simple_fields_value("data")) > 0 ) {
		    $first_meeting["date"] = simple_fields_value("data")["date_format"];
            $first_meeting["place"] = simple_fields_value("miejsce");
            $first_meeting["address1"] = simple_fields_value("adres1");
            $first_meeting["address2"] = simple_fields_value("adres2");
            $first_meeting["speaker"] = simple_fields_value("imienazwisko");
            $first_meeting["company"] = simple_fields_value("firma");
            $first_meeting["avatar"] = simple_fields_value("avatar")["image_src"]["thumbnail"];
            break;
        }
	}
	/* Restore original Post Data */
	wp_reset_postdata();
}
?>

<div class="cover-container container">
    <h1>Poznań Agile<br>User Group</h1>
    <?php
    if ( count($first_meeting) ):
    ?>
        <div class="next-meeting-data">
            <p class="next-meeting-date"><?php echo $first_meeting["date"] ?></p>
            <p><?php echo $first_meeting["place"] ?></p>
            <p><?php echo $first_meeting["address1"] ?></p>
            <p><?php echo $first_meeting["address2"] ?></p>
        </div>
    <?php
    endif;
    ?>

    <a href="#">Join our next meeting</a>
</div>

<div class="white-container">
    <div class="container">
        <h1>About PAUG</h1>
        <h2>What is it all about</h2>
        <p>Poznań Agile User Group is dedicated to Lean & Agile Software Project and Development Management for a local Lean & Agile community in a city of Poznań, Poland.</p>
        <p>Feel free to join our next meeting or get in touch with us through LinkedIn group.</p>

        <a href="#" class="button">Join LinkedIn Group</a>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
