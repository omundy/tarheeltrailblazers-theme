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




<div class="wrapper wrapper-dark-grey" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<?php
			$items = wp_get_nav_menu_items( 'main-nav-2019' );
			if( $items ) {
				$first_run = true;
				$parent = null;
				// start new col
				echo '<div class="col-12 col-md-2">';
				echo '<ul class="footer-menu pb-3">';
			    //echo '<ul id="menu-main-top-navigation">';
			    foreach( $items as $index => $item ) {
					// if we are starting a new column...
					if( $item->menu_item_parent == 0 ){
						$parent = $item->ID;
						if ($first_run == false){
							// close previous col
							echo '</ul>';
							echo '</div>';
							// open new col
							echo '<div class="col-12 col-md-2 pb-3">';
							echo '<ul class="footer-menu">';
						}
						// reset
						$first_run = false;
					}
					// if this is a parent or a child of the parent (not a grandchild)
					if ($item->menu_item_parent == 0 || $parent == $item->menu_item_parent){
						// add link
						echo '<li class="footer-menu-item';
						if ($item->menu_item_parent == 0)
							// add header class
							echo ' footer-menu-item-header';
						echo '"><a href="' . get_permalink( $item->url ) .'" title="'. $item->title .'">';
						echo $item->title . '</a></li>';
					}
					// print "<pre>";
					// print_r($item);
					// print "</pre>";
				}
				echo '</ul>';
				echo '</div>';
			}
			?>



			<div class="col-md-4">

				<ul class="share_links">
            	
            <li><a href="https://www.facebook.com/groups/50342108471/" target="_blank">
						    <i class="fab fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="http://twitter.com/Theel_Trlblazer" target="_blank">
						    <i class="fab fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="http://www.youtube.com/user/TarheelTrailBlazers" target="_blank">
						    <i class="fab fa-youtube" aria-hidden="true"></i></a></li>    
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/contact-us/">
						    <i class="far fa-envelope" aria-hidden="true"></i></a></li>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/contact-us/">
			          Contact Us</a></li>
        </ul>



				<div class="footer-email-signup clearfix">


					<p>Get our latest news</p>

					<form class="form-inline" action="post">
						<div class="form-group mr-2 mb-2">
							<label for="emailSignupFooter" class="sr-only">Email</label>
							<input type="text" class="form-control" id="emailSignupFooter" value="EMAIL ADDRESS">
						</div>
						<button type="submit" class="btn btn-primary mb-2">SIGNUP</button>
					</form>


				</div>

			</div>
		</div>



		<div class="row">
			<div class="col-12 mt-5 text-center">

<p>
	<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-tan.svg" alt="Tarheel Trailblazers logo" class="header-logo">
	</a>
</p>

<p>© <?php echo date("Y"); ?> Tarheel Trailblazers</p>

<p>Website designed and developed by <a href="https://owenmundy.com/site/critical-web-design" target="_blank">Critical Web Design</a> at Davidson College</p>

			</div>
		</div>




	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
