<?php
/**
 * Template Name: Trail status (mobile) (trailbot)
 * Template Post Type: page
 * Slimmed down page with trail status only
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' ); 

?>


<!-- Section: Donate Callout -->
<?php include(get_theme_file_path() . '/sections/section-callout-donate-orange.php'); ?>

<!-- Section: Trail status -->
<?php include(get_theme_file_path() . '/sections/section-trail-status-trailbot.php'); ?>


<?php get_footer(); ?>







