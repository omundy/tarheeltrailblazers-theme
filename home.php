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
		<div class="carousel-item pics active"><img alt="Biker In Nature" class="img-fluid img-c" src="/img/3-home/section-events/Itusi-Trail_PC-color.png" />
			<div class="card card-one">
				<div class="green-line extra-news"></div>

				<div class="card-body">
					<h5 class="card-title">Plan Your Ride</h5>

					<p class="card-text">With over 150 miles of trail across 18 systems, we&#39;ve got a trail for you.</p>
					<button class="btn btn-outline-light darknavitem" type="button">VIEW MORE TRAILS</button>
				</div>
			</div>
		</div>

		<div class="carousel-item pics"><img alt="Volunteer Working" class="img-fluid img-c" src="/img/work_one.jpeg" />
			<div class="card card-one">
				<div class="green-line extra-news"></div>

				<div class="card-body">
					<h5 class="card-title">Get Dirty</h5>

					<p class="card-text">Find a local ride, come dig with us, or get the latest updates at our monthly meeting.</p>
					<button class="btn btn-outline-light darknavitem" type="button">VIEW MORE EVENTS</button>
				</div>
			</div>
		</div>

		<div class="carousel-item pics"><img alt="Biker Jumping" class="img-fluid img-c" src="/img/bike_one.jpeg" />
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


<div class="container-fluid participate">
<div class="container">
<div class="row">
<div class="col">
<h4>Support mountain biking in the Charlotte region</h4>
</div>
</div>

<div class="row">
<div class="col-5 col-lg-3 offset-1 offset-lg-0"><img alt="Workers Working" class="img-fluid" src="./img/workers.png" />
<p>Volunteer</p>
</div>

<div class="col-5 col-lg-3"><img alt="First Person Biker" class="img-fluid" src="./img/bike-handle.png" />
<p>Become a member</p>
</div>

<div class="col-5 col-lg-3 offset-1 offset-lg-0"><img alt="Workers with Bike" class="img-fluid" src="./img/fix-bike.png" />
<p>Join a meeting</p>
</div>

<div class="col-5 col-lg-3"><img alt="Workers Posing" class="img-fluid" src="./img/workers-donation.png" />
<p>Make a donation</p>
</div>
</div>

<div class="row d-flex justify-content-center mb-3"><button class="btn btn-outline-light darknavitem" type="button">GET INVOLVED</button></div>

<div class="row"></div>
</div>
</div>


<div class="container-fluid section-events" id="section-events">
<div class="container pt-5">
<div class="row mt-5">
<div class="col-10 col-md-8 col-lg-5 col-xl-4 offset-1 offset-md-2 offset-lg-7 offset-xl-8">
<div class="card section-event-card">
<div class="dark-green-line"></div>

<div class="card-body">
<h5 class="card-title text-center">Tarheel Trailblazer Events</h5>

<p class="card-text"></p>

<div class="row event">
<div class="col-2 date text-center mb-4 pr-0 pl-0 mt-1">
<h4>01</h4>

<p>SEP</p>
</div>

<div class="col-10 adress">
<p>Mountain island Lake Trail Workday</p>

<p class="mb-0">400 Mountain Island Rd., Mt. Holly, NC</p>
</div>
</div>

<div class="row event">
<div class="col-2 date text-center mb-4 pr-0 pl-0 mt-1">
<h4>01</h4>

<p>SEP</p>
</div>

<div class="col-10 adress">
<p>Mountain island Lake Trail Workday</p>

<p class="mb-0">North Mecklenburg Park, Huntersville, NC</p>
</div>
</div>

<div class="row event">
<div class="col-2 date text-center pr-0 pl-0 mt-1">
<h4>04</h4>

<p>SEP</p>
</div>

<div class="col-10 adress">
<p>Club Meeting</p>

<p class="mb-0">NC Velo, Charlotte, NC</p>
</div>
</div>

<div class="row d-flex justify-content-center"><button class="btn btn-outline-light dark rounded-0 mt-4" name="allevents" type="button">SEE ALL EVENTS</button></div>
</div>
</div>
</div>
</div>
</div>
</div>


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

<div class="container-fluid news pt-4 pb-4 justify-content-center" id="news">
<div class="container">
<div class="row extra-news justify-content-center">
<div class="col">
<div class="card card-two pb-2" style="width: 100%; height:100%"><img alt="become a member" class="card-img-top" src="./img/3-home/news/become-a-member/Layer-19-color.png" />
<div class="card-body text-center">
<div style="height: 65%;">
<p class="card-text text-left">We have a new logo and gear!</p>
</div>

<div class="mt-2" style="height:35%;"><a class="btn btn-primary orange" href="#">READ MORE</a></div>
</div>
</div>
</div>

<div class="col">
<div class="card card-two pb-2" style="width: 100%; height:100%"><img alt="give monthly" class="card-img-top" src="./img/3-home/news/give-monthly/Layer-20-color.jpg" />
<div class="card-body text-center">
<div style="height: 65%;">
<p class="card-text text-left">The rain has missed us so far. Kids ride is still on for Purser Hulsey.</p>
</div>

<div class="mt-2" style="height:35%;"><a class="btn btn-primary orange" href="#">READ MORE</a></div>
</div>
</div>
</div>

<div class="col">
<div class="card card-two pb-2" style="width: 100%; height:100%"><img alt="volunteer" class="card-img-top" src="./img/3-home/news/volunteer/Layer-21-color.png" />
<div class="card-body text-center">
<div style="height: 65%;">
<p class="card-text text-left">The rain has missed us so far. Kids ride is still on for Purser Hulsey.</p>
</div>

<div class="mt-2" style="height:35%;"><a class="btn btn-primary orange" href="#">READ MORE</a></div>
</div>
</div>
</div>
</div>

<div class="row small-news">
<div class="carousel slide" data-ride="carousel" id="carouselNewsControls">
<div class="carousel-inner small-news">
<div class="carousel-item active">
<div class="justify-content-center" style="width:100%;">
<div class="card card-two" style="max-width: 45%; min-height:20rem;"><img alt="become a member" class="card-img-top" src="./img/3-home/news/become-a-member/Layer-19-color.png" />
<div class="card-body text-center">
<div style="height: 65%;">
<p class="card-text text-left">We have a new logo and gear!</p>
</div>

<div class="mt-2" style="height:35%;"><a class="btn btn-primary orange" href="#">READ MORE</a></div>
</div>
</div>
</div>
</div>

<div class="carousel-item justify-content-center">
<div class="justify-content-center" style="width: 100% !important;">
<div class="card card-two" style="max-width: 45%;"><img alt="give monthly" class="card-img-top" src="./img/3-home/news/give-monthly/Layer-20-color.jpg" />
<div class="card-body text-center">
<div style="height: 65%;">
<p class="card-text text-left">The rain has missed us so far. Kids ride is still on for Purser Hulsey.</p>
</div>

<div class="mt-2" style="height:35%;"><a class="btn btn-primary orange" href="#">READ MORE</a></div>
</div>
</div>
</div>
</div>

<div class="carousel-item">
<div class="card card-two" style="max-width: 45%; min-height:20rem;"><img alt="volunteer" class="card-img-top" src="./img/3-home/news/volunteer/Layer-21-color.png" />
<div class="card-body">
<p class="card-text">The rain has missed us so far. Kids ride is still on for Purser Hulsey.</p>
<a class="btn btn-primary orange" href="#">READ MORE</a></div>
</div>
</div>
<a class="carousel-control-prev" data-slide="prev" href="#carouselNewsControls" role="button"><span class="sr-only">Previous</span> </a> <a class="carousel-control-next" data-slide="next" href="#carouselNewsControls" role="button"> <span class="sr-only">Next</span> </a></div>
</div>
</div>

<div class="row mt-4">
<div class="col-12 text-center"><button class="btn btn-outline-light darknavitem mb-2 mb-lg-0 pl-2 pr-2" type="button">MORE NEWS</button></div>
</div>
</div>
</div>

<?php if (is_front_page() && is_home()) : ?>
    <?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>













<?php get_footer(); ?>
