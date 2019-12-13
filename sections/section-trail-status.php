<?php

// get all the trails
$trails = om_get_all_trails();

// print "<pre>";
// print_r($trails);
// print "</pre>";


// only proceed if trails are found
if (count($trails)){

    // start section 
    print '<div class="container-fluid trail-status-wrapper py-4">';
    print '<div class="trail-status-mobile-btn"><a href="/trail-status-mobile/"><i class="fa fa-mobile" aria-hidden="true"></i></a></div>';
    print '<div class="container">';
    print '<div class="row align-items-center">';

    // loop through all the trails
    foreach ($trails as $trail) {
        //print $trail->post_title . "<br>";

        // print "<pre>";
        // print_r($trails);
        // print "</pre>";

        // print div and returned html
        print '<div class="col-12 col-md-6 col-xl-4">';
        print om_return_trail_status_html_tiny($trail);
        print "</div>";


     } // end foreach

    // end section 
    print '</div>';
    print '</div>';
    print '</div>';

} // end if 

?>



