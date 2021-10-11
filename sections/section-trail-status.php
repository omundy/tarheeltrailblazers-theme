<?php

// get all the trails
$trails = om_get_all_trails();

// print "<pre>";
// print_r($trails);
// print "</pre>";


// only proceed if trails are found then start section
if (count($trails)) { ?>

    
<div class="container-fluid trail-status-wrapper py-4">
    <div class="trail-status-mobile-btn">
        <a href="/trail-status-mobile/"><i class="fa fa-mobile" aria-hidden="true"></i></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">Status only changes when conditions change</div>
        </div>


        <div class="row"> 

            <?php        

            $count = count($trails);
            $rowsPerCol = $count / 3;
            // e.g. 19/3 = 6 r1
            // e.g. 20/3 = 6 r2
            // e.g. 21/3 = 7
          
            $row = 1;
            $col = 1;

            // loop through all the trails
            foreach ($trails as $trail) {
                //print $trail->post_title . "<br>";

                // print "<pre>";
                // print_r($trails);
                // print "</pre>";

                // // print each column first, then each row
                // print '<div class="col-12 col-md-6 col-xl-4">';
                // print om_return_trail_status_html_tiny($trail);
                // print "</div>";



                // open a column
                // print each row first, then each column
                if ($row <= 1){
                    print '<div class="col-12 col-md-6 col-lg-4">';
                }
                // trail
                print '<div>';
                // print $row . '/'. $col; 
                print om_return_trail_status_html_tiny($trail);
                print '</div>';

                // end col
                if ($row >= $rowsPerCol){
                    print '</div>';
                    $row = 0;
                    $col ++;
                }      
                $row ++;

                if ($row >= $count-1){
                    print '</div>';
                }
             }

            ?>
            </div><!-- / .col-12 -->
        </div><!-- / .row -->


         <div class="row"> 

            <div class="col-12 pt-4">

                <div class="mx-auto w-75 text-center">
                    <h4 style="display: inline-block;" class="text-center">Don't ride muddy trails!</h4>

                    <span data-toggle="tooltip" data-placement="top" title="<?php print $trailStatusInfo_arr['Open']['fullText']; ?>" class="ml-3">
                        <i class="fas fa-check-circle tinyTrailStatusIcon success"></i>
                    </span> open

                    <span data-toggle="tooltip" data-placement="top" title="<?php print $trailStatusInfo_arr['Caution']['fullText']; ?>" class="ml-3">
                        <i class="fas fa-exclamation-triangle tinyTrailStatusIcon warning"></i>
                    </span> caution

                    <span data-toggle="tooltip" data-placement="top" title="<?php print $trailStatusInfo_arr['Closed']['fullText']; ?>" class="ml-3">
                        <i class="fas fa-times-circle tinyTrailStatusIcon danger"></i>
                    </span> closed

                </div>

                <?php 
                // good 
                // print_r(om_return_trail_status_info('Caution')['fullText']); 

                // better 
                // print_r($trailStatusInfo_arr['Open']);
                // print $trailStatusInfo_arr['Open']['fullText'];
                ?>

            </div><!-- / .col-12 -->
        </div><!-- / .row -->

    </div><!-- / .container -->
</div><!-- / .container-fluid -->

<?php } ?>
