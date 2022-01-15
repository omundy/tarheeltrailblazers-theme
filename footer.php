<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$container = get_theme_mod( 'understrap_container_type' );
?>



<?php
// events widget
//get_template_part( 'sidebar-templates/sidebar', 'footerfluid' );
?>








<div class="container-fluid wrapper-footer">
	<div class="container footer pt-4 pb-2 pb-lg-4">
		<div class="row">
			<div class="col-xl-6 col-md-6 col-xs-12">

            <?php
            $items = wp_get_nav_menu_items('main-nav-2019');
            // print "<pre>";
            // print_r($items);
            // print "</pre>";
            if ($items) {
                $first_run = true;
                $parent = null;
                // start new col
                echo '<ul class="footer-menu">';
                foreach ($items as $index => $item) {
                    // if this is a parent or a child of the parent (not a grandchild)
                    if ($item->menu_item_parent == 0 || $parent == $item->menu_item_parent) {
                        // add link
                        echo '<li class="footer-menu-item';
                        if ($item->menu_item_parent == 0) {
                            // add header class
                            echo ' footer-menu-item-header';
                        }
                        echo '"><a href="' . $item->url .'" title="'. $item->title .'" class="menu-item-'. $item->title .'">';
                        echo $item->title . '</a></li>';
                    }
                    // print "<pre>";
                    // print_r($item->menu_item_parent);
                    // print "</pre>";

                    // reset
                    $parent = null;
                }
                echo '</ul>';
            }
            ?>



                <ul class="share_links">
                    <li><a href="https://www.instagram.com/tarheel_trailblazers/" target="_blank">
                        <i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://facebook.com/TarheelTrailblazersNC" target="_blank">
                        <i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="http://twitter.com/Theel_Trlblazer" target="_blank">
                        <i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="http://www.youtube.com/user/TarheelTrailBlazers" target="_blank">
                        <i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                    <li><a href="mailto:president@tarheeltrailblazers.com">
                        <i class="far fa-envelope" aria-hidden="true"></i></a></li>
                </ul>



			</div>

			<div class="d-lg-block col-xl-6 col-md-6">
				<div class="card">
					<div class="green-line"></div>

					<div class="card-body align-middle" style="padding-bottom: 0;">
						<p class="card-text" style="color:#111;">Get our latest news and stay up to date about events!</p>
						<p>
							<?php echo do_shortcode('[mc4wp_form]'); ?>
						</p>

					</div>
				</div>
			</div>
		</div>


	</div>
</div>
<!--Footer 2-->

<div class="container-fluid footer">
	<div class="container" id="Footer2">
		<div class="row mb-1">
			<div class="col white-line"></div>
		</div>

		<div class="row align-middle mt-4">

			<div class="col-6 col-md-4 align-middle">
                <a class="nav-link footer-icon-link" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
                    <img alt="Tarheel Trailblazers Logo" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/ttb-logo-full-white-clear-no-est-1000w.png" />
                </a>
            </div>

			<div class="col-6 col-md-4 align-middle pt-1">
                <a class="nav-link footer-icon-link" href="<?php echo esc_url( home_url( '/' ) ); ?>/get-involved">
                    <img alt="Work X Ride Logo" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/ttb-wXr-only-white-clear.png" />
                </a>
            </div>

			<div class="col-6 col-md-3 align-middle pt-4 pt-md-0">
                <a class="nav-link footer-icon-link" href="https://www.imba.com/" target="_blank">
                    <img alt="IMBA Logo" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/imba-logo-white-clear.png" />
                </a>
            </div>

			<div class="col-3 col-md-1 align-middle offset-3 offset-md-0 pt-1" style="height: 65%;">
                <a class="nav-link footer-icon-link" href="https://sorba.org/" target="_blank">
                    <img alt="SORBA Logo" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/sorba-logo.png" />
                </a>
            </div>
		</div>

		<div class="row">
			<div class="col-12 text-center colophon mt-4 mb-4">
				<p>&copy; 1990–<?php echo date("Y"); ?> Tarheel Trailblazers | <a href="<?php echo esc_url( home_url( '/' ) ); ?>about/contact-us/">Contact us</a></p>

                <p>Website designed and developed by <a href="https://owenmundy.com/site/critical-web-design" target="_blank">Critical Web Design</a> at Davidson College</p>

			</div>
		</div>
	</div>
</div>







</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
