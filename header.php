<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<link rel="stylesheet" href="http://tarheeltrailblazers.dreamhosters.com/wp/wp-content/themes/understrap-child-ttb/css/style-miguel.css">
	<link rel="stylesheet" href="http://tarheeltrailblazers.dreamhosters.com/wp/wp-content/themes/understrap-child-ttb/css/style-mary-nell.css">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar " itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content">
			<?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

			<!-- ******************* OLD ******************* -->

		<nav class="navbar navbar-expand-md navbar-dark">

		<?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?>



				<h1 class="navbar-brand mb-0 ">
					<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
						<!-- <?php bloginfo( 'name' ); ?> -->
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/3-home/footer/Footer2/ttb-logo-full-white-clear.png" alt="Tarheel Trailblazers logo" class="header-logo">
					</a>
				</h1>


				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>


				<ul class="nav nabar-nav mr-auto">

					<li class="menu-item headerOpenSearch">
	                    <a class="nav-link header-search-btn" href="#"><i class="fa fa-search headerSearchIcon"></i></a>
	                </li>

					<li>
						<div class="headerSearchDiv">
							<form method="get" id="searchform" class="headerSearchForm" action="post" role="search">
								<input class="field form-control headerSearchFormInput" id="s" name="s" type="text" placeholder="Search …" value="">
							</form>
							<div class="headerCloseSearch">X</div>
						</div>
					</li>
					<!--<li><a class="btn btn-primary nav-link header-join-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>join-us">GIVE TODAY</a></li>-->
				</ul>


			</div><!-- .container -->
			<?php endif; ?>

		</nav>
		<!-- ******************* OLD ******************* -->

		<!-- .site-navigation -->



	</div><!-- #wrapper-navbar end -->
