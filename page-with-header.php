<?php
/**
 * Template Name: Empty regular width page with header image
 * Template Post Type: page, post, event
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

$thumb_arr = om_return_post_thumbnail($post->ID);

// print "<pre>";
// print_r($post->ID);
// print_r($thumb_arr);
// print "</pre>";

if (count($thumb_arr)){

?>
<div class="container-fluid text-page-image-header" style="background-image: url(<?php print $thumb_arr[0]; ?>)"></div>

<?php } ?>


<style type="text/css">.wp-post-image { display: none !important; }</style>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php /* get_template_part( 'global-templates/right-sidebar-check' );*/ ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
