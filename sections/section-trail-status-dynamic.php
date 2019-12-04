

<?php


//get_usnwc_status();


// get all the trails
$trails = get_all_trails();
//var_dump($trails);

// print "<pre>";
// print_r($trails);
// print "</pre>";

if (count($trails)){

?>




<div class="container-fluid trail-status">
<div class="container">
<div class="row align-items-center">

        <?php

      $col = 0;
      $row = 0;

        foreach ($trails as $trail) {
          //print $trail->post_title . "<br>";

            // print "<pre>";
            // print_r($trails);
            // print "</pre>";



        ?>

        


              <?php if ($row == 0){ ?>

                <div class="col-lg-4">
                <ul>

              <?php }

                    $id = $trail->ID;
                    $trailStatus = returnTrailStatus($id);


                    $trailStatusArr = array(
                        'status' => $trailStatus,
                        'id' => $id,
                        'slug' => $trail->post_name,
                        'title' => $trail->post_title
                    );

                    // print "<pre>";
                    // print_r($trailStatusArr);
                    // print "</pre>";

                    print returnTrailStatusTinyNew($trailStatusArr);


              $row ++;




              if ($row >= 8){
                print "</ul>";
                print "</div>";

                $col++;
                $row=0;
              }

          }

          ?>

    </div>


<?php } ?>