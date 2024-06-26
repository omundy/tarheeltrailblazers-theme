<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');




// $trail_export = om_export_trails_csv();
// print "<pre>\n\n";
// print_r($trail_export);
// print "\n\n</pre>";



function get_data_from_api($url) {

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
         "Content-Type: application/json",
         "cache-control: no-cache"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);

    // decode the response from the API
    // $data = array(json_decode($response, true));
    $data = json_decode($response, true);

    // print_r($data);
    return $data;
}


$url = "https://trailbot.com/api/trails/AirlineBikePark?apiKey=3a53270e-3a5a-46f6-bee0-35b98aa13750";
$airline = get_data_from_api($url);
// print "<pre>";
// print_r($airline);
// print "</pre>";

$url = "https://trailbot.com/api/trails?apiKey=3a53270e-3a5a-46f6-bee0-35b98aa13750";
$trails = get_data_from_api($url);

// add airline
array_unshift($trails, $airline);
// print "<pre>";
// print_r($trails);
// print "</pre>";

// only proceed if trails are found then start section
if (count($trails)) { 
    print_trail($trails);
}










function print_trail($trails){
?>
    
<div class="container-fluid trail-status-wrapper py-4">
    <div class="trail-status-mobile-btn">
        <a href="/trail-status-mobile/"><i class="fa fa-mobile" aria-hidden="true"></i></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">Status only changes when conditions change</div>
        </div>

        <div class="row"> 

            <!-- flow down then right -->
            <div class='threeTwoOneColumns'>

            <?php        

            $count = count($trails);
            $rowsPerCol = $count / 3;
            // e.g. 19/3 = 6 r1
            // e.g. 20/3 = 6 r2
            // e.g. 21/3 = 7
          
            $row = 1;
            $col = 1;



            // loop through all the trails
            // flow down then right
            foreach ($trails as $trail) {

                // print "<pre>";
                // print_r($trail["trailId"]);
                // print "</pre>";


                // test - first character
                $char = substr($trail['trailId'], 0, 1);
                if ($char == "A" || $char == "B" || $char == "C" || $char == "D"){
                    print "<div>\n";
                    print om_return_trail_status_html_tiny_trailbot($trail);
                    print "</div>\n\n";
                }
             }

            ?>


                <!-- </div> -->

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


