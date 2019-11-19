<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
get_header();
$container   = get_theme_mod('understrap_container_type');
?>


<div class="container-fluid callout">
<div class="container pt-3 pb-3">
<div class="row">
<div class="col-lg-8 col-12 col-xs-10 offset-0 offset-xs-1 offset-lg-0 mb-lg-0 mb-2 pt-lg-2 pt-0 align-middle">
<p class="mb-0">Help the Tarheel Trailblazers build and maintain trails in your community!</p>
</div>

<div class="col-lg-4 col-12 text-center"><button class="btn btn-outline-light darknavitem" type="button">DONATE</button></div>
</div>
</div>
</div>





<div class="container-fluid trail-status">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-4">
<ul>
	<li class="unavailable"><span class="trail-name">Anne Springs</span> <span class="time-info">7/16-7:17 am</span></li>
	<li class="available"><span class="trail-name">Backyard Trails</span> <span class="time-info">8/23-10:57 am</span></li>
	<li class="unavailable"><span class="trail-name">Ballantyne District Park</span> <span class="time-info">8/23-10:57 am</span></li>
	<li class="questionable"><span class="trail-name">Big Leaf Slopes Park</span> <span class="time-info">8/23-10:58 am</span></li>
	<li class="available"><span class="trail-name">Cedar Valley Bike Park</span> <span class="time-info">8/29-5:31 am</span></li>
	<li class="available"><span class="trail-name">Col. Francis Beatty Park</span> <span class="time-info">8/23-10:58 am</span></li>
	<li class="available"><span class="trail-name">Fisher Farm Park</span> <span class="time-info">8/16-7:17 am</span></li>
	<li class="available"><span class="trail-name">Harrisburg Half</span> <span class="time-info">8/23-10:59 am</span></li>
</ul>
</div>

<div class="col-lg-4">
<ul>
	<li class="available"><span class="trail-name">Huntersville Elem. School </span> <span class="time-info">7/16-7:17 am</span></li>
	<li class="available"><span class="trail-name">Jetton Park</span> <span class="time-info">8/23-10:57 am</span></li>
	<li class="available"><span class="trail-name">Lake Norman State Park</span> <span class="time-info">8/23-10:57 am</span></li>
	<li class="available"><span class="trail-name">Mazeppa Park</span> <span class="time-info">8/23-10:58 am</span></li>
	<li class="questionable"><span class="trail-name">Mountain Island Park</span> <span class="time-info">8/29-5:31 am</span></li>
	<li class="unavailable"><span class="trail-name">North Mecklenburg Park</span> <span class="time-info">8/23-10:58 am</span></li>
	<li class="available"><span class="trail-name">Park Road Park</span> <span class="time-info">8/16-7:17 am</span></li>
	<li class="unavailable"><span class="trail-name">Purser Hulsey Park</span> <span class="time-info">8/23-10:59 am</span></li>
</ul>
</div>

<div class="col-lg-4">
<ul>
	<li class="unavailable"><span class="trail-name">Renaissance Park</span> <span class="time-info">7/16-7:17 am</span></li>
	<li class="available"><span class="trail-name">Rocky Branch Trail</span> <span class="time-info">8/23-10:57 am</span></li>
	<li class="unavailable"><span class="trail-name">Rocky River Trail</span> <span class="time-info">8/23-10:57 am</span></li>
	<li class="questionable"><span class="trail-name">Sherman Branch</span> <span class="time-info">8/23-10:58 am</span></li>
	<li class="available"><span class="trail-name">Signal Hill</span> <span class="time-info">8/29-5:31 am</span></li>
	<li class="available"><span class="trail-name">Southwest District Park</span> <span class="time-info">8/23-10:58 am</span></li>
	<li class="available"><span class="trail-name">USNWC</span> <span class="time-info">8/16-7:17 am</span></li>
	<li class="available"><span class="trail-name">Uwharrie</span> <span class="time-info">8/23-10:59 am</span></li>
</ul>
</div>
</div>

</div>
</div>



<?php if (is_front_page() && is_home()) : ?>
    <?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>








<?php include('trail-status-blake.php'); ?>





<?php get_footer(); ?>
