<?php
/**
 * Template Name: Home
 * Template Post Type: page
 */
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
get_header();
$container   = get_theme_mod('understrap_container_type');
?>


<div class="carousel slide" data-pause="hover" data-ride="carousel" id="carouselExampleIndicators">
	<ol class="carousel-indicators">
		<li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
		<li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
		<li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
	</ol>

  <div class="carousel-inner header">
    <div class="carousel-item pics active"><img alt="Biker In Nature" class="img-fluid img-c" src="<?php echo get_stylesheet_directory_uri(); ?>/img/hero_bike_two.jpg" />
      <div class="card card-one offset-2 col-8 offset-md-3 col-md-6 offset-lg-4 col-lg-4">
        <div class="row">
          <div class="green-line extra-news"></div>

          <div class="card-body">
            <h5 class="card-title">Plan Your Ride</h5>

            <p class="card-text">With over 150 miles of trail across 18 systems, we&#39;ve got a trail for you.</p>
            <button onclick="location.href='/trails'" class="btn btn-outline-light darknavitem" type="button">VIEW MORE TRAILS</button>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel-item pics"><img alt="Volunteer Working" class="img-fluid img-c" src="<?php echo get_stylesheet_directory_uri(); ?>/img/hero_work_one.jpg" />
      <div class="card card-one offset-2 col-8 offset-md-3 col-md-6 offset-lg-4 col-lg-4">
        <div class="row">
          <div class="green-line extra-news"></div>

          <div class="card-body">
            <h5 class="card-title">Get Dirty</h5>

            <p class="card-text">Find a local ride, come dig with us, or get the latest updates at our monthly meeting.</p>
            <button onclick="location.href='/events'" class="btn btn-outline-light darknavitem" type="button">VIEW MORE EVENTS</button>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel-item pics"><img alt="Biker Jumping" class="img-fluid img-c" src="<?php echo get_stylesheet_directory_uri(); ?>/img/hero_bike_one.jpg" />
      <div class="card card-one offset-2 col-8 offset-md-3 col-md-6 offset-lg-4 col-lg-4">
        <div class="row">
          <div class="green-line extra-news"></div>

          <div class="card-body">
            <h5 class="card-title">Get Flow</h5>

            <p class="card-text">Cedar Valley Bike Park is the newest addition to the Fisher Farm Trail system, and currently offers two miles of jumps, flow, and more jumps.</p>
            <button onclick="location.href='/trails'" class="btn btn-outline-light darknavitem" type="button">VIEW MORE TRAILS</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<!--<div class="carousel-inner header">
  <div class="carousel-item pics active"><img alt="Biker In Nature" class="img-fluid img-c" src="<?php echo get_stylesheet_directory_uri(); ?>/img/hero_bike_two.jpg" />
    <div class="card card-one">
      <div class="green-line extra-news"></div>

      <div class="card-body">
        <h5 class="card-title">Plan Your Ride</h5>

        <p class="card-text">With over 150 miles of trail across 18 systems, we&#39;ve got a trail for you.</p>
        <button class="btn btn-outline-light darknavitem" type="button">VIEW MORE TRAILS</button>
      </div>
    </div>
  </div>

  <div class="carousel-item pics"><img alt="Volunteer Working" class="img-fluid img-c" src="<?php echo get_stylesheet_directory_uri(); ?>/img/hero_work_one.jpg" />
    <div class="card card-one">
      <div class="green-line extra-news"></div>

      <div class="card-body">
        <h5 class="card-title">Get Dirty</h5>

        <p class="card-text">Find a local ride, come dig with us, or get the latest updates at our monthly meeting.</p>
        <button class="btn btn-outline-light darknavitem" type="button">VIEW MORE EVENTS</button>
      </div>
    </div>
  </div>

  <div class="carousel-item pics"><img alt="Biker Jumping" class="img-fluid img-c" src="<?php echo get_stylesheet_directory_uri(); ?>/img/hero_bike_one.jpg" />
    <div class="card card-one">
      <div class="green-line extra-news"></div>

      <div class="card-body">
        <h5 class="card-title">Get Flow</h5>

        <p class="card-text">Cedar Valley Bike Park is the newest addition to the Fisher Farm Trail system, and currently offers two miles of jumps, flow, and more jumps.</p>
        <button class="btn btn-outline-light darknavitem" type="button">VIEW MORE TRAILS</button>
      </div>
    </div>
  </div>
</div>-->

</div>






<!-- Section: Donate Callout -->
<?php include(get_theme_file_path() . '/sections/section-callout-donate-orange'); ?>

<!-- Section: Trail status -->
<?php include(get_theme_file_path() . '/sections/section-trail-status.php'); ?>

<!-- Section: Support circles -->
<?php include(get_theme_file_path() . '/sections/section-support-circles.php'); ?>


<!-- Section: Events -->
<?php include(get_theme_file_path() . '/sections/section-events-full.php'); ?>

<!-- Section: Data -->
<?php include(get_theme_file_path() . '/sections/section-data.php'); ?>

<div class="green-line extra"></div>

<!-- Section: Data -->
<?php include(get_theme_file_path() . '/sections/section-callout-email-signup.php'); ?>

<!-- Section: News -->
<?php include(get_theme_file_path() . '/sections/section-news.php'); ?>






<?php if (is_front_page() && is_home()) : ?>
    <?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>



<?php get_footer(); ?>
