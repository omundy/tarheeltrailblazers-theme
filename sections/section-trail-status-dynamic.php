<?php

// will do this later ...
//get_usnwc_status();


// get all the trails
$trails = get_all_trails();
//var_dump($trails);
// print "<pre>";
// print_r($trails);
// print "</pre>";


// only proceed if trails are found
if (count($trails)){

    // start section 
    print '<div class="container-fluid trail-status pb-4">';
    print '<div class="container">';
    print '<div class="row align-items-center">';

    // starting position 
    $col = 0;
    $row = 0;

    // loop through all the trails
    foreach ($trails as $trail) {
        //print $trail->post_title . "<br>";

        // print "<pre>";
        // print_r($trails);
        // print "</pre>";

        // if on the first row
        if ($row == 0){
            // print a new column
            print '<div class="col-lg-4">';
            print '<ul class="my-0">';
        }

        // get id and trail status 
        $id = $trail->ID;
        $trailStatus = returnTrailStatusData($id);

        // create array for printing html 
        $trailStatusArr = array(
            'status' => $trailStatus,
            'id' => $id,
            'slug' => $trail->post_name,
            'title' => $trail->post_title
        );

        // print "<pre>";
        // print_r($trailStatusArr);
        // print "</pre>";

        // print returned html 
        print returnTrailStatusHtmlTinyNew($trailStatusArr);

        // move to next row
        $row ++;

        // if we are on the last row 
        if ($row >= 8){
            // finish column
            print "</ul>";
            print "</div>";
            // move to next column
            $col++;
            // start at row zero
            $row=0;
        }

     } // end foreach

    // end section 
    print '</div>';
    print '</div>';
    print '</div>';

} // end if 

?>

