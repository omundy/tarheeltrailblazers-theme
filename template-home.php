<?php
/**
 * Template Name: Home
 * Template Post Type: page
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
get_header();
$container = get_theme_mod('understrap_container_type');
?>




<?php require_once('sections/home-heros.php') ?>







<!-- Section: News -->
<?php include(get_theme_file_path() . '/sections/section-news.php'); ?>


<!-- Section: Donate Callout -->
<?php include(get_theme_file_path() . '/sections/section-callout-donate-orange.php'); ?>

<!-- Section: Trail status -->
<?php include(get_theme_file_path() . '/sections/section-trail-status.php'); ?>

<!-- Section: Support circles -->
<?php include(get_theme_file_path() . '/sections/section-support-circles.php'); ?>


<!-- Section: Events -->
<?php include(get_theme_file_path() . '/sections/section-events-full.php'); ?>

<!-- Section: Data -->
<?php include(get_theme_file_path() . '/sections/section-data.php'); ?>

<div class="green-line"></div>

<!-- Section: Data -->
<?php include(get_theme_file_path() . '/sections/section-callout-email-signup.php'); ?>






<?php if (is_front_page() && is_home()) : ?>
		<?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>



<?php get_footer(); ?>
