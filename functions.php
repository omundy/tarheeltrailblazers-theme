<?php
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts()
{
	wp_dequeue_style('understrap-styles');
	wp_deregister_style('understrap-styles');

	wp_dequeue_script('understrap-scripts');
	wp_deregister_script('understrap-scripts');

	// Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{

	// Get the theme data
	$the_theme = wp_get_theme();
	wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get('Version'));
	wp_enqueue_script('jquery');


	wp_enqueue_style('cwd-styles-global', get_stylesheet_directory_uri() . '/css/styles-global.css', $the_theme->get('Version'));
	wp_enqueue_style('cwd-styles', get_stylesheet_directory_uri() . '/css/styles.css', $the_theme->get('Version'));
	wp_enqueue_script('cwd-scripts', get_stylesheet_directory_uri() . '/js/main.js', array(), $the_theme->get('Version'), true);

	// using the altered child-theme.js because there was a bug that caused the navbar to collapse on mobile
	// to test
	// ?foo='. rand()
	wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.js', array(), $the_theme->get('Version'), true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

function add_child_theme_textdomain()
{
	load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');



// add excerpt support to pages
add_post_type_support('page', 'excerpt');





// Critical Web Design: CUSTOM FUNCTIONS

// a hook so WP Cron can access the function, runs every 5 min
add_action('om_get_usnwc_status_hook', 'om_get_usnwc_status');

/**
 * Scrape the USNWC trail status and saves in WP DB
 */
function om_get_usnwc_status_old()
{


	// url to grab
	$url = 'http://usnwc.org/visit/facility-map/';
	// create DOM obj
	$doc = new DOMDocument();
	// load file, @ = suppresses warnings
	@$doc->loadHTMLFile($url);
	// create xpath obj
	$xpath = new DOMXPath($doc);
	// get all matching elements
	// $nodes = $xpath->query('//*[contains(concat(" ", normalize-space(@class), " "), " trails-current ")]/a/img/@src');
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
		if ($i++ == 0) {
			continue;
		}

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
//    update_post_meta(80,'trail-status',$status);

	// update post_modified date/time on post
//    $update = array( 'ID' => 80 );
//    wp_update_post( $update );
}


function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}


/**
 * Scrape the USNWC trail status and saves in WP DB
 */
function om_get_usnwc_status()
{
    // turning off for now May 2023 and using "Anne Springs method"
    return;


	$status = "Closed";
    $url = 'https://center.whitewater.org/plan-your-visit/facility-map/';
    $url = 'https://center.whitewater.org/sitemap/';
    // May 2023 WWC is finally using a CDN, but thankfully many ways to bypass 
    // https://scrapeops.io/web-scraping-playbook/how-to-bypass-cloudflare/
    $url = 'https://webcache.googleusercontent.com/search?q=cache:https://center.whitewater.org/sitemap/';
	$page_source = url_get_contents($url); // or use curl

    // if (is_admin()){
    //     print "owen";
    //     print_r($page_source);
    // }

	if (preg_match("/Trails Open/i", $page_source)) {
		// Trails Open
		// echo 'trails Open';
		$status = "Open";
	} else {
		// Trails Closed
		// echo 'trails Closed';
		$status = "Closed";
	}
	// get current status
	// $wwc_post = get_post(80);
	$wwc_current_status = get_post_meta(80, 'trail-status', true);

    // if (is_admin()){
    // 	print_r($wwc_post);
    // 	print_r($wwc_current_status);
    // }

	// if the status has changed
	if ($wwc_current_status != $status){
		// update post meta
		update_post_meta(80, 'trail-status', $status);
		// update post_modified date/time on post
		$update = array( 'ID' => 80 );
		wp_update_post($update);
	}
}
// om_get_usnwc_status();




/**
 * Get all data for *ONE* trail
 * @return Array
 */
function om_get_one_trail($id)
{
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
function om_get_all_trails()
{
	$arr = array();

	// query
	$args = array(
		'posts_per_page' => 50,
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
 *  Export all trail data as CSV
 *  - Used for Trailbot May 2024
 */
function om_export_trails_csv (){

    // get all the trails
    $trails = om_get_all_trails();
    // print "<pre>";
    // print_r($trails);
    // print "</pre>";

    $arr = array();

    $headers = array(
        "id",
        "post_name",
        "post_title",
        "url",
        "mtb_project_page",
        "trailforks_page",
        "difficulty",
        "length",
        "percentage_singletrack",
        "ascent",
        "descent",
        "status",
        "lat_lng",
        "thumbnail",
        "post_date",
        "post_modified"
    );

    array_push($arr,  $headers);

    $csv = implode("\t",$headers);

    foreach($trails as $post){
        // print $post->post_title . "<br>";

        $row = array(
            "ID" => $post->ID,
            "post_name" => $post->post_name,
            "post_title" => $post->post_title,
            "url" => "https://tarheeltrailblazers.com/trails/".$post->post_name,
            "mtb_project_page" => $post->mtb_project_page,
            "trailforks_page" => $post->trailforks_page,
            "difficulty" => $post->difficulty,
            "length" => $post->length,
            "percentage_singletrack" => $post->percentage_singletrack,
            "ascent" => $post->ascent,
            "descent" => $post->descent,
            "status" => $post->meta["status"],
            "lat_lng" => $post->meta["lat_lng"],
            "thumbnail" => $post->thumbnail[0],
            "post_date" => $post->post_date,
            "post_modified" => $post->post_modified
        );

        $csv .= "\n". implode("\t",$row);

        array_push($arr, $row);
    }
    // return $arr;
    return $csv;
}




/**
 * Return the thumbnail for a post
 * @return Array
 */
function om_return_post_thumbnail($id)
{
	$arr = "";

	// if it has a thumbnail image
	if (has_post_thumbnail($id)) {
		// print get_post_thumbnail_id( $id ) ."<br>";

		// store thumbnail and resolution data
		$arr = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'large');

		// print_r($arr);
	}
	return $arr;
}




$trailStatusInfo_arr = array(

	'Open' => array(
		'class' => "success",
		'text' => "OPEN",
		'fullText' => "All trails are open!"
	),
	'Caution' => array(
		'class' => "warning",
		'text' => "CAUTION",
		'fullText' => "Some trails are open"
	),
	'Closed' => array(
		'class' => "danger",
		'text' => "CLOSED",
		'fullText' => "All trails are closed"
	)
);


/**
 * Returns the trail status display info
 * @return Array
 */
function om_return_trail_status_info($status)
{
	global $trailStatusInfo_arr;
	if (!isset($status)) {
		return;
	}
	return $trailStatusInfo_arr[$status];
}


/**
 * Return all meta data for a post
 * @return Array
 */
function om_return_post_meta($id)
{
	global $trailStatusInfo_arr;

	// get meta for this trail
	$parking_lot = get_post_meta($id, 'parking_lot', true);
	$parking_lot_api_override_lat_lng = get_post_meta($id, 'parking_lot_api_override_lat_lng', true);
	$status = get_post_meta($id, 'trail-status', true);
	$status_details = get_post_meta($id, 'trail-status-details', true);
	// get date (in UTC)
	$date = new DateTime(get_post_modified_time('F j, Y g:i a', null, $id), new DateTimeZone('UTC'));
	// print "<pre>";
	// print_r(get_post_meta( $id, 'mtb_project_page', true ));
	// print_r($date);
	// print "</pre>";
	// change date to local time (I think this didn't work)
	// $date->setTimezone(new DateTimeZone('America/New_York'));

	// create array w/data
	$arr = array(
		"mtb_project_page" => get_post_meta($id, 'mtb_project_page', true),
		"trailforks_page" => get_post_meta($id, 'trailforks_page', true),
		"mtb_project_iframe" => get_post_meta($id, 'mtb_project_iframe', true),

		// trail data
		"difficulty" => get_post_meta($id, 'difficulty', true),
		"length" => get_post_meta($id, 'length', true),
		"percentage_singletrack" => get_post_meta($id, 'percentage_singletrack', true),
		"ascent" => get_post_meta($id, 'ascent', true),
		"descent" => get_post_meta($id, 'descent', true),

		"status" => $status,
		"status_details" => $status_details,
		"parking_lot" => null,
		"parking_lot_override" => null,
		"lat_lng" => null,
		"statusInfo" => $trailStatusInfo_arr[$status],


		//"updated" => $date->format('Y-m-d h:i:s T') // 2019-04-23 03:36:28 EDT
		//"updated" => $date->format('F d, Y') .' at '. $date->format('g:i a') // April 23, 2019 at 3:36 pm
		"updated" => $date->format('n/d - g:ia') // 4/23-3:36pm
	);
	if ($parking_lot_api_override_lat_lng){
		$arr["parking_lot"] = $parking_lot_api_override_lat_lng;
		$arr["parking_lot_override"] = $parking_lot_api_override_lat_lng;
		$arr["lat_lng"] = $parking_lot_api_override_lat_lng;
	}
	else if ($parking_lot) {
		$arr["parking_lot"] = $parking_lot;
		if ($parking_lot['lat'] && $parking_lot['lng']) {
			$arr["lat_lng"] = $parking_lot['lat'] .','. $parking_lot['lng'];
		}
	}
	// print "<pre>";
	// print_r($arr);
	// print_r($parking_lot_api_override_lat_lng);
	// print "</pre>";

	return $arr;
}














/* VIEWS */


// determine status of trailbot string
function interpret_trailbot_status($trailStatus){
    // default
    $status = "Closed"; 
    if (empty($trailStatus) || $trailStatus == "Closed") {
        $status = "Closed";
    } 
    else if (str_contains($trailStatus, "Partially") ||
        str_contains($trailStatus, "Freeze") || str_contains($trailStatus, "Caution")){
        $status = "Caution";
    } 
    else if (str_contains($trailStatus, "Open")){
        $status = "Open";
    } 
    // print $status;
    return $status;
}


// the trail status section
function om_return_trail_status_html_tiny_trailbot($trail)
{
    // print "<pre>";
    // print_r($trail);
    // print $trail["trailId"] ." - ". $trail["trailStatus"];
    // print "</pre>";

    $status = interpret_trailbot_status($trail['trailStatus']);
    $statusInfo = om_return_trail_status_info($status);
    $timeStamp = 0;
    if (isset($trail['updatedAt'])){
        // print "<br>".$trail['updatedAt'];
        $timeStamp = ceil($trail['updatedAt'] / 1000);
    }
    // if (isset($trail['remindedAt'])) {
    //  // print "<br>".$trail['remindedAt'];
    //     $timeStamp = $trail['remindedAt'];
    // }
    // print_r($statusInfo);

    // show extra info for status
    if (count($trail['statusTags']) > 0){
        $statusInfo['fullText'] .= " [". join(",", $trail['statusTags']) ."] ";
    }
    if ($trail['description'] && $trail['description'] != "") {
        $statusInfo['fullText'] .= " - " . $trail['description'] ."";
    }

    // start return string
    // show fullText on hover
    $str = '<span data-toggle="tooltip" data-placement="top" title="'. $statusInfo['fullText'] .'">';

    // add icon
    if ($statusInfo['class'] == "success"){
        $str .= '<i class="fas fa-check-circle tinyTrailStatusIcon success"></i>';
    } else if ($statusInfo['class'] == "warning"){
        $str .= '<i class="fas fa-exclamation-triangle tinyTrailStatusIcon warning"></i>';
    } else if ($statusInfo['class'] == "danger"){
        $str .= '<i class="fas fa-times-circle tinyTrailStatusIcon danger"></i>';
    }
    $str .= " </span> \n";
    
    $str .= '<span class="sr-only">'. $statusInfo['text'] ." </span> \n";
    $str .= '<span class="tinyTrailStatusTitle"><a href="/trails/'. $trail['trailName'] .'">'. $trail['trailName'] ."</a> </span> \n";
    $str .= '<span class="tinyTrailStatusUpdated">'. date( "n/d - g:ia", $timeStamp) ." </span> \n";
    return $str;
}




// the trail status section
function om_return_trail_status_html_tiny($trail)
{
	// print "<pre>";
	// print_r($trail);
	// print "</pre>";

	// show extra info for status
	$statusInfo = $trail->meta['statusInfo']['fullstr'];
	if ($trail->meta['status_details'] && $trail->meta['status_details'] != "") {
		$statusInfo .= " - " . $trail->meta['status_details'];
	}

    // start return string
	// show fullText on hover
	$str .= '<span data-toggle="tooltip" data-placement="top" title="'. $statusInfo .'">';

	// old circles
	// $str .= ' class="tinyTrailStatusDot '. $trail->meta['statusInfo']['class'] .'"> ';

    // add icon
	if ($trail->meta['statusInfo']['class'] == "success"){
		$str .= '<i class="fas fa-check-circle tinyTrailStatusIcon success"></i>';
	} else if ($trail->meta['statusInfo']['class'] == "warning"){
		$str .= '<i class="fas fa-exclamation-triangle tinyTrailStatusIcon warning"></i>';
	} else if ($trail->meta['statusInfo']['class'] == "danger"){
		$str .= '<i class="fas fa-times-circle tinyTrailStatusIcon danger"></i>';
	}



	$str .= " </span> \n";
	$str .= '<span class="sr-only">'. $trail->meta['statusInfo']['text'] ." </span> \n";
	$str .= '<span class="tinyTrailStatusTitle"><a href="/trails/'. $trail->post_name .'">'. $trail->post_title ."</a> </span> \n";
	$str .= '<span class="tinyTrailStatusUpdated">'. $trail->meta['updated'] ." </span> \n";
	return $str;
}

$difficulty_arr = array(

	"EASY" => array(
		"color" => "#588f00",
		"img" => "green.svg"
	),
	"EASY/INTERMEDIATE" => array(
		"color" => "#588f00",
		"img" => "greenBlue.svg"
	),
	"INTERMEDIATE" => array(
		"color" => "#0066cd",
		"img" => "blue.svg"
	),
	"INTERMEDIATE/DIFFICULT" => array(
		"color" => "#0066cd",
		"img" => "blueBlack.svg"
	),
	"DIFFICULT" => array(
		"color" => "#000000",
		"img" => "black.svg"
	),
	"EXTREMELY DIFFICULT" => array(
		"color" => "#000000",
		"img" => "dblack.svg"
	)
);


// the trail status in the head of a trail page
function om_return_trail_status_html_header($trail)
{
	// print "<pre>";
	// print_r($trail);
	// print "</pre>";

	global $difficulty_arr;

	$str = "<div class='headerTrailStatus'>";
	$str .= '<div class="row">';


	// status
	$str .= '<div class="col-sm-12 col-md-6 col-lg-3 mb-2">';

	// show extra info for status
	$statusInfo = $trail->meta['statusInfo']['fullText'];
	if ($trail->meta['status_details'] && $trail->meta['status_details'] != "") {
		$statusInfo .= ": " . $trail->meta['status_details'];
	}

	// add mobile button - show fullText on hover
	$str .= '<div data-toggle="tooltip" data-placement="top" title="'. $statusInfo .'"';
	$str .= ' onclick="location.href=\'/trail-status-mobile\'" class="btn trail-status-rect bg-'. $trail->meta['statusInfo']['class'] .'">';
	$str .= $trail->meta['statusInfo']['text'];
	$str .= '</div> ';
	$str .= '<span class="headerTrailStatusUpdated">'. $trail->meta['updated'] . "</span>";

	$str .= '</div>';


	// data
	$str .= '<div class="col-sm-12 col-md-6 col-lg-4 mb-2">';
	$str .= '<table class="table table-sm table-borderless">';
	$str .= '<tr>';

	// DIFFICULTY
	if (isset($trail->meta['difficulty']) && !empty($trail->meta['difficulty'])) {
		$str .= "<td rowspan='2'>";
		$str .= "<div data-toggle='tooltip' data-placement='top' title='". $trail->meta['difficulty'] ."' ";
		$str .= " class='difficulty' style='background-image:";
		$str .= " url(". get_stylesheet_directory_uri() . "/img/difficulty/" . $difficulty_arr[$trail->meta['difficulty']]["img"] . "); background-size: contain;'";
		$str .= " '> </div></td>";
	}
	if (isset($trail->meta['length']) && !empty($trail->meta['length'])) {
		$str .= "<td>" . $trail->meta['length'] . " miles</td>";
	}
	if (isset($trail->meta['ascent']) && !empty($trail->meta['ascent'])) {
		$str .= "<td>" . "Ascent: " . $trail->meta['ascent'] ."'</td>";
	}

	$str .= '</tr><tr>';

	if (isset($trail->meta['percentage_singletrack']) && !empty($trail->meta['percentage_singletrack'])) {
		$str .= "<td>" . $trail->meta['percentage_singletrack'] ."% Singletrack</td>";
	}
	if (isset($trail->meta['descent']) && !empty($trail->meta['descent'])) {
		$str .= "<td>" . "Descent: " . $trail->meta['descent'] ."'</td>";
	}
	$str .= '</tr>';
	$str .= '</table>';
	$str .= '</div>';


	// external links
	$str .= '<div class="col-sm-12 col-lg-5 external-links mb-2">';

	if (isset($trail->meta['mtb_project_page']) && !empty($trail->meta['mtb_project_page'])) {
		$str .= '<a title="View on MTB Project" href="'. $trail->meta['mtb_project_page'] .'" target="_blank" class="btn btn-primary">MTB Project</a>';
	}
	if (isset($trail->meta['trailforks_page']) && !empty($trail->meta['trailforks_page'])) {
		$str .= '<a title="View on Trailforks" href="'. $trail->meta['trailforks_page'] .'" target="_blank" class="btn btn-primary">Trailforks</a>';
	}
	if (isset($trail->meta['lat_lng']) && !empty($trail->meta['lat_lng'])) {
		$str .= '<a title="Driving directions to trail head" href="https://maps.google.com/?daddr='. $trail->meta['lat_lng'] .'" target="_blank" class="btn btn-primary" rel="noopener noreferrer"><i class="fas fa-map-marker-alt" style="padding-right:3px"></i> Google Maps</a>';
	}
	$str .= '</div>';



	$str .= "</div>"; // .row
	$str .= "</div>"; // .headerTrailStatus
	return $str;
}

// the trail info and thumbnail
function om_return_trail_card_html($trail)
{
	global $difficulty_arr;

	// print "<pre>";
	// print_r($trail);
	// print "</pre>";

	$str = '<div class="card text-white bg-dark mb-3 trail-card" >';

	$str .= '<div class="w-100 img-fluid"><img src="'. $trail->thumbnail[0] .'" /></div>';

	$str .= '<div class="card-body">';
	// show fullText on hover
	$str .= '<a href="/trails/'. $trail->post_name .'" title="'. $trail->meta['statusInfo']['fullText'] .'" class="stretched-link">';


	// show extra info for status
	$statusInfo = $trail->meta['statusInfo']['fullText'];
	if ($trail->meta['status_details'] && $trail->meta['status_details'] != "") {
		$statusInfo .= ": " . $trail->meta['status_details'];
	}

	$str .= '<span class="card-title ">';
	$str .= '<span data-toggle="tooltip" data-placement="top" title="'. $statusInfo .'"';
	$str .= ' class="tinyTrailStatusDot bg-'. $trail->meta['statusInfo']['class'] .'"> </span> ';
	$str .= $trail->post_title .'</span> ';

	$str .= '<div class="card-text text-muted">';
	// $trail->meta['updated']


	// DIFFICULTY
	// if (isset($trail->meta['difficulty']) && !empty($trail->meta['difficulty']) ){


	//     $str .= "<span data-toggle='tooltip' data-placement='top' title='". $trail->meta['difficulty'] ."' ";
	//     $str .= " class='difficulty' style='background-image:";
	//     $str .= " url(". get_stylesheet_directory_uri() . "/img/difficulty/" .
	//         $difficulty_arr[$trail->meta['difficulty']]["img"] . "); background-size: contain;'";
	//     $str .= " '> </span>";

	// }
	if (isset($trail->meta['length']) && !empty($trail->meta['length'])) {
		$str .= "<span>" . $trail->meta['length'] . " miles</span> • ";
	}
	// if (isset($trail->meta['percentage_singletrack']) && !empty($trail->meta['percentage_singletrack']) ){
	//     $str .= '<span>'. $trail->meta['percentage_singletrack'] ."% Singletrack</span> • ";
	// }
	if (isset($trail->meta['ascent']) && !empty($trail->meta['ascent'])) {
		$str .= "<span>" . "Ascent: " . $trail->meta['ascent'] ."'</span>";
	}

	$str .= '</div>';



	$str .= '</a>';
	$str .= '</div>';

	$str .= '</div>';





	return $str;
}







/* HELPER FUNCTIONS */


/**
 *  Trim string to nearest sentence based on limit
 *  Source: https://stackoverflow.com/a/42613482/441878
 */
function sentenceTrim($str, $maxLength = 300)
{
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
function removeTags($str)
{
	// remove all link and link content
	$str = preg_replace('#<a.*?>.*?</a>#i', '', $str);
	// remove all tags
	$str = strip_tags($str);
	return $str;
}
function getYear($date)
{
	return date("Y", strtotime($date));
}
function getMonthShort($date)
{
	return date("M", strtotime($date));
}
function getDayWithZero($date)
{
	return date("d", strtotime($date));
}





/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 */
function get_breadcrumb()
{
	$post = get_post();

	// print "<pre>";
	// print_r($post);
	// print "</pre>";


	// don't show by default
	$print_html = false;
	// start breadcrumb
	$html = "<div class='om-breadcrumb'>";
	$html .= '<a href="' . home_url() . '" rel="nofollow">Home</a>';

	if (is_category() || is_single()) {
		$html .= "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
		get_the_category(' &bull; ');
		if (is_single()) {
			$html .= " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
			get_the_title();
		}
		$print_html = true;
	} elseif (is_page() && $post->post_parent) {
		if ($post->post_parent) {
			$html .= "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
			$html .= '<a href="/' . get_post_field('post_name', $post->post_parent) . '" rel="nofollow">'. get_the_title($post->post_parent) .'</a>';
		}
		$html .= "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
		$html .= '<a href="./" rel="nofollow">'. get_the_title($post->ID) .'</a>';
		$print_html = true;
	} elseif (is_page()) {
		$html .= "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
		$html .= get_the_title();
		$print_html = true;
	} elseif (is_search()) {
		$html .= "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
		$html .= '"<em>';
		$html .= get_search_query();
		$html .= '</em>"';
		$print_html = true;
	}
	$html .= "</div>";

	if ($print_html == true) {
		print $html;
	}
}


/**
 * Remove the campaign summary block (funds raised, number of donors, etc).
 */
function en_remove_campaign_summary_block()
{
	remove_action('charitable_campaign_content_before', 'charitable_template_campaign_summary', 6);

	// If you still want to show a Donate button, uncomment the line below.
	// add_action( 'charitable_campaign_content_before', 'charitable_template_donate_button', 6 );
}

add_action('after_setup_theme', 'en_remove_campaign_summary_block', 11);






