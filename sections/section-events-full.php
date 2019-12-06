<?php
/**
 *  A custom script to show events from The Event Calendar plugin as a full-width section
 */
// query for events
$args = array(
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'post_type' => 'tribe_events',
    'order'=> 'ASC',
    'orderby' => '',
    'meta_query' => array(
        array(
            'key' => '_EventOrigin',
            'value' => 'events-calendar',
            'compare' => '=',
        )
    ),
);
$query = new WP_Query($args);
$posts = $query->posts;
//print_r($query);




// if there are posts, display the section
if (count($posts) > 0){ ?>

    <div class="wrapper-hero wrapper-light-green px-0">
       <div class="container">
            <div class="row py-3">
                <div class="col-md-6 col-lg-7 col-xl-8 d-none d-md-block pl-0">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Protect-Monarch-Butterflies-1500w.jpg" alt="">
                </div>
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="row mt-2">
                        <div class="col-12">
                            <h3>DLC Events</h3>
                        </div>
                    </div>
<?php
    foreach ( $posts as $post ){
        // if there is post data
        if ($post->post_title && $post->post_title == "") continue;
            //print_r($post);
            //print_r($post->post_title);
            //echo the_permalink();
            // make postdata available, not needed?
            //setup_postdata( $post );
?>
                    <a href="<?php the_permalink(); ?>" class="event-link" title="<?php the_title(); ?>">
                        <div class="row date-event">
                            <div class="col-2">
                                <div class="date-box">
                                    <div class="date-day text-center">
                                        <?php echo getDayWithZero($post->EventStartDate); ?>
                                    </div>
                                    <div class="date-month text-center">
                                        <?php echo getMonthShort($post->EventStartDate); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-10 pl-md-4">
                                <div class="event-title">
                                    <?php the_title(); ?>
                                </div>
                                <div class="event-content">
                                    <?php
                                        if ($post->post_excerpt == '') {
                                            echo '<p>'. sentenceTrim($post->post_content,100) .'</p>';
                                        } else {
                                           echo '<p>'. sentenceTrim($post->post_excerpt,100) .'</p>';
                                        }
                                    ?>
                                </div>
                                <?php /*echo print_r($post);*/ ?>
                            </div>
                        </div>
                    </a>
<?php } /* /foreach */ ?>

                    <div class="row my-4">
                        <div class="col-12 d-flex justify-content-center">
                            <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>events" title="Events">SEE ALL EVENTS</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php } /* /if */ ?>












<div class="container-fluid section-events" id="section-events">
<div class="container pt-5">
<div class="row mt-5">
<div class="col-10 col-md-8 col-lg-5 col-xl-4 offset-1 offset-md-2 offset-lg-7 offset-xl-8">
<div class="card section-event-card">
<div class="dark-green-line"></div>

<div class="card-body">
<h5 class="card-title text-center">Tarheel Trailblazer Events</h5>

<p class="card-text"></p>

<div class="row event">
<div class="col-2 date text-center mb-4 pr-0 pl-0 mt-1">
<h4>01</h4>

<p>SEP</p>
</div>

<div class="col-10 adress">
<p>Mountain island Lake Trail Workday</p>

<p class="mb-0">400 Mountain Island Rd., Mt. Holly, NC</p>
</div>
</div>

<div class="row event">
<div class="col-2 date text-center mb-4 pr-0 pl-0 mt-1">
<h4>01</h4>

<p>SEP</p>
</div>

<div class="col-10 adress">
<p>Mountain island Lake Trail Workday</p>

<p class="mb-0">North Mecklenburg Park, Huntersville, NC</p>
</div>
</div>

<div class="row event">
<div class="col-2 date text-center pr-0 pl-0 mt-1">
<h4>04</h4>

<p>SEP</p>
</div>

<div class="col-10 adress">
<p>Club Meeting</p>

<p class="mb-0">NC Velo, Charlotte, NC</p>
</div>
</div>

<div class="row d-flex justify-content-center"><button class="btn btn-outline-light dark rounded-0 mt-4" name="allevents" type="button">SEE ALL EVENTS</button></div>
</div>
</div>
</div>
</div>
</div>
</div>
