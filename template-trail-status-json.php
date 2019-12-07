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
$trails = get_all_trails();

// only proceed if trails are found
if (count($trails)){

    //var_dump($trails);
    // print_r($trails);
    
    // array to hold output
    $arr = array();

    // only include non-public information 
    foreach ( $trails as $trail ){
        
        $status = returnTrailStatusData($trail->ID);

        $arr[$trail->post_name] = array(
            'title' => $trail->post_title,
            'slug' => $trail->post_name,
            'url' => $trail->post_name,
            'lat_lng' => $status['lat_lng'],
            'status' => $status['status'],
            'updated' => $trail->post_modified,
            'updated-tiny' => $status['updated'],
        );       
    }

    // write JSON
    echo json_encode($arr);
}

