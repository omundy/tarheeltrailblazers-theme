<?php
/**
 * Template Name: Trails landing page
 * Template Post Type: page
 * Landing page for all trails
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

            <main class="site-main" id="main">

<?php

// get all the trails
$trails = om_get_all_trails();

// only proceed if trails are found
if (count($trails)){

    //var_dump($trails);
    // print_r($trails);
    
    // array to hold output
    $arr = array();

    // only include public information 
    foreach ( $trails as $trail ){
        
        $status = om_return_post_meta($trail->ID);


        $arr[$trail->post_name] = array(
            'title' => $trail->post_title,
            'slug' => $trail->post_name,
            'url' => $trail->post_name,
           
            'lat_lng' => $status['lat_lng'],
            'status' => $status['status'],
            'updated' => $trail->post_modified,
            'updated-tiny' => $status['updated'],
        );    
        // if it has a thumbnail image
        if ( has_post_thumbnail($recent['ID']) ) {
            print get_post_thumbnail_id( $trail->ID ) ."<br>";

            $arr[$trail->post_name]['thumbnail'] = wp_get_attachment_image_src( get_post_thumbnail_id( $trail->ID ), 'single-post-thumbnail' );
        }



    }

    // print_r($arr);



    // starting position 
    $col = 0;
    $row = 0;

    // loop through all the trails
    foreach ($trails as $trail) {
        //print $trail->post_title . "<br>";

        // print "<pre>";
        // print_r($trails);
        // print "</pre>";

        // if on the first row
        if ($row == 0){
            // print a new column
            print '<div class="col-lg-4">';
        }

        // get id and trail status 
        $id = $trail->ID;
        $trailStatus = om_return_post_meta($id);

        // create array for printing html 
        $trailStatusArr = array(
            'thumbnail' => $trail->thumbnail,
            'status' => $trailStatus,
            'id' => $id,
            'slug' => $trail->post_name,
            'title' => $trail->post_title
        );

        // print "<pre>";
        // print_r($trailStatusArr);
        // print "</pre>";

        // print returned html 
        print returnTrailCard($trailStatusArr);

        // move to next row
        $row ++;

        // if we are on the last row 
        if ($row >= 8){
            // finish column
            print "</div>";
            // move to next column
            $col++;
            // start at row zero
            $row=0;
        }

     } // end foreach

}

?>



            </main><!-- #main -->

        <!-- Do the right sidebar check -->
        <?php /* get_template_part( 'global-templates/right-sidebar-check' );*/ ?>

    </div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>







