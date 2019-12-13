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

// a hook so WP Cron can access the function, runs every 15 min
add_action( 'om_get_usnwc_status_hook', 'om_get_usnwc_status' );

/**
 * Scrape the USNWC trail status and saves in WP DB
 */
function om_get_usnwc_status(){

    // url to grab
    $url = 'http://usnwc.org/visit/facility-map/';
    // create DOM obj
    $doc = new DOMDocument();
    // load file, @ = suppresses warnings
    @$doc->loadHTMLFile($url);
    // create xpath obj    
    $xpath = new DOMXPath($doc);
    // get all matching elements
    $nodes = $xpath->query('//*[contains(concat(" ", normalize-space(@class), " "), " trails-current ")]/a/img/@src');  

    // testing
    // print "<pre>";
    // var_dump($nodes);
    // print "</pre>";

    $i = 0;
    // default
    $status = "Closed";

    foreach ($nodes as $node) { 
        // for some reason their site uses the trails-current class on the activity schedule link
        if ($i++ == 0) continue;

        // testing
        // print "<pre>";
        // print_r($node->nodeValue);
        // print "</pre>";

        // if the 
        if (strpos($node->nodeValue, 'Trails_Open') !== false) {
            // echo 'trails Open';
            $status = "Open";
        } else {
            // echo 'trails Closed';
            $status = "Closed";
        }

    } 

    // update post meta
    update_post_meta(80,'trail-status',$status);

    // update post_modified date/time on post
    $update = array( 'ID' => 80 );
    wp_update_post( $update );
}



/**
 * Get all data for *ONE* trail
 * @return Array
 */
function om_get_one_trail($id) {
    // get the post
    $post = get_post($id);
    // save all the post metadata
    $post->meta = om_return_post_meta($post->ID);        
    // save all the post metadata
    $post->thumbnail = om_return_post_thumbnail($post->ID);        

    // print "<pre>";
    // print_r($post);
    // print "</pre>";

    return $post; 
}


/**
 * Get all data for all (published) trails
 * @return Array
 */
function om_get_all_trails() {
    $arr = array();

    // query
    $args = array(
        'posts_per_page' => 30,
        'post_status' => 'publish',
        'post_type' => 'page',
        'order'=> 'ASC',
        'orderby' => '',
        'meta_key'   => '_wp_page_template',
        'meta_value' => 'template-trail-page.php'
    );
    $query = new WP_Query($args);
    $posts = $query->posts;

    // store additional data and set array key
    foreach ($posts as $post) {
        //print $post->post_title . "<br>";

        // save all the post metadata
        $post->meta = om_return_post_meta($post->ID);        
        // save all the post metadata
        $post->thumbnail = om_return_post_thumbnail($post->ID);        
        // store post with key
        $arr[$post->post_name] = $post;
    }

    // sort by new keys
    ksort($arr);

    // print "<pre>";
    // print_r($arr);
    // print "</pre>";

    return $arr;
}

/**
 * Return the thumbnail for a post
 * @return Array
 */
function om_return_post_thumbnail($id){
    $arr = "";

    // if it has a thumbnail image
    if ( has_post_thumbnail($id) ) {
        // print get_post_thumbnail_id( $id ) ."<br>";

        // store thumbnail and resolution data
        $arr = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' );
    }
    return $arr;
}

/**
 * Return all meta data for a post
 * @return Array
 */
function om_return_post_meta($id){

    // get meta for this trail
    $parking_lot = get_post_meta( $id, 'parking_lot', true );
    $status = get_post_meta( $id, 'trail-status', true );
    // get date (in UTC)
    $date = new DateTime( get_post_modified_time( 'F j, Y g:i a', null, $id ), new DateTimeZone('UTC'));
    // print "<pre>";
    // print_r(get_post_meta( $id, 'mtb_project_page', true ));
    // print_r($date);
    // print "</pre>";
    // change date to local time (I think this didn't work)
    // $date->setTimezone(new DateTimeZone('America/New_York'));

    // create array w/data
    $arr = array(
        "mtb_project_page" => get_post_meta( $id, 'mtb_project_page', true ),
        "trailforks_page" => get_post_meta( $id, 'trailforks_page', true ),
        "mtb_project_iframe" => get_post_meta( $id, 'mtb_project_iframe', true ),
        "status" => $status,
        "parking_lot" => null,
        "lat_lng" => null,
        "statusInfo" => om_return_trail_status_info($status),
        //"updated" => $date->format('Y-m-d h:i:s T') // 2019-04-23 03:36:28 EDT
        //"updated" => $date->format('F d, Y') .' at '. $date->format('g:i a') // April 23, 2019 at 3:36 pm
        "updated" => $date->format('n/d - g:ia') // 4/23-3:36pm
    );
    if ($parking_lot){
        $arr["parking_lot"] = $parking_lot;
        if ($parking_lot['lat'] && $parking_lot['lng']){
            $arr["lat_lng"] = $parking_lot['lat'] .','. $parking_lot['lng'];
        }
    }
    // print "<pre>";
    // print_r($arr);
    // print "</pre>";

    return $arr;
}

/**
 * Returns the trail status display info
 * @return Array
 */
function om_return_trail_status_info($status){
    if (!isset($status)) return;

    // defaults
    $arr = array(
        'class' => "bg-success",
        'text' => "OPEN / ALL CLEAR!",
    );
    if ($status == "Closed"){
        $arr['class'] = "bg-danger";
        $arr['text'] = "CLOSED / TOO WET";
    }
    // they decided they don't want yellow status
    // else if ($status == "Caution"){
    //     $arr['class'] = "bg-warning";
    //     $arr['text'] = "CAUTION / SOME MUDDY AREAS";
    // }
     
    return $arr;
}









/* VIEWS */


// the trail status section
function om_return_trail_status_html_tiny($trail){
    // print "<pre>";
    // print_r($trail);
    // print "</pre>";
    
    $str .= '<span class="tinyTrailStatusDot '. $trail->meta['statusInfo']['class'] .'"> </span> ';
    $str .= '<span class="tinyTrailStatusTitle"><a href="/trails/'. $trail->post_name .'">'. $trail->post_title .'</a></span> ';
    $str .= '<span class="tinyTrailStatusUpdated">'. $trail->meta['updated'] .'</span>';
    return $str;
}

// the trail status in the head of a page
function om_return_trail_status_html_header($trail){
    $str = "<div class='headerTrailStatus'>";
    $str .= 'Current Status: ';
    $str .= '<button class="btn '. $trail->meta['statusInfo']['class'] .'">';
    $str .= $trail->meta['statusInfo']['text'];
    $str .= '</button> ';
    $str .= '<span class="headerTrailStatusUpdated">Updated '. $trail->meta['updated'];
    $str .= "</div>";
    return $str;
}

// the trail info and thumbnail
function om_return_trail_card_html($trail){
    // print "<pre>";
    // print_r($trail);
    // print "</pre>";

    $str = '<div>';
    $str .= '<div class="trail-card-img"><img src="'. $trail->thumbnail[0] .'" /></div>';
    $str .= '<span class="tinyTrailStatusDot '. $trail->meta['statusInfo']['class'] .'"> </span> ';
    $str .= '<span class="tinyTrailStatusTitle"><a href="/trails/'. $trail->post_name .'">'. $trail->post_title .'</a></span> ';
    $str .= '<span class="tinyTrailStatusUpdated">'. $trail->meta['updated'] .'</span>';
    $str .= '</div>';
    return $str;
}







/* HELPER FUNCTIONS */


/**
 *  Trim string to nearest sentence based on limit
 *  Source: https://stackoverflow.com/a/42613482/441878
 */
function sentenceTrim($str, $maxLength = 300) {
    $str = preg_replace('/\s+/', ' ', trim($str)); // Replace new lines (optional)
    $str = removeTags($str);
    if (mb_strlen($str) >= $maxLength) {
        $str = mb_substr($str, 0, $maxLength);
        $puncs  = array('. ','.<', '! ', '? '); // Possible endings of sentence
        $maxPos = 0;
        foreach ($puncs as $punc) {
            $pos = mb_strrpos($str, $punc);
            if ($pos && $pos > $maxPos) {
                $maxPos = $pos;
            }
        }
        if ($maxPos) {
            return mb_substr($str, 0, $maxPos + 1);
        }
        return rtrim($str) . '&hellip;';
    } else {
        return $str;
    }
}
function removeTags($str){
    // remove all link and link content
    $str = preg_replace('#<a.*?>.*?</a>#i','', $str);
    // remove all tags
    $str = strip_tags($str);
    return $str;
}
function getYear($date){
    return date("Y", strtotime($date));
}
function getMonthShort($date){
    return date("M", strtotime($date));
}
function getDayWithZero($date){
    return date("d", strtotime($date));
}


