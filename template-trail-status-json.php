<?php
/**
 * Template Name: Trail status (JSON)
 * Template Post Type: page
 * Display the trail statuses as JSON
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

// start JSON with header
header('Content-Type: application/json');

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

        $arr[$trail->post_name] = array(
            'title' => $trail->post_title,
            'slug' => $trail->post_name,
            'url' => esc_url( home_url( '/' ) ) . $trail->post_name,
            'lat_lng' => $trail->meta['lat_lng'],
            'status' => $trail->meta['status'],
            'updated' => $trail->post_modified,
            'updated-tiny' => $trail->meta['updated'],
        );       
    }

    // write JSON
    echo json_encode($arr);
}

