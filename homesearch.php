<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset ="UTF-8">
         <link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel = "stylesheet" type="text/css" href="./css/homepage.css">
    </head>
    <body >
        <div class="container">
        <?php
        include 'variables.php';
        $street= $_POST["streetAddress"];
        $city =$_POST["cityAddress"];
        $state = $_POST["stateAddress"];
        $query1 = $url1."&address=".$street."&citystatezip=".$city."%2C+".$state."&rentzestimate=true";     //GetDeepSearchResults
        echo "<br>" . "Search Successful.";
        echo "<br> Your search URL is: <br>";
        echo $query1 . "<br>";

                    $numFloors = "N/A";
                    $yearUpdated = "N/A";
                    $numRooms = "N/A";
                    $basement = "N/A";
                    $exteriorMaterial = "N/A";
                    $roof = "N/A";
                    $view = "N/A";
                    $parkingType ="N/A";
                    $coveredParkingSpaces = "N/A";
                    $heatingSources = "N/A";
                    $heatingSystem = "N/A";
                    $coolingSystem = "N/A";
                    $appliances = "N/A";
                    $floorCovering = "N/A";
                    $rooms = "N/A";
                    $architecture = "N/A";
                            $useCode="N/A";
        $lastSoldPrice="N/A";
        $yearBuilt="N/A";
        $lastSoldDate="N/A";
        $lotSizeSqFt="N/A";
        $estimateLastUpdate="N/A";
        $estimateAmount="N/A";



        $xml= simplexml_load_file(urlencode($query1));          //GetDeepSearchResults
        file_put_contents('./file.xml', $xml);
        echo "<br>". "These values have been retreived from the URL response <br>" ;
        echo "<br>" . "Address searched for is: ". $xml->request->address . "<br>";
        echo "<br>" . "City and state are : " . $xml->request->citystatezip. "<br>";
        echo "ZPID OF HOUSE 1 IS: " .$xml->response->results->result[0]->zpid . "<br>";
//        echo "ZPID OF HOUSE 2 IS: " .$xml->response->results->result[1]->zpid . "<br>";

        echo "<br>" . $xml . "<br>";
        if($xml->message->code == 0)
        {
        foreach($xml->response->results->result as $result)
         {
          /* GetDeepSearchResults querying*/
//          echo "<br>" . "<h2> House # </h2>". "<br>" ;
//          echo "<br>" . "ZPID OF HOUSE: ". (string)$result->zpid . "<br>";

            $strAddr = $result->address->street;
            $zip = $result->address->zipcode;
            $cityAddr = $result->address->city;
            $stateAddr = $result->address->state;
            $zpid = $result->zpid;
//            $yearBuilt = $result->yearBuilt;
//            $lotSize = $result->lotSizeSqFt;
//            $bedrooms = $result->bedrooms;
//            $finishedSize = $result->finishedSqFt;
//            $bathrooms = $result->bathrooms;
//            $rooms = $result->totalRooms;
//            $lastSoldDate = $result->

            $query2 = $url2."&zpid=".$zpid;
            $xml1 = simplexml_load_file(urlencode($query2));



        $useCode="N/A";
        if(isset($result->useCode) &&  $result->useCode!="")
                $useCode=$result->useCode;
        //echo "Usecode =".$useCode;

        $lastSoldPrice="N/A";
        if(isset($result->lastSoldPrice) &&  $result->lastSoldPrice!="")
                $lastSoldPrice=number_format((float)$result->lastSoldPrice,2,".",",");
       // echo "Last Sold Price =".$lastSoldPrice;

        $yearBuilt="N/A";
        if(isset($result->yearBuilt))
                $yearBuilt=$result->yearBuilt;
        //echo $yearBuilt;

        $lastSoldDate="N/A";
        if(isset($result->lastSoldDate) &&  $result->lastSoldDate!="")
                $lastSoldDate=date("j-M-Y", strtotime($result->lastSoldDate));

        $lotSizeSqFt="N/A";
        if(isset($result->lotSizeSqFt) &&  $result->lotSizeSqFt!="")
                $lotSizeSqFt=number_format((float)$result->lotSizeSqFt,0,"",",");

        $estimateLastUpdate="N/A";
        if(isset($result->zestimate->{'last-updated'}) &&  $result->zestimate->{'last-updated'}!="")
                $estimateLastUpdate=date("j-M-Y", strtotime($result->zestimate->{'last-updated'}));

        $estimateAmount="N/A";
        if(isset($result->zestimate->amount) && $result->zestimate->amount!="")
                $estimateAmount=number_format((float)$result->zestimate->amount,2,".",",");

        $finishedSqFt="N/A";
        if(isset($result->finishedSqFt) &&  $result->finishedSqFt!="")
                $finishedSqFt=number_format((float)$result->finishedSqFt,0,"",",");

        $estimateValueChangeSign="N/A";
        $estimateValueChange="N/A";
        if(isset($result->zestimate->valueChange) &&  $result->zestimate->valueChange!=""){
                $estimateValueChange=str_replace('-', '', number_format((float)$result->zestimate->valueChange,2,".",","));
                if($result->zestimate->valueChange>0)
                        $estimateValueChangeSign="+";
                else if($result->zestimate->valueChange<0)
                        $estimateValueChangeSign="-";
        }

        $bathrooms="N/A";
        if(isset($result->bathrooms))
                $bathrooms=$result->bathrooms;

        $estimateValuationRangeLow="N/A";
        if(isset($result->zestimate->valuationRange->low) && $result->zestimate->valuationRange->low!="")
                $estimateValuationRangeLow=number_format((float)$result->zestimate->valuationRange->low,2,".",",");

        $estimateValuationRangeHigh="N/A";
        if(isset($result->zestimate->valuationRange->high) && $result->zestimate->valuationRange->high!="")
                $estimateValuationRangeHigh=number_format((float)$result->zestimate->valuationRange->high,2,".",",");

        $bedrooms="N/A";
        if(isset($result->bedrooms))
                $bedrooms=$result->bedrooms;

        $restimateLastUpdate="N/A";
        if(isset($result->rentzestimate->{'last-updated'}) && $result->rentzestimate->{'last-updated'}!="")
                $restimateLastUpdate=date("j-M-Y", strtotime($result->rentzestimate->{'last-updated'}));

        $restimateAmount="N/A";
        if(isset($result->rentzestimate->amount) && $result->rentzestimate->amount!="")
                $restimateAmount=number_format((float)$result->rentzestimate->amount,2,".",",");

        $taxAssessmentYear="N/A";
        if(isset($result->taxAssessmentYear))
                $taxAssessmentYear=$result->taxAssessmentYear;

        $restimateValueChange="N/A";
        $restimateValueChangeSign="N/A";
        if(isset($result->rentzestimate->valueChange) && $result->rentzestimate->valueChange!=""){
                $restimateValueChange=str_replace('-', '', number_format((float)$result->rentzestimate->valueChange,2,".",","));
                if($result->rentzestimate->valueChange>0){
                        $restimateValueChangeSign="+";
                }
                else if($result->rentzestimate->valueChange<0){
                        $restimateValueChangeSign="-";
                }
        }

        $taxAssessment="N/A";
        if(isset($result->taxAssessment) && $result->taxAssessment!="")
                $taxAssessment=number_format((float)$result->taxAssessment,2,".",",");

        $restimateValuationRangeLow="N/A";
        if(isset($result->rentzestimate->valuationRange->low) && $result->rentzestimate->valuationRange->low!="")
                $restimateValuationRangeLow=number_format((float)$result->rentzestimate->valuationRange->low,2,".",",");

        $restimateValuationRangeHigh="N/A";
        if(isset($result->rentzestimate->valuationRange->high) && $result->rentzestimate->valuationRange->high!="")
                $restimateValuationRangeHigh=number_format((float)$result->rentzestimate->valuationRange->high,2,".",",");

       function updatedPropExists()
           {
               if(isset($editedFacts->useCode) && $editedFacts->useCode !="")
                       $useCode = $editedFacts->useCode;
                  // echo"<b> USE CODE 2 </b>". $useCode."<br>";

                   if(isset($editedFacts->bedrooms) && $editedFacts->bedrooms !="")
                       $bedrooms = $editedFacts->bedrooms;
                 //  echo"<br><b> Bedrooms 2  -</b>".$bedrooms."<br>";

//                    if(isset($editedFacts->finishedSqFt) && $editedFacts->finishedSqFt !="")
//                        $finishedSqFt1 = $editedFacts->finshedSqFt;
////                    else
////                        $finishedSqFt = number_format((float)$result->finishedSqFt,0,"",",");
////
                   if(isset($editedFacts->lotSizeSqFt ) && $editedFacts->lotSizeSqFt !="")
                       $lotSizeSqFt = $editedFacts->lotSizeSqFt;

                   if(isset($editedFacts->yearBuilt ) && $editedFacts->yearBuilt !="")
                       $yearBuilt = $editedFacts->yearBuilt;

                   $numFloors = "N/A";
                   if(isset($editedFacts->numFloors ) && $editedFacts->numFloors !="")
                       $numFloors  = $editedFacts->numFloors;

                   $yearUpdated = "N/A";
                   if(isset($editedFacts->yearUpdated ) && $editedFacts->yearUpdated !="")
                       $yearUpdated  = $editedFacts->yearUpdated;

                   $numRooms = "N/A";
                   if(isset($editedFacts->numRooms ) && $editedFacts->numRooms !="")
                       $numRooms  = $editedFacts->numRooms;

                   $basement = "N/A";
                   if(isset($editedFacts->basement ) && $editedFacts->basement !="")
                       $basement  = $editedFacts->basement;

                   $exteriorMaterial = "N/A";
                   if(isset($editedFacts->exteriorMaterial ) && $editedFacts->exteriorMaterial !="")
                       $exteriorMaterial  = $editedFacts->exteriorMaterial;

                   $roof = "N/A";
                   if(isset($editedFacts->roof ) && $editedFacts->roof !="")
                       $roof  = $editedFacts->roof;

                   $view = "N/A";
                   if(isset($editedFacts->view ) && $editedFacts->view !="")
                       $view  = $editedFacts->view;

                   $parkingType ="N/A";
                   if(isset($editedFacts->parkingType ) && $editedFacts->parkingType !="")
                       $parkingType  = $editedFacts->parkingType;

                   $coveredParkingSpaces = "N/A";
                   if(isset($editedFacts->coveredParkingSpaces ) && $editedFacts->coveredParkingSpaces !="")
                       $coveredParkingSpaces  = $editedFacts->coveredParkingSpaces;

                   $heatingSources = "N/A";
                   if(isset($editedFacts->heatingSources ) && $editedFacts->heatingSources !="")
                       $heatingSources  = $editedFacts->heatingSources;

                   $heatingSystem = "N/A";
                   if(isset($editedFacts->heatingSystem ) && $editedFacts->heatingSystem !="")
                       $heatingSystem  = $editedFacts->heatingSystem;

                   $coolingSystem = "N/A";
                   if(isset($editedFacts->coolingSystem ) && $editedFacts->coolingSystem !="")
                       $coolingSystem  = $editedFacts->coolingSystem;

                   $appliances = "N/A";
                   if(isset($editedFacts->appliances ) && $editedFacts->appliances !="")
                       $appliances  = $editedFacts->appliances;

                   $floorCovering = "N/A";
                   if(isset($editedFacts->floorCovering ) && $editedFacts->floorCovering !="")
                       $floorCovering  = $editedFacts->floorCovering;

                   $rooms = "N/A";
                   if(isset($editedFacts->rooms ) && $editedFacts->rooms !="")
                       $rooms  = $editedFacts->rooms;

                   $architecture = "N/A";
                   if(isset($editedFacts->architecture ) && $editedFacts->architecture !="")
                       $architecture  = $editedFacts->architecture;


           }

         if($xml1->message->code == 0)
            {
             $result1 = $xml1->response->editedFacts;
                foreach($xml1->response->editedFacts as $editedFacts)
                {
                  //  updatedPropExists();
                    if(isset($editedFacts->useCode) && $editedFacts->useCode !="")
                        $useCode = $editedFacts->useCode;
                   // echo"<b> USE CODE 2 </b>". $useCode."<br>";
                   // THIS IS IN UPDATEDPROPEXISTS FUNCTION
                    if(isset($editedFacts->bedrooms) && $editedFacts->bedrooms !="")
                        $bedrooms = $editedFacts->bedrooms;
                  //  echo"<br><b> Bedrooms 2  -</b>".$bedrooms."<br>";

//                    if(isset($editedFacts->finishedSqFt) && $editedFacts->finishedSqFt !="")
//                        $finishedSqFt1 = $editedFacts->finshedSqFt;
////                    else
////                        $finishedSqFt = number_format((float)$result->finishedSqFt,0,"",",");
////
                    if(isset($editedFacts->lotSizeSqFt ) && $editedFacts->lotSizeSqFt !="")
                        $lotSizeSqFt = $editedFacts->lotSizeSqFt;

                    if(isset($editedFacts->yearBuilt ) && $editedFacts->yearBuilt !="")
                        $yearBuilt = $editedFacts->yearBuilt;

                    $numFloors = "N/A";
                    if(isset($editedFacts->numFloors ) && $editedFacts->numFloors !="")
                        $numFloors  = $editedFacts->numFloors;

                    $yearUpdated = "N/A";
                    if(isset($editedFacts->yearUpdated ) && $editedFacts->yearUpdated !="")
                        $yearUpdated  = $editedFacts->yearUpdated;

                    $numRooms = "N/A";
                    if(isset($editedFacts->numRooms ) && $editedFacts->numRooms !="")
                        $numRooms  = $editedFacts->numRooms;

                    $basement = "N/A";
                    if(isset($editedFacts->basement ) && $editedFacts->basement !="")
                        $basement  = $editedFacts->basement;

                    $exteriorMaterial = "N/A";
                    if(isset($editedFacts->exteriorMaterial ) && $editedFacts->exteriorMaterial !="")
                        $exteriorMaterial  = $editedFacts->exteriorMaterial;

                    $roof = "N/A";
                    if(isset($editedFacts->roof ) && $editedFacts->roof !="")
                        $roof  = $editedFacts->roof;

                    $view = "N/A";
                    if(isset($editedFacts->view ) && $editedFacts->view !="")
                        $view  = $editedFacts->view;

                    $parkingType ="N/A";
                    if(isset($editedFacts->parkingType ) && $editedFacts->parkingType !="")
                        $parkingType  = $editedFacts->parkingType;

                    $coveredParkingSpaces = "N/A";
                    if(isset($editedFacts->coveredParkingSpaces ) && $editedFacts->coveredParkingSpaces !="")
                        $coveredParkingSpaces  = $editedFacts->coveredParkingSpaces;

                    $heatingSources = "N/A";
                    if(isset($editedFacts->heatingSources ) && $editedFacts->heatingSources !="")
                        $heatingSources  = $editedFacts->heatingSources;

                    $heatingSystem = "N/A";
                    if(isset($editedFacts->heatingSystem ) && $editedFacts->heatingSystem !="")
                        $heatingSystem  = $editedFacts->heatingSystem;

                    $coolingSystem = "N/A";
                    if(isset($editedFacts->coolingSystem ) && $editedFacts->coolingSystem !="")
                        $coolingSystem  = $editedFacts->coolingSystem;

                    $appliances = "N/A";
                    if(isset($editedFacts->appliances ) && $editedFacts->appliances !="")
                        $appliances  = $editedFacts->appliances;

                    $floorCovering = "N/A";
                    if(isset($editedFacts->floorCovering ) && $editedFacts->floorCovering !="")
                        $floorCovering  = $editedFacts->floorCovering;

                    $rooms = "N/A";
                    if(isset($editedFacts->rooms ) && $editedFacts->rooms !="")
                        $rooms  = $editedFacts->rooms;

                    $architecture = "N/A";
                    if(isset($editedFacts->architecture ) && $editedFacts->architecture !="")
                        $architecture  = $editedFacts->architecture;


                }
            }
            if($xml1->message->code == 502)
            {
                //updatedPropNotExist();
                    $numFloors = "N/A";
                    $yearUpdated = "N/A";
                    $numRooms = "N/A";
                    $basement = "N/A";
                    $exteriorMaterial = "N/A";
                    $roof = "N/A";
                    $view = "N/A";
                    $parkingType ="N/A";
                    $coveredParkingSpaces = "N/A";
                    $heatingSources = "N/A";
                    $heatingSystem = "N/A";
                    $coolingSystem = "N/A";
                    $appliances = "N/A";
                    $floorCovering = "N/A";
                    $rooms = "N/A";
                    $architecture = "N/A";

            //echo "<tr><td><b>No updated data is available for this property</b></td></tr> ";
            }





          $query2 = $url2."&zpid=".$result->zpid;               //GetUpdatedPropertyDetailsAPI
          $query3 = $url3."&zpid=".$result->zpid."&count=10";            //Get Comparables API
          $xml2 = simplexml_load_file(urlencode($query3));
         // echo $xml2;


          if($xml2->message->code == 0)
          {
              $i = 1;
              foreach($xml2->response->properties->comparables->comp as $comp)
              {
                $strAddr1 = $comp->address->street;

                $zip1 = $comp->address->zipcode;
                $cityAddr1 = $comp->address->city;
                $stateAddr1 = $comp->address->state;
                $zpid1 =$comp->zpid;
                $query4= $url2."&zpid=".$comp->zpid;
                $xml3 = simplexml_load_file($query4);
                echo "<br>SIMILAR HOMES #".$i."<br>".$query4;
                $i++;

              }

             // echo $query4;
          }
          echo "<br>";
          ?>

          <table class="table table-inverse">
          <tr><th>Home Properties</th><th>Value</th></tr>
          <tr><td>Street Address</td><td><?php echo $strAddr ?></td></tr>
            <tr><td>City </td><td><?php echo $cityAddr ?></td></tr>
            <tr><td>State </td><td><?php echo $stateAddr ?></td></tr>
            <tr><td>ZIP </td><td><?php echo $zip ?></td></tr>
            <tr><td>Year Built in </td><td><?php echo $yearBuilt ?></td></tr>
            <tr><td>Bedrooms </td><td><?php echo $bedrooms ?></td></tr>
            <tr><td>Bathrooms </td><td><?php echo $bathrooms ?></td></tr>
            <tr><td>Number of Families </td><td><?php echo $useCode  ?></td></tr>
            <tr><td>Lot Size in Square Feet </td><td><?php echo $lotSizeSqFt ?></td></tr>
            <tr><td> Finished area Size in Square Feet </td><td><?php echo $finishedSqFt ?></td></tr>
            <tr><td>Last Sold Price </td><td><?php echo "$".$lastSoldPrice  ?></td></tr>
            <tr><td>Last Sold Date</td><td><?php echo $lastSoldDate ?></td></tr>
            <tr><td> Estimated Market Value (Upper Limit)</td><td><?php echo "$".$estimateValuationRangeHigh  ?></td></tr>
            <tr><td>Estimated Market Value (Lower Limit) </td><td><?php echo "$".$estimateValuationRangeLow ?></td></tr>
            <tr><td> Estimated Rent Range </td><td><?php echo "$".$restimateValuationRangeLow." - $".$restimateValuationRangeHigh ?></td></tr>



            <tr colspan="2"><td>Year Updated in </td><td><?php echo $yearUpdated ?></td></tr>
            <tr><td>Number of Floors </td><td><?php echo $numFloors  ?> </td></tr>
            <tr><td>Number of Rooms </td><td><?php echo  $numRooms ?> </td></tr>
            <tr><td>Basement </td><td><?php echo $basement ?> </td></tr>
            <tr><td>Roof Type </td><td><?php echo $roof ?> </td></tr>
            <tr><td>Exterior Material </td><td><?php echo $exteriorMaterial  ?> </td></tr>
            <tr><td>View </td><td><?php echo $view ?> </td></tr>
            <tr><td>Parking Type </td><td><?php echo  $parkingType ?> </td></tr>
            <tr><td>Number of Covered Parking Spaces </td><td><?php echo $coveredParkingSpaces ?> </td></tr>
            <tr><td>Heating Sources </td><td><?php echo $heatingSources  ?> </td></tr>
            <tr><td>Heating System </td><td><?php echo $heatingSystem  ?> </td></tr>
            <tr><td>Cooling System </td><td><?php echo $coolingSystem  ?> </td></tr>
            <tr><td>Appliances </td><td><?php echo $appliances   ?> </td></tr>
            <tr><td>Floor Covering </td><td><?php echo $floorCovering  ?> </td></tr>
            <tr><td>Types of Rooms </td><td><?php echo $rooms  ?> </td></tr>
            <tr><td>Architecture </td><td><?php echo $architecture ?> </td></tr>

          </table>
            <form method ="post">
            <button type="submit" class="btn btn-primary" name="comparables"   onclick="window.location.href=<?php echo $query4?>" >View Similar Homes</button>
            <button type="submit" class="btn btn-primary" name="recentlysold">View Recently Sold Homes</button>
            <button type="submit" class="btn btn-primary" name="forrent">View Homes for Rent</button>
            <br>
            </form>


          <?php
          if($xml1->message->code == 502)
            {
                echo "<br><b>No updated data is available for this property</b><br> ";
            }
          echo "<br>"."<b>Data of similar houses-  </b>".$query3. "<br>";
           //$xml1 = simplexml_load_file(urlencode($query2));

           //echo "<br>".$zip."<br>";
           $query4 = $url4.$zip.$fmr;
           $query5 = $url4.$zip.$fmr2;
           echo "<br>". "<b> More data for the house searched for by the user-  </b> <i>  TO BE ADDED TO THE ABOVE TABLE   </i><br>".$query2."<br>";
           echo "<br>"."<b>Data of houses recently sold in this area-  </b> ".$query4. "<br>";
           echo "<br>"."<b>Data of houses for rent in this area-   </b>" .$query5. "<br>";

            }

            }
          else
          {
              echo "<br>" . (string)$xml->message->text. "<br>";
          }



//        ARRAY PRINTING- DONOT DELETE
//
//
//        echo "<br>" . "<h2> Copying data for each house into an array </h2>" . "<br";
//        $houses = array();
//
//
//     foreach($xml->response->results->result as $result)
//    {
//       $house = array();
//
//       foreach($result as $key => $value)
//       {
//            $house[(string)$key] = (string)$value;
//       }
//
//       $houses[] = $house;
//    }
//
//    print_r($houses);

    echo "<br>" ;?>


        <br>
        </div>
    </body>
</html>
