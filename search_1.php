<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset ="UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel = "stylesheet" type="text/css" href="./css/homepage.css">
        <title>Search for Homes</title>
    </head>
    <body>
         <br>
        <div class="container" id="searchBox">
            <div class="panel panel-primary panel-fixed">
                <div class = "panel panel-heading">
                    <h3 class= "panel-title">Search for Homes</h3>
                </div>
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel panel-heading">
                            <h3 class="panel-title">Desired Location of Home</h3><br>
                                <div class="form-group" id="locationField">
                                  <input id="autocmplete" placeholder="Enter the address" name="autoComplete " class="form-control" type="text">
                                </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel panel-heading">
                            
                            <form action="homesearch.php" method="post">
                              <div class="form-group">
                                  <label>Street Address</label>
                                  <div class="slimField"><input class="form-control" id="street_number" placeholder="Address line 1" >
                                  <input class="form-control" placeholder="Address line 2" id="route" name="streetAddress" ></div>
                              <div class="form-group">
                                  <label>City</label>
                                  <input type="text" placeholder="San Francisco" class="form-control" name="cityAddress">
                              </div>  
                              <div class="form-group">
                                  <label>State</label>
                                  <input type="text" placeholder="CA" class="form-control" name="stateAddress">
                              </div>
                              <div class="form-group">
                                  <label>Zip Code</label>
                                  <input type="text" placeholder="94132" class="form-control" name="zipCode">
                              </div>
                              <div class="form-group">
                                  <label>Country</label>
                                  <input type="text" placeholder="USA" class="form-control" name="country">
                              </div>
                              <button type="submit" class="btn btn-primary" name="search">Search</button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
           
        <?php
        // put your code here
        ?>
    </body>
</html>
