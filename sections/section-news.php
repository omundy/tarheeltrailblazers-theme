<?php


function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}



/**
 *  A custom script to show events from The Event Calendar plugin as a full-width section
 */
// query for events
$args = array(
    'cat' => 6, // news
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'post_type' => 'post',
    'order'=> 'DESC',
    'orderby' => 'post_date'
);
$query = new WP_Query($args);
$posts = $query->posts;
// print_r($query);

// if there are posts, display the section
if (count($posts) > 0){

?>


<div class="container-fluid wrapper-news-section py-2 justify-content-center"><!-- wrapper-news-section -->
    <div class="container">



        <div class="row justify-content-center"><!-- row -->

<?php

foreach ($posts as $key => $data) {
    // print "<pre>";
    // print_r($key);
    // print_r($data);
    // print "</pre>";


    // var for the background image from the post
    $bgimage = "";
    // check if the post has a Post Thumbnail assigned to it.
    if ( has_post_thumbnail($data->ID) ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $data->ID ), 'single-post-thumbnail' );
        //print_r($image);
        $bgimage = "background-image:url(". $image[0] .");";
    }

?>

			<div class="col-12 col-sm-6 col-md-4 text-center">

				<div class="card news-card mb-1" style="width: 100%;">

					<a href="<?php echo $data->guid; ?>" class="" title="<?php echo $data->post_title; ?>">

						<div class="news-card-img" style="<?php echo $bgimage ?>"></div>

						<div class="card-body">
							<div class="card-text">
		                        <div class="my-3"><?php echo $data->post_title; ?></div>
		                   
			                    <div class="my-3">
			                    	<a class="btn btn-primary orange" href="<?php echo $data->guid; ?>">READ MORE</a>
			                    </div>
							</div>
						</div><!-- / card-body -->
					</a>

				</div>
				
			</div>

<?php

    }
}

?>     

        </div><!-- / row -->


        <div class="row mt-4">
            <div class="col-12 text-center">
                <!-- <button onclick="location.href='/category/news'" class="btn btn-outline-light darknavitem mb-2 mb-lg-0 pl-2 pr-2" type="button">MORE NEWS</button> -->
                <a href='/category/news' class="btn btn-outline-light darknavitem mb-2 mb-lg-0 pl-2 pr-2">MORE NEWS</a>
            </div>
        </div>


    </div><!-- / container -->
</div><!-- / wrapper-news-section -->
