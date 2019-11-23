
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




<div class="wrapper">
   <div class="container">

        <?php

      $col = 1;
      $row = 1;

        foreach ($trails as $trail) {
          //print $trail->post_title . "<br>";

            // print "<pre>";
            // print_r($trails);
            // print "</pre>";



        ?>

        <div class="row mb-2">


              <?php if ($row == 1){ ?>

                  <div class="col-4">

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


              print "row=".$row."/col=".$col;


              if ($row >= 8){

                print "</div>";

                $col++;
                $row=1;
              }

          }

          ?>

    </div>


<?php } ?>