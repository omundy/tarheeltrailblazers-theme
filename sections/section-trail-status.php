<?php

// will do this later ...
//get_usnwc_status();


// get all the trails
$trails = om_get_all_trails();
//var_dump($trails);
// print "<pre>";
// print_r($trails);
// print "</pre>";


// only proceed if trails are found
if (count($trails)){

    // start section 
    print '<div class="container-fluid trail-status pb-4">';
    print '<div class="trail-status-mobile-btn"><a href="/trail-status-json/"><i class="fa fa-mobile" aria-hidden="true"></i></a></div>';
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

        // print returned html 
        print om_return_trail_status_html_tiny($trail);

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








<!-- 
<div class="container-fluid trail-status">



<div class="container">
<div class="row align-items-center">
<div class="col-lg-4">
<ul>
    <li class="unavailable"><span class="trail-name">Anne Springs</span> <span class="time-info">7/16-7:17 am</span></li>
    <li class="available"><span class="trail-name">Backyard Trails</span> <span class="time-info">8/23-10:57 am</span></li>
    <li class="unavailable"><span class="trail-name">Ballantyne District Park</span> <span class="time-info">8/23-10:57 am</span></li>
    <li class="questionable"><span class="trail-name">Big Leaf Slopes Park</span> <span class="time-info">8/23-10:58 am</span></li>
    <li class="available"><span class="trail-name">Cedar Valley Bike Park</span> <span class="time-info">8/29-5:31 am</span></li>
    <li class="available"><span class="trail-name">Col. Francis Beatty Park</span> <span class="time-info">8/23-10:58 am</span></li>
    <li class="available"><span class="trail-name">Fisher Farm Park</span> <span class="time-info">8/16-7:17 am</span></li>
    <li class="available"><span class="trail-name">Harrisburg Half</span> <span class="time-info">8/23-10:59 am</span></li>
</ul>
</div>

<div class="col-lg-4">
<ul>
    <li class="available"><span class="trail-name">Huntersville Elem. School </span> <span class="time-info">7/16-7:17 am</span></li>
    <li class="available"><span class="trail-name">Jetton Park</span> <span class="time-info">8/23-10:57 am</span></li>
    <li class="available"><span class="trail-name">Lake Norman State Park</span> <span class="time-info">8/23-10:57 am</span></li>
    <li class="available"><span class="trail-name">Mazeppa Park</span> <span class="time-info">8/23-10:58 am</span></li>
    <li class="questionable"><span class="trail-name">Mountain Island Park</span> <span class="time-info">8/29-5:31 am</span></li>
    <li class="unavailable"><span class="trail-name">North Mecklenburg Park</span> <span class="time-info">8/23-10:58 am</span></li>
    <li class="available"><span class="trail-name">Park Road Park</span> <span class="time-info">8/16-7:17 am</span></li>
    <li class="unavailable"><span class="trail-name">Purser Hulsey Park</span> <span class="time-info">8/23-10:59 am</span></li>
</ul>
</div>

<div class="col-lg-4">
<ul>
    <li class="unavailable"><span class="trail-name">Renaissance Park</span> <span class="time-info">7/16-7:17 am</span></li>
    <li class="available"><span class="trail-name">Rocky Branch Trail</span> <span class="time-info">8/23-10:57 am</span></li>
    <li class="unavailable"><span class="trail-name">Rocky River Trail</span> <span class="time-info">8/23-10:57 am</span></li>
    <li class="questionable"><span class="trail-name">Sherman Branch</span> <span class="time-info">8/23-10:58 am</span></li>
    <li class="available"><span class="trail-name">Signal Hill</span> <span class="time-info">8/29-5:31 am</span></li>
    <li class="available"><span class="trail-name">Southwest District Park</span> <span class="time-info">8/23-10:58 am</span></li>
    <li class="available"><span class="trail-name">USNWC</span> <span class="time-info">8/16-7:17 am</span></li>
    <li class="available"><span class="trail-name">Uwharrie</span> <span class="time-info">8/23-10:59 am</span></li>
</ul>
</div>
</div>

</div>
</div> -->