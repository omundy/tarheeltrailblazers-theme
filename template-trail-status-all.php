<?php
/**
 * Template Name: Trail status (JSON) (ALL)
 * Template Post Type: page
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}


$pages = get_pages('child_of=16');
  foreach($pages as $child) {
print_r($child);
  }



// query for events
$args = array(
  'posts_per_page' => 30,
  'post_status' => 'publish',
  'post_type' => 'page',
  'order'=> 'ASC',
  'orderby' => '',
);
$query = new WP_Query($args);
$posts = $query->posts;

// get meta for this trail
$name = get_post_meta( get_the_ID(), 'name', true );
$url = get_post_meta( get_the_ID(), 'url', true );
$status = get_post_meta( get_the_ID(), 'trail-status', true );

// get date (in UTC)
$date = new DateTime($posts[0]->post_modified, new DateTimeZone('UTC'));
// change date to local time
$date->setTimezone(new DateTimeZone('America/New_York'));

// create array w/data
$arr = array(
  "name" => $name,
  "url" => $url,
  "status" => $status, //2019-04-23 18:50:00
  "updated" => $date->format('Y-m-d h:i:s T')
);
//print_r($arr);


header('Content-Type: application/json');
echo json_encode($arr);


// // if there are posts, display the section
// if (count($posts) > 0){ 
//   foreach ( $posts as $post ){
//     phprint_r($post);
//   }
// }

