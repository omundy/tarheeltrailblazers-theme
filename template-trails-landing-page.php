<?php
/**
 * Template Name: Trails landing page
 * Template Post Type: page
 * Landing page for all trails
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' ); 

?>


<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <main class="site-main" id="main">

<?php

// get all the trails
$trails = om_get_all_trails();

// only proceed if trails are found
if (count($trails)){

    print '<div class="row">';

    // loop through all the trails
    foreach ($trails as $trail) {
        //print $trail->post_title . "<br>";

        // print "<pre>";
        // print_r($trail);
        // print "</pre>";

        // print col and card
        print '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">';
        print om_return_trail_card_html($trail);
        print '</div>';

     } // end foreach

    print '</div>';
}

?>



        </main><!-- #main -->

    <!-- Do the right sidebar check -->
    <?php /* get_template_part( 'global-templates/right-sidebar-check' );*/ ?>


</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>







