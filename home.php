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


<div class="carousel slide" data-pause="hover" data-ride="carousel" id="carouselExampleIndicators">
	<ol class="carousel-indicators">
		<li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
		<li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
		<li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
	</ol>

  <div class="carousel-inner header">
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






<?php 
include(get_theme_file_path() . '/sections/section-trail-status.php'); 
// include(get_theme_file_path() . '/sections/section-trail-status-dynamic.php'); 
?>





<div class="container-fluid participate">
<div class="container">
<div class="row">
<div class="col">
<h4>Support mountain biking in the Charlotte region</h4>
</div>
</div>

<div class="row">
<div class="col-5 col-lg-3 offset-1 offset-lg-0"><img alt="Workers Working" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/workers.png" />
<p>Volunteer</p>
</div>

<div class="col-5 col-lg-3"><img alt="First Person Biker" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bike-handle.png" />
<p>Become a member</p>
</div>

<div class="col-5 col-lg-3 offset-1 offset-lg-0"><img alt="Workers with Bike" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/fix-bike.png" />
<p>Join a meeting</p>
</div>

<div class="col-5 col-lg-3"><img alt="Workers Posing" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/workers-donation.png" />
<p>Make a donation</p>
</div>
</div>

<div class="row d-flex justify-content-center mb-3"><button class="btn btn-outline-light darknavitem" type="button">GET INVOLVED</button></div>

<div class="row"></div>
</div>
</div>





<?php include(get_theme_file_path() . '/sections/section-events-full.php'); ?>





<div class="container-fluid data">
<div class="container pb-2 pb-sm-4 pt-5">
<div class="row align-top">
<div class="col-lg-3 col-6 text-center">
<h1>434</h1>
&nbsp;

<h4>Active Members</h4>
</div>

<div class="col-lg-3 col-6 text-center">
<h1>174</h1>
&nbsp;

<h4>Miles of Trails</h4>
</div>

<div class="col-lg-3 col-6 text-center xl">
<h1 class="xl">11,021</h1>
&nbsp;

<h4>Volunteer Hours<br />
Last Year</h4>
</div>

<div class="col-lg-3 col-6 text-center normal">
<h1 class="xl">11,021</h1>
&nbsp;

<h4>Volunteer Hours Last Year</h4>
</div>

<div class="col-lg-3 col-6 text-center">
<h1 class="xl">1,315</h1>
&nbsp;

<h4>Acres of Land<br />
Protected for Trails</h4>
</div>
</div>
</div>
</div>

<div class="green-line extra"></div>
<!--Callout-->

<div class="containter-fluid signup-callout pt-3 pb-3" id="signup-callout">
<div class="container">
<div class="row text-center">
<div class="col-12"><span class="darknavitem mt-1 mr-2">Stay up to date about trail work days and events!</span> <input class="mt-1 mr-2 extra" maxlength="25" minlength="5" name="bodysignup" pattern="[a-zA-Z0-9]+@." required="" type="text" value="EMAIL ADDRESS" /><button class="btn btn-primary orange rounded-0" name="signup" type="button">SIGN-UP</button></div>
</div>
</div>
</div>
<!--News-->


<?php include(get_theme_file_path() . '/sections/section-news.php'); ?>



<div class="row mt-4">
<div class="col-12 text-center"><button class="btn btn-outline-light darknavitem mb-2 mb-lg-0 pl-2 pr-2" type="button">MORE NEWS</button></div>
</div>
</div>
</div>

<?php if (is_front_page() && is_home()) : ?>
    <?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>













<?php get_footer(); ?>
