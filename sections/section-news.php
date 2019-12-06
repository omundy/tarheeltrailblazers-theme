<?php
/**
 *  A custom script to show events from The Event Calendar plugin as a full-width section
 */
// query for events
$args = array(
    'posts_per_page' => 3,
    'post_status' => 'publish',
    // 'post_type' => 'tribe_events',
    'order'=> 'ASC',
    'orderby' => '',
    // 'meta_query' => array(
    //     array(
    //         'key' => '_EventOrigin',
    //         'value' => 'events-calendar',
    //         'compare' => '=',
    //     )
    // ),
);
$query = new WP_Query($args);
$posts = $query->posts;
// print_r($query);

// if there are posts, display the section
if (count($posts) > 0){ 



foreach ( $posts as $post ){

            // var for the background image from the post
        $bgimage = "";
        // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail($recent['ID']) ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent['ID'] ), 'single-post-thumbnail' );
            //print_r($image);
            $bgimage = "style='background-image:url(". $image[0] .");'";
        }


print_r($image);

// print_r($post);

}

}

?>








<div class="container-fluid wrapper-news-section pt-4 pb-4 justify-content-center">
    <div class="container">


        <div class=" d-lg-inline row extra-news justify-content-center">

            <div class="row">

                <div class="card card-two pb-2 col-md-4 col-12" style="width: 100%; height:100%">
                    <img alt="become a member" class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/img/3-home/news/become-a-member/Layer-19-color.png" />
                    <div class="card-body text-center">
                        <div style="height: 65%;">
                            <p class="card-text text-left">We have a new logo and gear!</p>
                        </div>

                        <div class="mt-2" style="height:35%;"><a class="btn btn-primary orange" href="#">READ MORE</a></div>
                    </div>
                </div>


                <div class="d-none d-md-block card card-two pb-2 col-md-4 col-12" style="width: 100%; height:100%">
                    <img alt="give monthly" class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/img/3-home/news/give-monthly/Layer-20-color.jpg" />
                    <div class="card-body text-center">
                        <div style="height: 65%;">
                            <p class="card-text text-left">The rain has missed us so far. Kids ride is still on for Purser Hulsey.</p>
                        </div>

                        <div class="mt-2" style="height:35%;"><a class="btn btn-primary orange" href="#">READ MORE</a></div>
                    </div>
                </div>


                <div class="d-none d-md-block card card-two pb-2 col-md-4 col-12" style="width: 100%; height:100%">
                    <img alt="volunteer" class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/img/3-home/news/volunteer/Layer-21-color.png" />
                    <div class="card-body text-center">
                        <div style="height: 65%;">
                            <p class="card-text text-left">The rain has missed us so far. Kids ride is still on for Purser Hulsey.</p>
                        </div>

                        <div class="mt-2" style="height:35%;"><a class="btn btn-primary orange" href="#">READ MORE</a></div>
                    </div>
                </div>


            </div>

        </div>



        <div class="row mt-4">
            <div class="col-12 text-center">
                <button class="btn btn-outline-light darknavitem mb-2 mb-lg-0 pl-2 pr-2" type="button">MORE NEWS</button>
            </div>
        </div>


    </div>
</div>
