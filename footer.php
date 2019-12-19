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







     








<div class="containter-fluid wrapper-footer">
	<div class="container footer pt-4 pb-2 pb-lg-4">
		<div class="row">
			<div class="col-5 col-xl-6">
<!-- 				<div>
					<nav class="d-none d-lg-block navbar navbar-expand-lg">
						<ul class="navbar-nav mr-2">
							<li class="nav-item"><a class="nav-link" href="#">About</a></li>
							<li class="nav-item"><a class="nav-link" href="#">Trails</a></li>
							<li class="nav-item"><a class="nav-link" href="#">News</a></li>
							<li class="nav-item"><a class="nav-link" href="#">Events</a></li>
							<li class="nav-item"><a class="nav-link" href="#">Shop </a></li>
							<li class="nav-item"><a class="nav-link" href="#">Get Involved</a></li>
						</ul>
					</nav>
				</div> -->





            <?php
            $items = wp_get_nav_menu_items('main-nav-2019');
            // print "<pre>";
            // print_r($items);
            // print "</pre>";
            if ($items) {
                $first_run = true;
                $parent = null;
                // start new col
                // echo '<div class="col-12 col-md-2">';
                echo '<ul class="footer-menu">';
                //echo '<ul id="menu-main-top-navigation">';
                foreach ($items as $index => $item) {
                    // // if we are starting a new column...
                    // if ($item->menu_item_parent == 0) {
                    //     $parent = $item->ID;
                    //     if ($first_run == false) {
                    //         // close previous col
                    //         echo '</ul>';
                    //         // open new col
                    //         echo '<ul class="footer-menu">';
                    //     }
                    //     // reset
                    //     $first_run = false;
                    // }
                    // if this is a parent or a child of the parent (not a grandchild)
                    if ($item->menu_item_parent == 0 || $parent == $item->menu_item_parent) {
                        // add link
                        echo '<li class="footer-menu-item';
                        if ($item->menu_item_parent == 0) {
                            // add header class
                            echo ' footer-menu-item-header';
                        }
                        echo '"><a href="' . $item->url .'" title="'. $item->title .'">';
                        echo $item->title . '</a></li>';
                    }
                    // print "<pre>";
                    // print_r($item->menu_item_parent);
                    // print "</pre>";

                    // reset 
                    $parent = null;
                }
                echo '</ul>';
                // echo '</div>';
            }
            ?>








                    <ul class="share_links">
                        <li><a href="https://www.instagram.com/tarheel_trailblazers/" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.facebook.com/groups/50342108471/" target="_blank">
                            <i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="http://twitter.com/Theel_Trlblazer" target="_blank">
                            <i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="http://www.youtube.com/user/TarheelTrailBlazers" target="_blank">
                            <i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>about/contact-us/">
                            <i class="far fa-envelope" aria-hidden="true"></i></a></li>
                    </ul>



			</div>

			<div class="d-none d-lg-block col-7 col-xl-6">
				<div class="card">
					<div class="green-line extra"></div>

					<div class="card-body align-middle">
						<table style="width:100%">
							<tbody>
								<tr class="align-middle">
									<td class="align-middle mr-0 thin-td">
										<p class="card-text" style="color:#fff;">Get our latest news and stay<br />
											up to date about events!</p>
									</td>
									<td class="align-middle thick-td"><input class="mr-2" maxlength="30" minlength="5" name="signup" pattern="[a-zA-Z0-9]+@." required="" style="width: 68%;" type="text" value="EMAIL ADDRESS"/><button class="btn btn-primary orange" name="button"
											type="button">Signup</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row small-nav">



			<div class="d-lg-none offset-sm-1 col-5 col-sm-4 mt-2 mt-sm-0">
				<p>Get our latest news and stay up to date about events!</p>
				<button class="btn btn-outline-light pl-3 pr-3" type="button">SIGNUP</button>
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
                <img alt="Tarheel Trailblazers Logo" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/ttb-logo-full-white-clear-no-est-1000w.png" />
            </div>

			<div class="col-6 col-md-4 align-middle pt-1">
                <img alt="Work X Ride Logo" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/ttb-wXr-only-white-clear.png" />
            </div>

			<div class="col-6 col-md-3 align-middle pt-4 pt-md-0">
                <img alt="IMBA Logo" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/imba-logo-white-clear.png" />
            </div>

			<div class="col-3 col-md-1 align-middle offset-3 offset-md-0 pt-1" style="height: 65%;">
                <img alt="SORBA Logo" class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/sorba-logo.png" />
            </div>
		</div>

		<div class="row">
			<div class="col-12 text-center colophon mt-4 mb-4">
				<p>&copy; 2019 Tarheel Trailblazers 182 Saddle Road, Mooresville, NC 28115 | Contact us<br />

                <p>Website designed and developed by <a href="https://owenmundy.com/site/critical-web-design" target="_blank">Critical Web Design</a> at Davidson College</p>

			</div>
		</div>
	</div>
</div>







</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
