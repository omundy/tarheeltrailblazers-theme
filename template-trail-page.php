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


                    <?php get_breadcrumb(); ?>


					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<header class="entry-header">

							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

						</header><!-- .entry-header -->





<!-- <div class="trailInfo"> -->

	<!-- <div class="trailStatus"> -->

		<?php 

        $trail = om_get_one_trail( get_the_ID() );

        print om_return_trail_status_html_header($trail); 

        ?>



    <!-- </div> -->

<!-- </div> -->


<div class="row">

    <div class="col-12 col-md-6">
        <?php echo get_the_post_thumbnail( $post->ID, 'large' ); /* */ ?>
    </div>


    <div class="col-12 col-md-6">

        <div class="entry-content">

            <?php the_content(); ?>

        </div><!-- .entry-content -->

    </div>

</div>
						

						

						<footer class="entry-footer">











							<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>




						</footer><!-- .entry-footer -->

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>




        <?php if (isset($trail->meta['mtb_project_iframe']) && !empty($trail->meta['mtb_project_iframe'])){ ?>

        <!-- BEGIN MTB Project -->
        <iframe style="width:100%; max-width:1200px; height:410px;" frameborder="0" scrolling="no" src="<?php echo $trail->meta['mtb_project_iframe']; ?>"></iframe>
        <!-- END MTB Project -->

        <?php } ?>




	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->



<!-- Section: Trail status -->
<?php include(get_theme_file_path() . '/sections/section-trail-status.php'); ?>

<!-- Section: Events -->
<?php include(get_theme_file_path() . '/sections/section-events-full.php'); ?>




<?php get_footer(); ?>
