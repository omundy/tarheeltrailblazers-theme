<?php
/**
 * Template Name: Trail Page
 * Template Post Type: page, post, event
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>





					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<header class="entry-header">

							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

						</header><!-- .entry-header -->





<div class="trailInfo">

	<div class="trailStatus">

		<?php
			$id = get_the_ID();
			$trailStatus = returnTrailStatus($id);


		  $trailStatusArr = array(
		  	'status' => $trailStatus,
		  	'id' => $id,
			'slug' => $trail->post_name,
		  	'title' => $post->post_title
		  );

		  print returnTrailStatusHeader($trailStatusArr);

		?>

	</div>

</div>











						<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

						<div class="entry-content">

							<?php the_content(); ?>

						</div><!-- .entry-content -->

						<footer class="entry-footer">


<div class="trailInfo">

	<div class="trailStatus">

	<?php if (isset($trailStatus['lat_lng']) && !empty($trailStatus['lat_lng']) ){ ?>
		<a href="https://maps.google.com/?daddr=<?php echo $trailStatus['lat_lng']; ?>" target="_blank" class="btn btn-primary" rel="noopener noreferrer">Driving directions</a>
	<?php } ?>


	<?php if (isset($trailStatus['mtb_project_page']) && !empty($trailStatus['mtb_project_page']) ){ ?>
		<a href="<?php echo $trailStatus['mtb_project_page']; ?>" target="_blank" class="btn btn-primary">MTB Project</a>
	<?php } ?>


	<?php if (isset($trailStatus['trailforks_page']) && !empty($trailStatus['trailforks_page']) ){ ?>
		<a href="<?php echo $trailStatus['trailforks_page']; ?>" target="_blank" class="btn btn-primary">Trailforks</a>
	<?php } ?>

	</div>

</div>



							<?php if (isset($trailStatus['mtb_project_iframe']) && !empty($trailStatus['mtb_project_iframe'])){ ?>

							<!-- BEGIN MTB Project -->
							<iframe style="width:100%; max-width:1200px; height:410px;" frameborder="0" scrolling="no" src="<?php echo $trailStatus['mtb_project_iframe']; ?>"></iframe>
							<!-- END MTB Project -->

							<?php } ?>


							<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

						</footer><!-- .entry-footer -->

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php /* get_template_part( 'global-templates/right-sidebar-check' );*/ ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->



<!-- Section: Trail status -->
<?php
//include(get_theme_file_path() . '/sections/section-trail-status.php');
include(get_theme_file_path() . '/sections/section-trail-status-dynamic.php');
?>



<?php include(get_theme_file_path() . '/sections/section-news.php'); ?>


<?php include(get_theme_file_path() . '/sections/section-events-full.php'); ?>




<?php get_footer(); ?>
