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

<?php if (is_front_page() && is_home()) : ?>
    <?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>





<?php


//get_usnwc_status();


// get all the trails
$trails = get_all_trails();
//var_dump($trails);

// print "<pre>";
// print_r($trails);
// print "</pre>";

if (count($trails)){

?>

<div class="wrapper">
   <div class="container">

   		<?php 

   		foreach ($trails as $trail) {
		  //print $trail->post_title . "<br>";

			// print "<pre>";
			// print_r($trails);
			// print "</pre>";
   		
   		?>

        <div class="row mb-2">
            <div class="col-12">
            	
            	<?php

				$id = $trail->ID;
				$trailStatus = returnTrailStatus($id);


				$trailStatusArr = array(
					'status' => $trailStatus,
					'id' => $id,
					'slug' => $trail->post_name,
					'title' => $trail->post_title
				);

				// print "<pre>";
				// print_r($trailStatusArr);
				// print "</pre>";

				print returnTrailStatusTiny($trailStatusArr);

            	?>

            </div>
        </div>

        <?php } ?>

    </div>
</div>

<?php } ?>






<?php get_footer(); ?>


