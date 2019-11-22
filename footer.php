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





<div class="containter-fluid footer1" id="Footer1">
	<div class="container pt-4 pb-2 pb-lg-4">
		<div class="row extra-news">
			<div class="col-5 col-xl-6">
				<div>
					<nav class="d-none d-lg-block navbar navbar-expand-lg">
						<ul class="navbar-nav mr-2">
							<li class="nav-item"><a class="nav-link darknavitem" href="#">About</a></li>
							<li class="nav-item"><a class="nav-link darknavitem" href="#">Trails</a></li>
							<li class="nav-item"><a class="nav-link darknavitem" href="#">News</a></li>
							<li class="nav-item"><a class="nav-link darknavitem" href="#">Events</a></li>
							<li class="nav-item"><a class="nav-link darknavitem" href="#">Shop </a></li>
							<li class="nav-item"><a class="nav-link darknavitem" href="#">Get Involved</a></li>
						</ul>
					</nav>
				</div>

				<div class="ml-2">
					<p class="social-link"></p>
				</div>
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
									<td class="align-middle thick-td"><input class="mr-2" maxlength="30" minlength="5" name="signup" pattern="[a-zA-Z0-9]+@." required="" style="width: 68%;" type="text" /><button class="btn btn-primary orange" name="button"
											type="button">Signup</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row small-nav">
			<div class="col-6">
				<ul class="d-lg-none navbar-nav mr-2 mt-2 mt-lg-0">
					<li class="nav-item"><a class="nav-link darknavitem" href="#Footer1">About</a></li>
					<li class="nav-item"><a class="nav-link darknavitem" href="#Footer1">Trails</a></li>
					<li class="nav-item"><a class="nav-link darknavitem" href="#Footer1">News</a></li>
					<li class="nav-item"><a class="nav-link darknavitem" href="#Footer1">Events</a></li>
					<li class="nav-item"><a class="nav-link darknavitem" href="#Footer1">Shop </a></li>
					<li class="nav-item"><a class="nav-link darknavitem" href="#Footer1">Get Involved</a></li>
				</ul>
			</div>

			<div class="d-lg-none offset-sm-1 col-5 col-sm-4 darknavitem mt-2 mt-sm-0">
				<p>Get our latest news and stay up to date about events!</p>
				<button class="btn btn-outline-light pl-3 pr-3" type="button">SIGNUP</button>
			</div>

			<div class="col-12 text-center mt-1 mb-2">
				<p class="social-link"></p>
			</div>
		</div>
	</div>
</div>
<!--Footer 2-->

<div class="container-fluid footer2">
	<div class="container" id="Footer2">
		<div class="row mb-1">
			<div class="col white-line"></div>
		</div>

		<div class="row align-middle mt-4">
			<div class="col-6 col-md-4 align-middle"><img alt="Tarheel Trailblazers Logo" class="img-fluid" src="./assets/img/3-home/footer/Footer2/ttb-logo-full-white-clear.png" /></div>

			<div class="col-6 col-md-4 align-middle pt-1"><img alt="Work X Ride Logo" class="img-fluid" src="./assets/img/3-home/footer/Footer2/ttb-wXr-only-white-clear.png" /></div>

			<div class="col-6 col-md-3 align-middle pt-4 pt-md-0"><img alt="IMBA Logo" class="img-fluid" src="./assets/img/3-home/footer/Footer2/imba-logo-white-clear.png" /></div>

			<div class="col-3 col-md-1 align-middle offset-3 offset-md-0 pt-1" style="height: 65%;"><img alt="SORBA Logo" class="img-fluid" src="./assets/img/3-home/footer/Footer2/sorba-logo.png" /></div>
		</div>

		<div class="row">
			<div class="col-12 text-center footer2text mt-4 mb-4">
				<p>&copy; 2019 Tarheel Trailblazers 182 Saddle Road, Mooresville, NC 28115 | Contact us<br />
					Website designed and developed by Critical Web Design at Davidson College</p>
			</div>
		</div>
	</div>
</div>


</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
