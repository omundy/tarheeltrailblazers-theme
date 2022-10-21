<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">






	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">




	<!-- meta tags -->
	<meta name="description" content="Protecting improving and maintaining the numerous trail systems available for our use in and around Metro-Charlotte">
	<meta name="keywords" content="Tarheel Trailblazers Mountain Bike Association, Protecting improving and maintaining the numerous trail systems available for our use in and around Metro-Charlotte">

	<!--  open graph tags -->
	<meta property="og:title" content="Tarheel Trailblazers">
	<meta property="og:description" content="Protecting improving and maintaining the numerous trail systems available for our use in and around Metro-Charlotte">
	<meta property="og:image" content="https://tarheeltrailblazers.com/wp/wp-content/themes/understrap-child-ttb/img/hero_bike_one.jpg">
	<meta property="og:url" content="https://tarheeltrailblazers.com/">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Tarheel Trailblazers">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="https://tarheeltrailblazers.com/">
	<meta name="twitter:title" content="Tarheel Trailblazers">
	<meta name="twitter:description" content="Protecting improving and maintaining the numerous trail systems available for our use in and around Metro-Charlotte">
	<meta name="twitter:creator" content="@Theel_Trlblazer">
	<meta name="twitter:site" content="@Theel_Trlblazer">
	<meta name="twitter:image" content="https://tarheeltrailblazers.com/wp/wp-content/themes/understrap-child-ttb/img/hero_bike_one.jpg">
	<meta name="twitter:image:alt" content="Tarheel Trailblazers">

	<!-- favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-SE6RFP6W2P"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-SE6RFP6W2P');
	</script>


	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>


<div class="hfeed site" id="page">



	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md navbar-dark" aria-labelledby="main-nav-label">

		<?php if ( 'container' == $container ) : ?>
			<div class="container-fluid" >
		<?php endif; ?>



				<h1 class="navbar-brand mb-0" id="main-nav-label">
					<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						<!-- <?php bloginfo( 'name' ); ?> -->
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/ttb-logo-full-white-clear-no-est.svg" alt="Tarheel Trailblazers logo" class="header-logo">
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


				<!--<ul class="nav nabar-nav mr-auto">



                    <li class="menu-item">
                        <a class="nav-link" href="https://tarheeltrailblazers.square.site/s/shop" target="_blank">Shop <i style="font-size:.7rem; color: #999" class="fas fa-external-link-alt"></i></a>
                    </li>

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
					</li>-->
					<!--<li><a class="btn btn-primary nav-link header-join-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>join-us">GIVE TODAY</a></li>-->
				<!--</ul>-->


			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
