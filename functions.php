<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	
	
    wp_enqueue_style('critical-web-design-styles', get_stylesheet_directory_uri() . '/css/styles.css', $the_theme->get('Version'));
    wp_enqueue_script('critical-web-design-scripts', get_stylesheet_directory_uri() . '/js/main.js', array(), $the_theme->get('Version'), true);

	
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );





// Critical Web Design: CUSTOM FUNCTIONS


function returnTrailStatus($id){

    // query for events
    $args = array(
      'posts_per_page' => 1,
      'post_status' => 'publish',
      'post_type' => 'page',
      'order'=> 'ASC',
      'orderby' => '',
      'id' => $id
    );
    $query = new WP_Query($args);
    $posts = $query->posts;

    // get meta for this trail
    $parking_lot = get_post_meta( $id, 'parking_lot', true );
    $status = get_post_meta( $id, 'trail-status', true );
    // get date (in UTC)
    $date = new DateTime($posts[0]->post_modified, new DateTimeZone('UTC'));
    // change date to local time
    $date->setTimezone(new DateTimeZone('America/New_York'));

    // create array w/data
    $arr = array(
      "mtb_project_page" => get_post_meta( $id, 'mtb_project_page', true ),
      "mtb_project_iframe" => get_post_meta( $id, 'mtb_project_iframe', true ),
      "parking_lot" => $parking_lot,
      "lat_lng" => $parking_lot['lat'] .','. $parking_lot['lng'],
      "status" => $status, 
      "statusInfo" => returnTrailStatusInfo($status), 
      //"updated" => $date->format('Y-m-d h:i:s T') // 2019-04-23 03:36:28 EDT
      "updated" => $date->format('F d, Y') .' at '. $date->format('g:i a') // April 23, 2019 at 3:36 pm
    );
    // print "<pre>";
    // print_r($arr);
    // print "</pre>";

    return $arr;
}

function returnTrailStatusInfo($status){
    if (!isset($status)) return;

    $arr = array(
        'class' => "bg-success",
        'text' => "OPEN / ALL CLEAR!",
    );

    if ($status == "Caution"){
        $arr['class'] = "bg-warning";
        $arr['text'] = "CAUTION / SOME MUDDY AREAS";
    }
    else if ($status == "Closed"){
        $arr['class'] = "bg-danger";
        $arr['text'] = "CLOSED / TOO WET";
    }

    return $arr;
}





